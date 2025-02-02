<?php /* Quick and dirty script to calculate routes matched per second */

require __DIR__ . '/../vendor/autoload.php';

new quick_benchmark($argv[1] ?? '', $argv[2] ?? '');

class quick_benchmark
{
	const benchmark = array(
		'symfony_compiled' => \Benchmark_Routing\Symfony_Compiled::class,
		'symfony' => \Benchmark_Routing\Symfony::class,

		'fast_mark' => \Benchmark_Routing\FastRoute_MarkBased::class,
		'fast_group_pos' => \Benchmark_Routing\FastRoute_GroupPosBased::class,
		'fast_char_count' => \Benchmark_Routing\FastRoute_CharCountBased::class,
		'fast_group_count' => \Benchmark_Routing\FastRoute_GroupCountBased::class,

		'fast_cached_mark' => \Benchmark_Routing\FastRoute_Cached_MarkBased::class,
		'fast_cached_group_pos' => \Benchmark_Routing\FastRoute_Cached_GroupPosBased::class,
		'fast_cached_char_count' => \Benchmark_Routing\FastRoute_Cached_CharCountBased::class,
		'fast_cached_group_count' => \Benchmark_Routing\FastRoute_Cached_GroupCountBased::class,

        'yii2' => \Benchmark_Routing\Yii2::class,
        'yii2_cached' => \Benchmark_Routing\Yii2_Cached::class,
		);

	const repeats = 300;

	const scenario = array(
		'benchAll' => [182, 2], /* total number of routes */
		'benchLongest' => [1, self::repeats],
		'benchLast' => [1, self::repeats],
		);

	function __construct($case, $scenario)
	{
		('' === $case)
			? $this->all()
			: $this->run($case, $scenario);
	}

	function all()
	{
		$output = new \Symfony\Component\Console\Output\ConsoleOutput();
		$progressBar = new Symfony\Component\Console\Helper\ProgressBar(
			$output, count(self::benchmark) * count(self::scenario)
			);

		$result = [];
		foreach (self::benchmark as $case => $class)
		{
			foreach (self::scenario as $scenario => $revs)
			{
				$time = shell_exec("php " . __FILE__ . " {$case} {$scenario}");
				$progressBar->advance();

				$result[] = array(
					'case' => $case,
					'scenario' => $scenario,
					'time' => $time,
					'repeats' => $revs[0] * $revs[1],
					'per_second' => $revs[0] * $revs[1] / $time,
					);
			}
		}

		$progressBar->finish();
		$output->writeln('');

		usort($result, static function($a, $b)
		{
			return $b['per_second'] <=> $a['per_second'];
		});

		$table = new \Symfony\Component\Console\Helper\Table($output);
		$table->setHeaders(['Case', 'Scenario', 'Routes', 'Time', 'Per Second']);

		foreach ($result as $data)
		{
			$table->addRow([
				$data['case'],
				$data['scenario'],
				$data['repeats'],
				sprintf('%0.6f seconds', $data['time']),
				$data['per_second']
			]);

		}
		$table->render();
	}

	function run($case, $scenario)
	{
		$class = self::benchmark[ $case ];
		$bench = new $class;
		$repeats = self::scenario[ $scenario ][1];

		$start = microtime(true);
		for ($i = 0; $i < $repeats; $i++)
		{
			$this->$scenario($bench);

		}

		echo microtime(true) - $start;
	}

	function benchAll($bench)
	{
		$bench->benchAll();
	}

	function benchLongest($bench)
	{
		$bench->runRouting( $bench->getLongestRoute()[0]['route'] );
	}

	function benchLast($bench)
	{
		$bench->runRouting( $bench->getLastRoute()[0]['route'] );
	}
}

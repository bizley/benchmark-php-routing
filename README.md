# Benchmark PHP Routing with Yii 2 results

Please read the original package [README](https://github.com/kktsvetkov/benchmark-php-routing) first.

# Added Packages

* Yii 2 [yiisoft/yii2](https://github.com/yiisoft/yii2) (Yii 2 does not provide stand-alone routing package)

# Added Benchmarks

* [yiisoft/yii2](https://github.com/yiisoft/yii2)
	* [benchmark/Yii2.php](benchmark/Yii2.php) with `yii\web\UrlManager`
	* [benchmark/Yii2_Cached.php](benchmark/Yii2_Cached.php) with `yii\web\UrlManager` and `yii\caching\FileCache`

### Running the benchmarks

To run the benchmarks, first you have to run `composer update` to get all the packages and their dependencies. 
After that, you can execute any of benchmark files like this:
```sh
php vendor/bin/phpbench run benchmark/Yii2.php --report=aggregate
```
Or you can run all the benchmarks at once
```sh
php vendor/bin/phpbench run --report=aggregate
```

### Quick Benchmark

In addition to the phpbench running its own cases, there is also a script that will run all the scenarios against 
all the packages and strategies, and calculate the number of routes matched per second. The results are then sorted
by that data. Here's how to run this:

```sh
php scripts/quick-benchmark.php
```

# Results

Here are the results from the benchmarks executed at my local machine:

## PHP 7.1
```
+-------------------------+--------------+--------+------------------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast_cached_mark        | benchAll     | 364    | 0.285396 seconds | 1275.4203759613 |
| fast_cached_group_pos   | benchAll     | 364    | 0.310564 seconds | 1172.060998004  |
| fast_cached_group_count | benchAll     | 364    | 0.312195 seconds | 1165.9377215163 |
| fast_cached_char_count  | benchAll     | 364    | 0.325633 seconds | 1117.822656838  |
| yii2_cached             | benchAll     | 364    | 0.504514 seconds | 721.48645068605 |
| fast_cached_group_pos   | benchLast    | 300    | 0.424024 seconds | 707.50734473443 |
| fast_cached_mark        | benchLast    | 300    | 0.424727 seconds | 706.33613145365 |
| symfony_compiled        | benchAll     | 364    | 0.520200 seconds | 699.73085375573 |
| fast_cached_group_count | benchLast    | 300    | 0.432022 seconds | 694.40892876064 |
| fast_cached_char_count  | benchLast    | 300    | 0.436914 seconds | 686.63365985448 |
| fast_cached_group_pos   | benchLongest | 300    | 0.519731 seconds | 577.22189320747 |
| fast_cached_group_count | benchLongest | 300    | 0.520221 seconds | 576.67799437663 |
| fast_cached_mark        | benchLongest | 300    | 0.522632 seconds | 574.0175303981  |
| fast_cached_char_count  | benchLongest | 300    | 0.550930 seconds | 544.53376539748 |
| symfony_compiled        | benchLast    | 300    | 0.606399 seconds | 494.72372260679 |
| yii2_cached             | benchLast    | 300    | 0.639687 seconds | 468.97931526976 |
| yii2_cached             | benchLongest | 300    | 0.707803 seconds | 423.84674176697 |
| symfony_compiled        | benchLongest | 300    | 0.714422 seconds | 419.9198866145  |
| fast_mark               | benchAll     | 364    | 1.062512 seconds | 342.58439160074 |
| fast_group_pos          | benchAll     | 364    | 1.070491 seconds | 340.03093476918 |
| fast_char_count         | benchAll     | 364    | 1.086718 seconds | 334.95355027671 |
| yii2                    | benchAll     | 364    | 1.120772 seconds | 324.77616979709 |
| fast_group_count        | benchAll     | 364    | 1.122545 seconds | 324.26316872668 |
| symfony                 | benchAll     | 364    | 1.169493 seconds | 311.24599502284 |
| fast_group_pos          | benchLast    | 300    | 1.050630 seconds | 285.5429347656  |
| fast_mark               | benchLast    | 300    | 1.053035 seconds | 284.89080996001 |
| fast_group_count        | benchLast    | 300    | 1.095433 seconds | 273.86430835121 |
| fast_char_count         | benchLast    | 300    | 1.100555 seconds | 272.5897529106  |
| fast_group_pos          | benchLongest | 300    | 1.126963 seconds | 266.20219703502 |
| yii2                    | benchLast    | 300    | 1.139687 seconds | 263.23020848741 |
| fast_mark               | benchLongest | 300    | 1.178569 seconds | 254.5459621219  |
| fast_char_count         | benchLongest | 300    | 1.190553 seconds | 251.98375261162 |
| yii2                    | benchLongest | 300    | 1.206032 seconds | 248.7496108009  |
| symfony                 | benchLongest | 300    | 1.212256 seconds | 247.47244162782 |
| fast_group_count        | benchLongest | 300    | 1.223475 seconds | 245.20316850777 |
| symfony                 | benchLast    | 300    | 1.660708 seconds | 180.64585039956 |
+-------------------------+--------------+--------+------------------+-----------------+
```

## PHP 7.2
```
+-------------------------+--------------+--------+------------------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast_cached_mark        | benchAll     | 364    | 0.286407 seconds | 1270.9186849339 |
| fast_cached_group_pos   | benchAll     | 364    | 0.293488 seconds | 1240.2550297406 |
| fast_cached_char_count  | benchAll     | 364    | 0.307962 seconds | 1181.9642358901 |
| fast_cached_group_count | benchAll     | 364    | 0.313417 seconds | 1161.392167453  |
| fast_cached_mark        | benchLast    | 300    | 0.415080 seconds | 722.75211778247 |
| fast_cached_char_count  | benchLast    | 300    | 0.433873 seconds | 691.4462939802  |
| fast_cached_group_pos   | benchLast    | 300    | 0.434282 seconds | 690.79565854703 |
| symfony_compiled        | benchAll     | 364    | 0.552131 seconds | 659.26362398232 |
| fast_cached_group_count | benchLast    | 300    | 0.469484 seconds | 638.99928852876 |
| fast_cached_group_count | benchLongest | 300    | 0.497158 seconds | 603.42983418632 |
| fast_cached_mark        | benchLongest | 300    | 0.500412 seconds | 599.50602225949 |
| fast_cached_group_pos   | benchLongest | 300    | 0.505936 seconds | 592.96048300487 |
| yii2_cached             | benchAll     | 364    | 0.638557 seconds | 570.03528952299 |
| fast_cached_char_count  | benchLongest | 300    | 0.531454 seconds | 564.4890268631  |
| symfony_compiled        | benchLast    | 300    | 0.604793 seconds | 496.03742836125 |
| symfony_compiled        | benchLongest | 300    | 0.691537 seconds | 433.81632785339 |
| fast_group_pos          | benchAll     | 364    | 0.861042 seconds | 422.7435948555  |
| fast_mark               | benchAll     | 364    | 0.882840 seconds | 412.30566744983 |
| fast_char_count         | benchAll     | 364    | 0.907304 seconds | 401.18855480305 |
| yii2_cached             | benchLast    | 300    | 0.760289 seconds | 394.58681927183 |
| fast_group_count        | benchAll     | 364    | 0.936394 seconds | 388.7252686873  |
| yii2_cached             | benchLongest | 300    | 0.791653 seconds | 378.95383555282 |
| symfony                 | benchAll     | 364    | 0.970763 seconds | 374.96270724881 |
| yii2                    | benchAll     | 364    | 1.034770 seconds | 351.76898809714 |
| fast_group_pos          | benchLast    | 300    | 0.909209 seconds | 329.95713385529 |
| fast_group_count        | benchLast    | 300    | 0.934248 seconds | 321.11388993804 |
| fast_mark               | benchLast    | 300    | 0.935476 seconds | 320.69241297051 |
| fast_char_count         | benchLast    | 300    | 0.952888 seconds | 314.83237929673 |
| fast_group_pos          | benchLongest | 300    | 1.000126 seconds | 299.96223925057 |
| fast_group_count        | benchLongest | 300    | 1.010389 seconds | 296.91539020235 |
| fast_char_count         | benchLongest | 300    | 1.017413 seconds | 294.86546654355 |
| fast_mark               | benchLongest | 300    | 1.026254 seconds | 292.32530925763 |
| yii2                    | benchLast    | 300    | 1.031046 seconds | 290.96667375801 |
| symfony                 | benchLongest | 300    | 1.036408 seconds | 289.46130788749 |
| yii2                    | benchLongest | 300    | 1.087978 seconds | 275.7408381765  |
| symfony                 | benchLast    | 300    | 1.453650 seconds | 206.37705119689 |
+-------------------------+--------------+--------+------------------+-----------------+
```

## PHP 7.3
```
+-------------------------+--------------+--------+------------------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast_cached_group_count | benchAll     | 364    | 0.246894 seconds | 1474.3176134762 |
| fast_cached_group_pos   | benchAll     | 364    | 0.250876 seconds | 1450.9162803516 |
| fast_cached_char_count  | benchAll     | 364    | 0.251595 seconds | 1446.7694931894 |
| fast_cached_mark        | benchAll     | 364    | 0.254978 seconds | 1427.5744711091 |
| symfony_compiled        | benchAll     | 364    | 0.433597 seconds | 839.48949460502 |
| fast_cached_char_count  | benchLast    | 300    | 0.362217 seconds | 828.23291523175 |
| fast_cached_mark        | benchLast    | 300    | 0.364163 seconds | 823.80655894189 |
| fast_cached_group_count | benchLast    | 300    | 0.367007 seconds | 817.42306275616 |
| fast_cached_group_pos   | benchLast    | 300    | 0.384632 seconds | 779.9665646581  |
| fast_cached_mark        | benchLongest | 300    | 0.413638 seconds | 725.27165455086 |
| fast_cached_group_count | benchLongest | 300    | 0.417940 seconds | 717.80614363753 |
| fast_cached_char_count  | benchLongest | 300    | 0.419375 seconds | 715.35032115094 |
| yii2_cached             | benchAll     | 364    | 0.539910 seconds | 674.18634102096 |
| fast_cached_group_pos   | benchLongest | 300    | 0.444984 seconds | 674.18160542392 |
| symfony_compiled        | benchLast    | 300    | 0.523546 seconds | 573.01557303552 |
| symfony_compiled        | benchLongest | 300    | 0.567937 seconds | 528.22747650079 |
| fast_group_pos          | benchAll     | 364    | 0.760310 seconds | 478.75197900765 |
| fast_group_count        | benchAll     | 364    | 0.762092 seconds | 477.63270007775 |
| fast_mark               | benchAll     | 364    | 0.798002 seconds | 456.13920502841 |
| yii2_cached             | benchLast    | 300    | 0.660961 seconds | 453.88463104797 |
| yii2_cached             | benchLongest | 300    | 0.662779 seconds | 452.6395042694  |
| fast_char_count         | benchAll     | 364    | 0.806545 seconds | 451.30772784848 |
| symfony                 | benchAll     | 364    | 0.861481 seconds | 422.52820500189 |
| yii2                    | benchAll     | 364    | 0.868361 seconds | 419.18050393035 |
| fast_group_pos          | benchLast    | 300    | 0.792483 seconds | 378.55697272644 |
| fast_mark               | benchLast    | 300    | 0.802571 seconds | 373.7986772728  |
| fast_char_count         | benchLast    | 300    | 0.802671 seconds | 373.7521557063  |
| fast_group_count        | benchLast    | 300    | 0.805326 seconds | 372.51995540269 |
| fast_mark               | benchLongest | 300    | 0.842522 seconds | 356.07372699144 |
| fast_group_pos          | benchLongest | 300    | 0.843231 seconds | 355.77441205485 |
| fast_group_count        | benchLongest | 300    | 0.853758 seconds | 351.38758995242 |
| fast_char_count         | benchLongest | 300    | 0.874696 seconds | 342.97629622805 |
| yii2                    | benchLast    | 300    | 0.905973 seconds | 331.13571159017 |
| symfony                 | benchLongest | 300    | 0.925523 seconds | 324.14103827354 |
| yii2                    | benchLongest | 300    | 1.014184 seconds | 295.80431219551 |
| symfony                 | benchLast    | 300    | 1.343185 seconds | 223.34973337362 |
+-------------------------+--------------+--------+------------------+-----------------+
```

## PHP 7.4
```
+-------------------------+--------------+--------+------------------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast_cached_mark        | benchAll     | 364    | 0.239162 seconds | 1521.9811188714 |
| fast_cached_group_count | benchAll     | 364    | 0.241219 seconds | 1509.0019194541 |
| fast_cached_group_pos   | benchAll     | 364    | 0.247549 seconds | 1470.415619438  |
| fast_cached_char_count  | benchAll     | 364    | 0.248634 seconds | 1463.998703549  |
| fast_cached_mark        | benchLast    | 300    | 0.342516 seconds | 875.87163166775 |
| symfony_compiled        | benchAll     | 364    | 0.418651 seconds | 869.45907115806 |
| fast_cached_group_pos   | benchLast    | 300    | 0.353386 seconds | 848.93024460804 |
| fast_cached_group_count | benchLast    | 300    | 0.354391 seconds | 846.52296149885 |
| fast_cached_char_count  | benchLast    | 300    | 0.354796 seconds | 845.55647991225 |
| yii2_cached             | benchAll     | 364    | 0.488117 seconds | 745.72288040263 |
| fast_cached_group_count | benchLongest | 300    | 0.410121 seconds | 731.49150201259 |
| fast_cached_mark        | benchLongest | 300    | 0.411014 seconds | 729.90200229941 |
| fast_cached_char_count  | benchLongest | 300    | 0.417481 seconds | 718.59526008213 |
| fast_cached_group_pos   | benchLongest | 300    | 0.434585 seconds | 690.31397628129 |
| symfony_compiled        | benchLast    | 300    | 0.521908 seconds | 574.81390252627 |
| yii2_cached             | benchLast    | 300    | 0.559829 seconds | 535.87792306352 |
| symfony_compiled        | benchLongest | 300    | 0.564632 seconds | 531.31957176601 |
| fast_group_pos          | benchAll     | 364    | 0.726328 seconds | 501.15106681898 |
| fast_mark               | benchAll     | 364    | 0.739394 seconds | 492.29507523274 |
| yii2_cached             | benchLongest | 300    | 0.614270 seconds | 488.38460896549 |
| fast_group_count        | benchAll     | 364    | 0.747789 seconds | 486.76838748472 |
| fast_char_count         | benchAll     | 364    | 0.785884 seconds | 463.17259832955 |
| symfony                 | benchAll     | 364    | 0.877757 seconds | 414.69332623493 |
| yii2                    | benchAll     | 364    | 0.880863 seconds | 413.23113825097 |
| fast_group_pos          | benchLast    | 300    | 0.756455 seconds | 396.58673941834 |
| fast_mark               | benchLast    | 300    | 0.761332 seconds | 394.04620610048 |
| fast_group_count        | benchLast    | 300    | 0.779134 seconds | 385.04286359081 |
| fast_char_count         | benchLast    | 300    | 0.808196 seconds | 371.19705471087 |
| fast_group_pos          | benchLongest | 300    | 0.828189 seconds | 362.23609736887 |
| fast_group_count        | benchLongest | 300    | 0.829408 seconds | 361.7037997993  |
| fast_char_count         | benchLongest | 300    | 0.835369 seconds | 359.12279014359 |
| fast_mark               | benchLongest | 300    | 0.866856 seconds | 346.07829735878 |
| symfony                 | benchLongest | 300    | 0.912473 seconds | 328.77686469103 |
| yii2                    | benchLast    | 300    | 0.921148 seconds | 325.68062628023 |
| yii2                    | benchLongest | 300    | 0.950908 seconds | 315.4878725744  |
| symfony                 | benchLast    | 300    | 1.259381 seconds | 238.21225403604 |
+-------------------------+--------------+--------+------------------+-----------------+
```

<?php
//内存利用率
///proc/meminfo 内存占用情况
/* MemTotal:         252148 kB 总内存
*  MemFree:           52300 kB空闲内存
*/
$str = shell_exec('more /proc/meminfo');

//匹配字符串
$pattern = "/(.+):\s*([0-9]+)/";
preg_match_all($pattern, $str, $out);
echo (100 * ($out[2][0] - $out[2][1]) / $out[2][0]);

<?php

// more proc/stat 该文件记录了自系统启动以来的所有内核的相关数据
//shell_exec()     通过 shell 环境执行命令，并且将完整的输出以字符串的方式返回。
//$str = shell_exec('df -lh');
$fp = popen('df -lh | grep -E "^(/)"', "r");
$rs = fread($fp, 1024);
pclose(($fp));
$rs = preg_replace("/\s{2,}/", '', $rs);
$hd = explode(",", $rs);
echo ($hd);
$pattern = "//";
$pattern = "/(cpu[0-9]?)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)/";
// //preg_match_all 帅选出匹配项
// preg_match_all($pattern, $str, $out);
// for ($n = 1; $n < count($out[1]); $n++) {
//     echo (($out[2][$n] + $out[3][$n]) / ($out[2][$n] + $out[3][$n] + $out[4][$n] + $out[5][$n] + $out[6][$n] + $out[7][$n]) * 100);
// }

<?php

//get user
$user = ($_GET['user'])?$_GET['user']:"user2";

//servers log
$servers = [
    __DIR__ . '/server1/server.log',
    __DIR__ . '/server2/server.log',
    __DIR__ .'/server3/server.log',
    __DIR__ . '/server4/server.log'
];

//check if line has user return false or log timestamp
function line_has_user($line, $user) {
    if (strpos($line, "userid=" . $user . PHP_EOL) !== false) {

        $date_str = substr($line, 20, 26);

        return strtotime($date_str);
    }

    return false;
}

//read log files
$log = [];
foreach($servers  as $s) {
    $file = fopen($s, "r");
    while(!feof($file)) {
        $line = fgets($file);
        $n = line_has_user($line, $user);

        if ($n !== false) {
            $log[$n] = $line;
        }
    }
    fclose($file);
}

//header("Content-Type: plain/text");
echo "<pre>";
ksort($log);
foreach ($log as $key => $value) {
    echo $value;
}
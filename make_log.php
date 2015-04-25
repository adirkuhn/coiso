<?php

function log_line() {
    $l = "177.126.180.83 - - [" ;
    $l1 = "] GET /meme.jpg HTTP/1.1 200 2148 - userid=user";

    $dates = array();

    for ($s = 1; $s < 5; $s++) {
        for($i=0; $i<10000; $i++) {
            $dates[] = $l . date('d/M/Y:H:i:s O', rand(0, 1000000000)) . $l1 . rand(0,20) . PHP_EOL;
        }

        file_put_contents(__DIR__ . "/server". $s ."/server.log", $dates);
    }
}

log_line();
<?php
require './vendor/autoload.php';

$redis = new Predis\Client();
echo $redis->ping();
?>
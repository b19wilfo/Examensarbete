<?php
$dbname = "testing";
$username = "root";
$servername = "localhost";
$password = "";
$log_time = "";

$redis = new Redis();
$redis->connect('localhost', 6379);


$key = 'PRODUKTER';

if (!$redis->get($key)) {
    $source = 'MySQL Server';
    $database_name     = 'testing';
    $database_user     = 'test_user';
    $database_password = '';
    $mysql_host        = 'localhost';

    $pdo = new PDO('mysql:host=' . $mysql_host . '; dbname=' . $database_name, $database_user, $database_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql  = "SELECT * FROM produkter";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $produkter[] = $row;
    }

    $redis->set($key, serialize($produkter));
    $redis->expire($key, 10);

} else {
     $source = 'Redis Server';
     $produkter = unserialize($redis->get($key));

}

echo $source . ': <br>';
print_r($produkter);
?>
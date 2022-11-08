<?php
$dbname = "testing";
$username = "root";
$servername = "127.0.0.1";
$password = "";
$log_time = "";

try{
    $conn = new PDO("mysql:host=$servername;port=3306; dbname=testing", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('Select * from artiklar');
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $artiklar = $stmt->fetchAll();
    $i = 0;
      foreach ($artiklar as $artikel) {
        echo "<h2 onclick='ShowText(\"content\",".$i.")'>".$artikel['heading']."</h2><hr>";
        echo "<div class='content'>";
        echo "<p>".$artikel['forfattare']."</p>";
        echo "<p>".$artikel['brodtext']."</p>";
        echo "<p>".$artikel['publiserad']."</p><hr>";
        echo "</div>";
        $i++;
      }
  }
  catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}


//$redis = new Redis();
//$redis->connect('localhost', 6379);


/*$key = 'PRODUKTER';

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
print_r($produkter);*/
?>
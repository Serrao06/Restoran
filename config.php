<?php
    $server = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASS');
    $dbName = getenv('DB_NAME');

    $dsn = "mysql:host=$server;dbname=$dbName;charset=UTF8";
        
    try { 
        $conn = new PDO($dsn, $user, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // if ($conn) {
        //     echo "Connected";
        // }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

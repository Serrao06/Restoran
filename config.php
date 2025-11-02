<?php

function loadEnv($path)
{
    if (!file_exists($path)) {
        return false;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split the line into key and value
        list($key, $value) = explode('=', $line, 2);

        $key = trim($key);
        $value = trim($value);

        // Set the environment variable
        putenv(sprintf('%s=%s', $key, $value));
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value; // Also set in $_SERVER for broader access
    }
    return true;
}

// Specify the path to your .env file
$envFilePath = __DIR__ . '/.env';

if (loadEnv($envFilePath)) {
    // Access variables using getenv() or $_ENV
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
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

} else {
    echo "Error: .env file not found at " . $envFilePath . "\n";
}
?>
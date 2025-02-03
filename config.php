<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:bpsz.database.windows.net,1433; Database = bpsz", "sqladmin", "Password2024@2024");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "sqladmin", "pwd" => "{your_password_here}", "Database" => "bpsz", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:bpsz.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>

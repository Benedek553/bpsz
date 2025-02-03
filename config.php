<?php
$serverName = "bpsz.database.windows.net";
$database = "bpsz";
$username = "sqladmin";
$password = "Password2024@2024";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Hiba az adatbáziskapcsolat létrehozásakor: " . $e->getMessage());
}
?>


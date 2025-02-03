<?php
$connectionString = "Driver={ODBC Driver 18 for SQL Server};Server=tcp:bpsz.database.windows.net,1433;Database=bpsz;Uid=sqladmin;Pwd={your_password_here};Encrypt=yes;TrustServerCertificate=no;Connection Timeout=30;";

$conn = odbc_connect($connectionString, '', '');
if ($conn) {
    echo "Sikeres kapcsolat!";
} else {
    echo "Kapcsolati hiba: " . odbc_errormsg();
}
?>

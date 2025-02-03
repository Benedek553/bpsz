<?php
include 'config.php';

$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $allapot = $_POST["allapot"];
    $stmt = $conn->prepare("UPDATE ugyek SET allapot = ? WHERE id = ?");
    $stmt->execute([$allapot, $id]);
    header("Location: index.php");
}

$stmt = $conn->prepare("SELECT * FROM ugyek WHERE id = ?");
$stmt->execute([$id]);
$ugy = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Ügy módosítása</title>
</head>
<body>
    <h2>Ügy állapotának módosítása</h2>
    <form method="POST">
        <label>Új állapot:
            <select name="allapot">
                <option value="nyitott" <?= $ugy["allapot"] == "nyitott" ? "selected" : "" ?>>Nyitott</option>
                <option value="folyamatban" <?= $ugy["allapot"] == "folyamatban" ? "selected" : "" ?>>Folyamatban</option>
                <option value="lezárt" <?= $ugy["allapot"] == "lezárt" ? "selected" : "" ?>>Lezárt</option>
            </select>
        </label><br>
        <button type="submit">Mentés</button>
    </form>
</body>
</html>


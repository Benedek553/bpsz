<?php
include 'config.php';

// Új ügy hozzáadása
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cim = $_POST["cim"];
    $leiras = $_POST["leiras"];
    $stmt = $conn->prepare("INSERT INTO ugyek (cim, leiras) VALUES (?, ?)");
    $stmt->execute([$cim, $leiras]);
    header("Location: index.php");
}

// Ügyek lekérdezése
$stmt = $conn->query("SELECT * FROM ugyek ORDER BY letrehozva DESC");
$ugyek = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Ügykezelő</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>

    <h2>Új ügy hozzáadása</h2>
    <form method="POST">
        <label>Cím: <input type="text" name="cim" required></label><br>
        <label>Leírás: <textarea name="leiras"></textarea></label><br>
        <button type="submit">Hozzáadás</button>
    </form>

    <h2>Ügyek listája</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Leírás</th>
            <th>Állapot</th>
            <th>Műveletek</th>
        </tr>
        <?php foreach ($ugyek as $ugy): ?>
        <tr>
            <td><?= $ugy['id'] ?></td>
            <td><?= htmlspecialchars($ugy['cim']) ?></td>
            <td><?= htmlspecialchars($ugy['leiras']) ?></td>
            <td><?= htmlspecialchars($ugy['allapot']) ?></td>
            <td>
                <a href="update.php?id=<?= $ugy['id'] ?>">Módosítás</a> |
                <a href="delete.php?id=<?= $ugy['id'] ?>" onclick="return confirm('Biztos törölni akarod?');">Törlés</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>


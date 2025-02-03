<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ügykezelő rendszer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Ügykezelő rendszer</h2>
        <form method="POST" action="add.php" class="mb-3">
            <div class="input-group">
                <input type="text" name="ugy_nev" class="form-control" placeholder="Új ügy neve" required>
                <button type="submit" class="btn btn-primary">Hozzáadás</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ügy neve</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'db.php';
                $query = $conn->query("SELECT * FROM Ugyek ORDER BY id DESC");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['ugy_nev']}</td>
                            <td>
                                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Törlés</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


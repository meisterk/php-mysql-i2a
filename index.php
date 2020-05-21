<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schülerverwaltung</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Schülerverwaltung</h1>
        <h2>Liste aller Schüler_innen</h2>
    </header>

    <main>
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>

        <?php
        $dbname = 'testdb';
        $dbuser = 'testuser';
        $dbpassword = '123';

        // connect to MySQL as testuser
        $pdo = new PDO(
            "mysql:host=localhost;dbname=$dbname",
            $dbuser,
            $dbpassword
        );
        // show errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // create schueler
        if (isset($_POST['vorname']) && isset($_POST['nachname'])) {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            // Prepared Statement zur Verhinderung von SQL-Injections
            $sql = "INSERT INTO schueler SET vorname = ?, nachname = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$vorname, $nachname]);            
        }

        // read and display data
        $sql = "SELECT * FROM schueler";
        foreach ($pdo->query($sql) as $zeile) {
            $vorname = htmlspecialchars($zeile['vorname']);
            $nachname = htmlspecialchars($zeile['nachname']);
            echo "<tr><td>$vorname</td><td>$nachname</td></tr>";
        }
        ?>
    </table>
    <a class="button neu" href="neu.html">Neue Schüler_in erstellen</a>
    </main>
    <footer>
        <p>von Franz Kohnle</p>
    </footer>
</body>

</html>
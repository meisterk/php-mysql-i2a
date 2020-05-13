<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schülerverwaltung</title>
</head>

<body>
    <h1>Schülerverwaltung</h1>
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
            $vornameMitHTMLCode = $_POST['vorname'];
            $vorname = htmlspecialchars($vornameMitHTMLCode);

            $nachnameMitHTMLCode = $_POST['nachname'];
            $nachname = htmlspecialchars($nachnameMitHTMLCode);
            
            $sql = "INSERT INTO schueler SET vorname = ?, nachname = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$vorname, $nachname]);            
        }

        // read and display data
        $sql = "SELECT * FROM schueler";
        foreach ($pdo->query($sql) as $zeile) {
            $vorname = $zeile['vorname'];
            $nachname = $zeile['nachname'];
            echo "<tr><td>$vorname</td><td>$nachname</td></tr>";
        }
        ?>
    </table>
    <a href="neu.html">Neue Schüler_in erstellen</a>
</body>

</html>
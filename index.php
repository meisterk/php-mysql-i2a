<?php
    require('schueler.php');
    require('dao.php');
?>
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
            <th>Ändern</th>
            <th>Löschen</th>
        </tr>

        <?php
        $dao = new DAO();

        // create schueler
        if (isset($_POST['vorname']) && isset($_POST['nachname'])) {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $schueler = new Schueler(-1, $vorname, $nachname);
            $dao->addSchueler($schueler);        
        }

        // delete schueler
        if (isset($_GET['id'])) {
            $id = $_GET['id'];            
            $dao->deleteSchueler($id);         
        }

        // read and display data
        $allSchueler = $dao->getAllSchueler();
       
        foreach ($allSchueler as $schueler) {
            $id = $schueler->getId();
            $vorname = htmlspecialchars($schueler->getVorname());
            $nachname = htmlspecialchars($schueler->getNachname());
            echo "<tr>
                    <td>$vorname</td>
                    <td>$nachname</td>
                    <td><a class='button aendern' href='./update.php?id=$id'>Ändern</a></td>
                    <td><a class='button loeschen' href='./?id=$id'>Löschen</a></td>
                  </tr>";
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
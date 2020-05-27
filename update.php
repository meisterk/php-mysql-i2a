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
        <h2>Vorhandene Schüler_in verändern</h2>
    </header>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

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

        // read  data
        $sql = "SELECT * FROM schueler WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$id]);
        while($row = $statement->fetch()){
            $vorname = htmlspecialchars($row['vorname']);
            $nachname = htmlspecialchars($row['nachname']);
        }        
    }
    ?>
    <main>
    <form action="./" method="POST">
        <div class="eingabe">
            <label for="inputVorname">Vorname</legend>
            <input id="inputVorname" type="text" name="vorname" value="<?=$vorname?>">
        </div>
        <div class="eingabe">    
            <label for="inputNachname">Nachname</legend>
            <input id = "inputNachname" type="text" name="nachname" value="<?=$nachname?>">
        </div> 
        <div>
            <button class="button speichern">Speichern</button> 
            <a class="button abbrechen" href="./">Abbrechen</a>
        </div>
    </form> 
    </main> 
    
    <footer>
        <p>von Franz Kohnle</p>
    </footer>
</body>

</html>
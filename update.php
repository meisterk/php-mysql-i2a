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
        <h2>Vorhandene Schüler_in verändern</h2>
    </header>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dao = new DAO();
        $schueler = $dao->getSchuelerById($id); 
        $vorname = $schueler->getVorname(); 
        $nachname = $schueler->getNachname();          
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
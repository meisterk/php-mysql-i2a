<?php
class DAO {
    private $pdo;

    public function __construct(){
        $dbname = 'testdb';
        $dbuser = 'testuser';
        $dbpassword = '123';

        // connect to MySQL as testuser
        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=$dbname",
            $dbuser,
            $dbpassword
        );

        // show errors
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addSchueler($schueler){
        $sql = "INSERT INTO schueler SET vorname = ?, nachname = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$schueler->getVorname(), $schueler->getNachname()]);    
    }

    public function updateSchueler($schueler){
        $sql = "UPDATE schueler SET vorname = ?, nachname = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$schueler->getVorname(), $schueler->getNachname(), $schueler->getId()]);    
    }

    public function deleteSchueler($id){
        $sql = "DELETE FROM schueler WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);  
    }

    public function getAllSchueler(){
        $list = array();
        $sql = "SELECT * FROM schueler";
        foreach ($this->pdo->query($sql) as $zeile) {
            $id = $zeile['id'];
            $vorname = $zeile['vorname'];
            $nachname = $zeile['nachname'];
            $schueler = new Schueler($id, $vorname, $nachname);
            array_push($list, $schueler);
        }
        return $list;
    } 
    
    public function getSchuelerById($id){
        $sql = "SELECT * FROM schueler WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        while($row = $statement->fetch()){
            $vorname = htmlspecialchars($row['vorname']);
            $nachname = htmlspecialchars($row['nachname']);
            $schueler = new Schueler($id, $vorname, $nachname);
        }
        return $schueler;
    }    
    
}

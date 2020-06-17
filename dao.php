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
        // Prepared Statement zur Verhinderung von SQL-Injections
        $sql = "INSERT INTO schueler SET vorname = ?, nachname = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$schueler->getVorname(), $schueler->getNachname()]);    
    }

    public function deleteSchueler($id){
        // Prepared Statement zur Verhinderung von SQL-Injections
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
}

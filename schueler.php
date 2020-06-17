<?php
class Schueler {
    private $id;
    private $vorname;
    private $nachname;

    public function __construct($id, $vorname, $nachname){
        $this->id = $id;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
    }

    public function getId(){
        return $this->id;
    }

    public function getVorname(){
        return $this->vorname;
    }

    public function setVorname($vorname){
        $this->vorname = $vorname;
    }

    public function getNachname(){
        return $this->nachname;
    }

    public function setNachname($nachname){
        $this->nachname = $nachname;
    }
}

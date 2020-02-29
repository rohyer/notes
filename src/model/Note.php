<?php

require_once "Connection.php";

class Note {
    private $titleNote;
    private $descriptionNote;
    private $markedNote;
    private $idUserNote;
    private $idCategoryNote;
    
    private $objConn;
    private $getConn;

    public function __construct() {
        $this->objConn = new Connection();
    }

    public function registerNote($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->titleNote = $datas['title-note'];
        $this->descriptionNote = $datas['description-note'];
        $this->idUserNote = $datas['id-user-note'];
        $this->idCategoryNote = $datas['id-category-note'];

        if (isset($datas['marked-note'])) {
            $this->markedNote = $datas['marked-note'];
        }

        try {
            $sql = "INSERT INTO note (titlenote, descriptionnote, markednote, iduser, idcategory) VALUES (:titlenote, :descriptionnote, :markednote, :iduser, :idcategory)";
            
            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":titlenote", $this->titleNote);
            $stmt->bindParam(":descriptionnote", $this->descriptionNote);
            $stmt->bindParam(":markednote", $this->markedNote);
            $stmt->bindParam(":iduser", $this->idUserNote);
            $stmt->bindParam(":idcategory", $this->idCategoryNote);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listCategories($iduser) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUserNote = $iduser;

        try {
            $sql = "SELECT idcategory, namecategory FROM category WHERE iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUserNote);
            
            if ($stmt->execute()) {
                $listCategories = $stmt->fetchAll();

                return $listCategories;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


?>
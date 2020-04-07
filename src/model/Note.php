<?php

require_once "Connection.php";

class Note {
    private $idUser;
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
        } else {
            $this->markedNote = 0;
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

    public function deleteNote($idUser, $idUserNote) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $idUser;
        $this->idUserNote = $idUserNote;

        try {
            $sql = "DELETE FROM note WHERE iduser = :iduser AND idnote = :idnote";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUser);
            $stmt->bindParam(":idnote", $this->idUserNote);

            if ($stmt->execute()) {
                header("Location: /notes/index.php");
            } else {
                echo "<script type='text/javascript'>alert('Erro ao deletar nota');</script>";
            }
        } catch (PDOExcpetion $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listNotes($idUserNote, $idCategoryNote) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUserNote = $idUserNote;
        $this->idCategoryNote = $idCategoryNote;

        try {
            $sql = "SELECT * FROM note WHERE iduser = :iduser AND idcategory = :idcategory AND markednote = 1";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUserNote);
            $stmt->bindParam(":idcategory", $this->idCategoryNote);
            
            if ($stmt->execute()) {
                $result = $stmt->fetchAll();
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listNoMarkedNotes($idUserNote, $idCategoryNote) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUserNote = $idUserNote;
        $this->idCategoryNote = $idCategoryNote;

        try {
            $sql = "SELECT * FROM note WHERE iduser = :iduser AND idcategory = :idcategory AND markednote = 0";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUserNote);
            $stmt->bindParam(":idcategory", $this->idCategoryNote);
            
            if ($stmt->execute()) {
                $result = $stmt->fetchAll();
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateNote($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $datas['id-update-user-note'];
        $this->titleNote = $datas['title-update-note'];
        $this->descriptionNote = $datas['description-update-note'];
        $this->idUserNote = $datas['id-update-note'];
        $this->idCategoryNote = $datas['category-update-note'];

        if (isset($datas['marked-update-note'])) {
            $this->markedNote = $datas['marked-update-note'];
        } else {
            $this->markedNote = 0;
        }
        
        try {
            $sql = "UPDATE note SET titlenote = :titlenote, descriptionnote = :descriptionnote, markednote = :markednote, idcategory = :idcategory WHERE idnote = :idnote AND iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":titlenote", $this->titleNote);
            $stmt->bindParam(":descriptionnote", $this->descriptionNote);
            $stmt->bindParam(":markednote", $this->markedNote);
            $stmt->bindParam(":idcategory", $this->idCategoryNote);
            $stmt->bindParam(":idnote", $this->idUserNote);
            $stmt->bindParam(":iduser", $this->idUser);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

}


?>
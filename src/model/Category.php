<?php

require_once "Connection.php";

class Category {
    private $idCategory;
    private $nameCategory;
    private $idUserCategory;

    private $objConn;
    private $getConn;

    public function __construct() {
        $this->objConn = new Connection();
    }

    public function registerCategory($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->nameCategory = $datas['title-category'];
        $this->idUserCategory = $datas['id-user-category'];

        try {
            $sql = "INSERT INTO category (namecategory, iduser) VALUES (:namecategory, :iduser)";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":namecategory", $this->nameCategory);
            $stmt->bindParam(":iduser", $this->idUserCategory);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listCategories($idUserCategory) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUserCategory = $idUserCategory;

        try {
            $sql = "SELECT * from category where iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $idUserCategory);

            if ($stmt->execute()) {
                $result = $stmt->fetchAll();
                return $result;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateCategory($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->nameCategory = $datas['title-category'];
        $this->idUserCategory = $datas['id-user-category'];
        $this->idCategory = $datas['id-category'];

        try {
            $sql = "UPDATE category SET namecategory = :namecategory WHERE iduser = :iduser AND idcategory = :idcategory";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":namecategory", $this->nameCategory);
            $stmt->bindParam(":iduser", $this->idUserCategory);
            $stmt->bindParam(":idcategory", $this->idCategory);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteCategory($datas) {}


}

?>
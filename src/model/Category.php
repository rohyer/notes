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


}

?>
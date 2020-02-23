<?php

require_once "Connection.php";

class User {
    private $nameUser;
    private $emailUser;
    private $passwordUser;
    private $confirmPasswordUser;
    private $sexUser;
    private $cellPhoneUser;
    private $stateUser;
    private $cityUser;

    private $objConn;
    private $getConn;

    public function __construct() {
        $this->objConn = new Connection();
    }

    // *************** REGISTER ***************
    public function registerUser($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->nameUser = $datas['name-register'];
        $this->emailUser = $datas['email-register'];
        $this->passwordUser = $datas['password-register'];
        $this->confirmPasswordUser = $datas['password-confirm-register'];
        $this->sexUser = $datas['sex-register'];
        $this->cellPhoneUser = $datas['cellphone-register'];
        $this->stateUser = $datas['state-register'];
        $this->cityUser = $datas['city-register'];

        try {
            $sql = "INSERT INTO main_user (nameuser, emailuser, passworduser, sexuser, cellphoneuser, stateuser, cityuser) VALUES (:nameUser, :emailUser, :passwordUser, :sexUser, :cellPhoneUser, :stateUser, :cityUser)";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":nameUser", $this->nameUser);
            $stmt->bindParam(":emailUser", $this->emailUser);
            $stmt->bindParam(":passwordUser", $this->passwordUser);
            $stmt->bindParam(":sexUser", $this->sexUser);
            $stmt->bindParam(":cellPhoneUser", $this->cellPhoneUser);
            $stmt->bindParam(":stateUser", $this->stateUser);
            $stmt->bindParam(":cityUser", $this->cityUser);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}



?>
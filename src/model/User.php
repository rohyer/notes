<?php

require_once "Connection.php";

class User {
    private $nameUser;
    private $emailUser;
    private $passwordUser;
    // private $confirmPasswordUser;
    private $encryptedPasswordUser;
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
        // $this->confirmPasswordUser = $datas['password-confirm-register'];
        $this->sexUser = $datas['sex-register'];
        $this->cellPhoneUser = $datas['cellphone-register'];
        $this->stateUser = $datas['state-register'];
        $this->cityUser = $datas['city-register'];

        $this->encryptedPasswordUser = md5($this->passwordUser);

        try {
            $sql = "INSERT INTO main_user (nameuser, emailuser, passworduser, sexuser, cellphoneuser, stateuser, cityuser) VALUES (:nameUser, :emailUser, :encryptedPasswordUser, :sexUser, :cellPhoneUser, :stateUser, :cityUser)";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":nameUser", $this->nameUser);
            $stmt->bindParam(":emailUser", $this->emailUser);
            $stmt->bindParam(":encryptedPasswordUser", $this->encryptedPasswordUser);
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

    public function loginUser($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->emailUser = $datas['email-login'];
        $this->passwordUser = $datas['password-login'];

        $this->encryptedPasswordUser = md5($this->passwordUser);
        
        try {
            $sql = "SELECT * FROM main_user WHERE emailuser = :emailUser AND passworduser = :encryptedPasswordUser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":emailUser", $this->emailUser);
            $stmt->bindParam(":encryptedPasswordUser", $this->encryptedPasswordUser);

            if ($stmt->execute()) {
                $datasLogin = $stmt->fetch();

                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['password'] = true;
                    $_SESSION['user_datas'] = $datasLogin->name;
                }

                return true;
            } else {
                return false;
            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function logoutUser() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_unset();
        session_destroy();
        header("location: ../../login.php");
    }
}



?>
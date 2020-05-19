<?php

require_once "Connection.php";

class User {
    private $idUser;
    private $nameUser;
    private $emailUser;
    private $passwordUser;
    private $encryptedPasswordUser;
    private $sexUser;
    private $cellPhoneUser;
    private $stateUser;
    private $cityUser;
    private $themeUser;

    private $newPasswordUser;
    private $newPasswordRepeatedUser;

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
                if ($stmt->rowCount() == 1) {
                    $datasLogin = $stmt->fetch(PDO::FETCH_OBJ);

                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['password'] = true;
                    $_SESSION['user_datas'] = array(
                        'id' => $datasLogin->iduser,
                        'name' => $datasLogin->nameuser,
                        'email' => $datasLogin->emailuser,
                        'password' => $datasLogin->passworduser,
                        'sex' => $datasLogin->sexuser,
                        'cellphone' => $datasLogin->cellphoneuser,
                        'state' => $datasLogin->stateuser,
                        'city' => $datasLogin->cityuser
                    );

                    return true;
                } else {
                    return false;
                }
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

    public function changeTheme($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $datas['iduser'];

        if (isset($datas['themeuser'])) {
            $this->themeUser = $datas['themeuser'];

            try {
                $sql = "UPDATE main_user SET themeuser = :themeuser WHERE iduser = :iduser";
    
                $stmt = $this->getConn->prepare($sql);
                $stmt->bindParam(":themeuser", $this->themeUser);
                $stmt->bindParam(":iduser", $this->idUser);

                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            try {
                $sql = "UPDATE main_user SET themeuser = 0 WHERE iduser = :iduser";

                $stmt = $this->getConn->prepare($sql);
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

    public function readTheme($idUser) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $idUser;

        try {
            $sql = "SELECT themeuser FROM main_user WHERE iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUser);

            if ($stmt->execute()) {
                $value = $stmt->fetch();
                return $value;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listDatasUser($idUser) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $idUser;

        try {
            $sql = "SELECT * FROM main_user WHERE iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUser);

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

    public function updateUser($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $datas['id-update-user'];
        $this->nameUser = $datas['name-update-user'];
        $this->emailUser = $datas['email-update-user'];
        $this->sexUser = $datas['sex-update-user'];
        $this->cellPhoneUser = $datas['cellphone-update-user'];
        $this->stateUser = $datas['state-update-user'];
        $this->cityUser = $datas['city-update-user'];

        try {
            $sql = "UPDATE main_user SET nameuser = :nameuser, emailuser = :emailuser, sexuser = :sexuser, cellphoneuser = :cellphoneuser, stateuser = :stateuser, cityuser = :cityuser WHERE iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUser);
            $stmt->bindParam(":nameuser", $this->nameUser);
            $stmt->bindParam(":emailuser", $this->emailUser);
            $stmt->bindParam(":sexuser", $this->sexUser);
            $stmt->bindParam(":cellphoneuser", $this->cellPhoneUser);
            $stmt->bindParam(":stateuser", $this->stateUser);
            $stmt->bindParam(":cityuser", $this->cityUser);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function verifyCurrentPassword($idUser) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $idUser;

        try {
            $sql = "SELECT passworduser from main_user WHERE iduser = :iduser";

            $stmt = $this->getConn->prepare($sql);
            $stmt->bindParam(":iduser", $this->idUser);

            if ($stmt->execute()) {
                $result = $stmt->fetch();
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function changePassword($datas) {
        $this->getConn = $this->objConn->getConnection();

        $this->idUser = $datas['id-user'];
        $this->passwordUser = $datas['current-password'];
        $this->newPasswordUser = $datas['new-password'];
        $this->newPasswordRepeatedUser = $datas['new-password-repeated'];

        $this->encryptedPasswordUser = md5($this->passwordUser);

        $currentPassword = $this->verifyCurrentPassword($datas['id-user']);

        if ($this->encryptedPasswordUser === $currentPassword) {
            if ($this->newPassword === $this->newPasswordRepeatedUser) {
                try {
                    $sql = "UPDATE main_user SET passworduser = :passworduser WHERE iduser = :iduser";

                    $stmt = $this->getConn->prepare($sql);
                    $stmt->bindParam(":iduser", $this->idUser);
                    $stmt->bindParam(":passworduser", $this->encryptedPasswordUser);

                    if ($stmt->execute()) {
                        return true;
                    } else {
                        return false;
                    }

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "<script type='text/javascript'>alert('A nova senha não confere, veja se digitou igualmente');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('A senha atual não confere com a cadastrada');</script>";
        }

    }
}


?>
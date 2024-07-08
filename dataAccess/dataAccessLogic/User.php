<?php
#include file

include ('../dataAccess/conexion/Conexion.php');

#clase
class User
{
    #attributes
    private int $idUser;
    private string $nameUser;
    private string $lastnameUser;
    private string $photoUser;
    private $connectionDB;

    #constructor
    function __construct(ConexionDB $connectionDB)
    {
        $this->connectionDB = $connectionDB->connect();
    }

    #setters y getters
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }
    public function setNameUser(string $nameUser): void
    {
        $this->nameUser = $nameUser;
    }

    public function setLastnameUser(string $lastnameUser): void
    {
        $this->lastnameUser = $lastnameUser;
    }

    public function setPhotoUser(string $photoUser): void
    {
        $this->photoUser = $photoUser;
    }
    public function getIdUser(): int
    {
        return $this->idUser;
    }
    public function getNameUser(): string
    {
        return $this->nameUser;
    }

    public function getLastnameUser(): string
    {
        return $this->lastnameUser;
    }

    public function getPhotoUser(): string
    {
        return $this->photoUser;
    }
    #methods

    #add user
    public function addUser(): bool
    {
        try {
            $sql = "INSERT INTO tb_user (nameUser,lastnameUser, photoUser) VALUES (?,?,?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNameUser(), $this->getLastnameUser(), $this->getPhotoUser()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
    #read user
    public function readUser():array
    {
        try {
            $sql = "SELECT * FROM tb_user";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];

    }
    #delete user

    public function deleteUser():bool
    {
        try {
            $sql = "DELETE FROM tb_user WHERE idUser=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getIdUser()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    #update user
    public function updateUser():bool
    {
        try {  
            $sql = "UPDATE tb_user SET nameUser=?, lastnameUser=?, photoUser=? WHERE idUser=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNameUser(),$this->getLastnameUser(), $this->getPhotoUser(), $this->getIdUser()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    private function affectedColumns($numer): bool
    {
        if ($numer <> null && $numer > 0) {
            $msm = true;
        } else {
            $msm=false;
        }
        return $msm;
    }
}

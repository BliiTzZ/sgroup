<?php

require_once 'Framework/Model.php';

/**
 * Services liés aux clients
 */
class Panel extends Model
{
    private $sql;

    public function emailVerify($email)
    {
        $this->sql = "
            SELECT `L`.`user_email`
            FROM `pi_users` `L`
            WHERE `L`.`user_email` = ?
        ";

        $client = $this->executeRequest("select", $this->sql, array($email));
        return ($client->rowCount() == 1);
    }


    public function getClient($email, $pass)
    {
        $this->sql = "
            SELECT `U`.`id_user` AS idClient,
            `U`.`first_name`
            FROM `pi_login` `L`
            INNER JOIN `pi_users` `U`
            ON `U`.`id_user` = `L`.`id_user`
            WHERE `L`.`user_email` = ?
            AND `L`.`password` = ?
        ";

        $client = $this->executeRequest("select",$this->sql, array($email, $pass));
        if ($client->rowCount() == 1) {
            return $client->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un administrateur du site");
        }
    }

    public function displayUserValidate($idUser)
    {
        $this->sql = "
            SELECT `L`.`id_user`
            FROM `pi_login` `L`
            WHERE `L`.`id_user` = ?
        ";

        $client = $this->executeRequest("select", $this->sql, array($idUser));
        return ($client->rowCount() == 1);
    }

    public function displayDateRegistration($idUser)
    {
        $this->sql = "
            SELECT `L`.`date_registration`
            FROM `pi_login` `L`
            WHERE `L`.`id_user` = ?
        ";

        $client = $this->executeRequest("select",$this->sql, array($idUser));
        if ($client->rowCount() == 1) {
            return $client->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un administrateur du site");
        }
    }

    public function displayDateRequest($idUser)
    {
        $this->sql = "
            SELECT `RU`.`date_request`
            FROM `pi_request_users` `RU`
            WHERE `RU`.`id_user` = ?
        ";

        $client = $this->executeRequest("select",$this->sql, array($idUser));
        if ($client->rowCount() == 1) {
            return $client->fetch();  // Accès à la première ligne de résultat
        }
        else {
            var_dump($client->fetch()[0]);
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un administrateur du site");
        }
    }

    public function  displayUsersByValidate($validation)
    {
        $this->sql = "SELECT `U`.`id_user`, `U`.`avatar`, `U`.`first_name`, `U`.`last_name`, `U`.`id_rank`, `U`.`user_email`, `R`.`rank_name`
        FROM `pi_users` `U`
        INNER JOIN `pi_rank` `R`
        ON `R`.`id_rank` =  `U`.`id_rank`
        WHERE `U`.`validation` = ?";
        $users = $this->executeRequest("select", $this->sql, array($validation));
        return $users->fetchAll();
    }

    public function  displayUsersByInvalidate($validation)
    {
        $this->sql = "SELECT `U`.`id_user`, `U`.`avatar`, `U`.`first_name`, `U`.`last_name`, `U`.`gender`, `U`.`id_rank`, `U`.`user_email`, `RU`.`date_request`, `R`.`rank_name`
        FROM `pi_users` `U`
        INNER JOIN `pi_rank` `R`
        ON `R`.`id_rank` =  `U`.`id_rank`
        INNER JOIN `pi_request_users` `RU`
        ON `RU`.`id_user` =  `U`.`id_user`
        WHERE `U`.`validation` = ?";
        $users = $this->executeRequest("select", $this->sql, array($validation));
        return $users->fetchAll();
    }

    public function  usersCountByRank($rankName)
    {
        $this->sql = "
            SELECT COUNT('id_user') AS usersCount
            FROM `pi_users` `U`
            INNER JOIN `pi_rank` `R`
            ON `R`.`id_rank` =  `U`.`id_rank`
            WHERE `R`.`rank_name` = ?
        ";
        $usersCount = $this->executeRequest("select", $this->sql, array($rankName));
        return $usersCount->fetch();
    }

    public function  usersCountByValidation($validation)
    {
        $this->sql = "
            SELECT COUNT('id_user') AS usersCount
            FROM `pi_users` `U`
            WHERE `U`.`validation` = ?
        ";
        $usersCount = $this->executeRequest("select", $this->sql, array($validation));
        return $usersCount->fetch();
    }

    public function  updateValidation($validation, $idRank, $idUser)
    {
        $this->sql = "UPDATE pi_users
            SET `validation` = ?, id_rank = ?
            WHERE id_user = ?";
        $update = $this->executeRequest("select", $this->sql, array($validation, $idRank, $idUser));
        if ($update) {
            return $update;
        }
        return false;
    }

    public function  updateToken($token, $idUser)
    {
        $this->sql = "UPDATE pi_request_users
            SET token_validation = ?
            WHERE id_user = ?";
        $update = $this->executeRequest("select", $this->sql, array($token, $idUser));
        if ($update) {
            return $update;
        }
        return false;
    }

    public function  updateUser($idRank, $idUser)
    {
        $this->sql = "
            UPDATE `pi_users` `U`
            SET `U`.`id_rank` = ?
            WHERE `U`.`id_user` = ?
        ";
        $update = $this->executeRequest("update", $this->sql, array($idRank, $idUser));
        if ($update) {
            return $update;
        }
        return false;
    }

    public function  deleteUser($idUser, $idClient)
    {
        $this->sql = "DELETE
            FROM `pi_users`
            WHERE `pi_users`.`id_user` = ?
            AND `pi_users`.`id_user` <> ?
        ";
        $usersCount = $this->executeRequest("delete", $this->sql, array($idUser, $idClient));
    }

    public function  displayListRank()
    {
        $this->sql = "
            SELECT `R`.`id_rank`, `R`.`rank_name`
            FROM `pi_rank` `R`
        ";
        $users = $this->executeRequest("select", $this->sql);
        return $users->fetchAll();
    }
    
    public function  checkClient($idClient)
    {
        $this->sql = "SELECT `U`.`id_user`, `U`.`id_rank`
            FROM `pi_users` `U`
            WHERE `U`.`id_user` = ?
        ";
        $client = $this->executeRequest("select", $this->sql, array($idClient));
        if ($client->rowCount() == 1) {
            return $client->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un administrateur du site");
        }
    }

}



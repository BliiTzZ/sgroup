<?php

require_once 'Framework/Model.php';

/**
 * Services liés aux clients
 */
class Client extends Model
{
    private $sql;

    /*
   --------- Page de connexion --------------------
     */
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

    public function passVerify($email)
    {
        $this->sql = "
            SELECT `L`.`user_email` AS courriel,
            `L`.`password` AS password
            FROM `pi_login` `L`
            WHERE `L`.`user_email` = ?
        ";
        $client = $this->executeRequest("select",$this->sql, array($email));
        if ($client->rowCount() == 1) {
            return $client->fetch();
        }
        else {
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un  administrateur du site");
        }
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
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un  administrateur du site");
        }
    }


        /*
   --------- Page d'inscription --------------------
     */

    public function insertProfil ($firstName, $lastName, $gender, $tel, $address, $postalCode, $email, $link, $status, $job, $enterprise, $siret)
    {
        $this->sql = "
            INSERT INTO pi_users (first_name, last_name, gender, tel, address, postal_code, user_email, link, status, job, enterprise, siret)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
        ";
        $inserer = $this->executeRequest("insert", $this->sql, array($firstName, $lastName, $gender, $tel, $address, $postalCode, $email, $link, $status, $job, $enterprise, $siret));
        if ($inserer) {
            return $inserer;
        }
        return false;
    }

    public function  registration($idUser, $email, $pass)
    {
        $this->sql = "
            INSERT INTO pi_login (id_user, user_email, password)
            VALUES (?,?,?)
        ";
        $inserer = $this->executeRequest("insert", $this->sql, array($idUser, $email, $pass));
        if ($inserer) {
            return $inserer;
        }
        return false;
    }

    public function  verifyTokenValid($token, $idUser)
    {
        $this->sql = "SELECT `R`.`id_user`, `R`.`token_validation`
            FROM `pi_request_users` `R`
            WHERE `R`.`token_validation` = ? AND `R`.`id_user` = ?";
        $check = $this->executeRequest("select", $this->sql, array($token, $idUser));
        if ($check->rowCount() == 1) {
            return $check->fetch();
        }
        return false;
    }

    public function getTokenVerify($token)
    {
        $this->sql = "SELECT `R`.`token_validation`
            FROM `pi_request_users` `R`
            WHERE `R`.`token_validation` = ?
        ";

        $client = $this->executeRequest("select", $this->sql, array($token));
        return ($client->rowCount() == 1);
    }

    public function updateMail($idUser, $email)
    {
        $this->sql =
        "UPDATE pi_users
        SET user_email = ?
        WHERE id_user = ?";
        $up = $this->executeRequest("update", $this->sql, array($email, $idUser));
    }

    public function condition($idUser, $condition)
    {
        $this->sql = "
            INSERT INTO pi_conditions (id_user, text_condition)
            VALUES (?,?)
        ";

        $insert = $this->executeRequest("insert", $this->sql, array($idUser, $condition));
    }

    public function deleteToken($idUser)
    {
        $this->sql = "
            DELETE FROM pi_request_users
            WHERE id_user = ?
        ";

        $delete = $this->executeRequest("insert", $this->sql, array($idUser));
    }

    public function message($id_user, $message)
    {
        $this->sql = "
            INSERT INTO pi_request_users (id_user, message_personalized)
            VALUES (?,?)
        ";

        $insert = $this->executeRequest("insert", $this->sql, array($id_user, $message));
    }
/*----------------- Page profil --------------------*/

public function  displayProfile($idUser)
    {
        $this->sql = "SELECT `U`.`id_user`, `U`.`avatar`, `U`.`gender`, `U`.`first_name`, `U`.`last_name`, `U`.`user_email`, `U`.`tel`, `U`.`job`, `U`.`enterprise`, `U`.`status`, `U`.`siret`, `R`.`rank_name`, `U`.`link`, `U`.`address`, `U`.`postal_code`, `U`.`validation`, `L`.`date_registration`, `U`.`message`, `RU`.`date_request`
        FROM `pi_users` `U`
        INNER JOIN `pi_request_users` `RU`
        ON `RU`.`id_user` = `U`.`id_user`
        INNER JOIN `pi_login` `L`
        ON `L`.`id_user` = `U`.`id_user`
        INNER JOIN `pi_rank` `R`
        ON `R`.`id_rank` =  `U`.`id_rank`
        WHERE `U`.`id_user` = ?";
        $client = $this->executeRequest("select", $this->sql, array($idUser));
        if ($client->rowCount() == 1) {
                return $client->fetch();
        }
         else {
               throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un  administrateur du site");
        }
    }

/*--------------------------------------------------*/
    public function maxId()
    {
        $this->sql = "
            SELECT MAX(id_user) AS max_id FROM pi_users
        ";
        $client = $this->executeRequest("select", $this->sql);
        return $client->fetch();
    }

    public function reinitialise($maxId)
    {
        $this->sql = "
            ALTER TABLE pi_users AUTO_INCREMENT = $maxId;
        ";
        $client = $this->executeRequest("reset", $this->sql);
        return $client;
    }

}



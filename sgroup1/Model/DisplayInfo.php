<?php

require_once 'Php_modules/Model.php';

class DisplayInfo extends Model
{
    private $sql;
    /**
     * Selections des formateurs pour la page contact
     */
    public function displayForm() {
        $this->sql = "
          SELECT `U`.`grade`, `U`.`first_name`, `U`.`last_name`, `U`.`id_user`
          FROM `user` `U`
          WHERE `U`.`grade` >= ?
        ";
        return $this->executeRequest($this->sql, array("2"));
    }
    public function displayFormById($id) {
        $this->sql = "
        SELECT `U`.`grade`, `U`.`email_user`,`U`.`id_user`, `U`.`first_name`, `U`.`last_name`
        FROM `user` `U`
        WHERE `U`.`id_user` = ?
        AND `U`.`grade` >= ?
      ";
        $emailForm = $this->executeRequest($this->sql, array($id, "2"));
        if ($emailForm->rowCount() == 1) {
            return $emailForm->fetch();
        }
        else {
            throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un  administrateur du site");
        }
    }

    public function displayProjects($status) {
      $this->sql = "
        SELECT `P`.`projet_name`, `P`.`projet_couverture`, `P`.`id_projet`, `Pro`.`promo_name`, `G`.`group_name`
        FROM `projet` `P`
        INNER JOIN `groupe` `G`
        ON `G`.`id_groupe` = `P`.`id_groupe`
        INNER JOIN `promo` `Pro`
        ON `Pro`.`id_promo` = `P`.`id_promo`
        WHERE `P`.`status_projet` = ?
        ORDER BY `P`.`id_projet` ASC LIMIT 4
      ";

      return $this->executeRequest($this->sql, array($status));
    }

    public function displayProjectsById($id) {
      $this->sql = "
        SELECT `P`.`projet_name`, `P`.`projet_couverture`, `P`.`id_projet`, `G`.`id_groupe`, `Pro`.`promo_name`, `G`.`group_name`, `P`.`projet_description`
        FROM `projet` `P`
        INNER JOIN `groupe` `G`
        ON `G`.`id_groupe` = `P`.`id_groupe`
        INNER JOIN `promo` `Pro`
        ON `Pro`.`id_promo` = `P`.`id_promo`
        WHERE `P`.`id_projet` = ?
      ";
      $projects = $this->executeRequest($this->sql, array($id));
      if ($projects->rowCount() == 1) {
          return $projects->fetch();
      }
      else {
          throw new Exception("veuillez réessayer, si le problème persiste veuillez contacter un  administrateur du site");
      }
    }
    public function displayUserByGroupId($id) {
      $this->sql = "
      SELECT `U`.`id_user`, `U`.`first_name`, `U`.`last_name`
      FROM `user` `U`
      WHERE `U`.`id_groupe` = ?
    ";
      return $this->executeRequest($this->sql, array($id));
  }

    public function displayProjectsDefault() {
      $this->sql = "
        SELECT `P`.`projet_name`, `P`.`projet_couverture`, `P`.`status_projet`, `P`.`id_projet`, `Pro`.`promo_name`, `G`.`group_name`, `P`.`projet_description`
        FROM `projet` `P`
        INNER JOIN `groupe` `G`
        ON `G`.`id_groupe` = `P`.`id_groupe`
        INNER JOIN `promo` `Pro`
        ON `Pro`.`id_promo` = `P`.`id_promo`
        ORDER BY `P`.`id_projet` ASC LIMIT 4
      ";

      return $this->executeRequest($this->sql);
    }

      public function displayProjectsAll() {
      $this->sql = "
        SELECT `P`.`projet_name`, `P`.`projet_couverture`, `P`.`status_projet`, `P`.`id_projet`, `Pro`.`promo_name`, `G`.`group_name`, `P`.`projet_description`
        FROM `projet` `P`
        INNER JOIN `groupe` `G`
        ON `G`.`id_groupe` = `P`.`id_groupe`
        INNER JOIN `promo` `Pro`
        ON `Pro`.`id_promo` = `P`.`id_promo`
        ORDER BY `P`.`id_projet` DESC
      ";

      return $this->executeRequest($this->sql);
    }
}
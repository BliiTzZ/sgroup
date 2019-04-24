<?php

require_once 'Configuration.php';


abstract class Model {

    /** Objet PDO d'accès à la BD
        Statique donc partagé par toutes les instances des classes dérivées */
    private static $bdd;

    /**
     * Exécute une requête SQL
     *
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function executeRequest($type, $sql, $params = null) {
        if ($params == null) {
            $result = self::getBdd()->query($sql);   // exécution directe
        }
        else {
            $result = self::getBdd()->prepare($sql); // requête préparée
            $result->execute($params);
            if($type == "insert" || $type == "update") {
                $result = self::getBdd()->lastInsertId();
            }
        }
        return $result;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     *
     * @return PDO Objet PDO de connexion à la BDD
     */
    private static function getBdd() {
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $pass = Configuration::get("mdp");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $pass,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

}

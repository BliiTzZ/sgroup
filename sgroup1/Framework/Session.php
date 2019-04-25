<?php
/**
 * Created by IntelliJ IDEA.
 * User: yacine
 * Date: 17/12/18
 * Time: 14:26
 */

/**
 * Class Session
 */
class Session
{
    /**
     * Demarrer ou restaurer la session
     *
     * Session constructor.
     */
    public function __construct() {
        session_start();
    }

    /**
     * Détruire la session
     */
    public function destroy() {
        // setcookie('courriel','',time()-3600);
        // setcookie('password','',time()-3600);
        $_SESSION = array();
        session_destroy();
    }

    /**
     * @param $name string Nom de l'attribut
     * @param $value string Valeur de l'attribut
     */
    public function setAttribute($name, $value) {
        $_SESSION[$name] = $value;
    }

    /**
     * Renvoie vrai si l'attribut existe dans la session
     *
     * @param $name string Nom de l'attribut
     * @return bool Vrai si l'attribut existe et sa valeur n'est pas vide
     */
    public function checkAttribute($name) {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    // public function checkCookies() {
    //     return (isset($_COOKIE["courriel"]));
    // }

    // public function getCookies($nom) {
    //     if($this->checkCookies()) {
    //         return $_COOKIE[$nom];
    //     }
    //     else {
    //         throw new Exception( "Attribut " . $name . " absent de la session");
    //     }
    // }

    // public function setCookies() {
    //     setcookie('courriel',$email,time()+365*24*3600, '/', null, false, true);
    //     setcookie('password',$pass,time()+365*24*3600, '/', null, false, true);
    // }
    
    /**
     * Renvoie la valeur de l'attribut demandé
     * @param $name string Nom de l'attribut
     * @return mixed string Valeur de l'attribut
     * @throws Exception Si l'attribut n'existe pas dans la session
     */
    public function getAttribute($name) {
        if($this->checkAttribute($name)) {
            return $_SESSION[$name];
        }
        else {
            throw new Exception( "Attribut " . $name . " absent de la session");
        }
    }


}
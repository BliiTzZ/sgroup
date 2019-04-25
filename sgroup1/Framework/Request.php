<?php
/**
 * Created by IntelliJ IDEA.
 * User: yacine
 * Date: 17/12/18
 * Time: 14:43
 */

require_once 'Session.php';

/**
 * Class Request
 */
class Request
{

    /**
     * @var $parameters Request Tableau des paramètres de la requête
     */
    private $parameters;

    /**
     * @var $session Request Objet associé à la requête
     */
    private $session;

    /**
     * Constructeur
     *
     * Request constructor.
     * @param $parameters array Paramètres de la requête
     */
    public function __construct($parameters) {
        $this->parameters = $parameters;
        $this->session = new Session();
    }

    /**
     * Renvoie l'objet session associé à la requête
     *
     * @return Request|Session Objet session
     */
    public function getSession() {
        return $this->session;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     *
     * @param $name string Nom du paramètre
     * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide
     */
    public function checkParam($name) {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }


    public function checkBoxes($name) {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "" && count($this->parameters[$name]) <> 0);
    }

    public function getBoxes($name) {
        if($this->checkBoxes($name)) {
            return $this->parameters[$name];
        }
        else {
            throw new Exception("Page introuvable");
        }
    }

    /**
     * Renvoie la valeur du paramètre demandé
     *
     * @param $name string Nom du paramètre
     * @return mixed string Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas dans la requête
     */
    public function getParam($name) {
        if($this->checkParam($name)) {
            return $this->parameters[$name];
        }
        else {
            throw new Exception("Page introuvable");
        }
    }


}
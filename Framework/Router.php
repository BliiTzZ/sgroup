<?php
/**
 * Created by IntelliJ IDEA.
 * User: yacine
 * Date: 18/12/18
 * Time: 10:51
 */

require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';

/**
 * Class Router
 */
class Router
{
        /**
         * méthode principale appelée par le contrôleur frontal
         * routerRequest
         * @throws Exception
         */
    public function routerRequest() {
        try {
            // Fusion des paramètres GET et POST de la requête
            // Permet de gérer uniformément ces deux types de requête HTTP
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        }
    }

    /**
     * Instancie le contrôleur approprié en fonction de la requête reçue
     *
     * @param Request $request Requête reçue
     * @return Instance d'un contrôleur
     * @throws Exception Si la création du contrôleur échoue
     */
    private function createController(Request $request) {
        // Grâce à la redirection, toutes les URL entrantes sont du type :
        // index.php?controleur=XXX&action=YYY&id=ZZZ

        $controller = ucfirst(strtolower("accueil"));  // Contrôleur par défaut
        if ($request->checkParam('controller')) {
            $controller = $request->getParam('controller');
            // Première lettre en majuscules
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        // La convention de nommage des fichiers controleurs est : Controleur/Controleur<$controleur>.php
        $classController = "Controller" . $controller;

        $fileController = "Controller/" . $classController . ".php";
        if (file_exists($fileController)) {
            $fileController = "Controller/" . $classController . ".php";
        }
        else {

            $fileController = "Controller/Site/" . $classController . ".php";
            if (file_exists($fileController)) {
                // Instanciation du contrôleur adapté à la requête
               $fileController = "Controller/Site/" . $classController . ".php";
            }
            else {

                $fileController = "Controller/Panel/" . $classController . ".php";
                if (file_exists($fileController)) {
                    // Instanciation du contrôleur adapté à la requête
                   $fileController = "Controller/Panel/" . $classController . ".php";
                }
                else {
                    throw new Exception("Page introuvable");
                }
            }
        }

        if (file_exists($fileController)) {
            require($fileController);
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new Exception("Page introuvable");
        }

    }

    /**
     * Détermine l'action à exécuter en fonction de la requête reçue
     * @param Request $request Request reçue
     * @return string Action à exécuter
     * @throws Exception
     */
    private function createAction(Request $request) {
        $action = "index"; // Action par défaut
        if($request->checkParam('action')) {
            $action = $request->getParam('action');
        }
        return $action;
    }

    /**
     * Gère une erreur d'exécution (exception)
     *
     * @param Exception $exception Exception qui s'est produite
     * @throws Exception
     */
    private function manageError(Exception $exception) {
        $view = new View('error');
        $view->generate(array('msgError' => $exception->getMessage()));
    }
}
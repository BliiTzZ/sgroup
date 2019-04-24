<?php
/**
 * Created by IntelliJ IDEA.
 * User: yacine
 * Date: 18/12/18
 * Time: 10:18
 */

require_once 'Configuration.php';
require_once 'Request.php';
require_once 'View.php';

/**
 * Class Controller
 */
abstract class Controller
{
    /**
     * @var $action Controller Action à réaliser
     */
    private $action;

    /**
     * @var $request Controller Requête entrante
     */
    protected $request;

    /**
     * @var $index Controller
     */
    private $index;

    /**
     * Défini la requête entrante
     *
     * @param Request $request Requête entrante
     */
    public function setRequest(Request $request) {
        $this->request = $request;
    }

    /**
     * Execute l'action à réaliser
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     * @param $action
     * @throws Exception
     */
    public function executeAction($action) {
        if(method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classController = get_class($this);
            throw new Exception("Page introuvable");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     *
     * @return mixed
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     * @param array $dataView Données nécessaires pour la génération
     * @param null $action
     * @throws Exception
     */
    protected function generateView($dataView = array(), $action = null)
    {
        // Utilisation de l'action actuelle par défaut
        $actionView = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $actionView = $action;
        }
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classController = get_class($this);
        $controller = str_replace("Controller", "", $classController);

        // Instanciation et génération de la vueF
        $view = new View($actionView, $controller, $from);
        $view->generate($dataView, $from);
    }

    /**
     * @param $controller
     * @param null $action
     * @throws Exception
     */
    protected function redirect($controller, $action = null) {
        $webRoot = Configuration::get("webRoot", "/");
        if($action != null) {
            $this->index = "/";
        }
        header("Location: " . $webRoot . $controller . $this->index . $action);
    }
}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: yacine
 * Date: 17/12/18
 * Time: 15:58
 */

require_once 'Configuration.php';

/**
 * Class View
 */
class View
{

    /**
     * @var $file View Nom du fichier associé à la vue
     */
    private $file;

    /**
     * @var $title View Titre de la vue (défini dans le fichier vue)
     */
    private $title;

    /**
     * Constructeur
     *
     * View constructor.
     * @param $action string Action à laquelle la vie est associé
     * @param string $controller Nom du contrôleur auquelle la vue est associée
     */
    public function __construct($action, $controller = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        // La convention de nommage des fichiers vues est : Vue/<$controleur>/<$action>.php
        $file = "View/Site/";

        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    /**
     * Génère et affiche la vue
     *
     * @param array $donnees Données nécessaires à la génération de la vue
     */
    public function generate($data) {
        // Génération de la partie spécifique de la vue
        $contain = $this->generateFile($this->file, $data);
        $navName = 'View/Site/__common/nav.php';
        $template = 'View/Site/__common/template.php';

        $nav = $this->generateFile($navName, $data);


        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $webRoot = Configuration::get("webRoot", "/");
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->generateFile($template,
                array('title' => $this->title, 'contain' => $contain, 'nav' => $nav, 'webRoot' => $webRoot));
        // Renvoi de la vue générée au navigateur
        echo $view;
    }

    /**
     * Génère un fichier vue et renvoie le résultat produit
     *
     * @param string $fichier Chemin du fichier vue à générer
     * @param array $donnees Données nécessaires à la génération de la vue
     * @return string Résultat de la génération de la vue
     * @throws Exception Si le fichier vue est introuvable
     */
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();

            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

    /**
     * Nettoie une valeur insérée dans une page HTML
     * Permet d'éviter les problèmes d'exécution de code indésirable (XSS) dans les vues générées
     *
     * @param $value string Valeur à néttoyer
     * @return string string Valeur nettoyée
     */
    private function clean($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * @param $value string Valeur à néttoyer
     */
    public function cleanup($value) {
        $this->clean($value);
    }
}
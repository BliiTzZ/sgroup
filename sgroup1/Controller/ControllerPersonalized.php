<?php

require_once 'Framework/Controller.php';


abstract class ControllerPersonalized extends Controller
{
    /**
     * Redéfinition permettant d'ajouter les infos clients aux données des vues
     *
     * @param type $donneesVue Données dynamiques
     * @param type $action Action associée à la vue
     */
    protected function generateView($dataView = array(), $action = null)
    {
        $client = null;
        // Si les infos client sont présente dans la session...
        if ($this->request->getSession()->checkAttribute("client")) {
            // ... on les récupère ...
            $client = $this->request->getSession()->getAttribute("client");

        }
        // ... et on les ajoute aux données de la vue
        parent::generateView($dataView + array('client' => $client), $action);
    }

}
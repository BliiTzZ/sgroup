<?php

require_once 'ControllerPersonalized.php';


abstract class ControllerAuth extends ControllerPersonalized
{
	public function executeAction($action) {

	// Vérifie si les informations utilisateur sont présents dans la session
	// Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action
	// continue normalement
	// Si non, l'utilisateur est renvoyé vers le contrôleur de connexion

		if ($this->request->getSession()->checkAttribute("client")) {
			parent::executeAction($action);
		}
		else {
			$_SESSION["url_request"] = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
			$this->redirect("connexion");
		}
	}
}
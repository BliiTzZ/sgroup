<?php
/**
 * Created by IntelliJ IDEA.
 * User: yacine
 * Date: 17/12/18
 * Time: 13:19
 */

/**
 * Class Configuration
 */
class Configuration
{
    /**
     * @var Configuration $parameters Tableau des paramètres de configuration
     */
    private static $parameters;

    /**
     * Renvoi la valeur d'un paramètre de configuration
     *
     * @param string $name Nom du paramètre
     * @param string null $defaultValue ) renvoyer par défaut
     * @return mixed|null string Valeur du paramètre
     * @throws Exception
     */
    public static function get($name, $defaultValue = null) {
        if(isset(self::getParam()[$name])) {
            $value = self::getParam()[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    /**
     * Renvoie le tableau des paramètres en le chargeant au besoin depuis un fichier de configuration.
     * Les fichiers de configuration recherchés sont Config/dev.ini et Config/prod.ini (dans cet ordre)
     *
     * @return array Tableau des paramètres
     * @throws Exception Si aucun fichier de configuration n'est trouvé
     */
    private static function getParam() {
        if(self::$parameters == null) {
            $filePath = "Config/dev.ini";
            if(!file_exists($filePath)) {
                $filePath = "Config/prod.ini";
            }
            if(!file_exists($filePath)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$parameters = parse_ini_file($filePath);
            }
        }
        return self::$parameters;
    }
}
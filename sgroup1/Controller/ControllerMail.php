<?php

class ControllerMail {

    private static function sendMail($content, $courriel, $question, $message, $name)
    {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========
        $header = "From: \"Pole-image\" <pole-image@yaya-projects.web-edu.fr>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        $container='
            <html>
                <body>
                    <div>

                        <div align="center" style="width: 50%; margin: auto;">
                            <img style="width: 100%;" src="https://pole-image.yaya-projects.web-edu.fr/Public/img/Logo-pole-image-black.png"/>
                        </div>

                        <br>

                        <div align="center">
                            '.$content.'
                        </div>

                        <br>

                        <div align="center" style="width: 60%; margin: auto;">
                            '.$message.'
                        </div>

                    </div>
                </body>
            </html>
        ';
        $contain = $passage_ligne."--".$boundary.$passage_ligne;
        $contain.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
        $contain.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $contain.= $passage_ligne.$container.$passage_ligne;
        $contain.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $contain.= $passage_ligne."--".$boundary."--".$passage_ligne;

        $send = mail($courriel, $question, $contain, $header);
        if ($send) {
            return $send;
        }else {
            return false;
        }
    }

    public static function mailContact($courriel, $question, $message, $name)
    {
        $content='
            <p>Nom de l\'expéditeur :</p>'.$name.'<br />
            <p>Email de l\'expéditeur :</p>'.$courriel.'<br />
        ';
        $send = ControllerMail::sendMail($content, $courriel, $question, $message,  $name);
        if ($send) {
            return $send;
        }else {
            return false;
        }
    }

    public static function mailConfirmation($courriel, $question, $message, $name)
    {
        $question = 'Confirmation de réception';
        $content='
                <p>Bonjour, '. $name.'</p><br /><br />
                Vous venez d\'envoyer un courriel a pole-image<br />
                ';
        $send = ControllerMail::sendMail($content, $courriel, $question, $message,  $name);
        if ($send) {
            return $send;
        }else {
            return false;
        }
    }

    public static function mailDemande($courriel, $firstName, $lastName, $gender, $tel, $address, $postalCode, $link, $status, $job, $enterprise, $siret, $messageRequest)
    {
        $name = $lastName.' '.$firstName;
        $content='
        <h3>Demande d\'inscription</h3>
        <br>
        <u>Nom de l\'expéditeur :</u>'.
        $gender.$firstName.' '.$lastName.'<br />
        <u>Email de l\'expéditeur :</u>'.$courriel.'<br />
        ';
        $question = 'Demande d\'inscription';

        $message='
                    <h4 style="text-align: center;" >Les informations transmise par '.$gender.$lastName. ' sont :</h4>'.
                    '<div align="center" style="display: flex; justify-content: center;">
                        <div align="left" style="width: 50%; text-align: left;">'.
                            '<p>Telephone:  <br>'.$tel.'</p>'.
                            '<p>Adresse:  <br>'.$address.'</p>'.
                            '<p>Code-postal:  <br>'.$postalCode.'</p>'.
                            '<p>Lien de présentation : <br>'.$link.'</p>'.
                        '</div>'.
                        '<div align="right" style="width: 50%; padding-left: 10px; text-align: left;">'.
                            '<p>Status :  <br>'.$status.'</p>'.
                            '<p>Profession :  <br>'.$job.'</p>'.
                            '<p>Entreprise :  <br>'.$enterprise.'</p>'.
                            '<p>Siret :  <br>'.$siret.'</p>'.
                        '</div>'.
                    '</div>'.
                    '<div style="text-align: center;">'.
                        '<p>Son message est : <br><br> '.$messageRequest.'</p>
                    </div>';
        $send = ControllerMail::sendMail($content, $courriel, $question, $message, $name);
        if ($send) {
            return $send;
        }else {
            return false;
        }
    }

    public static function mailConfirmationDemande($courriel, $firstName, $lastName, $gender, $tel, $address, $postalCode, $link, $status, $job, $enterprise, $siret, $messageRequest)
    {
        $name = $lastName.' '.$firstName;
        $content='
        <h3><u>Bonjour, '.$gender.$firstName.' '.$lastName.'</u></h3><br>
        <h4>Vous venez d\'envoyer un courriel à pole-image</h4><br>';

        $question = 'Confirmation de réception';

        $message='
                    <h4 style="text-align: center;" >Récapitulatif des informations transmises : </h4>'.
                    '<div align="center" style="display: flex; justify-content: center;">
                        <div align="left" style="width: 50%; text-align: left;">'.
                            '<p>Telephone:  <br>'.$tel.'</p>'.
                            '<p>Adresse:  <br>'.$address.'</p>'.
                            '<p>Code-postal:  <br>'.$postalCode.'</p>'.
                            '<p>Lien de présentation : <br>'.$link.'</p>'.
                        '</div>'.
                        '<div align="right" style="width: 50%; padding-left: 10px; text-align: left;">'.
                            '<p>Status :  <br>'.$status.'</p>'.
                            '<p>Profession :  <br>'.$job.'</p>'.
                            '<p>Entreprise :  <br>'.$enterprise.'</p>'.
                            '<p>Siret :  <br>'.$siret.'</p>'.
                        '</div>'.
                    '</div>'.
                    '<div style="text-align: center;">'.
                        '<p>Courrier:  <br>'.$courriel.'</p>'.
                        '<p>Votre message est : <br><br> '.$messageRequest.'</p>
                    </div>';
        $send = ControllerMail::sendMail($content, $courriel, $question, $message, $name);
        if ($send) {
            return $send;
        }else {
            return false;
        }
    }

    public static function mailValidation($courriel, $firstName, $lastName, $gender, $token, $idUser)
    {
        $name = $lastName.' '.$firstName;
        $content='
        <h3><u>Bonjour, '.$gender.$name.'</u></h3>
        <br>
        <h4>Voici l\'email de validation de votre demande d\'inscription</h4><br>';

        $question = 'Validation de votre demande';

        $message='
                    <p>Merci pour votre intéret, votre demande a été retenu, vous êtes désormais adhèrent du pôle-image,<br>
                    pour finaliser de votre inscription veuillez cliquez sur le <a target="_blank" href="https://pole-image.yaya-projects.web-edu.fr/inscription/confirmation/'.$idUser.'='.$token.'">lien de la finalisation d\'inscription</a></p>
                    ';

        $send = ControllerMail::sendMail($content, $courriel, $question, $message, $name);
        if ($send) {
            return $send;
        }else {
            return false;
        }
    }
}
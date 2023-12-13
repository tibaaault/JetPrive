<?php

$racine = $_SESSION['racine'];

class DisplayConfig
{
    public function process()
    {
        $db = new InteractionDB();

        if (isset($_GET['idModele']) && isset($_GET['idColor']) && isset($_GET['idFinishing']) && isset($_GET['idGarantie']) && isset($_GET['idSelectedOptions'])) {

            $idModele = $_GET['idModele'];
            $modele = $db->OneJet($idModele);
            $_SESSION['jet'] = $modele;
            $idColor = $_GET['idColor'];
            $color = $db->OneColor($idColor);
            $_SESSION['color'] = $color;
            $idFinishing = $_GET['idFinishing'];
            $finishing = $db->OneFinishing($idFinishing);
            $_SESSION['finishing'] = $finishing;
            $idGarantie = $_GET['idGarantie'];
            $garantie = $db->OneGarantie($idGarantie);
            $_SESSION['garantie'] = $garantie;
            $idSelectedOptions = $_GET['idSelectedOptions'];
            $idSelectedOptions = explode(',', $idSelectedOptions);
            $selectedOptions = $db->RequeteOptionsResume($idSelectedOptions);
            $_SESSION['options'] = $selectedOptions;
        
        }
        require_once "view/header.php";
        require_once "view/resumeSelection.php";
    }
}
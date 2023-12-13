<?php


class Form2
{
    public function process()
    {

        $db = new InteractionDB();
        $paints = $db->RequeteSecondFormPaint();
        $_SESSION['paints'] = $paints;

        // Récupération de l'id du modèle sélectionné
        if (isset($_POST['selectionModel'])) {
            $id_modele = $_POST['selectionModel'];
            $jet = $db->OneJet($id_modele);
            $_SESSION['id_modele'] = $id_modele;
            $_SESSION['jet'] = $jet;
        }
        require_once "view/header.php";
        require_once "view/secondForm.php";
    }
}
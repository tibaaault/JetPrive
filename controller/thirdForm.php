<?php

class Form3
{
    public function process()
    {
        $db = new InteractionDB();

        // Récupération de la couleur sélectionnée
        if (isset($_POST['selectionColor'])) {
            $id_modele = $_SESSION['id_modele'];
            $color = $_POST['selectionColor'];

            $color = $db->OneColor($color);
            $_SESSION['color'] = $color;
            $finishings = $db->RequeteThirdFormFinishing($id_modele);
            $_SESSION['finishings'] = $finishings;
        }
        require_once "view/header.php";
        require_once "view/thirdForm.php";
    }
}
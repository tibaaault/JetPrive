<?php

$racine = $_SESSION['racine'];


class Form5
{
    public function process()
    {
        $db = new InteractionDB();

        if (isset($_POST['submitOptions'])) {
            // Récupérer les options sélectionnées
            $selectedOptions = $_POST['selectedOptions'];
            $options = $db->RequeteOptionsResume($selectedOptions);
            $_SESSION['options'] = $options;

            $garanties = $db->RequeteFifthForm();
        }


        require_once "view/header.php";
        require_once "view/fifthForm.php";
    }
}
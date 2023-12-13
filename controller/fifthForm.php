<?php


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

            $guarantees = $db->RequeteFifthForm();

            $jet = $_SESSION['jet'];
            $color = $_SESSION['color'];
            $finishing = $_SESSION['finishing'];
            $options = $_SESSION['options'];
        }


        require_once "view/header.php";
        require_once "view/fifthForm.php";
    }
}

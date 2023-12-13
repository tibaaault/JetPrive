<?php

$racine = $_SESSION['racine'];


class Form4
{
    public function process()
    {
        $db = new InteractionDB();

        if (isset($_POST['selectionFinishing'])) {
            $id_finishing = $_POST['selectionFinishing'];

            $finishing = $db->OneFinishing($id_finishing);
            $_SESSION['finishing'] = $finishing;
            $options = $db->RequeteFourthFormOptions($id_finishing);
            $_SESSION['options'] = $options;
        }
        require_once "view/header.php";
        require_once "view/fourthForm.php";
    }
}
<?php

$racine = $_SESSION['racine'];


class ResumeSelection
{
    public function process()
    {   
        $db = new InteractionDB();
       
        if (isset($_POST['selectionGarantie'])) {
            $id_garantie = $_POST['selectionGarantie'];
            $garantie = $db->OneGarantie($id_garantie);
            $_SESSION['garantie'] = $garantie;
        }


        require_once "view/header.php";
        require_once "view/resumeSelection.php";
    }
}
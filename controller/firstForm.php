<?php


class Form1
{
    public function process()
    {

        $db = new InteractionDB();
        $jets = $db->RequeteFirstForm();
        $_SESSION['jets'] = $jets;
        require_once "view/header.php";
        require_once "view/firstForm.php";
    }
}
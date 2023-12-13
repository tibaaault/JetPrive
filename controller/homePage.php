<?php


class HomePage
{

    public function process()
    {
        $racine = $_SESSION['racine'];
        require_once "view/header.php";
        require_once "$racine/view/firstForm.php";
    }
}
<?php

class Index
{

    public function controleurPrincipal()
    {
        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        } else {
            $action = "homePage";
        }

        $lesActions = [
            'firstForm' => Form1::class,
            'secondForm' => Form2::class,
            'thirdForm' => Form3::class,
            'fourthForm' => Form4::class,
            'fifthForm' => Form5::class,
            'resume' => ResumeSelection::class,
            'displayConfig' => DisplayConfig::class,
        ];


        if (!array_key_exists($action, $lesActions)) {
            $action = "firstForm";
        }

        $fichier = $action . ".php";

        $lesActions = $lesActions[$action];
        $ctlr = new $lesActions();
        $ctlr->process();

        include_once "./controller/$fichier";
    }
}
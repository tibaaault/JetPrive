<?php
session_start();

include "assets/bootstrapAssets.php";
include "controller/index.php";
include "controller/firstForm.php";
include "controller/secondForm.php";
include "controller/thirdForm.php";
include "controller/fourthForm.php";
include "controller/fifthForm.php";
include "controller/resume.php";
include "controller/displayConfig.php";
include "controller/homePage.php";
include "model/db.php";

$index = new Index();
$fichier = $index->controleurPrincipal();
 
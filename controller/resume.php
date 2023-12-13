<?php


class ResumeSelection
{
    public function process()
    {
        $db = new InteractionDB();

        if (isset($_POST['selectionGuarantee'])) {
            $id_guarantee = $_POST['selectionGuarantee'];
            $guarantee = $db->OneGuarantee($id_guarantee);
            $_SESSION['guarantee'] = $guarantee;

            $jet = $_SESSION['jet'];
            $color = $_SESSION['color'];
            $finishing = $_SESSION['finishing'];
            $options = $_SESSION['options'];
        }


        require_once "view/header.php";
        require_once "view/resumeSelection.php";
    }
}

<?php

class InteractionDB
{

    public function Connexion()
    {
        try {
            $db = new PDO("mysql:host=localhost:8889;dbname=agenceJetPrive", "root", "root");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $db;
    }

    ///////////////////////// FORM 1 /////////////////////////          
    // Function to get the jets from the database, to display them in the first form
    public function RequeteFirstForm()
    {
        $db = $this->Connexion();

        try {
            $statement = $db->prepare("SELECT * FROM modele");
            $statement->execute();
            $jets = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $jets;
    }

    ///////////////////////// FORM 2 /////////////////////////
    // Function to get the colors from the database, to display them in the second form
    public function RequeteSecondFormPaint()
    {
        $db = $this->Connexion();

        try {
            $statement = $db->prepare("SELECT * FROM peinture");
            $statement->execute();
            $colors = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $colors;
    }



    ///////////////////////// FORM 3 /////////////////////////
    public function RequeteThirdFormFinishing($id_modele)
    {
        $db = $this->Connexion();

        try {
            $statement = $db->prepare("SELECT * FROM finition INNER JOIN inclure ON finition.id = inclure.id_finition WHERE id_modele = :id_modele");
            $statement->execute(array(
                ":id_modele" => $id_modele
            ));
            $finishing = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $finishing;
    }

    ///////////////////////// FORM 4 /////////////////////////
    public function RequeteFourthFormOptions($id_finishing)
    {
        $db = $this->Connexion();

        try {
            $statement = $db->prepare("SELECT * FROM options INNER JOIN posseder ON options.id = posseder.id_option WHERE id_finition = :id_finition");
            $statement->execute(array(
                ":id_finition" => $id_finishing
            ));
            $options = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $options;
    }

    ///////////////////////// FORM 5 /////////////////////////
    public function RequeteFifthForm()
    {
        $db = $this->Connexion();

        try {
            $statement = $db->prepare("SELECT * FROM garantie");
            $statement->execute();
            $guarantees = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $guarantees;
    }


    ///////////////////////// FORM Resume /////////////////////////

    public function RequeteOptionsResume($selected_options)
    {
        $db = $this->Connexion();

        try {
            // Créer une chaîne de placeholder pour les options
            $placeholders = implode(',', array_fill(0, count($selected_options), '?'));

            // Préparer la requête avec IN et les placeholders
            $sql = "SELECT * FROM options WHERE id IN ($placeholders)";
            $statement = $db->prepare($sql);

            // Exécuter la requête avec les valeurs des placeholders
            $statement->execute($selected_options);

            $options = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $options;
    }





    ///////////////////////// Display on all form /////////////////////////
    // Function to get the jet choose from the database   
    public function OneJet($id_modele)
    {
        $db = $this->Connexion();
        try {
            $statement = $db->prepare("SELECT * FROM modele WHERE id = :id_modele");
            $statement->execute(array(
                ":id_modele" => $id_modele
            ));
            $statement->execute();
            $jet = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $jet;
    }

    public function OneColor($color)
    {
        $db = $this->Connexion();
        try {
            $statement = $db->prepare("SELECT * FROM peinture WHERE id = :color");
            $statement->execute(array(
                ":color" => $color
            ));
            $statement->execute();
            $color = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $color;
    }

    public function OneFinishing($id_finishing)
    {
        $db = $this->Connexion();
        try {
            $statement = $db->prepare("SELECT * FROM finition WHERE id = :id_finishing");
            $statement->execute(array(
                ":id_finishing" => $id_finishing
            ));
            $statement->execute();
            $finishing = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $finishing;
    }


    public function OneGuarantee($id_guarantee)
    {
        $db = $this->Connexion();
        try {
            $statement = $db->prepare("SELECT * FROM garantie WHERE idgarantie = :id_garantie");
            $statement->execute(array(
                ":id_garantie" => $id_guarantee
            ));
            $statement->execute();
            $guarantee = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $guarantee;
    }

}
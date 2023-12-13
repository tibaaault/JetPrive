<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumé des selections</title>
</head>

<body style="background-color :#DDDDDD">
    <div class="col-xl-12 col-sm">
        <div class="d-flex" style="height:50px;"></div>
        <p class="h1 text-center text-dark">Résumé de votre Jet Privé</p>
        <div class="d-flex" style="height:50px;"></div>
    </div>
    <?php
    $jet = $_SESSION['jet'];
    $color = $_SESSION['color'];
    $finishing = $_SESSION['finishing'];
    $options = $_SESSION['options'];
    foreach ($jet as $unJet) {
        $jetPrice = $unJet['prix'];
        foreach ($color as $col) {
            $colorPrice = $col['prix'];
            foreach ($finishing as $finish) {
                $finishingPrice = $finish['prix'];
            }
    ?>
            <div class="col-xl-12 col-sm col-lg col-md border">
                <div class="col-xl-10 col-sm col-lg col-md bg-light mx-auto rounded rounded-5">
                    <div class="row">
                        <div class="col">
                            <div class="hover-overlay ripple p-5" data-mdb-ripple-color="light">
                                <img src="../pictures/<?= $unJet['nom'] ?>.png" class="card-img-top rounded " alt="<?= $unJet['nom'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex" style="height:50px;"></div>
                            <p class="h3 text-center pt-5 pb-2">Configuration actuelle</p>
                            <hr class="p-3">
                            <p class="lead" style="font-size: 26px;"><b>Modèle : </b> <?= $unJet['nom'] ?></p>
                            <p class="lead" style="font-size: 26px;"><b>Couleur : </b><?= $col['couleur'] ?></p>
                            <p class="lead" style="font-size: 26px;"><b>Finition : </b><?= $finish['categorie'] ?></p>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-xl-6">
                            <p class="h4 text-center" style="font-size: 26px;"><b>Option supplémentaire choisie :</b></p>
                        </div>
                        <div class="col-xl-6">
                            <?php
                            // Réinitialisez le prix des options pour chaque itération de $finish
                            $optionsPrice = 0;
                            foreach ($options as $option) {
                                $optionsPrice += $option['prix'];
                            ?>
                                <p class="lead" style="font-size: 26px;"><b><?= $option['nom'] ?> : </b><?= $option['description'] ?></p>
                            <?php
                            }
                            $totalPrice = $jetPrice + $colorPrice + $finishingPrice + $optionsPrice;
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-12 col-sm">
                        <p class="h1 text-center mb-5 mt-5">Durée de la garantie</p>
                        <div class="row">
                            <?php
                            foreach ($garanties as $garantie) {
                                $price = $totalPrice * $garantie['prix'];
                                $price = number_format($price, 0, ',', '.');
                            ?>
                                <div class="col-xl-4 col-sm">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p class="h4 card-title justidy-content-between"><b><?= $garantie['annee'] ?> année(s) de garantie</b></p><br>
                                            <p class="h5"><b><?= $garantie['pourcentage'] ?></b></p><br>
                                            <p class="h5"><b>Prix de la garantie : <?= $price ?>€</b></p>
                                            <form action="./?action=resume" method="post">
                                                <button type="submit" class="mb-3 btn btn-primary" name="selectionGarantie" value="<?= $garantie['idGarantie'] ?>">Choisir</button><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="d-flex" style="height:100px;"></div>
                </div>
            </div>
    <?php
        }
    }
    ?>


</body>

</html>
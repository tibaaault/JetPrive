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
    $guarantee = $_SESSION['guarantee'];


    foreach ($jet as $oneJet) {
        $jetPrice = $oneJet['prix'];
        foreach ($color as $col) {
            $colorPrice = $col['prix'];
            foreach ($finishing as $finish) {
                $finishingPrice = $finish['prix'];
                foreach ($guarantee as $garant) {
                    $guaranteePrice = $garant['prix'];

    ?>
                    <div class="col-xl-12 col-sm col-lg col-md border">
                        <div class="col-xl-10 col-sm col-lg col-md bg-light mx-auto rounded rounded-5">
                            <div class="row">
                                <div class="col">
                                    <div class="hover-overlay ripple p-5" data-mdb-ripple-color="light">
                                        <img src="../pictures/<?= $oneJet['nom'] ?>.png" class="card-img-top rounded " alt="<?= $oneJet['nom'] ?>" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex" style="height:50px;"></div>
                                    <p class="h3 text-center pt-5 pb-2">Configuration actuelle</p>
                                    <hr class="p-3">
                                    <p class="lead" style="font-size: 26px;"><b>Modèle : </b> <?= $oneJet['nom'] ?></p>
                                    <p class="lead" style="font-size: 26px;"><b>Couleur : </b><?= $col['couleur'] ?></p>
                                    <p class="lead" style="font-size: 26px;"><b>Finition : </b><?= $finish['categorie'] ?></p>
                                    <p class="lead" style="font-size: 26px;"><b>Garantie : </b><?= $garant['annee'] ?> année(s)</p>
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
                                    $selectedOptionsIds = array();
                                    foreach ($options as $option) {
                                        $selectedOptionsIds[] = $option['id'];
                                        $optionsPrice += $option['prix'];
                                    ?>
                                        <p class="lead" style="font-size: 26px;"><b><?= $option['nom'] ?> : </b><?= $option['description'] ?></p>
                                    <?php
                                        $totalPrice = $jetPrice + $colorPrice + $finishingPrice + $optionsPrice;
                                    }
                                    ?>
                                </div>
                                <div class="col-xl-12 col-sm bg-dark text-light py-5 mt-3">
                                    <p class="h3 text-center pt-3 pb-3"><u>Calcul du prix</u></p>
                                    <div class="col-xl-4 col-sm mx-auto">
                                        <p class="lead" style="font-size: 26px;"><b>Prix du modèle : </b> <?= $jetPrice . ' €' ?></p>
                                        <p class="lead" style="font-size: 26px;"><b>Prix de la couleur : </b><?= $colorPrice . ' €' ?></p>
                                        <p class="lead" style="font-size: 26px;"><b>Prix de la finition : </b><?= $finishingPrice . ' €' ?></p>
                                        <p class="lead" style="font-size: 26px;"><b>Prix des options : </b><?= $optionsPrice . ' €' ?></p>
                                        <?php $guaranteePrice = $totalPrice * $guaranteePrice ?>
                                        <p class="lead" style="font-size: 26px;"><b>Prix de la garantie : </b><?= $guaranteePrice . ' €' ?></p>
                                    </div>
                                    <?php
                                    $totalPrice = $totalPrice + $guaranteePrice;
                                    $totalPriceTTC = number_format($totalPrice, 0, ',', '.');
                                    ?>
                                    <p class="lead text-center" style="font-size: 26px;"><b>Le prix TTC de vos configurations est : </b> <?= $totalPriceTTC . ' €' ?></p>
                                    <?php
                                    $priceHT = $totalPrice / 1.2;
                                    $priceHT = number_format($priceHT, 0, ',', '.');
                                    ?>
                                    <p class="lead text-center" style="font-size: 26px;"><b>Le prix HT de vos configurations est : </b> <?= $priceHT . ' €' ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
    <?php
                }
            }
        }
    }
    ?>
    <div class="mx-auto text-center mt-3">
        <p class="h3 text-center pt-3 pb-3"><u>Partager votre configuration avec ce lien</u></p>
        <?php
        foreach ($jet as $oneJet) {
            $jetPrice = $oneJet['prix'];
            foreach ($color as $col) {
                $colorPrice = $col['prix'];
                foreach ($finishing as $finish) {
                    $finishingPrice = $finish['prix'];
                    foreach ($guarantee as $garant) {
                        $guaranteePrice = $garant['prix'];
        ?>
                        <p class="lead">http://localhost:8888/?action=displayConfig&idModele=<?= $oneJet['id'] ?>&idColor=<?= $col['id'] ?>&idFinishing=<?= $finish['id'] ?>&idGuarantee=<?= $garant['idGarantie'] ?>&idSelectedOptions=<?= implode(',', $selectedOptionsIds); ?></p>
        <?php
                    }
                }
            }
        }
        ?>
    </div>
    <div class="d-flex" style="height:200px;"></div>


</body>

</html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir la couleur</title>
</head>

<body style="background-color :whitesmoke;">
    <div class="d-flex" style="height:50px;"></div>
    <p class="h1 text-center mb-5 text-dark">Sélection de la couleur</p>
    <?php
    $paints = $_SESSION['paints'];
    $jet = $_SESSION['jet'];
    foreach ($jet as $unJet) {
        $unJet['prix'] = number_format($unJet['prix'], 0, ',', ' ');
    ?>
        <div class="col-xl-12 col-sm col-lg col-md p-5" style="background-color :whitesmoke;">
            <div class="col-xl-7 col-sm mx-auto card-group">
                <div class="card border shadow-0">
                    <div class="hover-overlay ripple p-2" data-mdb-ripple-color="light">
                        <img src="../pictures/<?= $unJet['nom'] ?>.png" class="card-img-top rounded" alt="<?= $unJet['nom'] ?>" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-5 text-center"><?= $unJet['nom'] . ' Prix : ' . $unJet['prix'] . '€' ?></h5>
                        <h4 class="card-title mb-5 text-center">Choix de la couleur </h4>
                        <hr>
                        <div class="row">
                            <?php foreach ($paints as $paint) { ?>
                                <div class="col-xl-2 col-sm col-lg-2 col-md-6 mx-auto text-center">
                                    <p><?= $paint['couleur'] ?></p>
                                    <img src="../pictures/<?= $paint['image'] ?>.png" class="img-fluid mb-3" width="60" height="60" alt="<?= $paint['couleur'] ?>" />
                                    <? $paint['prix'] = number_format($paint['prix'], 0, ',', ' ') ?><br>
                                    <label class="mb-2">Prix: <?= $paint['prix'] . ' € ' ?></label>
                                    <form action="./?action=thirdForm" method="post">
                                        <button type="submit" class="mb-3 btn btn-primary" name="selectionColor" value="<?= $paint['id'] ?>">Choisir</button><br>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
        ?>
    <div class="d-flex" style="height:200px;"></div>

</body>

</html>
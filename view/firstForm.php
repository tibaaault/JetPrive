<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choisir le modèle</title>
  <style>
    .carousel-indicators li {
      width: 10px;
      /* Largeur des points */
      height: 10px;
      /* Hauteur des points */
      background-color: #007bff;
      /* Couleur des points inactifs */
      border: 1px solid #007bff;
      /* Bordure des points inactifs */
      border-radius: 50%;
    }

    .carousel-indicators .active {
      width: 10px;
      /* Largeur du point actif */
      height: 10px;
      /* Hauteur du point actif */
      background-color: #000000;
      /* Couleur du point actif */
      border: 1px solid #000000;
      /* Bordure du point actif */
      border-radius: 50%;
    }

    @media (min-width: 1000px) {
      .photo {
        padding: 40px 120px 40px 120px;
        height: 65% !important;
      }
    }

    @media (max-width: 500px) {
      .photo {
        padding: 20px 40px 30px 40px;
      }
    }
  </style>
</head>

<body>
  <div class="col-xl-12 mx-auto text-center ">
    <div class=" d-flex" style="height:50px;"></div>
    <p class="h1 text-dark">Sélection du modèle</p>
    <div class="d-flex" style="height:50px;"></div>
  </div>

  <?php
  $jets = $_SESSION['jets'];
  ?>

  <div class="col-xl-11 col-sm mx-auto rounded rounded-9">
    <div class="col-xl-10 col-sm mx-auto rounded rounded-5 border border-2 border-secondary" style=" background-color:#DDDDDD">
      <div class="col-xl-12 col-sm mx-auto rounded">
        <div class="container">
          <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
              $index = 0;

              foreach ($jets as $jet) {
                $jet['prix'] = number_format($jet['prix'], 0, ',', ' ');

                $activeClass = ($index == 0) ? 'active' : '';
              ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                  <!-- <div class="carousel-item <?php echo $activeClass; ?> border rounded" style="background-color :#f4f7f5;"> -->
                  <img src="../pictures/<?= $jet['nom']; ?>.png" class="d-block w-100 mb-3 photo" alt="<?php echo $jet['nom']; ?>">
                  <div class="carousel-caption d-md-block">
                    <p class='h3'><?php echo $jet['nom']; ?></p>
                    <p>Prix : <?php echo $jet['prix']; ?> €</p>
                    <form action="./?action=secondForm" method="post">
                      <button type="submit" class="btn btn-primary mt-xl-3 mb-xl-2" name="selectionModel" value="<?= $jet['id'] ?>">Sélectionner</button>
                    </form>
                  </div>
                </div>

              <?php
                $index++;
              }
              ?>
            </div>
            <a class="carousel-control-prev " href="#carouselExample" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true" style="color:#000000"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
              <span class="carousel-control-next-icon " aria-hidden="true" style="color:#000000"></span>
              <span class="sr-only">Next</span>
            </a>
            <!-- Indicateurs -->
            <ol class="carousel-indicators">
              <?php for ($i = 0; $i < count($jets); $i++) { ?>
                <li data-target="#carouselExample" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?> m-3"></li>
              <?php } ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex" style="height:100px;"></div>


  <!-- Inclure Bootstrap JS et les dépendances jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
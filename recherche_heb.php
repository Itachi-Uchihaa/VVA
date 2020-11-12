<div class="col-lg-12">
    <div class="card h-100">
      <div class="card-body bg-light">

        <form action="consulter.php" method="post">
          <?php
          $requete = "SELECT MAX(ANNEEHEB), MIN(ANNEEHEB),
          MAX(NBPLACEHEB), MIN(NBPLACEHEB),
          MAX(TARIFSEMHEB), MIN(TARIFSEMHEB),
          MAX(SURFACEHEB), MIN(SURFACEHEB)
          FROM hebergement";
          ?>

          <div class="form-row">

            <div class="form-group col-md-3">
              <label><font class='hebCSS'> Nombre de places : </font></label>
              <input type="number" name="NBPLACEHEB" min="<?php echo $ligne['MIN(NBPLACEHEB)']; ?>" max="<?php echo $ligne['MAX(NBPLACEHEB)']; ?>" class="form-control"  placeholder="Entrer le minimum">
            </div>

            <div class="form-group col-md-3">
              <label><font class='hebCSS'> Surface : </font></label>
              <div class="input-group mb-2">
                <input type="number" name="SURFACEHEB" min="<?php echo $ligne['MIN(SURFACEHEB)']; ?>" max="<?php echo $ligne['MAX(SURFACEHEB)']; ?>" class="form-control" placeholder="Entrer le minimum">
                <div class="input-group-prepend">
                  <div class="input-group-text">m²</div>
                </div>
              </div>
            </div>

            <div class="form-group col-md-3">
              <label><font class='hebCSS'> Tarif (hebdomadaire): </font></label>
              <div class="input-group mb-2">
                <input type="number" name="TARIFSEMHEB" min="<?php echo $ligne['MIN(TARIFSEMHEB)']; ?>" max="<?php echo $ligne['MAX(TARIFSEMHEB)']; ?>" class="form-control" placeholder="Entrer le maximum">
                <div class="input-group-prepend">
                  <div class="input-group-text">€</div>
                </div>
              </div>
            </div>

            <div class="form-group col-md-2.5">
              <label><font class='hebCSS'> Type d'hébergement : </font></label>
              <select name="CODETYPEHEB" class="form-control">
                <option selected value = '%'>Tous</option>
                <option value = "CH">Chalet</option>
                <option value = "AP">Appartement</option>
                <option value = "BU">Bungalow</option>
                <option value = "MH">Mobil home</option>
              </select>
            </div>

            <div class="form-group col-md-1.5">
              <label><font class='hebCSS'> Internet : </font></label>
              <select name="INTERNET" class="form-control">
                <option selected value = '%'>Oui/non</option>
                <option value = "1">Oui</option>
                <option value = "0">Non</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label><font class='hebCSS'> Secteur : </font></label>
              <select name="SECTEURHEB" class="form-control">
                  <option selected value = '%'>Tous</option>
                  <option>Plaine</option>
                  <option>Torrent</option>
                  <option>Piste</option>
                  <option>Montagne</option>
              </select>
            </div>

            <div class="form-group col-md-1.5">
              <label><font class='hebCSS'> Orientation : </font></label>
              <select name="ORIENTATIONHEB" class="form-control">
                <option selected value = '%'>Toutes</option>
                <option >Sud</option>
                <option>Nord</option>
                <option>Est</option>
                <option>Ouest</option>
              </select>
            </div>

          </div>
          
					<button type="submit" name="Recherche" class="btn btn-primary">Rechercher</button>

      </form>
    </div>
  </div>
</div>

</div>
<div class="heb3CSS">
<hr>
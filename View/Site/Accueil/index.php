<?php $this->title = "Accueil" ?>

<div class="container margin-side">

  <div class="row margin-top-50 map">
    <div class="col l3 formulaire">
      <form method="POST">
        <div class="type">
          <label for="name">Type de figure: </label>
          <select id="select" name="question">
            <option value="" disabled hidden selected class="size-9">SELECTIONNER</option>
            <option value="1">Problème de connexion ?</option>
            <option value="2">Problème d'inscription ?</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="amplitude">
          <label for="email">Amplitude: </label>
            <p class="range-field">
              <input type="range" id="test5" min="0" max="40" />
            </p>
        </div>
        <div class="decalage">
           <label for="email">Decalage: </label>
            <p class="range-field">
              <input type="range" id="test5" min="0" max="12" />
            </p>
        </div>
         <div class="decalage">
          <input type="button" id="start" value="Test">
        </div>
      </form>

    </div>
    <div class="col l9 border-map" id="lightbox">


    </div>

  </div>
</div>

<script language="javascript" type="text/javascript">
    

</script>
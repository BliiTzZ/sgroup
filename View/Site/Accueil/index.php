<?php $this->title = "Accueil" ?>

<div class="container margin-side">

  <div class="row margin-top-50 map">
    <div class="col s3 formulaire">
      <h5>Mouvements</h5>
      <form method="POST">
        <div class="type">
          <label for="name">Type de figure: </label>
          <select id="type" name="question">
            <option value="" disabled hidden selected class="size-9">SELECTIONNER</option>
            <option value="vague">Vague</option>
            <option value="inclinaison">inclinaison</option>
            <option value="papillon">Papillon</option>
            <option value="chapeau">Chapeau</option>
            <option value="chapeauinverse">Chapeau Inversé</option>
            <option value="vaguecois">Vague Croissante</option>
            <option value="creation1">Création 1</option>
          </select>
        </div>
        <div class="amplitude">
          <label for="email">Amplitude: </label>
            <p class="range-field">
              <input type="range" id="amplitude" min="0" max="40" />
            </p>
        </div>
        <div class="decalage">
           <label for="email">Decalage: </label>
            <p class="range-field">
              <input type="range" id="decalage" min="0" max="12" />
            </p>
        </div>
        <div class="lampes">
           <label for="email">Nombre de spots: </label>
            <p class="range-field">
              <input type="range" id="nbLampes" min="5" max="20" value="10" />
            </p>
        </div>
        <div class="lampes">
           <label for="email">Amplitude de l'inclinaison: </label>
            <p class="range-field">
              <input type="range" id="amplitudeIncl" min="0" max="200" value="10" />
            </p>
        </div>
        <div class="lampes">
           <label for="email">Vitesse du mouvement: </label>
            <p class="range-field">
              <input type="range" id="vitessemouv" min="0" max="10" value="5" />
            </p>
        </div>

        <div class="colors">
        <label for="colorId">couleur</label>
        <input id="colorId" value="#cc9595" type="color">
        </div>
        <h5>Intensité</h5>
        <div class="type">
          <label for="name">Schema lumineux: </label>
          <select id="schema" name="question">
            <option value="" disabled hidden selected class="size-9">SELECTIONNER</option>
            <option value="constant">Constant</option>
            <option value="vaguelum">Vague lumineuse</option>
            <option value="stroboscope">Stroboscope</option>
            <option value="Alternatstrobo">Stroboscope Alterné</option>
            <option value="chenille">Chenille</option>
          </select>
        </div>
      </form>
      <div class="periode">
           <label for="email">Periode: </label>
            <p class="range-field">
              <input type="range" id="periode" min="0" max="20" value="10" />
            </p>
        </div>

    </div>
    <div class="border-map col s9 ">
      <div class="" id="lightbox">


    </div>
    <div class="" style="flex:1"></div>
    <div id="groundBox"></div>
    </div>


  </div>
</div>

<script language="javascript" type="text/javascript">


</script>

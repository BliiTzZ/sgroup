<?php $this->title = "Accueil" ?>

<div class="container margin-side">

  <div class="row margin-top-50 map">
    <div class="col s3 formulaire">
      <form method="POST">
        <div class="type">
          <label for="name">Type de figure: </label>
          <select id="type" name="question">
            <option value="" disabled hidden selected class="size-9">SELECTIONNER</option>
            <option value="vague">Vague</option>
            <option value="inclinaison">inclinaison</option>
            <option value="super8">super 8</option>
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
      </form>

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
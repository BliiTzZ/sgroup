<!--Nav mobile-->
<ul class="sidenav cd-accordion-menu" id="mobile-demo">
    <li>
        <div class="white-text collapsible-header sous-menu"><a class="white-text" href="accueil">ACCUEIL</a></div>
    </li>
    <!--
    <li class="group">
        <input type="checkbox" name ="group-1" id="group-1">
        <div class="white-text collapsible-header sous-menu">
            <label for="group-1">
                PRÉSENTATION
                <span class="badge"><i class="material-icons">expand_more</i></span>
            </label>
        </div>
        <ul>
            <li class="has-children">
                <input type="checkbox" name ="sub-group-pres" id="sub-group-pres">
                <label for="sub-group-pres">Sous menu 1
                <span class="badge"><i class="material-icons">add</i></span>
                </label>
                <ul>
                   <li><a href="#0">Sous-sous menu 1</a></li>
                   <li><a href="#0">Sous-sous menu 2</a></li>
                   <li><a href="#0">Sous-sous menu 3</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="group">
        <input type="checkbox" name ="group-2" id="group-2">
        <div class="white-text collapsible-header sous-menu">
            <label for="group-2">
                GALERIE
                <span class="badge"><i class="material-icons">expand_more</i></span>
            </label>
        </div>
        <ul>
            <li class="has-children">
                <input type="checkbox" name ="sub-group-photo" id="sub-group-photo">
                <label for="sub-group-photo">PHOTOGRAPHE
                <span class="badge"><i class="material-icons">add</i></span>
                </label>
                <ul>
                   <li><a href="#0">Sous-sous menu 1</a></li>
                   <li><a href="#0">Sous-sous menu 2</a></li>
                   <li><a href="#0">Sous-sous menu 3</a></li>
                </ul>
            </li>
            <li class="has-children">
                <input type="checkbox" name ="sub-group-video" id="sub-group-video">
                <label for="sub-group-video">VIDÉASTE
                <span class="badge"><i class="material-icons">add</i></span>
                </label>
                <ul>
                   <li><a href="#0">PACKSHOOT PRODUITS</a></li>
                   <li><a href="#0">REPORTAGES</a></li>
                   <li><a href="#0">MARIAGES</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="group">
        <input type="checkbox" name ="group-3" id="group-3">
        <div class="white-text collapsible-header sous-menu">
            <label for="group-3">
                ACTUALITÉ
                <span class="badge"><i class="material-icons">expand_more</i></span>
            </label>
        </div>
        <ul>
            <li class="has-children">
                <input type="checkbox" name ="sub-group-actu" id="sub-group-actu">
                <label for="sub-group-actu">Sous menu 1
                <span class="badge"><i class="material-icons">add</i></span>
                </label>
                <ul>
                   <li><a href="#0">Sous-sous menu 1</a></li>
                   <li><a href="#0">Sous-sous menu 2</a></li>
                   <li><a href="#0">Sous-sous menu 3</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="group">
        <input type="checkbox" name ="group-4" id="group-4">
        <div class="white-text collapsible-header sous-menu">
            <label for="group-4">
                ADHÉRENTS
                <span class="badge"><i class="material-icons">expand_more</i></span>
            </label>
        </div>
        <ul>
            <li class="has-children">
                <input type="checkbox" name ="sub-group-ade" id="sub-group-ade">
                <label for="sub-group-ade">Sous menu 1
                <span class="badge"><i class="material-icons">add</i></span>
                </label>
                <ul>
                   <li><a href="#0">Sous-sous menu 1</a></li>
                   <li><a href="#0">Sous-sous menu 2</a></li>
                   <li><a href="#0">Sous-sous menu 3</a></li>
                </ul>
            </li>
        </ul>
    </li>
    --->
    <li>
    <div class="white-text collapsible-header sous-menu"><a class="white-text" href="contact">CONTACT</a></div>
    </li>
    <li class="group">
        <input type="checkbox" name ="group-5" id="group-5">
        <div class="white-text collapsible-header sous-menu">
            <label for="group-5">
                MON COMPTE
                <span class="badge"><i class="material-icons">expand_more</i></span>
            </label>
        </div>
        <ul>
            <li class="has-children">
                <?php if(isset($client)) { ?>
                <label><a href="dashboard">TABLEAU DE BORD</a></label>
                <label><a href="profil">PROFIL</a></label>
                <!--
                <label><a href="conditions">CONDITIONS D'UTILISATION</a></label>
                --->
                <label><a href="connexion/logout">ME DECONNECTER</a></label>
                <?php } else { ?>
                <label><a href="inscription">INSCRIPTION</a></label>
                <label><a href="connexion">CONNEXION</a></label>
                <!--
                <label><a href="conditions">CONDITIONS D'UTILISATION</a></label>
                --->
                <?php } ?>
            </li>
        </ul>
    </li>
</ul>

<!--Nav desktop-->
<ul id="dropdown1" class="dropdown-content">
    <?php if(isset($client)) { ?>
    <li><a class="grey-text text-darken-1" href="dashboard">Tableau de bord</a></li>
    <li><a class="grey-text text-darken-1" href="profil">Profil</a></li>
    <!--
    <li><a class="grey-text text-darken-1" href="conditions">Conditions d'utilisation</a></li>
    --->
    <li><a class="grey-text text-darken-1" href="connexion/logout">Me deconnecter</a></li>
    <?php } else { ?>
    <li><a class="grey-text text-darken-1" href="inscription"> Inscription</a></li>
    <li><a class="grey-text text-darken-1" href="connexion"> Connexion</a></li>
    <!--
    <li><a class="grey-text text-darken-1" href="conditions"> Conditions d'utilisation</a></li>
    --->
    <?php } ?>
</ul>
<div class="navbar">
    <nav class="navigation-menu semi-transparent z-depth-0">
        <div class="nav-wrapper margin_side">
            <a data-target="mobile-demo" class="sidenav-trigger open-burger grey-text text-darken-1"><i class="material-icons">menu</i></a>
            <a data-target="mobile-demo" class="sidenav-trigger sidenav-close close-burger grey-text text-darken-1"><i class="material-icons">close</i></a>
            <a href="accueil" class="logo-nav grey-text text-darken-1"><img class="logoPole" src="Public/img/img.png" alt=""></a>
            <ul class="right hide-on-med-and-down">
            <li><a class="grey-text text-darken-1" href="accueil">Accueil</a></li>
            <!--
            <li><a class="grey-text text-darken-1" href="presentation">Présentation</a></li>
            <li><a class="grey-text text-darken-1" href="galerie">Galerie</a></li>
            <li><a class="grey-text text-darken-1" href="actualite">Actualité</a></li>
            <li><a class="grey-text text-darken-1" href="adherents">Adhérents</a></li>
            --->
            <li><a class="grey-text text-darken-1" href="contact">Contact</a></li>
                <li>
                    <a class="dropdown-trigger nick grey-text text-darken-1" data-target="dropdown1">
                        <?php if(isset($client)) { ?>
                        <p class="nickname"><?php echo $this->clean($client['first_name']); ?></p>
                        <?php } else { ?>
                        <p class="nickname">Compte</p>
                        <?php } ?>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <!--
                <li><a class="grey-text text-darken-1" href=""><i class="material-icons">search</i></a></li>
                -->
            </ul>
        </div>
    </nav>
</div>
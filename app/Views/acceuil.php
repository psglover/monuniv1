<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ma plateforme univ</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css');?>" />
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="<?= base_url('public/acceuil');?>"> <span> Ma</span> plateforme</a>
      </div>
      <ul class="menu">
        <li><a href="<?= base_url('public/acceuil');?>">Acceuil</a></li>
        <li><a href="<?= base_url('public/acceuil');?>#contact">Contact</a></li>
        <?php if(session()->has('est_connecter')):?>
          <li><a href="<?= base_url('public/deconnection');?>">Déconnection</a></li>
          <li><a href="<?= base_url('public/ajouter');?>">Créer</a></li>
          <?php else: ?>          
            
            <li><a href="<?= base_url('public/connexion');?>">Connexion</a></li>
        <?php endif;?>
      </ul>
      <a href="<?= base_url('public/acceuil');?>#contact" class="btn-inscrire">S'inscrire</a>
      <div class="responsive-menu"></div>
    </header>
    <!--acceuil-->
    <section class="home" id="home">
         <div>
        <?php
        if(session()->getFlashdata('status')){
            echo "<h4 classs='flash' style='color:red;'>".session()->getFlashdata('status')."</h4>";
        }
        ?>
    </div>
      <h2>Nous suivre</h2>
      <h4>Soumettez vos demandes</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit,
        fuga!
        
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
      <a href="#contact" class="btn-inscrire home-btn">S'inscrire</a>
      <div class="search_certificat" id="search_certificat">
        <h1 id="recherche_dip">Recherche diplôme</h1>
        <form method="post" action="<?=base_url('public/verifier');?>">
          <label for="numdemande">No demande</label>
          <input type="text" placeholder="Entrez numero de demande" name="numdemande"/>

          <input type="submit" value="Valider" />
        </form>
      </div>
    </section>
    <section class="contact" id="contact">
      <h1 class="title">S'inscrire</h1>
      
      <form method="post" action="<?=base_url('public/enregistrer');?>">
        <div class="content-contact">
          <div class="gauche">
            <label for="nom">Nom complet</label>
            <input
              type="text"
              name="nom"
              id="nom"
              placeholder="Nom complet"
              required
              value="<?= set_value('nom') ?>"
            />
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              id=""
              placeholder="Adresse Email"
              required
              value="<?= set_value('email') ?>"
            />
            <label for="message">Message</label>
            <textarea
              name="message"
              id=""
              cols="30"
              rows="5"
              value="<?= set_value('message') ?>"
              placeholder="Tapez un court message..."
            ></textarea>
          </div>
          <div class="droite">
            <label for="diplome">Nom diplôme:</label>
            <input
              type="text"
              name="diplome"
              class="diplome"
              placeholder="Nom du diplôme"
              value="<?= set_value('diplome') ?>"
              required
            />
            <label for="institut">Nom institut</label>
           
             <?php $request = \Config\Services::request(); $selection = $request->getPost('id_inst'); ?>
              <select name="institut" class="institut select" required>
                    <?php foreach ($mesInstituts as $row) : ?>
                      
					              <option  value="<?php echo $row['nom_inst']; ?>" <?php if($selection == $row['id_inst']) { echo ("selected");}?>>  <?php echo $row['nom_inst'];?>   </option>
				            <?php endforeach ;?>
              </select>
            <label for="filiere">Nom filière:</label>
            <input
              type="text"
              name="filiere"
              class="filiere"
              placeholder="Nom filière"
              value="<?= set_value('filiere') ?>"
              required
            />
            <label for="obtention">Année d'obtention</label>
            <input
              type="number"
              size="4"
              value="2010"
              min="1960"
              name="obtention"
              value="<?= set_value('obtention') ?>"
              id=""
              placeholder="Année d'obtention"
              required
            />
          </div>
        </div>
        <input type="submit" value="Envoyer" class="submit-btn" />
      </form>
    </section>
    <footer>
      <p>Nous contactez <span> 10 bla bla bla</span></p>
    </footer>
    <script>
      var toggle_menu = document.querySelector(".responsive-menu");
      var menu = document.querySelector(".menu");
      toggle_menu.onclick = function () {
        toggle_menu.classList.toggle("active");
        menu.classList.toggle("responsive");
      };
    </script>
  </body>
</html>

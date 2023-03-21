<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter</title>
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
 <!--    Contenu -->
 <section class="contact">
      
        <h1>
            Se connecter
           
        </h1>
       
   
    <form method="post" action="<?=base_url('public/connexion');?>">
        <div class="content_connexion">
          <?php if(session()->getTempdata('error')): ?>
            <h4 style="color:black;"> <?= session()->getTempdata('error'); ?></h4>
            <?php endif;?>
          
            <label for="nom_inst">Nom complet :</label>
            <input
              type="text"
              name="nom_inst"
              id="nom"
              placeholder="Nom"
              required
              value="<?= set_value('nom_inst') ?>"
            />
            <?php if(isset($validation)):?><span><?=display_error($validation,'nom_inst');?></span><?php endif;?>
            <label for="motPasse">Mot de passe :</label>
            <input
              type="password"
              name="motPasse"
              id="password"
              placeholder="Mot de passe"
              required
             
            />
            <?php if(isset($validation)):?><span><?=display_error($validation,'motPasse');?></span><?php endif;?>
           
             
         
        </div>
        <input type="submit" value="Envoyer" class="submit-btn" />
      </form>
 </section>




  <!-- Footer -->
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
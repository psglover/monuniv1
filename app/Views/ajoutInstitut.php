<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerer institution</title>
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
<section class="container_ajout">
       
       <h1>
            Ajout Institution
           
        </h1>
             
      <form method="post" action="<?=base_url('public/creer');?>">
       
        <div class="content_ajout">
             <span class="btn_ajouter"> <a href="<?= base_url('public/mesinstituts') ?>" >Retour  </a> </span> 
          
            <label for="nom_inst">Nom complet :</label>
            <input
              type="text"
              name="nom_inst"
              id="nom"
              placeholder="Nom Institution"
              required
              value="<?= set_value('nom_inst') ?>"
            />
           <?php if(isset($validation)):?> <span><?=display_error($validation,'nom_inst');?></span><?php endif;?>
            <label for="email_inst">Email :</label>
            <input
              type="email"
              name="email_inst"
              id=""
              placeholder="Adresse Email"
              required
              value="<?= set_value('email_inst') ?>"
            />
            <?php if(isset($validation)):?><span><?=display_error($validation,'email');?></span><?php endif;?>
            <label for="telephone">Téléphone:</label>
            <input
              type="text"
              name="tel_inst"
              class="telephone"
              placeholder="No telephone"
              value="<?= set_value('tel_inst') ?>"
              required
            />
            <?php if(isset($validation)):?><span><?=display_error($validation,'tel_inst');?></span><?php endif;?>
                     
            <label for="code_inst">Code institution:</label>
            <input
              type="text"
              name="code_inst"
              class="code_inst"
              placeholder="Code institution"
              value="<?= set_value('code_inst') ?>"
            
            /> 
            <label for="pass">Mot de passe :</label>
            <input type="password" name="pass" id="" placeholder="Entrer le mot de passe" required>
            <?php if(isset($validation)):?><span><?=display_error($validation,'pass');?></span><?php endif;?>
            <label for="confpass">Confirmer le mot de passe :</label>
            <input type="password" name="confpass" id="" placeholder="Entrer le mot de passe" required>
            <?php if(isset($validation)):?><span><?=display_error($validation,'confpass');?></span><?php endif;?>
                        
         
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
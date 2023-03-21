<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier institution</title>
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
       
    <div>
        <h1>
            Modifier Institution
           <span class="btn_ajouter"> <a href="<?= base_url('public/mesinstituts') ?>" >Retour  </a> </span>
        </h1>
    </div>
    
      
      <form method="post" action="<?=base_url('public/update/'.$institut['id_inst']);?>">
        <div class="content-ajout">
          
            <label for="nom_inst">Nom complet :</label>
            <input
              type="text"
              name="nom_inst"
              id="nom"
              placeholder="Nom Institution"
              required
              value="<?= $institut['nom_inst'] ?>"
            />
            <label for="email_inst">Email :</label>
            <input
              type="email"
              name="email_inst"
              id=""
              placeholder="Adresse Email"
              required
              value="<?= $institut['email_inst'] ?>"
            />
          
            <label for="telephone">telephone:</label>
            <input
              type="text"
              name="tel_inst"
              class="telephone"
              placeholder="No telephone"
              value="<?= $institut['tel_inst'] ?>"
              required
            />
            
           
             
            <label for="code_inst">Code institution:</label>
            <input
              type="text"
              name="code_inst"
              class="code_inst"
              placeholder="Code institution"
              value="<?= $institut['code_inst'] ?>"
            
            />
            
            
         
        </div>
        <input type="submit" value="Modifier" class="submit-btn" />
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



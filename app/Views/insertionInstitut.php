<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscrire institution</title>
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
  <section class="container_inst">
    <div>
       <h1>
            Gerer Institution
           <span class="btn_ajouter"> <a href="<?= base_url('public/ajouter') ?>" >Ajouter </a> </span>
        </h1> 
    </div>
    <div>
        <?php
        if(session()->getFlashdata('status')){
            echo "<h4 classs='flash'>".session()->getFlashdata('status')."</h4>";
        }
        ?>
    </div>
      <div class="table_responsive">
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                 <th>Nom</th>
                 <th>Email</th>
                <th>Téléphone</th>
                <th>Code</th>
                 <th>date création</th>
                <th>Actions</th>
            </tr>
            
        </thead>
        <tbody>
            <?php foreach($mesInstitut as $row): ?>
            <tr>
                <td><?= $row['id_inst']; ?> </td>
                <td><?= $row['nom_inst']; ?> </td>
                <td><?= $row['email_inst']; ?> </td>
                <td><?= $row['tel_inst']; ?> </td>
                <td><?= $row['code_inst']; ?> </td>
                <td><?= $row['date_creation']; ?> </td>
                <td>
                    <span class="action_btn">
                        <a href="<?= base_url('public/editer/'.$row['id_inst']) ?>" class="btn btn-edit">Editer</a> 
                         <a href="<?= base_url('public/supprimer/'.$row['id_inst']) ?>" class="btn btn-supprime">Supprimer</a> 
                    </span>
                    
               </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  </div>  
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

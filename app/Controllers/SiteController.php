<?php

namespace App\Controllers;
use App\Models\MonModel;
use  App\Models\SiteModel;
use App\Models\InstitutModel;
use App\Models\MonModele;

class SiteController extends BaseController
{

   
 public function simple(){
   $instModel = new InstitutModel();
   $data_univ['mesInstituts'] =$instModel->findAll(); 
    return view("acceuil", $data_univ);
 }

 public function enregistrer(){

   $email = \Config\Services::email();
  
   $siteModel = new SiteModel();
   $instModel = new InstitutModel();
   $db = db_connect();
   $monModel = new MonModele($db);

   //retouver l'id institut avec le nom de l'institut
   /* $data1= $instModel->getInstituId($this->request->getPost('institut')); */
   if($this->request->getMethod()=='post'){
      $data1=$instModel->getInstitutId($this->request->getPost('institut'));
      

       $data = [
      "nom_demandeur" =>ucfirst(strtolower($this->request->getPost('nom'))),
      "email_demandeur"=>$this->request->getPost('email'),
      "nom_diplome"=>$this->request->getPost('diplome'),
      "id_institut"=>$data1[0]['id_inst'],
      "nom_filiere"=>$this->request->getPost('filiere'),
      "annee_obtention"=>$this->request->getPost('obtention'),
      "message"=>$this->request->getPost('message'),
      'code_demandeur' => uniqid(),

   ];
   $to=$data['email_demandeur'];
   $subject = "Demande de certification diplôme";
   $message = ' Demande de certification du '.$data['nom_diplome'].' par M/mlle/ '.$data['nom_demandeur'].' Obtenu à ' .$this->request->getPost('institut').'
    Obtenu en ' .$data['annee_obtention']. ' dans la filiere ' . $data['nom_filiere']. '<br/>' .$data['message'].'<br> Utiliser le code suivant pour  <strong> '.$data['code_demandeur'].'</strong> Pour suivre votre demande.';
    /* $message="voici le message"; */
    $email->setCC('sosplantes2021@gmail.com');
    $email->setTo($to);
    $email->setFrom('testthierry@sosplantes.com','ma plate forme univ');
    $email->setSubject($subject);
    $email->setMessage($message);
    
    if($email->send()){
      return redirect()->to(base_url('public/acceuil'))->with('status','Demande validé et en cours de traitement');
    }else{
      
      $siteModel->save($data);
      return redirect()->to(base_url('public/acceuil'))->with('status',"Votre demande n'a pas été validé");
    }
    

   }
   

   
 }

 public function verifier(){
  $siteModel = new SiteModel();
   if($this->request->getMethod()=='post'){
     $mydata=$siteModel->getStatus($this->request->getPost('numdemande'));
     
     if($mydata == false){
      $myresult = "Désolé nous n'avons pas cette demande!";
     }else{
      $myresult= $mydata[0]['statut_demande'];
     }
 
      return redirect()->to(base_url('public/acceuil'))->with('status',$myresult);
     

   }
  

 }

}
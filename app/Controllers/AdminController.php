<?php

namespace App\Controllers;

use App\Models\InstitutModel;

class AdminController extends BaseController
{
    public $session;
    public function __construct(){
        helper('form');
        $this->session = \Config\Services::session();
    }
    public function voirInstitutions(){
        $instModel = new InstitutModel();
        $data['mesInstitut'] = $instModel->findAll();
        return view('insertionInstitut',$data);
    }

    public function ajoutInstitution(){
       
        return view('ajoutInstitut');

    }

    public function storeInstitution(){
        $instModel = new InstitutModel();
        
        $dataValidator = [];
        $dataValidator['validation']= null;
        $rules=[
            'nom_inst'=>'required|min_length[3]|max_length[100]',
            'email_inst'=>'required|valid_email|is_unique[institution.email_inst]',
            'tel_inst'=>'required|numeric',
            'pass'=>'required|min_length[5]|max_length[20]',
            'confpass'=>'required|matches[pass]',
        ];
        $data =[
            'nom_inst'=>strtolower($this->request->getPost('nom_inst')),
            'email_inst'=>$this->request->getPost('email_inst'),
            'tel_inst'=>$this->request->getPost('tel_inst'),
            'code_inst'=>$this->request->getPost('code_inst'),
            'mot_passe'=>password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            
        ];

        if($this->validate($rules)){
            $instModel->save($data);
            return redirect()->to(base_url('public/mesinstituts'))->with('status','Institut ajouté');
        }else{
            $dataValidator['validation'] = $this->validator;
            return view('ajoutInstitut',$dataValidator);
 
        }
        


    }

    public function seConnecter(){
        $instModel = new InstitutModel();
        $data=[];
        if($this->request->getMethod() =='post'){
            $rules=[
                'nom_inst'=>'required|min_length[3]|max_length[100]',
                'motPasse'=>'required|min_length[5]|max_length[20]',
            ];
            if($this->validate($rules)){
                $nom_inst = strtolower($this->request->getVar('nom_inst'));
                $mot_passe =  $this->request->getVar('motPasse');
                $userdata = $instModel->verifier_nom($nom_inst);
                
                if($userdata){
                   if(password_verify($mot_passe,$userdata['mot_passe'])){
                    $this->session->set('est_connecter', $userdata['nom_inst']);
                    return redirect()->to(base_url('public/mesinstituts'))->with('status','Connecté');

                   }else{
                     $this->session->setTempdata('error', "Désolé, mauvais mot de passe pour ce compte!", 3);
                   return redirect()->to(base_url('public/connexion'));

                   }

                }else{
                    
                   $this->session->setTempdata('error', "Désolé, ce nom n'existe pas!", 3);
                   return redirect()->to(base_url('public/connexion')); 
                    
                }
            }
            else{
                $data['validation']= $this->validator;
            }

        }
        return view('connexion_view', $data);
    }

    public function editer($id){
        $instModel = new InstitutModel();
        $data['institut'] = $instModel->find($id);
        return view('editer',$data);

    }

    public function update($id){
        $instModel = new InstitutModel();
        
         $data =[
            'nom_inst'=>$this->request->getPost('nom_inst'),
            'email_inst'=>$this->request->getPost('email_inst'),
            'tel_inst'=>$this->request->getPost('tel_inst'),
            'code_inst'=>$this->request->getPost('code_inst')
            
        ];

        $instModel->update($id,$data);
        return redirect()->to(base_url('public/mesinstituts'))->with('status','Institut modifier avec success');

    }

    public function supprimer($id){
        $instModel = new InstitutModel();
        $instModel->delete($id);
        return redirect()->to(base_url('public/mesinstituts'))->with('status','Institut supprimer avec success');

    }

    public function deconnecter(){
        $this->session->destroy();
        return redirect()->to(base_url('public/acceuil'));
    }

}
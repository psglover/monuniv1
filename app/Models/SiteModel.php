<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Connection;

class SiteModel extends Model
{
    protected $table ='demandeur';
    protected $primaryKey ='id_demandeur';
    protected $allowedFields =[
        'nom_demandeur',
        'email_demandeur',
        'nom_diplome',
        'id_institut',
        'nom_filiere',
        'annee_obtention',
        'message',
        'code_demandeur',
    ];

      public function getstatus($data){
        $db= \Config\Database::connect();
        $query="SELECT statut_demande FROM demandeur Where code_demandeur = ? ";
        $result = $db->query($query, $data)->getResultArray();
        if(count($result)>0){
            return $result;
        }else{
            return false;
        }
    }
    
}
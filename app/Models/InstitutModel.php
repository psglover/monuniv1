<?php 
namespace App\Models;
use CodeIgniter\Model;

class InstitutModel extends Model
{
    protected $table ='institution';
    protected $primaryKey ='id_inst';
    protected $allowedFields =[
        'nom_inst',
        'email_inst',
        'tel_inst',
        'code_inst',
        'date_creation',
        'mot_passe',
    ];

    public function getInstitutId($data){
        $db= \Config\Database::connect();
        $query="SELECT id_inst FROM institution Where nom_inst = ? ";
        $result = $db->query($query, $data)->getResultArray();
        if(count($result)>0){
            return $result;
        }else{
            return false;
        }
    }

    public function verifier_nom($nom_inst){
        $builder = $this->db->table('institution');
        $builder->select('id_inst, nom_inst, email_inst, mot_passe');
        $builder->where('nom_inst',$nom_inst);
        $result = $builder->get();
        if(count($result->getResultArray()) ==1){
            return $result->getRowArray();
        }else{
            return false;
        }

    }
}
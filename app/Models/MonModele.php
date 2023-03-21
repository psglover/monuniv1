<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
class MonModele
{
   protected $db;
   public function __construct(ConnectionInterface &$db){
    $this->db =& $db;
   }

    function getValue($param){
        $db = db_connect();
        $query = $db->query('SELECT id_inst From institution WHERE nom_inst =');
            
        return $this->db->table('institution')
              ->where(['nom_inst'=>$param])
              ->get()
             ->getResult();
    }
}

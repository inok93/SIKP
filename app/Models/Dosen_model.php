<?php namespace App\Models;
use CodeIgniter\Model;
  
class Dosen_model extends Model
{
    protected $table = 'dosen';
      
    public function getDosen($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['NIP' => $id]);
        }   
    }

    public function insertDosen($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDosen($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['NIP' => $id]);
    }

    public function deleteDosen($id)
    {
        return $this->db->table($this->table)->delete(['NIP' => $id]);
    }
}
?>
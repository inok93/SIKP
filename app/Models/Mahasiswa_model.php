<?php namespace App\Models;
use CodeIgniter\Model;
  
class Mahasiswa_model extends Model
{
    protected $table = 'mahasiswa';
      
    public function getMahasiswa($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['NIM' => $id]);
        }   
    }

    public function insertMahasiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMahasiswa($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['NIM' => $id]);
    }

    public function deleteMahasiswa($id)
    {
        return $this->db->table($this->table)->delete(['NIM' => $id]);
    }
}
?>
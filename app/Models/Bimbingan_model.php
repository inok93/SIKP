<?php namespace App\Models;
use CodeIgniter\Model;
  
class Bimbingan_model extends Model
{
    protected $table = 'bimbingan';
      
    public function getBimbingan($id = false)
    {
        if($id === false){
            return $this->table('bimbingan')
                        ->join('kerja_praktek', 'kerja_praktek.ID_KP = bimbingan.ID_KP')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('bimbingan')
                        ->join('kerja_praktek', 'kerja_praktek.ID_KP = bimbingan.ID_KP')
                        ->where('bimbingan.ID_BIMBINGAN', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function insertBimbingan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBimbingan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ID_BIMBINGAN' => $id]);
    }

    public function deleteBimbingan($id)
    {
        return $this->db->table($this->table)->delete(['ID_BIMBINGAN' => $id]);
    } 
}
?>
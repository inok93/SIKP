<?php namespace App\Models;
use CodeIgniter\Model;
  
class Kerjapraktek_model extends Model
{
    protected $table = 'kerja_praktek';
      
    public function getKerjapraktek($id = false)
    {
        if($id === false){
            return $this->table('kerja_praktek')
                        ->join('mahasiswa', 'mahasiswa.NIM = kerja_praktek.NIM_KP')
                        ->join('dosen', 'dosen.NIP = kerja_praktek.DOSPEM_KP')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('kerja_praktek')
                        ->join('mahasiswa', 'mahasiswa.NIM = kerja_praktek.NIM_KP')
                        ->join('dosen', 'dosen.NIP = kerja_praktek.DOSPEM_KP')
                        ->where('kerja_praktek.ID_KP', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function insertKerjapraktek($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateKerjapraktek($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ID_KP' => $id]);
    }

    public function deleteKerjapraktek($id)
    {
        return $this->db->table($this->table)->delete(['ID_KP' => $id]);
    } 
}
?>
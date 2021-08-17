<?php namespace App\Models;
use CodeIgniter\Model;
  
class Nilai_model extends Model
{
    protected $table = 'nilai';
      
    public function getNilai($id = false)
    {
        if($id === false){
            return $this->table('nilai')
                        ->join('kerja_praktek', 'kerja_praktek.ID_KP = nilai.ID_KP')
                        ->join('mahasiswa', 'mahasiswa.NIM = nilai.NIM_NILAI')
                        ->join('dosen', 'dosen.NIP = nilai.DOSPEM')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('nilai')
                        ->join('kerja_praktek', 'kerja_praktek.ID_KP = nilai.ID_KP')
                        ->join('mahasiswa', 'mahasiswa.NIM = nilai.NIM_NILAI')
                        ->join('dosen', 'dosen.NIP = nilai.DOSPEM')
                        ->where('nilai.ID_NILAI', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function insertNilai($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateNilai($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ID_NILAI' => $id]);
    }

    public function deleteNilai($id)
    {
        return $this->db->table($this->table)->delete(['ID_NILAI' => $id]);
    } 
}
?>
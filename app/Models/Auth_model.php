<?php namespace App\Models;
use CodeIgniter\Model;
 
class Auth_model extends Model
{
    protected $table = "mahasiswa";
 
    public function cek_login($nama_mahasiswa)
    {
        $query = $this->table('mahasiswa')
                ->where('NAMA_MAHASISWA', $nama_mahasiswa)
                ->countAll();
 
        if($query >  0){
            $hasil = $this->table('mahasiswa')
                    ->where('NAMA_MAHASISWA', $nama_mahasiswa)
                    ->limit(1)
                    ->get()
                    ->getRowArray();
        } else {
            $hasil = array(); 
        }
        return $hasil;
    }
}
?>
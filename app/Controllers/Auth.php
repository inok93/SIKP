<?php namespace App\Controllers;
  
use App\Models\Auth_model;
  
class Auth extends BaseController
{
    protected $helper = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->cek_login();
        $this->auth_model = new Auth_model();
    }
     
    public function index()
    {
        if($this->cek_login() == TRUE){
            return redirect()->to('/dashboard');
        }
        echo view('auth/login');
    }
 
    public function login()
    {
        if($this->cek_login() == TRUE){
            return redirect()->to('/dashboard');
        }
        echo view('auth/login');
    }
 
    public function proses_login()
    {
        $validation =  \Config\Services::validation();
 
        $nama_dashboard  = $this->request->getPost('NAMA_MAHASISWA');
        $pass_dashboard   = $this->request->getPost('PASSWORD_MAHASISWA');
 
        $data = [
            'NAMA_MAHASISWA' => $nama_dashboard,
            'PASSWORD_MAHASISWA' => $pass_dashboard
        ]; 
 
        if($validation->run($data, 'authlogin') == FALSE){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/auth/login');
        } else {
 
            $cek_login = $this->auth_model->cek_login($nama_dashboard);
 
            // email didapatkan
            if($cek_login == TRUE){

                echo($pass_dashboard);
 
                // jika email dan password cocok
                if($pass_dashboard==$cek_login['PASSWORD_MAHASISWA']){
 
                    session()->set('NAMA_MAHASISWA', $cek_login['NAMA_MAHASISWA']);
                    session()->set('name', "MAHASISWA");
                    session()->set('level', "Admin");
                    session()->set('status', "Active");
                     
                    return redirect()->to('/dashboard');          
                // email cocok, tapi password salah
                } else {
                    session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salah'.$cek_login['PASSWORD_MAHASISWA']]);
                    return redirect()->to('/auth/login');
                }
            } else {
                // email tidak cocok / tidak terdaftar
                session()->setFlashdata('errors', ['' => 'Nama yang Anda masukan tidak terdaftar']);
                return redirect()->to('/auth/login');
            }
        }
    }
 
   
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
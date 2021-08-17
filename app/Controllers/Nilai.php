<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Kerjapraktek_model;
use App\Models\Nilai_model;
use App\Models\Mahasiswa_model;
use App\Models\Dosen_model;
  
class Nilai extends Controller
{
    protected $helpers = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->mahasiswa_model = new Mahasiswa_model();
        $this->dosen_model = new Dosen_model();
        $this->kerjapraktek_model = new Kerjapraktek_model();
        $this->nilai_model = new Nilai_model();
    }
 
    public function index()
    {
        $data['nilai'] = $this->nilai_model->getNilai();
        echo view('nilai/index', $data);
    }

    public function create()
    {
        $mahasiswa = $this->mahasiswa_model->getMahasiswa();
        $data['mahasiswa'] = ['' => 'NIM'] + array_column($mahasiswa, 'NIM', 'NIM');

        $dosen = $this->dosen_model->getDosen();
        $data['dosen'] = ['' => 'NIP'] + array_column($dosen, 'NAMA_DOSEN', 'NIP');

        $kerjapraktek = $this->kerjapraktek_model->getKerjapraktek();
        $data['kerjapraktek'] = ['' => 'ID_KP'] + array_column($kerjapraktek, 'JUDUL_KP', 'ID_KP');
        return view('nilai/create', $data);
    }
    
    public function store()
    {
        $validation =  \Config\Services::validation();
    
        // get file upload
    
        $data = array(
            'ID_KP'               => $this->request->getPost('ID_KP'),
            'NAMA_NILAI'          => $this->request->getPost('NAMA_NILAI'),
            'NIM_NILAI'               => $this->request->getPost('NIM_NILAI'),
            'JUDUL_KP_NILAI'             => $this->request->getPost('JUDUL_KP_NILAI'),
            'TEMPAT_KP_NILAI'            => $this->request->getPost('TEMPAT_KP_NILAI'),
            'TANGGAL_NILAI'           => $this->request->getPost('TANGGAL_NILAI'),
            'STATUS'            => $this->request->getPost('STATUS'),
            'DOSPEM'            => $this->request->getPost('DOSPEM'),
            'NILAI'            => $this->request->getPost('NILAI'),
            'KETERANGAN'      => $this->request->getPost('KETERANGAN'),
        );
    
        if($validation->run($data, 'nilai') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('nilai/create'));
        } else {
            // insert
            $simpan = $this->nilai_model->insertNilai($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Data successfully');
                return redirect()->to(base_url('nilai')); 
            }
        }
    }

    public function show($id)
    {  
        $data['nilai'] = $this->nilai_model->getNilai($id);
        echo view('nilai/show', $data);
    }
    
    public function edit($id)
    {  
        $mahasiswa = $this->mahasiswa_model->getMahasiswa();
        $data['mahasiswa'] = ['' => 'NIM'] + array_column($mahasiswa, 'NIM', 'NIM');

        $dosen = $this->dosen_model->getDosen();
        $data['dosen'] = ['' => 'NIP'] + array_column($dosen, 'NAMA_DOSEN', 'NIP');

        $kerjapraktek = $this->kerjapraktek_model->getKerjapraktek();
        $data['kerjapraktek'] = ['' => 'ID_KP'] + array_column($kerjapraktek, 'JUDUL_KP', 'ID_KP');

        $data['nilai'] = $this->nilai_model->getNilai($id);
        echo view('nilai/edit', $data);
    }
    
    public function update()
    {
        $id = $this->request->getPost('ID_NILAI');
    
        $validation =  \Config\Services::validation();
    
        $data = array(
            'ID_KP'               => $this->request->getPost('ID_KP'),
            'NAMA_NILAI'          => $this->request->getPost('NAMA_NILAI'),
            'NIM_NILAI'               => $this->request->getPost('NIM_NILAI'),
            'JUDUL_KP_NILAI'             => $this->request->getPost('JUDUL_KP_NILAI'),
            'TEMPAT_KP_NILAI'            => $this->request->getPost('TEMPAT_KP_NILAI'),
            'TANGGAL_NILAI'           => $this->request->getPost('TANGGAL_NILAI'),
            'STATUS'            => $this->request->getPost('STATUS'),
            'DOSPEM'            => $this->request->getPost('DOSPEM'),
            'NILAI'            => $this->request->getPost('NILAI'),
            'KETERANGAN'      => $this->request->getPost('KETERANGAN'),
        );
        
        if($validation->run($data, 'nilai') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('nilai/edit/'.$id));
        } else {
            // update
            $ubah = $this->nilai_model->updateNilai($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Data successfully');
                return redirect()->to(base_url('nilai')); 
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->nilai_model->deleteNilai($id);
        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted Nilai successfully');
            return redirect()->to(base_url('nilai')); 
        }
    }
    
}
?>
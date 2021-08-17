<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Kerjapraktek_model;
use App\Models\Mahasiswa_model;
use App\Models\Dosen_model;
  
class Kerjapraktek extends Controller
{
    protected $helpers = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->mahasiswa_model = new Mahasiswa_model();
        $this->dosen_model = new Dosen_model();
        $this->kerjapraktek_model = new Kerjapraktek_model();
    }
 
    public function index()
    {
        $data['kerjapraktek'] = $this->kerjapraktek_model->getKerjapraktek();
        echo view('kerjapraktek/index', $data);
    }

    public function create()
    {
        $mahasiswa = $this->mahasiswa_model->getMahasiswa();
        $data['mahasiswa'] = ['' => 'NIM'] + array_column($mahasiswa, 'NIM', 'NIM');

        $dosen = $this->dosen_model->getDosen();
        $data['dosen'] = ['' => 'NIP'] + array_column($dosen, 'NAMA_DOSEN', 'NIP');
        return view('kerjapraktek/create', $data);
    }
    
    public function store()
    {
        $validation =  \Config\Services::validation();
    
        // get file upload
    
        $data = array(
            'NIM_KP'               => $this->request->getPost('NIM_KP'),
            'NAMA_MHS_KP'          => $this->request->getPost('NAMA_MHS_KP'),
            'JUDUL_KP'             => $this->request->getPost('JUDUL_KP'),
            'TEMPAT_KP'            => $this->request->getPost('TEMPAT_KP'),
            'TANGGAL_KP'           => $this->request->getPost('TANGGAL_KP'),
            'DOSPEM_KP'            => $this->request->getPost('DOSPEM_KP'),
            'DISETUJUI_DOSPEM_KP'  => $this->request->getPost('DISETUJUI_DOSPEM_KP'),
            'DISETUJUI_KAPRO'      => $this->request->getPost('DISETUJUI_KAPRO'),
        );
    
        if($validation->run($data, 'kerjapraktek') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kerjapraktek/create'));
        } else {
            // insert
            $simpan = $this->kerjapraktek_model->insertKerjapraktek($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Data successfully');
                return redirect()->to(base_url('kerjapraktek')); 
            }
        }
    }

    public function show($id)
    {  
        $data['kerjapraktek'] = $this->kerjapraktek_model->getKerjapraktek($id);
        echo view('kerjapraktek/show', $data);
    }
    
    public function edit($id)
    {  
        $mahasiswa = $this->mahasiswa_model->getMahasiswa();
        $data['mahasiswa'] = ['' => 'NIM'] + array_column($mahasiswa, 'NIM', 'NIM');

        $dosen = $this->dosen_model->getDosen();
        $data['dosen'] = ['' => 'NIP'] + array_column($dosen, 'NAMA_DOSEN', 'NIP');

        $data['kerjapraktek'] = $this->kerjapraktek_model->getKerjapraktek($id);
        echo view('kerjapraktek/edit', $data);
    }
    
    public function update()
    {
        $id = $this->request->getPost('ID_KP');
    
        $validation =  \Config\Services::validation();
    
        $data = array(
            'NIM_KP'               => $this->request->getPost('NIM_KP'),
            'NAMA_MHS_KP'          => $this->request->getPost('NAMA_MHS_KP'),
            'JUDUL_KP'             => $this->request->getPost('JUDUL_KP'),
            'TEMPAT_KP'            => $this->request->getPost('TEMPAT_KP'),
            'TANGGAL_KP'           => $this->request->getPost('TANGGAL_KP'),
            'DOSPEM_KP'            => $this->request->getPost('DOSPEM_KP'),
            'DISETUJUI_DOSPEM_KP'  => $this->request->getPost('DISETUJUI_DOSPEM_KP'),
            'DISETUJUI_KAPRO'      => $this->request->getPost('DISETUJUI_KAPRO'),
        );
        
        if($validation->run($data, 'kerjapraktek') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kerjapraktek/edit/'.$id));
        } else {
            // update
            $ubah = $this->kerjapraktek_model->updateKerjapraktek($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Data successfully');
                return redirect()->to(base_url('kerjapraktek')); 
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->kerjapraktek_model->deleteKerjapraktek($id);
        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted Kerjapraktek successfully');
            return redirect()->to(base_url('kerjapraktek')); 
        }
    }
    
}
?>
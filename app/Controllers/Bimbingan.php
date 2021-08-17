<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Kerjapraktek_model;
use App\Models\Bimbingan_model;

  
class Bimbingan extends Controller
{
    protected $helpers = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->kerjapraktek_model = new Kerjapraktek_model();
        $this->bimbingan_model = new Bimbingan_model();
    }
 
    public function index()
    {
        $data['bimbingan'] = $this->bimbingan_model->getBimbingan();
        echo view('bimbingan/index', $data);
    }

    public function create()
    {
        $kerjapraktek = $this->kerjapraktek_model->getKerjapraktek();
        $data['kerjapraktek'] = ['' => 'ID_KP'] + array_column($kerjapraktek, 'JUDUL_KP', 'ID_KP');
        return view('bimbingan/create', $data);
    }
    
    public function store()
    {
        $validation =  \Config\Services::validation();
    
        // get file upload
    
        $data = array(
            'ID_KP'               => $this->request->getPost('ID_KP'),
            'URAIAN'          => $this->request->getPost('URAIAN'),
            'VALID'               => $this->request->getPost('VALID'),
        );
    
        if($validation->run($data, 'bimbingan') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('bimbingan/create'));
        } else {
            // insert
            $simpan = $this->bimbingan_model->insertBimbingan($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Data successfully');
                return redirect()->to(base_url('bimbingan')); 
            }
        }
    }

    public function show($id)
    {  
        $data['bimbingan'] = $this->bimbingan_model->getBimbingan($id);
        echo view('bimbingan/show', $data);
    }
    
    public function edit($id)
    {  
        $kerjapraktek = $this->kerjapraktek_model->getKerjapraktek();
        $data['kerjapraktek'] = ['' => 'ID_KP'] + array_column($kerjapraktek, 'JUDUL_KP', 'ID_KP');

        $data['bimbingan'] = $this->bimbingan_model->getBimbingan($id);
        echo view('bimbingan/edit', $data);
    }
    
    public function update()
    {
        $id = $this->request->getPost('ID_BIMBINGAN');
    
        $validation =  \Config\Services::validation();
    
        $data = array(
            'ID_KP'               => $this->request->getPost('ID_KP'),
            'URAIAN'          => $this->request->getPost('URAIAN'),
            'VALID'               => $this->request->getPost('VALID'),
        );
        
        if($validation->run($data, 'bimbingan') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('bimbingan/edit/'.$id));
        } else {
            // update
            $ubah = $this->bimbingan_model->updateBimbingan($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Data successfully');
                return redirect()->to(base_url('bimbingan')); 
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->bimbingan_model->deleteBimbingan($id);
        if($hapus)
        {
            session()->setFlashdata('warning', 'Deleted Bimbingan successfully');
            return redirect()->to(base_url('bimbingan')); 
        }
    }
    
}
?>
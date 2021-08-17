<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Dosen_model;
  
class Dosen extends Controller
{
 
    public function index()
    {
        $model = new Dosen_model();
        $data['dosen'] = $model->getDosen();
        echo view('dosen/index', $data);
    }

	public function create()
	{
		return view('dosen/create');
	}
 
	public function store()
	{
		$validation =  \Config\Services::validation();
	
		$data = array(
			'NIP'     => $this->request->getPost('NIP'),
			'NAMA_DOSEN'     => $this->request->getPost('NAMA_DOSEN'),
			'PASSWORD_DOSEN'   => $this->request->getPost('PASSWORD_DOSEN'),
			'LEVEL'   => $this->request->getPost('LEVEL'),

		);
	
		if($validation->run($data, 'dosen') == FALSE){
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('dosen/create'));
		} else {
			$model = new dosen_model();
			$simpan = $model->insertdosen($data);
			if($simpan)
			{
				session()->setFlashdata('success', 'Created dosen successfully');
				return redirect()->to(base_url('dosen')); 
			}
		}
	}
	public function edit($id)
	{  
		$model = new Dosen_model();
		$data['dosen'] = $model->getDosen($id)->getRowArray();
		echo view('dosen/edit', $data);
	}
	
	public function update()
	{
		$id = $this->request->getPost('NIP');
	
		$validation =  \Config\Services::validation();
	
		$data = array(
			'NIP'     => $this->request->getPost('NIP'),
			'NAMA_DOSEN'     => $this->request->getPost('NAMA_DOSEN'),
			'PASSWORD_DOSEN'   => $this->request->getPost('PASSWORD_DOSEN'),
			'LEVEL'   => $this->request->getPost('LEVEL'),
		);
		
		if($validation->run($data, 'dosen') == FALSE){
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('dosen/edit/'.$id));
		} else {
			$model = new Dosen_model();
			$ubah = $model->updateDosen($data, $id);
			if($ubah)
			{
				session()->setFlashdata('info', 'Updated Dosen successfully');
				return redirect()->to(base_url('dosen')); 
			}
		}
	}

	public function delete($id)
	{
		$model = new Dosen_model();
		$hapus = $model->deleteDosen($id);
		if($hapus)
		{
			session()->setFlashdata('warning', 'Deleted Dosen successfully');
			return redirect()->to(base_url('dosen')); 
		}
	}
}
?>
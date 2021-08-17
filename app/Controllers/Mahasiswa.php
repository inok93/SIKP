<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Mahasiswa_model;
  
class Mahasiswa extends Controller
{
 
    public function index()
    {
        $model = new Mahasiswa_model();
        $data['mahasiswa'] = $model->getMahasiswa();
        echo view('mahasiswa/index', $data);
    }

	public function create()
	{
		return view('mahasiswa/create');
	}
 
	public function store()
	{
		$validation =  \Config\Services::validation();
	
		$data = array(
			'NIM'     => $this->request->getPost('NIM'),
			'NAMA_MAHASISWA'     => $this->request->getPost('NAMA_MAHASISWA'),
			'PASSWORD_MAHASISWA'   => $this->request->getPost('PASSWORD_MAHASISWA'),
		);
	
		if($validation->run($data, 'mahasiswa') == FALSE){
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('mahasiswa/create'));
		} else {
			$model = new mahasiswa_model();
			$simpan = $model->insertmahasiswa($data);
			if($simpan)
			{
				session()->setFlashdata('success', 'Created mahasiswa successfully');
				return redirect()->to(base_url('mahasiswa')); 
			}
		}
	}
	public function edit($id)
	{  
		$model = new Mahasiswa_model();
		$data['mahasiswa'] = $model->getMahasiswa($id)->getRowArray();
		echo view('mahasiswa/edit', $data);
	}
	
	public function update()
	{
		$id = $this->request->getPost('NIM');
	
		$validation =  \Config\Services::validation();
	
		$data = array(
			'NIM'     => $this->request->getPost('NIM'),
			'NAMA_MAHASISWA'     => $this->request->getPost('NAMA_MAHASISWA'),
			'PASSWORD_MAHASISWA'   => $this->request->getPost('PASSWORD_MAHASISWA'),
		);
		
		if($validation->run($data, 'mahasiswa') == FALSE){
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('mahasiswa/edit/'.$id));
		} else {
			$model = new Mahasiswa_model();
			$ubah = $model->updateMahasiswa($data, $id);
			if($ubah)
			{
				session()->setFlashdata('info', 'Updated Mahasiswa successfully');
				return redirect()->to(base_url('mahasiswa')); 
			}
		}
	}

	public function delete($id)
	{
		$model = new Mahasiswa_model();
		$hapus = $model->deleteMahasiswa($id);
		if($hapus)
		{
			session()->setFlashdata('warning', 'Deleted Mahasiswa successfully');
			return redirect()->to(base_url('mahasiswa')); 
		}
	}
}
?>
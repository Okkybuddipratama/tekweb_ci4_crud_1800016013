<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\User_model;
 
class User_login extends Controller
{
    public function index()
    {
        $model = new User_model();
        $data['akun']  = $model->getakun()->getResult();
        echo view('/User_view', $data);
    }
 
    public function save()
    {
        $model = new User_model();
        $data = array(
            'akunid'        => $this->request->getPost('akunid'),
            'nama'       => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        );
        $model->saveakun($data);
        return redirect()->to(base_url('/User_login'));
    }
 
    public function update()
    {
        $model = new User_Model();
        $id = $this->request->getPost('akunid');
        $data = array(
            'akunid'        => $this->request->getPost('akunid'),
            'nama'       => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        );
        $model->updateakun($data, $id);
        return redirect()->to(base_url('/User_login'));
    }
 
    public function delete()
    {
        $model = new User_model();
        $id = $this->request->getPost('akunid');
        $model->deleteakun($id);
        return redirect()->to(base_url('/User_login'));
    }
 
}
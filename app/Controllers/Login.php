<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_user;

class Login extends Controller
{

    public function __construct()
    {
        helper('form');
        $this->M_user = new M_user();
    }

	public function index()
	{
		return view('form_login');
    }
    
    public function login_action()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $this->M_user->get_data($email, $password);

        if (($cek['email_user'] == $email) && ($cek['password_user'] == $password))
        {
            session()->set('email_user', $cek['email_user']);
            session()->set('nama_user', $cek['nama_user']);
            session()->set('id_user', $cek['id_user']);
            return redirect()->to(base_url('User_login'));
        } else {
            session()->setFlashdata('gagal','Email / Password Anda Salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

}

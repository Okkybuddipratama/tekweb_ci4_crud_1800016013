<?php namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
	public function get_data($email, $password)
	{
        return $this->db->table('user')
        ->where(array('email_user' => $email, 'password_user' => $password))
        ->get()->getRowArray();
	}

}

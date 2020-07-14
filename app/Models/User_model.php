<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class User_model extends Model
{
     protected $table = 'akun';

    public function getakun()
    {
        $builder = $this->db->table('akun');
        $builder->select('*');
        return $builder->get();
    }
 
    public function saveakun($data){
        $query = $this->db->table('akun')->insert($data);
        return $query;
    }
 
    public function updateakun($data, $id)
    {
        $query = $this->db->table('akun')->update($data, array('akunid' => $id));
        return $query;
    }
 
    public function deleteakun($id)
    {
        $query = $this->db->table('akun')->delete(array('akunid' => $id));
        return $query;
    } 
 
   
}
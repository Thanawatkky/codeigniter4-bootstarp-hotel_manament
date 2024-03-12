<?php namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'fname', 'lname', 'email', 'password', 'user_role', 'user_img', 'updated_at'];

}



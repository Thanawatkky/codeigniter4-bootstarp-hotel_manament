<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index() {
        helper('form');
        $data = [];
        return view('register',$data);
    }
    public function save() {
        helper('form');
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'fname' => 'required|min_length[5]|max_length[50]',
            'lname' => 'required|min_length[5]|max_length[50]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tb_user.email]',
            'password' => 'required|min_length[6]|max_length[200]',
        ];
        if($this->validate($rules)) {
            $model = new UserModel();
            if($this->request->getFile('user_img') != "") {
                $file = $this->request->getFile('user_img');
                $fileName = $file->getName();
                $file->move("img/profile/");
            }else{
                $fileName = 'avatar.jpg';
            }
            $data = [
                'username' => $this->request->getVar('username'),
                'fname' => $this->request->getVar('fname'),
                'lname' => $this->request->getVar('lname'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'user_img'=>$fileName,
                'user_role'=>2,
            ];
            $query = $model->insert($data);
                return $this->response->redirect(base_url('Login'));            
            }else{
            $data['validation'] = $this->validator;
            return view('register',$data);
        }
    }
}
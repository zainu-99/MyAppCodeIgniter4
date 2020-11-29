<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('login');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'userid'    => $data['userid'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'address'    => $data['address'],
                    'avatar'    => $data['avatar'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url());
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url().'/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to(base_url().'/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url().'/login');
    }
} 
 
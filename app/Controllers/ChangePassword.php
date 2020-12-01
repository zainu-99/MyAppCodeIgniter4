<?php namespace App\Controllers;
use App\Models\UserModel;
class ChangePassword extends BaseController
{
	public function __construct()
    {
        $this->model = new UserModel();
    }
	public function index()
	{
		Session()->set("pagename","Change Password");
		return view('appdashboard/setting/changepassword/index');
	}
	public function edit($id=null)
    {
		$password = $this->request->getVar('current_password');
		$user = $this->model->where('id',Session()->get("id"))->get()->getRow();
        $verify_pass = password_verify($password, $user->password);
		if($verify_pass)
		{ 
            if($this->request->getPost('confirm_password')== $this->request->getPost('new_password'))  
            {
						$data = [
                            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
						];
						$this->model->set($data)->where('id',Session()->get("id"))->update();  
						Session()->setFlashdata('success', 'Password was be changed');
            }
            else
            {         
						Session()->setFlashdata('failed', 'new password and confirm password not match');        
            }
        }
        else
        {
					Session()->setFlashdata('failed', 'wrong password');                    
		}
		return redirect()->to(base_url(current_url().'/../..'));
	}

}

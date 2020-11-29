<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class User extends Controller
{
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function apigetusers()
    {
        //return Datatables::of(User::selectRaw('*')->get())->make(true);
    }
    public function index()
    {	
		Session()->set("pagename","Menu Master");
		$data['list']= $this->model->get()->getResult();
		return view('appdashboard/adminsystem/user/index',$data);
    }
    public function add()
    {
       if(is_null($this->request->getPost('submit'))) return view("appdashboard/adminsystem/user/add");
       else
       {
            $data = [
                'userid' => $this->request->getPost('userid'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'no_hp' => $this->request->getPost('no_hp'),
                'address' => $this->request->getPost('address'),
                'gender' => $this->request->getPost('gender'),
                'status' => 1,
                'avatar' => $this->request->getPost('avatar'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => null,
                'remember_token' => null,
                'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
            ];
            $this->model->save($data);
            return redirect()->to(base_url());
       }
    }
    public function edit($id)
    {
        if(is_null($this->request->getPost('submit'))) return view("appdashboard/adminsystem/user/edit");
        else
        {
            $data = [
                'userid' => $this->request->getPost('userid'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'no_hp' => $this->request->getPost('no_hp'),
                'address' => $this->request->getPost('address'),
                'gender' => $this->request->getPost('gender'),
                'status' => 1,
                'avatar' => $this->request->getPost('avatar'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => null,
                'remember_token' => null,
                'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
            ];
            $this->model->update($data,['id' => $id]);
            return redirect()->to(base_url());
        }   
    }
    public function delete($id)
    {
        $this->model->delete(['id' => $id]);
        return redirect()->to(base_url());
    }  
}
 
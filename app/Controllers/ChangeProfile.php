<?php namespace App\Controllers;
use App\Models\UserModel;
class ChangeProfile extends BaseController
{
	public function __construct()
    {
        $this->model = new UserModel();
    }
	public function index()
	{
		Session()->set("pagename","Change Profile");
		$data["item"] = $this->model->where('id',Session()->get("id"))->get()->getRow();
		return view('appdashboard/setting/changeprofile/index',$data);
	}
	public function edit($id=null)
    {
		$data = [
			'name' => $this->request->getPost('name'),
			'email' => $this->request->getPost('email'),
			'no_hp' => $this->request->getPost('no_hp'),
			'address' => $this->request->getPost('address'),
			'gender' => $this->request->getPost('gender'),
			'status' => 1
		];
		$this->model->set($data)->where('id',Session()->get("id"))->update();
		Session()->setFlashdata('msg', 'Data was be updated');
		return redirect()->to(base_url(current_url().'/../..'));
	}

}

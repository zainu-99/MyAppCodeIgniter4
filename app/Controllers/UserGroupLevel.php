<?php namespace App\Controllers;
use App\Models\UserGroupLevelModel;
class UserGroupLevel extends BaseController
{
	public function __construct()
    {
        $this->model = new UserGroupLevelModel();
    }
	public function index($iduser)
    {	
		Session()->set("pagename","User Group");
        $data['list']= $this->model->Recursion($iduser,null);
		return view('appdashboard/adminsystem/user/usergroup/index',$data);
    }
    public function add($iduser)
    {
        if($this->request->getPost('is_checked') == 0)
        {
            $this->model->where('id_user',$iduser)->where('id_group_level',$this->request->getPost('id_group_level'))->delete();
            return "<p>Delete<p>";
        }
        else
        {
            $this->model->where('id_user',$iduser)->where('id_group_level',$this->request->getPost('id_group_level'))->delete();
            $data = [
                'id_user' => $iduser,
                'id_group_level' => $this->request->getPost('id_group_level'),
                'created_at' => date("Y-m-d H:i:s")
            ];
            $this->model->save($data);
            return "<p>Insert<p>";
        }
    }
}

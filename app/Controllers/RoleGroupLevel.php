<?php namespace App\Controllers;
use App\Models\RoleModel;
use App\Models\RoleGroupLevelModel;
class RoleGroupLevel extends BaseController
{
	public function __construct()
    {
        $this->role = new RoleModel();
        $this->model = new RoleGroupLevelModel();
    }
	public function index($id)
    {	
		Session()->set("pagename","Role Group");
		$data['list']= $this->role->select("roles.*,b.isview,b.isadd,b.isedit,b.isdelete,b.isprint,b.iscustom")->join("(select * from role_group_level where id_group_level='".$id."') as b","b.id_role=roles.id","left")->orderby("url")->orderby("name")->get()->getResult();
		return view('appdashboard/adminsystem/grouplevel/rolegroup/index',$data);
    }
    public function add($idgroup)
    {
       $is_exist = $this->model->where('id_group_level',$idgroup)->where('id_role',$this->request->getPost('id_role'))->countAllResults();
       if($is_exist==0)
       {
            $data = [
                'id_group_level' => $idgroup,
                'id_role' => $this->request->getPost('id_role'),
                'isview' =>  $this->request->getPost('isview'),
                'isadd' =>  $this->request->getPost('isadd'),
                'isedit' =>  $this->request->getPost('isedit'),
                'isdelete' =>  $this->request->getPost('isdelete'),
                'isprint' =>  $this->request->getPost('isprint'),
                'iscustom' =>  $this->request->getPost('iscustom'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => null
            ];
            $this->model->save($data);
           return "insert";
       }
       else
       {
            $data = [
                'isview' =>  $this->request->getPost('isview'),
                'isadd' =>  $this->request->getPost('isadd'),
                'isedit' =>  $this->request->getPost('isedit'),
                'isdelete' =>  $this->request->getPost('isdelete'),
                'isprint' =>  $this->request->getPost('isprint'),
                'iscustom' =>  $this->request->getPost('iscustom'),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            $this->model->set($data)->where('id_group_level',$idgroup)->where('id_role',$this->request->getPost('id_role'))->update();
            return "update";
       }
    }  
}

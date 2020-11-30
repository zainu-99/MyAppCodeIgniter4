<?php namespace App\Controllers;
use App\Models\GroupLevelModel;
use App\Models\RoleModel;
use App\Models\UserRoleModel;
class UserRole extends BaseController
{
	public function __construct()
    {
        $this->grouplevel = new GroupLevelModel();
        $this->role = new RoleModel();
        $this->model = new UserRoleModel();
    }
	public function index($iduser)
    {
        Session()->set("pagename","User Role");
        $id_user = (isset($iduser)?$iduser:'-1');
        $id_group_level = (!is_null($this->request->getGet('id_group_level'))?$this->request->getGet('id_group_level'):'-1');
        $data['groupLevels'] = $this->grouplevel->select("group_level.*,groups.name")->join("groups","groups.id=group_level.id_group","left")->join('user_group_level','user_group_level.id_group_level=group_level.id','left')->where('user_group_level.id_user',$id_user)->get()->getResult();
        
        $data['list'] =$this->role->select("roles.*,c.isview,c.isadd,c.isedit,c.isdelete,c.isprint,c.iscustom,b.allow_view,b.allow_add,b.allow_edit,b.allow_delete,b.allow_print,b.allow_custom")->join("(select * from user_role where id_user='".$id_user."') as b","b.id_role=roles.id","left")->join('role_group_level as c','roles.id=c.id_role',"left")->orderby("roles.url")->OrderBy("roles.name")->where('c.id_group_level',$id_group_level)->where('1 in (isview,isadd,isedit,isdelete,isprint,iscustom)')->get()->getResult();
        return view("appdashboard/adminsystem/user/userrole/index", $data);
    }

    public function add($iduser)
    {
        $is_exist = $this->model->where('id_user',$iduser)->where('id_role',$this->request->getPost('id_role'))->countAllResults();
        if($is_exist==0)
        {
            $data = [
                'id_user' => $iduser,
                'id_role' => $this->request->getPost('id_role'),
                'allow_view' =>  $this->request->getPost('allow_view'),
                'allow_add' =>  $this->request->getPost('allow_add'),
                'allow_edit' =>  $this->request->getPost('allow_edit'),
                'allow_delete' =>  $this->request->getPost('allow_delete'),
                'allow_print' =>  $this->request->getPost('allow_print'),
                'allow_custom' =>  $this->request->getPost('allow_custom'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => null
            ];
            $this->model->save($data);
            return "insert";
        }
        else
        {
            $data = [
                'allow_view' =>  $this->request->getPost('allow_view'),
                'allow_add' =>  $this->request->getPost('allow_add'),
                'allow_edit' =>  $this->request->getPost('allow_edit'),
                'allow_delete' =>  $this->request->getPost('allow_delete'),
                'allow_print' =>  $this->request->getPost('allow_print'),
                'allow_custom' =>  $this->request->getPost('allow_custom'),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            $this->model->set($data)->where('id_user',$iduser)->where('id_role',$this->request->getPost('id_role'))->update();
            return "update";
        }
    }
}

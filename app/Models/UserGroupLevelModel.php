<?php namespace App\Models;
 
use CodeIgniter\Model;

class UserGroupLevelModel extends Model
{
    protected $table = "user_group_level";
    protected $allowedFields = ['id', 'id_user', 'id_group_level', 'created_at', 'updated_at'];
    public function Recursion($iduser,$idParent)
    {
        $grouplevel = new GroupLevelModel();
        $menu = $grouplevel->select("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id and id_user = '".$iduser."') as isjoin")->join("groups","groups.id=group_level.id_group","left")->where("group_level_id ",$idParent)->get()->getResult();
        $arr = Array();
        foreach($menu as $key=>$item)
		{
            $item->child = $this->Recursion($iduser,$item->id);
			$arr[] = $item;
        }
        return $arr;
    }
}

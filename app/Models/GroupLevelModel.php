<?php namespace App\Models;
 
use CodeIgniter\Model;
class GroupLevelModel extends Model
{
    protected $table = "group_level";
    protected $allowedFields = ['id', 'id_group', 'group_level_id', 'note', 'created_at', 'updated_at'];

    public function Recursion($idParent)
    {
        $menu = $this->select("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id ) as isjoin")->join("groups","groups.id=group_level.id_group","left")->where("group_level_id ",$idParent)->get()->getResult();
        $arr = Array();
        foreach($menu as $key=>$item)
		{
            $item->child = $this->Recursion($item->id);
			$arr[] = $item;
        }
        return $arr;
    }

}

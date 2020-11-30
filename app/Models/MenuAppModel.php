<?php namespace App\Models;
 
use CodeIgniter\Model;
class MenuAppModel extends Model
{
    protected $table = "menu_app";
    protected $allowedFields = ['id', 'id_role', 'menu_text', 'menu_app_id', 'icon', 'order_sort', 'created_at', 'updated_at'];
    public function Recursion($idParent)
    {
        $menu = $this->select('menu_app.*,roles.name as role_name,roles.url as role_url')->join('roles','menu_app.id_role = roles.id','left')->join('user_role','user_role.id_role = roles.id','left')->join('users','user_role.id_user = users.id','left')->where("menu_app.menu_app_id",$idParent)->get()->getResult();
        $arr = Array();
        foreach($menu as $key=>$item)
		{
            $item->child = $this->Recursion($item->id);
			$arr[] = $item;
        }
        return $arr;
    }
}

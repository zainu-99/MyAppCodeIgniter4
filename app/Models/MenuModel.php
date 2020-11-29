<?php namespace App\Models;
 
use CodeIgniter\Model;
class MenuModel extends Model
{
    protected $table = "menu_app";

    public function Menus()
    {
        $id = Session()->get("id");
        return $this->hasMany(Menu::class,'menu_app_id')->select('menu_app.*','roles.name as role_name','roles.url as role_url')->leftJoin('roles','menu_app.id_role','roles.id')->leftJoin('user_role','user_role.id_role','roles.id')->leftJoin('users','user_role.id_user','users.id')->where('users.id',$id)->where('user_role.allow_view',1)->orderBy('order_sort');
    }

    public function childrenMenus()
    {
        $id = Session()->get("id");
        return $this->hasMany(Menu::class,'menu_app_id')->select('menu_app.*','roles.name as role_name','roles.url as role_url')->leftJoin('roles','menu_app.id_role','roles.id')->leftJoin('user_role','user_role.id_role','roles.id')->leftJoin('users','user_role.id_user','users.id')->where('users.id',$id)->where('user_role.allow_view',1)->orderBy('order_sort')->with('Menus');
    }
}

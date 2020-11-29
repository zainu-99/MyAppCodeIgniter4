<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\MenuModel;
 
class User extends Controller
{
    public function index()
    {
        $model = new MenuModel();
		$menu= $model->Recursion(null);
		Session()->set("menuapp",$menu);
		Session()->set("pagename","User");
		return view('appdashboard/index');
    }
    public function add()
	{

	}
	public function edit()
	{
		
	}
	public function delete()
	{
		
	}
	public function print()
	{
		
	}
	public function custom()
	{
		
	}
}
 
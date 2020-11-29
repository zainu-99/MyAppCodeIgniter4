<?php namespace App\Controllers;
use App\Models\MenuModel;
class MenuApp extends BaseController
{
	public function index()
	{
		$model = new MenuModel();
		$menu= $model->Recursion(null);
		Session()->set("menuapp",$menu);
		Session()->set("pagename","Menu Master");
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
}

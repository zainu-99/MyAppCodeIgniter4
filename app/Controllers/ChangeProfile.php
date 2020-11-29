<?php namespace App\Controllers;
use App\Models\MenuModel;
class ChangeProfile extends BaseController
{
	public function index()
	{
		$model = new MenuModel();
		$menu= $model->Recursion(null);
		Session()->set("menuapp",$menu);
		Session()->set("pagename","Change Profile");
		return view('appdashboard/index');
	}
	public function edit()
	{
		
	}
}

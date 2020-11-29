<?php namespace App\Controllers;
use App\Models\MenuModel;
class ChangePassword extends BaseController
{
	public function index()
	{
		$model = new MenuModel();
		$menu= $model->Recursion(null);
		Session()->set("menuapp",$menu);
		Session()->set("pagename","Change Password");
		return view('appdashboard/index');
	}
	public function edit()
	{
		
	}
}

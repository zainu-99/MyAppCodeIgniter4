<?php namespace App\Controllers;
use App\Models\MenuModel;
class Home extends BaseController
{
	public function index()
	{
		$model = new MenuModel();
		$menu= $model->Recursion(null);
		Session()->set("menuapp",$menu);
		Session()->set("pagename","Dashboard");
		return view('appdashboard/index');
	}
}

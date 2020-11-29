<?php namespace App\Controllers;
use App\Models\MenuModel;
class Home extends BaseController
{
	public function index()
	{
		$model = new MenuModel();
		$menu = $model->select('*')->where('menu_app_id',null)->get();
		Session()->set("menuApp",$menu);
		Session()->set("pagename","Home");
		return view('appdashboard/index');
	}

	//--------------------------------------------------------------------

}

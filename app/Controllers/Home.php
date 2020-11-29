<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		Session()->set("pagename","Home");
		return view('appdashboard/index');
	}

	//--------------------------------------------------------------------

}

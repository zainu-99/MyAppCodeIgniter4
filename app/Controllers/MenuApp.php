<?php namespace App\Controllers;
use App\Models\MenuAppModel;
use App\Models\RoleModel;
class MenuApp extends BaseController
{
	public function __construct()
    {
        $this->model = new MenuAppModel();
        $this->role = new RoleModel();
    }
	public function index()
    {	
		Session()->set("pagename","Menu Master");
		$data['list']= $this->model->Recursion(null);
		return view('appdashboard/masterdata/menu/index',$data);
    }
    public function add()
    {
       if(is_null($this->request->getPost('submit'))){
            $data['parents']= $this->model->get()->getResult();
            $data['roles']= $this->role->orderby('name')->get()->getResult();
            return view("appdashboard/masterdata/menu/add",$data);
       }
       else
       {
            $data = [
                'id_role' => $this->request->getPost('id_role'),
                'menu_text' => $this->request->getPost('menu_text'),
                'menu_app_id' => ($this->request->getPost('id_parent') == "-"? NULL: $this->request->getPost('id_parent')),
                'icon' =>$this->request->getPost('icon'),
                'order_sort' => $this->request->getPost('order_sort'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => null
            ];
            $this->model->save($data);
            Session()->setFlashdata('msg', 'Data was be saved');
            return redirect()->to(current_url());
       }
    }
    public function edit($id=null)
    {
        if(is_null($this->request->getPost('submit')))
        {
            $data['parents']= $this->model->where('id <> ',$id)->get()->getResult();
            $data['roles']= $this->role->orderby('name')->get()->getResult();
            $data['item'] = $this->model->where('id',$id)->get()->getRow();
            return view("appdashboard/masterdata/menu/edit",$data);
        }
        else
        {
            $data = [
                'id_role' => $this->request->getPost('id_role'),
                'menu_text' => $this->request->getPost('menu_text'),
                'menu_app_id' => ($this->request->getPost('id_parent') == "-"? NULL: $this->request->getPost('id_parent')),
                'icon' =>$this->request->getPost('icon'),
                'order_sort' => $this->request->getPost('order_sort'),
                'updated_at' =>date("Y-m-d H:i:s")
            ];
            $this->model->update(['id' => $id],$data);
            Session()->setFlashdata('msg', 'Data was be saved');
            return redirect()->to(current_url());
        }
    }
    public function delete($id=null)
    {
        $back = current_url()."/../..";
        $this->model->delete(['id' => $id]);
        return redirect()->to(base_url(current_url().'/../..'));
    } 
}

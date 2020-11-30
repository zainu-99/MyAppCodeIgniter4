<?php namespace App\Controllers;
use App\Models\RoleModel;
class Role extends BaseController
{
	public function __construct()
    {
        $this->model = new RoleModel();
    }
	public function index()
    {	
		Session()->set("pagename","Role Master");
		$data['list']= $this->model->orderby("url")->get()->getResult();
		return view('appdashboard/masterdata/role/index',$data);
    }
    public function add()
    {
       if(is_null($this->request->getPost('submit'))) return view("appdashboard/masterdata/role/add");
       else
       {
            $data = [
                'name' => $this->request->getPost('name'),
				'note' => $this->request->getPost('note'),
                'url' => (($this->request->getPost('url')=='')?NULL:$this->request->getPost('url')),
                'controller' => $this->request->getPost('controller'),
                'accessview' =>  (is_null($this->request->getPost('accessview'))?0:1),
                'accessadd' =>  (is_null($this->request->getPost('accessadd'))?0:1),
                'accessedit' =>  (is_null($this->request->getPost('accessedit'))?0:1),
                'accessdelete' =>  (is_null($this->request->getPost('accessdelete'))?0:1),
                'accessprint' =>  (is_null($this->request->getPost('accessprint'))?0:1),
                'accesscustom' =>  (is_null($this->request->getPost('accesscustom'))?0:1),
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
            $item = $this->model->where('id',$id)->get()->getRow();
            return view("appdashboard/masterdata/role/edit", ["item"=>$item]);
        }
        else
        {
            $data = [
                    'name' => $this->request->getPost('name'),
                    'note' => $this->request->getPost('note'),
                    'url' => (($this->request->getPost('url')=='')?NULL:$this->request->getPost('url')),
                    'controller' => $this->request->getPost('controller'),
                    'accessview' =>  (is_null($this->request->getPost('accessview'))?0:1),
                    'accessadd' =>  (is_null($this->request->getPost('accessadd'))?0:1),
                    'accessedit' =>  (is_null($this->request->getPost('accessedit'))?0:1),
                    'accessdelete' =>  (is_null($this->request->getPost('accessdelete'))?0:1),
                    'accessprint' =>  (is_null($this->request->getPost('accessprint'))?0:1),
                    'accesscustom' =>  (is_null($this->request->getPost('accesscustom'))?0:1),
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

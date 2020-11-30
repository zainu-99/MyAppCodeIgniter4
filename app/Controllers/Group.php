<?php namespace App\Controllers;
use App\Models\GroupModel;
class Group extends BaseController
{
	public function __construct()
    {
        $this->model = new GroupModel();
    }
	public function index()
    {	
		Session()->set("pagename","Menu Master");
		$data['list']= $this->model->get()->getResult();
		return view('appdashboard/masterdata/group/index',$data);
    }
    public function add()
    {
       if(is_null($this->request->getPost('submit'))) return view("appdashboard/masterdata/group/add");
       else
       {
            $data = [
                'name' => $this->request->getPost('name'),
                'note' => $this->request->getPost('note'),
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
            return view("appdashboard/masterdata/group/edit", ["item"=>$item]);
        }
        else
        {
            $data = [
                    'name' => $this->request->getPost('name'),
					'note' => $this->request->getPost('note'),
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

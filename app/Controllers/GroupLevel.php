<?php namespace App\Controllers;
use App\Models\GroupLevelModel;
use App\Models\GroupModel;
class GroupLevel extends BaseController
{
	public function __construct()
    {
        $this->model = new GroupLevelModel();
        $this->groups = new GroupModel();
    }
	public function index()
    {	
		Session()->set("pagename","Menu Master");
        $data['groups']= $this->groups->get()->getResult();
        $data['groupLevels']= $this->model->Recursion(NULL);
        $data['list'] = $this->model->Recursion(NULL);
        return view('appdashboard/adminsystem/grouplevel/index',$data);
    }
    public function add()
    {
        $data = [
            'id_group' => $this->request->getPost('id_group'),
            'group_level_id' => ($this->request->getPost('group_level_id') == -1? NULL: $this->request->getPost('group_level_id')),
            'note' => $this->request->getPost('note'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => null
        ];
        $this->model->save($data);
        Session()->setFlashdata('msg', 'Data was be saved');
        return redirect()->to(base_url(current_url().'/..'));
    }
    public function edit($id=null)
    {
        $data = [
            'id_group' => $this->request->getPost('id_group'),
            'group_level_id' => ($this->request->getPost('group_level_id') == "-1"? NULL: $this->request->getPost('group_level_id')),
            'note' => $this->request->getPost('note'),
            'updated_at' =>date("Y-m-d H:i:s")
        ];
        $this->model->update(['id' => $id],$data);
        Session()->setFlashdata('msg', 'Data was be saved');
        return redirect()->to(base_url(current_url().'/../..'));
    }
    public function delete($id=null)
    {
        $this->model->delete(['id' => $id]);
        return redirect()->to(base_url(current_url().'/../..'));
    } 
}

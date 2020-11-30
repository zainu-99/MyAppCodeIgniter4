<?php namespace App\Models;
 
use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = "roles";
    protected $allowedFields = ['id', 'name', 'note', 'url', 'controller', 'accessview', 'accessadd', 'accessedit', 'accessdelete', 'accessprint', 'accesscustom', 'created_at', 'updated_at'];
}

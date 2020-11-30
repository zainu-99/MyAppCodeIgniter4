<?php namespace App\Models;
 
use CodeIgniter\Model;

class RoleGroupLevelModel extends Model
{
    protected $table = "role_group_level";
    protected $allowedFields = ['id', 'id_role', 'id_group_level', 'isview', 'isadd', 'isedit', 'isdelete', 'isprint', 'iscustom', 'created_at', 'updated_at'];
}

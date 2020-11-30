<?php namespace App\Models;
 
use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = "user_role";
    protected $allowedFields = ['id', 'id_user', 'id_role', 'allow_view', 'allow_add', 'allow_edit', 'allow_delete', 'allow_print', 'allow_custom', 'created_at', 'updated_at'];
}

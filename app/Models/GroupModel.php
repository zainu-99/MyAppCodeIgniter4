<?php namespace App\Models;
 
use CodeIgniter\Model;
class GroupModel extends Model
{
    protected $table = "groups";
    protected $allowedFields = ['name','note','created_at','updated_at'];
}

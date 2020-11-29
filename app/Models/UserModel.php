<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['userid','name','email','no_hp','address','avatar','gender','status','password','created_at','updated_at'];
}
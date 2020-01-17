<?php


namespace App\Entities\Classes;


use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = "classes";
    protected $fillable = ['name','description'];

}

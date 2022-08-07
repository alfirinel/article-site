<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name','article'];

    public function user(){
        return $this -> belongsTo(User::class);
    }
}

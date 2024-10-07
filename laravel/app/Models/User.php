<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['name', 'username', 'email','phone','website','companyname'];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}

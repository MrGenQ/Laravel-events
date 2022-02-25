<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = ['fname', 'email', 'phone', 'status', 'event_id'];
    public function events(){
        return $this->hasMany(Events::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}

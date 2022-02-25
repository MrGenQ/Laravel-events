<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Events extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'date', 'description', 'logo', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function registration(){
        return $this->belongsTo(Registration::class);
    }
}

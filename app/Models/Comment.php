<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brewery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    protected $fillable = ['comments','rate','user_id','brewery_id'];

    use HasFactory;

    public function brewery(){
        return $this->belongsTo(Brewery::class);        
    }
    public function user(){
        return $this->belongsTo(User::class);        
    }    
}

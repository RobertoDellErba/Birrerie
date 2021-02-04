<?php

namespace App\Models;

use App\Models\Beer;
use App\Models\Comment;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brewery extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comment::class);        
    }

    public function beers(){
        return $this->belongsToMany(Beer::class);
    }
    
    public function toSearchableArray()
    {

        $birre = $this->beers()->pluck('name')->join(', ');

        $array = [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'altro'=> 'birrerie birra',
            'birre'=> $birre
        ];

        return $array;
    }
}


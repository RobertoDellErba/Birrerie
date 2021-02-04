<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Spatie\Image\Image;
use Illuminate\Http\Request;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBreweries;

class BreweryController extends Controller
{
    public function store(StoreBreweries $request){

         $img = $request->file('img')->store('/temp'); 
           
         $fileName = basename($img);
         $srcPath = storage_path() . '/app/temp/' . $fileName; 
        //  $destPath = storage_path() . '/app/public/media/' . $fileName; 
         $destPath = public_path() .'/media/' . $fileName; 
         $imgPath = '/media/' . $fileName;    

         $imgCrop = Image::load($srcPath)->crop(Manipulations::CROP_TOP_RIGHT, 600, 400)->save($destPath);          
     
        $breweries = Brewery::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'img'=> $imgPath,
            'lat'=> $request->lat,
            'lon'=> $request->lon,
            'address'=> $request->addr,
            ]);
     
        return redirect()->back()->with('notified','La tua birreria preferita è ora stata segnalata!');


    }

    public function approve($id){
        $user = Auth::user();
        if($user && $user->role =='admin'){            
            $brewery = Brewery::find($id);
            $brewery->is_approved = true;
            $brewery->save();
        }
        return redirect(route('breweries'));
    }


   public function beersSync($id, Request $request){

    $beer_ids = $request->input('beer_ids');
    $brewery = Brewery::find($id);
    $brewery->beers()->sync($beer_ids);
    
    return redirect()->back();

   } 
}

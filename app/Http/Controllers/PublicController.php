<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
   public function home()
   {
     
      $breweries = Brewery::where('is_approved',true)->orderBy('id','desc')->get();

    return view('welcome', compact('breweries'));

   } 

//Contact functions
   public function about()
   {

    return view('about');

   } 

   public function send(Request $request)
   {
       
    $bag = $request->all();
    $contactMail = new ContactReceived($bag);

    Mail::to('gino@gino.com')->send($contactMail);

    return view('thankyou');

   } 

  
 //End Contact  



   public function team()
   {

      $team = [

         ['name' => 'Member1',
          'surname'=> 'Staff',
          'role'=> 'Ambassador',
          'img'=> '/media/myAvatar.png',  
         ],

         ['name' => 'Member2',
          'surname'=> 'Staff',
          'role'=> 'Ambassador',
          'img'=> '/media/myAvatar2.png',  
          ],

         ['name' => 'Member3',
          'surname'=> 'Staff',
          'role'=> 'Ambassador',
          'img'=> '/media/myAvatar3.png',  
          ],

            ['name' => 'Member4',
          'surname'=> 'Staff',
          'role'=> 'Ambassador',
          'img'=> '/media/myAvatar4.png',  
            ],

         ['name' => 'Member5',
          'surname'=> 'Staff',
          'role'=> 'Ambassador',
          'img'=> '/media/myAvatar5.png',  
            ],

         ];

    return view('team', compact('team'));

   } 

   public function search(Request $request)
   {
      $query = $request->input('query');
      $breweries = Brewery::search($query)->where('is_approved', true)->orderBy('id','desc')->paginate(9);

      return view('breweries', compact('query','breweries'));
   } 

    public function show($id)
   {
      
      $user = Auth::user();
      if($user && $user->role =='admin'){          
         $brewery = Brewery::find($id);
         
      }else{
         $brewery = Brewery::where('is_approved',true)->find($id);
         
      } 
      
      if($brewery == null){

         return "Birreria non trovata";

      }

      $comments = Comment::where('brewery_id',$id)->orderBy('created_at','desc')->get();
      $beers = Beer::all();
      
      return view('show', compact('brewery','comments','beers','user'));
   } 

   public function comments(Request $request, $id)
   {
      $user = Auth::user();
      if($user){         
         $comments = $user->comments()->create([
            'comments' => $request->comment,
            'rate'=> $request->rate,
            'brewery_id' =>$id
            ]);
         }
         return redirect()->back();
   }    

   public function breweries()
   {
      $query = false;
      $user = Auth::user();
      if($user && $user->role =='admin'){            
         $breweries = Brewery::orderBy('id','desc')->paginate(9);
      }else{
         $breweries = Brewery::where('is_approved',true)->orderBy('id','desc')->paginate(9); 
      }      

      return view('breweries', compact('breweries','query'));
   } 


}

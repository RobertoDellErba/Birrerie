<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Mail\CvReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
    public function form()
    {
 
     return view('team.form');
 
    } 


    public function new(Request $request)
    {    
        
        // Specifico un path per inserire in store l'input file
        $cv = $request->file('cv')->store('/cv');    
         
        //I valori ricevuti dalla chiamata ajax vengono istanziati nella classe team
        $member = Team::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'tel' => $request->telephone,
            'email' => $request->email,
            'age' => $request->age,
            'cv' => $cv,
         ]);
        //creo un nuovo oggetto della classe mailable e gli inserisco la "bag" member con i dati ottenuti dal form e salvati in database    
         $cvreceived = new CvReceived($member);
        //uso il metodo Mail::to per inviare alla mia mail fittizia l'oggetto creato ed i suoi dati. 
         Mail::to('gino@gino.com')->send($cvreceived);
    //quando l'operazione asincrona sarà completata, invio un alert di risposta con la stampa bravo (l'alert e comandato dal .then(function()) in script.js)
     return response()->json('Bravo');
 
    } 
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonsStoreRequest;
use App\Models\Persons;
use Illuminate\Http\Request;

class PersonsController extends Controller
{

    public function whatsapp(PersonsStoreRequest $request){

        $person = Persons::create($request->validated());

        // $url = "https://api.whatsapp.com/send?phone=595971334270&text=Hola!%20Quiero%20validar%20mis%20datos%20de%20registro.%20Soy%20".$person->nombre."%20".$person->apellido;

        return redirect()->route('gracias')->with('person' , $person);

    }

    public function gracias(){
        return view('gracias');
    }
}

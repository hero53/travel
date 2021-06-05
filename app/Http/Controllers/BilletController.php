<?php

namespace App\Http\Controllers;

use App\Models\Acompte;
use App\Models\Billet;
use App\Models\Client;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;


class BilletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['destinations'] = Destination::get();
        return view('reservation',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());

        $validator = Validator::make($request->all(),[
            "name" => ['required','min:3'],
            "telephone" =>['required','min:3'],
            "email" => ['email'],
            "passeport" =>  ['required','min:3'],

            "pays" =>  ['required'],

            "depare" => ['required'],
            "arriver" => ['required'],

            "avance" => ['required'],
            "modereglement" =>  ['required'],
            "datereglement" => ['required'],
        ]);

        if($validator->fails())
        {
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Erreur dans le formulaire');
            return back()->withErrors($validator->errors())->withInput($request->input());
        }else{

        
            $client = new Client;
            $client->name = htmlspecialchars($request->name);
            $client->etat = 0;
            $client->email = htmlspecialchars($request->email);
            $client->telephone= htmlspecialchars($request->telephone);
            $client->passeport= htmlspecialchars($request->passeport);
            $client->destination_id= htmlspecialchars($request->pays);            
            $client->save();
            
            $billet = new Billet;
            $billet->depare = htmlspecialchars($request->depare);
            $billet->arriver = htmlspecialchars($request->arriver);
            $billet->client_id = htmlspecialchars($client->id);
             $billet->save();

            $acompte = new Acompte;
            $acompte->avance = htmlspecialchars($request->avance);
            $acompte->modereglement= htmlspecialchars($request->modereglement);
            $acompte->datereglement= htmlspecialchars($request->datereglement);
            $acompte->client_id = htmlspecialchars($client->id);
            $acompte->save();

            return $this->print($client->id);

           
        }

            
    }

    public function print($id)
    {

        $data['clients']= Client::where('id',$id)->get();   

        $pdf = PDF::loadView('print', $data )->setPaper('a4');
        $name = "Liste-des-reservations.pdf";
        return $pdf->stream($name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

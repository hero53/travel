<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DestinationController extends Controller
{

    public function __construct()
    {
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['destinations'] = Destination::get();
        return view('destinations.index',$data);
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
      $validator = Validator::make($request->all(),[
            'pays' => ['required','min:3'],
            'ville' => ['required','min:3'],
        ]);

        if($validator->fails())
        {
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Erreur dans le formulaire');
            return back()->withErrors($validator->errors())->withInput($request->input());
        }else{

        
            $destination = new Destination;
            $destination->pays = htmlspecialchars($request->pays);
            $destination->ville= htmlspecialchars($request->ville);            
            $destination->save();                       

            session()->flash('type', 'alert-success');
            session()->flash('message', 'Enregistrement effectuer avec succes');
            return back();
        }
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
        $data = Destination::find($id);

        $data->delete();

        session()->flash('type', 'alert-success');
        session()->flash('message', 'Suppression avec succes');
        
        return back();
    }
}

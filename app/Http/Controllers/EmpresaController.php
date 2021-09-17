<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\ServicesPacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $empresas = Empresa::get();

        return view('empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicesPacks = ServicesPacks::where('status',1)->get();
        return view('empresa.create', compact('servicesPacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $url = Storage::disk('local')->put('empresa', $request->logo);
        
        $empresa = new Empresa();
        $empresa->logo                 =  $url;
        $empresa->name                 = $request->name;
        $empresa->email                = $request->email;
        $empresa->ein                  = $request->ein;
        $empresa->phone                = $request->phone;
        $empresa->principal_address    = $request->principal_address;
        $empresa->responsable_name     = $request->responsable_name;
        $empresa->responsable_lastname = $request->responsable_lastname;
        $empresa->responsable_phone    = $request->responsable_phone;
        $empresa->responsable_address  = $request->responsable_address;
        $empresa->notes                = $request->notes;
        $empresa->status               = $request->status;
        $empresa->services_packs_id    = $request->services_packs_id;
        $empresa->save();

        if ($empresa) {
            $mensaje = 'Gracias por registrarte';           
        }else{
            $mensaje = 'Lo sentimos tu registro no se realizo';  
        }  

        return redirect()->route('empresa.index')->with(['mensaje'=>$mensaje]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $servicesPacks = ServicesPacks::where('status',1)->get();
        return view('empresa.edit', compact('servicesPacks','empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {

        $logo = $empresa->logo;
        if ($request->logo) {
            $logo = Storage::disk('local')->put('empresa', $request->logo);
        }

        $empresa = Empresa::where('id', $empresa->id)->first();
        $empresa->logo                 = $logo;
        $empresa->name                 = $request->name;
        $empresa->email                = $request->email;
        $empresa->ein                  = $request->ein;
        $empresa->phone                = $request->phone;
        $empresa->principal_address    = $request->principal_address;
        $empresa->responsable_name     = $request->responsable_name;
        $empresa->responsable_lastname = $request->responsable_lastname;
        $empresa->responsable_phone    = $request->responsable_phone;
        $empresa->responsable_address  = $request->responsable_address;
        $empresa->notes                = $request->notes;
        $empresa->status               = $request->status;
        $empresa->services_packs_id    = $request->services_packs_id;
        $empresa->save();

        if ($empresa) {
            $mensaje = 'Gracias por registrarte';           
        }else{
            $mensaje = 'Lo sentimos tu registro no se realizo';  
        }  

        return redirect()->route('empresa.index')->with(['mensaje'=>$mensaje]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresa.index')->with(['mensaje'=>'Registro eliminado']);  
    }
}

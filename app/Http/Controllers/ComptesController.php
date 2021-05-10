<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Compte;
use App\Exports\ComptesExport;
use Maatwebsite\Excel\Facades\Excel;
use BootstrapComponents;


class ComptesController extends Controller
{
    public function index(Request $request)
    {
        //
        $comptes = Compte::orderBy('id','DESC')->get();
        return view('compte.index', compact('comptes')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('compte.create');
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
        $this->validate($request,[ 'compte'=>'required|max:150|unique:comptes','fuc'=>'required|max:150|unique:comptes','compte'=>'required|max:150|unique:comptes']);
		$compte = new Compte();
		$compte->compte = $request->compte;
        $compte->fuc = $request->fuc;
        $compte->clau = $request->clau;
        $compte->estat = $request->estat;
        $compte->create_user_id = Auth::user()->id;
        $compte->edit_user_id = Auth::user()->id;
		$compte->save();
        return redirect()->route('compte.index')->with('success','Registro creado satisfactoriamente');
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
        $compte=Compte::find($id);
        return view('compte.edit',compact('compte'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $compte = Compte::find($id);
        if($compte->compte== $request->compte ){
            $this->validate($request,[ 'compte'=>'required|max:150']);
        }else{
            $this->validate($request,[ 'compte'=>'required|max:150|unique:comptes']);
        }    
        if($compte->fuc== $request->fuc){
            $this->validate($request,[ 'fuc'=>'required|max:150']);
        }else{
            $this->validate($request,[ 'fuc'=>'required|max:150|unique:comptes']);
        }    
        if($compte->clau== $request->clau){
            $this->validate($request,[ 'clau'=>'required|max:150']);
        }else{
            $this->validate($request,[ 'clau'=>'required|max:150|unique:comptes']);
        }
		$compte->compte = $request->compte;
        $compte->fuc = $request->fuc;
        $compte->clau= $request->clau;
        $compte->estat = $request->estat;
        $compte->create_user_id = $compte->create_user_id;
        $compte->edit_user_id = Auth::user()->id;
		$compte->save();
        return redirect()->route('compte.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Compte::find($id)->delete();
        return redirect()->route('compte.index')->with('success','Registro eliminado satisfactoriamente');
    }
     //export exel y pdf
     public function export() 
     {
         return Excel::download(new ComptesExport, 'comptes.xlsx');
     }
     
     public function export2() 
     {
         return Excel::download(new ComptesExport, 'comptes.pdf');
     }
}

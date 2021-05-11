<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pagaments;
use App\Categoria;
use App\Compte;
use App\Curs;
use PDF;
use App\Exports\PagamentsExport;
use Maatwebsite\Excel\Facades\Excel;
use BootstrapComponents;


//realitzar pagaments

class PagamentsController extends Controller
{

  public function getPagament($id){

    $Pagament = pagaments::findOrFail($id);
    $Compte = Compte::findOrFail($Pagament->compte_id);
    $categories = Categoria::all();
    $pagaments = pagaments::all();
    return view("pagament",compact('pagaments','categories','Compte','Pagament'));
  }

//gestio pagaments

  public function index(Request $request)
    {
        //

        $pagaments = Pagaments::orderBy('id','DESC')->get();
        $categories = Categoria::all();
        $comptes = Compte::all();
        $cursos = Curs::all();
        return view('pagament.index', compact('pagaments','categories','comptes','cursos')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pagaments = Pagaments::orderBy('id','DESC')->get();
        $categories = Categoria::all();
        $comptes = Compte::all();
        $cursos = Curs::all();
        return view('pagament.create', compact('pagaments','categories','comptes','cursos'));
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
        $this->validate($request,[ 'categoria'=>'required','compte'=> 'required', 'nivell'=>'required', 'curs'=>'required','titol'=>'required|max:150', 'desc'=>'required','preu'=>'required','data_inici'=>'required','data_fi'=>'required|after:data_inici' ,'estat'=>'required']);
		$pagament = new pagaments();
		$pagament->categoria_id = $request->categoria;
		$pagament->compte_id =$request->compte;
		$pagament->nivell =$request->nivell;
		$pagament->titol = $request->titol;
		$pagament->descripcio = $request->desc;
		$pagament->preu = $request->preu;
		$pagament->data_inici = $request->data_inici;
		$pagament->data_fi = $request->data_fi;
		$pagament->estat = $request->estat;
		$pagament->curs_id = $request->curs;
        $pagament->create_user_id = Auth::user()->id;
        $pagament->edit_user_id = Auth::user()->id;
		$pagament->save();
        return redirect()->route('pagament.index')->with('success','Registro creado satisfactoriamente');
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
        $pagaments=pagaments::find($id);
        $categorias = Categoria::all();
        $comptes = Compte::all();
        $cursos = Curs::all();
        return view('pagament.edit',compact('pagaments','categorias','comptes','cursos'));
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
        $this->validate($request,[ 'categoria'=>'required','compte'=> 'required', 'nivell'=>'required', 'curs'=>'required','titol'=>'required|max:150', 'desc'=>'required','preu'=>'required','data_inici'=>'required','data_fi'=>'required|after:data_inici' ,'estat'=>'required']);
		$pagament = pagaments::find($id);
		$pagament->categoria_id = $request->categoria;
		$pagament->compte_id =$request->compte;
		$pagament->nivell =$request->nivell;
		$pagament->titol = $request->titol;
		$pagament->descripcio = $request->desc;
		$pagament->preu = $request->preu;
		$pagament->data_inici = $request->data_inici;
		$pagament->data_fi = $request->data_fi;
		$pagament->estat = $request->estat;
		$pagament->curs_id = $request->curs;
        $pagament->create_user_id = $pagament->create_user_id;
        $pagament->edit_user_id = Auth::user()->id;
		$pagament->save();
        return redirect()->route('pagament.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        pagaments::find($id)->delete();
        return redirect()->route('pagament.index')->with('success','Registro eliminado satisfactoriamente');
    }

       //export exel y pdf
       public function export() 
       {
           return Excel::download(new PagamentsExport, 'pagaments.xlsx');
       }
       
       public function download()
       {
           $data = pagaments::all();
           view()->share('pagaments',$data);
           $pdf = PDF::loadView('pdf.pagament', $data)->setPaper('a2', 'landscape');
   
           return $pdf->download('pagaments.pdf');
       }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curs;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Exports\CursosExport;
use Maatwebsite\Excel\Facades\Excel;
use BootstrapComponents;

class CursosController extends Controller
{
    public function index(Request $request)
    {
		
        $cursos = Curs::orderBy('id','DESC')->get();
        return view('curs.index',compact('cursos')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('curs.create');
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
        $this->validate($request,[ 'curs'=>'required|max:50|unique:cursos,curs']);
		$curs = new Curs();
		$curs->curs = $request->curs;
        $curs->estat =$request->estat;
        $curs->create_user_id = Auth::user()->id;
        $curs->edit_user_id = Auth::user()->id;
		$curs->save();
        return redirect()->route('curs.index')->with('success','Registro creado satisfactoriamente');
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
        $curs=Curs::find($id);
        return view('curs.edit',compact('curs'));
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
        $curs = Curs::find($id);
        if($curs->curs== $request->curs){
            $this->validate($request,[ 'curs'=>'required|max:50']);
        }else{
            $this->validate($request,[ 'curs'=>'required|max:50|unique:cursos']);
        }
		$curs->curs = $request->curs;
        $curs->estat = $request->estat;
        $curs->create_user_id = $curs->id;
        $curs->edit_user_id = Auth::user()->id;
		$curs->save();
        return redirect()->route('curs.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Curs::find($id)->delete();
        return redirect()->route('curs.index')->with('success','Registro eliminado satisfactoriamente');
    }
      //export excel y pdf
      public function export() 
      {
          return Excel::download(new CursosExport, 'cursos.xlsx');
      }
      
      public function download()
      {
          $data = Curs::all();
          view()->share('curs',$data);
          $pdf = PDF::loadView('pdf.curs', $data)->setPaper('a4', 'landscape');
  
          return $pdf->download('cursos.pdf');
      }
}

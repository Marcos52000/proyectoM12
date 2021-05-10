<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use PDF;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use BootstrapComponents;


class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        //
        $categories = Categoria::orderBy('id','DESC')->get();
        return view('categoria.index', compact('categories')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
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
        $this->validate($request,[ 'categoria'=>'required|max:150|unique:categories,categoria']);
		$categoria = new Categoria();
		$categoria->categoria = $request->categoria;
        $categoria->estat = $request->estat;
        $categoria->create_user_id = Auth::user()->id;
        $categoria->edit_user_id = Auth::user()->id;
		$categoria->save();
        return redirect()->route('categoria.index')->with('success','Registro creado satisfactoriamente');
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
        $categoria=Categoria::find($id);
        return view('categoria.edit',compact('categoria'));
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
        $categoria = Categoria::find($id);
        if($categoria->categoria== $request->categoria){
            $this->validate($request,[ 'categoria'=>'required|max:150']);
        }else{
            $this->validate($request,[ 'categoria'=>'required|max:150|unique:categories']);
        }
		$categoria->categoria = $request->categoria;
        $categoria->estat = $request->estat;
        $categoria->create_user_id = $categoria->create_user_id;
        $categoria->edit_user_id = Auth::user()->id;
		$categoria->save();
        return redirect()->route('categoria.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Categoria::find($id)->delete();
        return redirect()->route('categoria.index')->with('success','Registro eliminado satisfactoriamente');
    }
    //export exel y pdf 
    public function export() 
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
    
    public function download()
    {
        $data = Categoria::all();
        view()->share('categoria',$data);
        $pdf = PDF::loadView('pdf.categoria', $data);

        return $pdf->download('categories.pdf');
    }
}

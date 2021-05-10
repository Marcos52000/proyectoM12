<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use BootstrapComponents;

class UsersController extends Controller
{
    public function index(Request $request)
    {
		
        $usuarios = User::orderBy('id','DESC')->get();
        return view('user.index',compact('usuarios')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        $this->validate($request,[ 'pass'=>'required|max:150','nom'=>'required|max:50' ,'email'=>'required|max:50|unique:users']);
		$user = new User();
		$user->user = $request->nom;
        $password = Hash::make($request->pass);
        $user->password = $password;
        $user->email = $request->email;
        $user->estat = 'Actiu';
		$user->save();
        return redirect()->route('user.index')->with('success','Registro creado satisfactoriamente');
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
        $usuarios=User::find($id);
        return view('user.edit',compact('usuarios'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $user = User::find($id);
        if($user->email == $request->email){
            $this->validate($request,[ 'pass'=>'required|max:150','nom'=>'required|max:50' ,'email'=>'required|max:150']);
        }else{
            $this->validate($request,[ 'pass'=>'required|max:150','nom'=>'required|max:50' ,'email'=>'required|max:150|unique:users']);
        }
        $user->user = $request->nom;
        $password = Hash::make($request->pass);
        $user->password = $password;
        $user->email = $request->email;
        $user->estat = 'Actiu';
        $user->save();
        return redirect()->route('user.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        $user = User::find($id);
        $user->user = $user->user;
        $user->password = $user->password;
        $user->email = $user->email;
        $user->estat = 'Inactiu';
        $user->save();
        return redirect()->route('user.index')->with('success','Registro eliminado satisfactoriamente');
    }

    //export exel
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    
    public function export2() 
    {
        return Excel::download(new UsersExport, 'users.pdf');
    }
}

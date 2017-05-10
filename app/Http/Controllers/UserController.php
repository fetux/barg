<?php namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;


class UserController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return view('users.index')->withUsers($users);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		
		$u = User::find($id);		
		
		if ($u != NULL){
			$u->delete();
		}
		
		return redirect('/usuarios');
	}
	
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$u = User::find($id);		
		
		if ($u != NULL){
			
			return view('users.edit')->withUser($u);
		} else {
			return view('users.404'); 
		}
		
	}
	
	public function update($id,Request $request)
	{
		
		$messages = [
		    'required' => 'Obligatorio.',
		];
		
		$v = Validator::make($request->all(), [
			'email' => 'required', 
			'name' => 'required',
			'level' => 'required'
		
	    ],$messages);
		
		if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())->withInput();
	    }
		
		$user = User::find($id);

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->level = $request->input('level'); 
				

		$user->save();
		
		return redirect('usuarios');
	    
	}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::latest()->paginate(5);
        $users = User::where('role','!=','administrator')->paginate(5);
  
        return view('home',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'idNumber' => 'required',
            'email' => 'required',
            'language' => 'required'
        ]);
        $input = $request->all();
        $input['interests'] = implode(",",$request->input('interests'));
        //$comma_separated = implode(",", $request->input('interests'));
        User::create($input);

        $name = $request->get('name');
        $email = $request->get('email');

        $data = array('name'=>'Rachael Maphopha', 'body' => 'Your details have been registered onto our system');

        Mail::send('emails.registration', $data, function($message) use ($name, $email) {
            $message->to($email, $name)
            ->subject('Coonfirmation of registration');
            $message->from('koketso.maphopha@gmail.com','Registration');
            });
   
        return redirect()->route('home')
                        ->with('success','User created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'idNumber' => 'required',
            'email' => 'required'
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('home')
                        ->with('success','User updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('home')
                        ->with('success','User deleted successfully');
    }
}

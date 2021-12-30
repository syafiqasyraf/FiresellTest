<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::withCount('todos')->where('id', '!=', auth()->id())->paginate(5);
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:255',
            'role'=> 'required'
        ]);
        
        // To hash the password
        // $validatedData['password'] = bcrypt('password');
        
        User::create($validatedData);
        
        return redirect('/dashboard/users')->with('success','Berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email:dns',
            'password'=> 'required|min:5|max:255',
            'role'=> 'required'
        ]);
        
        User::where('id', $user->id)
                    ->update($validatedData);

        return redirect('/dashboard/users')->with('success','Edit berjaya!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::withCount('todos')->findOrFail($user->id);

        if ($user->todos_count > 0){
            return redirect('/dashboard/users')->with('success','Masih ada Todos belum selesai!');
        }
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success','Berjaya dipadam!');
    }
}

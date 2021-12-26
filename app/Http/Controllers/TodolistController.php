<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('dashboard.todos.index',[
            'todos' => Todos::all(),
            'title' => 'Todos',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.todos.create');

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
            'message' => 'required',
            'is_complete' => 'required',
            'user_id' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('todos-images');
        }
        // $validatedData['message'] = $request->filesize('image');

        
        // Set the user_id to current user
        // $validatedData['user_id'] = auth()->user()->id;

        Todos::create($validatedData);

        return redirect('/dashboard/todos')->with('success','Berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Todos::findOrFail($id);
        return view('dashboard.todos.show',[
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(Todos $todos)
    {
        if($todos->is_complete === 1){
            return redirect('/dashboard/todos')->with('success','Edit Berjaya!');
        }
       
        return view('dashboard.todos.edit',[
            'todos' => $todos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todos $todos)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'is_complete' => 'nullable',
            'image' => 'image|file'
        ]);

        if($request->is_complete){
            Todos::where('id', $todos->id)->update('is_complete');
        }
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('todos-images');
        }

        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        
        $validatedData['is_complete'] = 0;

        Todos::where('id', $todos->id)
                    ->update($validatedData);

        return redirect('/dashboard/todos')->with('success','Edit berjaya!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todos = Todos::findOrFail($id);

        if(!empty($todos->image)){
            Storage::delete($todos->image);
        }
        
        Todos::destroy($todos->id);

        return redirect('/dashboard/todos')->with('success','Berjaya dipadam!');
    }
}

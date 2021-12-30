<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Models\File_uploads;
use Illuminate\Http\Request;
use App\Models\Todo_file_upload;
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
        $fileupload = File_uploads::where('id',$todos)->get();
        // $fileupload = Todo_file_upload::where('todo_id',$id)->get();
        
        // dd($fileupload);
        return view('dashboard.todos.show',[
            'todos' => $todos,
            'fileupload' => $fileupload,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(Todos $todos,$id)
    {
        $todos = Todos::findOrFail($id);
        return view('dashboard.todos.edit',[
            'todos' => $todos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todos $todos,$id)
    {
        //For mark as complete function
        if($request->is_complete == 3){
            Todos::where('id', $id)->update(['is_complete'=>'1']);
            return redirect('/dashboard/todos')->with('success','Edit berjaya!');
        }
        //For edit function
        $validatedData = $request->validate([
            'message' => 'required',
            'is_complete' => 'required',
        ]);
        Todos::where('id', $id)
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

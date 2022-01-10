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
        $todos = Todos::paginate(2);
        return view('dashboard.todos.index',[
            'todos' => $todos,
            'title' => 'Todos',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Todos $todos)
    {
        return view('dashboard.todos.create',[
            'todos' => Todos::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,File_uploads $file_uploads, Todos $todos)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'is_complete' => 'required',
            'user_id' => 'required'
        ]);
        $validatedData2 = $request->validate([
            'path' => 'image|file|required',
            'name' => 'required'
        ]);

        // Insert image
        if($request->file('path')){
            $validatedData2['path'] = $request->file('path')->store('todos-images');
            $validatedData2['extension'] = $request->path->extension();
            $validatedData2['size'] = $request->file('path')->getSize();
        }
        $todos=Todos::create($validatedData);
        $todosInsertedId = $todos->id;
        // $todos = Todos::where('id', $todos->id)->get();
        $todos['todo_id'] = $todosInsertedId;

        $file_uploads=File_uploads::create($validatedData2);
        $lastInsertedId = $file_uploads->id;
        $file_uploads['file_upload_id'] = $lastInsertedId;
        
        $file_uploads->todos()->sync($todos);

        
        // Set the user_id to current user
        // $validatedData['user_id'] = auth()->user()->id;
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
        $fileupload = File_uploads::where('id',$todos->id)->paginate(3);
        // $fileupload = Todo_file_upload::where('todo_id',$id)->get();
        
        // dd($fileupload);
        return view('dashboard.todos.show',[
            'todos' => $todos,
            'fileuploads' => $fileupload,
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
            Todos::where('id', $id)->update(['is_complete'=>1]);
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
    public function destroy(File_uploads $file_uploads,$id)
    {
        $todos = Todos::findOrFail($id);

        if(!empty($file_uploads->path)){
            Storage::delete($file_uploads->path);
        }
        
        Todos::destroy($todos->id);
        File_uploads::destroy($file_uploads->id);

        return redirect('/dashboard/todos')->with('success','Berjaya dipadam!');
    }
}

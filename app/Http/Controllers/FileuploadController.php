<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Models\File_uploads;
use Illuminate\Http\Request;
use App\Models\Todo_file_upload;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\TodolistController;

class FileuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fileupload = File_uploads::paginate(4);
        // dd($fileupload);
        return view('dashboard.todos.fileupload.index',[
            'fileupload' => $fileupload,
            'title' => 'fileupload',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $fileupload = File_uploads::where('id',$request->id);
        $todos = Todos::where('id',$request->id)->get();
        return view('dashboard.todos.fileupload.create',[
            'fileupload' => File_uploads::all(),
            'todos'=> $todos,
            'title' => 'fileupload',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File_uploads $file_uploads)
    {
        $validatedData = $request->validate([
            'path' => 'required',
            'name' => 'required',
            'todo_id' => 'required',
        ]);

        if($request->file('path')){
            $validatedData['path'] = $request->file('path')->store('todos-images');
            $validatedData['extension'] = $request->path->extension();
            $validatedData['size'] = $request->file('path')->getSize();
        }
       
        $todos = Todos::where('id', $request)->get();

        $file_uploads=File_uploads::create($validatedData);
        $lastInsertedId = $file_uploads->id;
        $file_uploads['file_upload_id'] = $lastInsertedId;
        
        $file_uploads->todos()->sync($request->input('todo_id','file_upload_id'));

        return redirect()->action([TodolistController::class, 'show'],['todo' => $request->todo_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File_uploads  $file_uploads
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file_uploads = File_uploads::findOrFail($id);
        return view('dashboard.fileupload.show',[
            'fileupload' => $file_uploads,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File_uploads  $file_uploads
     * @return \Illuminate\Http\Response
     */
    public function edit(File_uploads $file_uploads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File_uploads  $file_uploads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File_uploads $file_uploads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File_uploads  $file_uploads
     * @return \Illuminate\Http\Response
     */
    public function destroy(File_uploads $file_uploads)
    {
        //
    }
}

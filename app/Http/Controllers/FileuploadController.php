<?php

namespace App\Http\Controllers;

use App\Models\File_uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.fileupload.index',[
            'fileupload' => File_uploads::all(),
            'title' => 'fileupload',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.fileupload.create');
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
            size('path') => 'required',
            'name' => 'required',
        ]);

        if($request->file('path')){
            $validatedData['path'] = $request->file('path')->store('todos-images');
        }
        // $validatedData['size'] = $request->size('path');

        File_uploads::create($validatedData);

        return redirect('/dashboard/fileupload')->with('success','Berjaya ditambah!');
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

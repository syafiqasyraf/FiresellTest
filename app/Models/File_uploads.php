<?php

namespace App\Models;

use App\Models\Todos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File_uploads extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'extension',
        'size',
        'path',
        'message',
        'is_complete',
        'image',
    ];

    public function todos()
    {
        return $this->belongsToMany(Todos::class,'todo_file_upload','file_upload_id', 'todo_id');
    }
   
}

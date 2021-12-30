<?php

namespace App\Models;

use App\Models\User;
use App\Models\File_uploads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'message',
        'is_complete',
        'user_id',
        'name',
        'extension',
        'size',
        'path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function fileupload()
    {
        return $this->belongsToMany(File_uploads::class, 'todo_file_upload', 'todo_id', 'file_upload_id');
    }
   
}

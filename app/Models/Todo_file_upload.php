<?php

namespace App\Models;

use App\Models\Todos;
use App\Models\File_uploads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo_file_upload extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'todo_id',
        'file_upload_id',
    ];

    public function todos()
    {
        return $this->belongsTo(Todos::class)->withPivot('id');
    }
    public function fileupload()
    {
        return $this->belongsTo(File_uploads::class)->withPivot('id');
    }
   
}

<?php

namespace App\Models;

use App\Models\Todo_file_upload;
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
    ];

    public function todo_file_upload()
    {
        return $this->hasMany(Todo_file_upload::class);
    }
   
}

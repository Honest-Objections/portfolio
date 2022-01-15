<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['src', 'disk', 'relativePath', 'originalName'];

    public function getAbsolutePathAttribute() 
    {
        $path = $this->relativePath;  

        switch ($this->disk) {
            case 'public':
                $path = storage_path('app/public/' . $path);
                break;
            
            default:
                $path = storage_path('app' . $path); 
                break;
        }

        return $path; 
    }

    use HasFactory;
}
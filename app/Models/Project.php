<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Image;

class Project extends Model
{

    protected $fillable = ['name', 'description'];

    public function photos() 
    {
        return $this->belongsToMany(Image::class, 'project_photos'); 
    }

    public function skills() 
    {
        return $this->belongsToMany(Skill::class, 'project_skills');
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class); 
    }

    public function setBackgroundImage (Image $photo)
    {
        \Spatie\Image\Image::load($photo->absolutePath)
            ->brightness(-40)
            ->blur(50)
            ->width(500)
            ->height(500)
            ->save(dirname($photo->absolutePath) . '/background.png'); 
    }

    use HasFactory;
}

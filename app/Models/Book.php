<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'author', 'genre','description','isbn','image','published_on','publisher'];
    
    protected $appends = ['image_url'];

    public function getImageUrlAttribute() {
        return Storage::disk('public')->exists($this->image) ? Storage::disk('public')->url($this->image) : asset('book.jpg');
    }

    /**
     * Filter query by search keyword
     *
     * @param object $query
     * @param string $keyword search keyword
     * @param array $columns The filtered columns
     * @return $query
     */
    public function scopeSearch($query, $keyword, $columns = ['title','author','published_on','isbn','genre'])
    {
        if ($keyword !== '' && !empty($columns)) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $keyword . '%');
            }
        }

        return $query;
    }

}
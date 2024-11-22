<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getImagesAttribute($value)
    {
        return is_string($value) ? json_decode($value, true) : (is_array($value) ? $value : []);
    }

    public function getCategoryAttribute($value)
    {
        return json_decode($value, true);
    }
}

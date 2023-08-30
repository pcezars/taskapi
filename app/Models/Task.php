<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'attachment',
        'edited_by',
        'completed',
        'created_by'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

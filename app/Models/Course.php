<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function students(){
        return $this->belongsToMany(User::class, 'enrollments')->withPivot('status', 'progress', 'payment_status')->withTimestamps();
    }
}

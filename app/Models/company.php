<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'phone_number',
        'website',
        'registration_number',
        'founded_at',
        'number_of_employees',
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);

    }
}

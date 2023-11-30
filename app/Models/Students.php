<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{   
    protected $guarded = []; // $guarded allow to manipulate all data in the students database/table

    /* 
    protected $fillable = [ // $fillable allow to manipulate a certain column in the students table in the db
        'first_name', 
        'last_name', 
        'email', 
        'age', 
        'gender'
    ];
    */
    
    use HasFactory;
}

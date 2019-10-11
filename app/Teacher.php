<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'name',
        'address',
        'phone',
        'dob'
    ];

    /**
     * Nama
     * Alamat
     * Telp
     * Tanggal Lahir
     */


    // Teacher::create();
    // A0001,A0002

    public static function boot() {
        parent::boot();
    
        //while creating/inserting item into db  
        static::creating(function (Teacher $item) {            
            // DEKLARASI PREFIX
            $code = 'A';

            // DEKLARASI PENOMORAN ID
            $countDataOnTable = Teacher::count();

            // DEKLARASI PENGGABUNGAN DATA

            $code .= str_pad($countDataOnTable,4,'0',STR_PAD_LEFT);

            $item->id = $code; //assigning value
        });
    
        //once created/inserted successfully this method fired, so I tested foo 
        static::created(function (Teacher $item) {
           
        });


        
    }

}

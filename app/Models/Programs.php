<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;
    protected $table ='programs';

    public $primaryKey = 'id';

    use HasFactory;

    protected $fillable= [

        'Name',
        'Day',
        'Duration',
        'CounselorId',
        'Price',

    ];
}

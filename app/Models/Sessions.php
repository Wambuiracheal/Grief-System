<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;

    protected $table ='sessions';

    public $primaryKey = 'id';

    use HasFactory;

    protected $fillable= [

        'Name',
        'ClientId',
        'TrainerId',
        'Duration',

    ];
}

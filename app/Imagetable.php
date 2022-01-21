<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagetable extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'table3';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message_id', 'image_file_path'
    ];
}
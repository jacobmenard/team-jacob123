<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblAccPoints extends Model
{
    protected $table = 'tbl_acc_points';
    protected $fillable = [
        'pt_acc','acc_load','acc_com'
    ];

    protected $primaryKey = 'pt_no';
}

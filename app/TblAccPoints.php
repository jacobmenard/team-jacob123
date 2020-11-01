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

    protected $fillable = [
        'acc_load',
        'acc_com'
    ];

    public function accountInfo() {
        return $this->hasOne('App\User', 'id', 'pt_acc')->select('id', 'username', 'acc_percentage');
    }
}

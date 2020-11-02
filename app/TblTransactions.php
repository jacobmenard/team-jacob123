<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblTransactions extends Model
{
    protected $table = 'tbl_transactions';
    protected $primaryKey = 'trans_no';
    
    protected $fillable = [
        "trans_type",
        "trans_from",
        "trans_to",
        "trans_amt",
        "trans_remarks"
    ];

    public function getTransType() {
        return $this->hasOne('App\refTranstype', 'trans_typ_no', 'trans_type')->select('trans_typ_no', 'trans_type');
    }
}

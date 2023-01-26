<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\invoice', 'invoice_id');
    }

    public function deduction_type()
    {
        return $this->belongsTo('App\Models\DeductionType', 'deduction_type_id');
    }
    public function profile_deduction_type()
    {
        return $this->belongsTo('App\Models\ProfileDeductionTypes', 'deduction_type_id');
    }
}
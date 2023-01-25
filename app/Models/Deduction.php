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

    public function DeductionTypes()
    {
        return $this->belongsTo('App\Models\DeductionTypes', 'deduction_type_id');
    }
}
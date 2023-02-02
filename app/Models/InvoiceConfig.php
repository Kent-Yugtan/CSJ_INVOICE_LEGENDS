<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceConfig extends Model
{
    use HasFactory;
    protected $table = 'invoice_configs';
    protected $fillable = ['invoice_title', 'invoice_email', 'bill_address', 'ship_address', 'title'];
}

<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function generate_invoice()
    {
        // $last_invoice = Invoice::where('profile_id', $profile_id)->orderBy('invoice_no', 'desc')->first();
        $last_invoice = Invoice::orderBy('invoice_no', 'desc')->first();
        $last_num = 0;
        if ($last_invoice) {
            // $last_num = $last_invoice->invoice_no != null ? $last_invoice->invoice_no + 1 : 00001;
            $last_num = (int) str_replace('5PP-', "", $last_invoice->invoice_no);
            $_last_num = str_pad($last_num + 1, 5, '0', STR_PAD_LEFT);
            $last_num = '5PP-' . $_last_num;
        } else {
            // $last_num = 00001;
            $last_num = '5PP-00001';
        }
        // $invoice_num = sprintf("%05d", $last_num);
        return $last_num;
    }
}
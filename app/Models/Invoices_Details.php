<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices_Details extends Model
{
    use HasFactory;
    protected $table='invoices_details';
    protected $fillable = [
        'invoice_id',
        'invoice_number',
        'product',
        'Section',
        'Status',
        'Value_Status',
        'note',
        'user',
        'Payment_Date',
    ];
    public function Inovice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

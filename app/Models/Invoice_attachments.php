<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_attachments extends Model
{
    use HasFactory;
    public function Invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

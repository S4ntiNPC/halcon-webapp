<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Asegúrate de importar esto

class Order extends Model
{
    use SoftDeletes, HasFactory; // 2. Asegúrate de agregar HasFactory aquí

    protected $fillable = [
        'invoice_number', 'customer_name', 'customer_number',
        'fiscal_data', 'delivery_address', 'notes', 'status'
    ];

    public function evidence() {
        return $this->hasOne(Evidence::class);
    }
}

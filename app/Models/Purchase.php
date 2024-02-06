<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $primaryKey = 'purchase_id';
    protected $table = 'purchases';
    protected $fillable = ['customer_id',"inventory_id"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $primaryKey = 'option_id';
    protected $table = 'options';
    protected $fillable = ['color',"transmission","transmission_supplier_id","engine","engine_supplier_id"];
}

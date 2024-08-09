<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
    use HasFactory;
    protected $table ="drugs";
    protected $fillable =[
        'date_dispensed',
        'name',
        'ndc',
        'qty',
        'insurance',
        'bin',
        'primary_ins_pay',
        'customer_group',
        'net_profit'
    ];
}

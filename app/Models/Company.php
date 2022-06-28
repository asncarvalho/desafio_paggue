<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $dates = ['created_at', 'updated_at'];


    protected $fillable = [
        "cnpj",
        "razao_social",
        "nome_fantasia",
        "telefone",
        "email",
        "value",
    ];

}

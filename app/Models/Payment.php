<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'company_sender_id',
        'company_reciever_id',
        'transfer_value'
    ];


    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCompany()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }



}

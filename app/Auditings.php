<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditings extends Model
{
    protected $fillable = ['user_email', 'user_name', 'type', 'action'];
}

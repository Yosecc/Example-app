<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function services_packs(){
        return $this->belongsTo(ServicesPacks::class, 'services_packs_id');
    }
}

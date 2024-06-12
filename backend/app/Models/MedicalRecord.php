<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = [
        'patient_id', 'description', 'diagnosis', // Add other fields
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function patientSchedule()
    {
        return $this->belongsTo(PatientSchedule::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}

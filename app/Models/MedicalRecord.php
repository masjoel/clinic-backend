<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medicalRecordServices()
    {
        return $this->hasMany(MedicalRecordService::class);
    }

    public function patientSchedule()
    {
        return $this->belongsTo(PatientSchedule::class);
    }
}

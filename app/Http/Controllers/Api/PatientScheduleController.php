<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PatientSchedule;
use App\Http\Controllers\Controller;

class PatientScheduleController extends Controller
{
    public function index(Request $request)
    {
        $patientSchedules = PatientSchedule::with('patient', 'doctor.doctorSchedule')
            ->when($request->input('nik'), function ($query, $nik) {
                return $query->whereHas('patient', function ($query) use ($nik) {
                    $query->where('nik', 'like', '%' . $nik . '%')
                        ->orWhere('name', 'like', '%' . $nik . '%')
                        ->orWhere('schedule_time', 'like', '%' . $nik . '%')
                        ->orWhere('complaint', 'like', '%' . $nik . '%');
                })
                    ->orWhereHas('doctor', function ($query) use ($nik) {
                        $query->where('doctor_name', 'like', '%' . $nik . '%');
                    })
                    ->orWhereHas('doctor.doctorSchedule', function ($query) use ($nik) {
                        $query->where('day', 'like', '%' . $nik . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->get();


        return response([
            'data' => $patientSchedules,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }

    public function store(Request $request)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $maxAntrian = PatientSchedule::whereDate('schedule_time', $currentDate)->max('no_antrian');
        $newAntrian = $maxAntrian ? $maxAntrian + 1 : 1;

        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'schedule_time' => 'required',
            'complaint' => 'required',
            // 'status' => 'required',
        ]);

        $patientSchedule = PatientSchedule::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_time' => $request->schedule_time,
            'complaint' => $request->complaint,
            'status' => 'waiting',
            'no_antrian' => $newAntrian,
        ]);

        return response([
            'data' => $patientSchedule,
            'message' => 'Patient schedule stored',
            'status' => 'OK'
        ], 201);
    }
    public function update(Request $request, PatientSchedule $patient_schedule)
    {
        $data = $request->all();
        $data['status'] = $request->status;
        $patientSchedule = $patient_schedule->update($data);

        return response([
            'data' => $patientSchedule,
            'message' => 'Patient schedule ' . $request->status,
            'status' => 'OK'
        ], 201);
    }
}

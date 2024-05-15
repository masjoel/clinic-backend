<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PatientSchedule;
use App\Http\Controllers\Controller;

class PatientScheduleController extends Controller
{
    public function index(Request $request)
    {
        $patientSchedules = PatientSchedule::with('patient')
            ->when($request->input('nik'), function ($query, $nik) {
                return $query->whereHas('patient', function ($query) use ($nik) {
                    $query->where('nik', 'like', '%' . $nik . '%')
                        ->orWhere('name', 'like', '%' . $nik . '%')
                        ->orWhere('complaint', 'like', '%' . $nik . '%');
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
            'no_antrian' => 1,

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
            'message' => 'Patient schedule '.$request->status,
            'status' => 'OK'
        ], 201);
    }
}

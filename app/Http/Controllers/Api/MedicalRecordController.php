<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\ServiceMedicine;
use App\Http\Controllers\Controller;

class MedicalRecordController extends Controller
{
    public function index(Request $request)
    {
        $medicalRecords = MedicalRecord::with('doctor', 'patient', 'medicalRecordServices.serviceMedicine', 'patientSchedule')
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('patient', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })
            ->when($request->input('id_mr'), function ($query, $idMr) {
                    $query->where('id', $idMr);
            })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $medicalRecords,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'patient_schedule_id' => 'required',
            'diagnosis' => 'required',
            'services' => 'required|array',
            'services.*.id' => 'required',
            'services.*.quantity' => 'required',
        ]);

        $medicalRecord = MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'patient_schedule_id' => $request->patient_schedule_id,
            'diagnosis' => $request->diagnosis,
            'medical_treatments' => $request->medical_treatments,
            'doctor_notes' => $request->doctor_notes,
            'status' => 'processed',
        ]);

        $totalPrice = 0;
        foreach ($request->services as $service) {
            $medicalRecord->medicalRecordServices()->create([
                'medical_record_id' => $medicalRecord->id,
                'service_medicine_id' => $service['id'],
                'quantity' => $service['quantity'],
            ]);
            $totalPrice += (ServiceMedicine::find($service['id'])->price * $service['quantity']);
        }

        $patientSchedule = $medicalRecord->patientSchedule;
        $patientSchedule->status = 'processed';
        $patientSchedule->total_price = $totalPrice;
        $patientSchedule->save();

        return response([
            'data' => $medicalRecord,
            'message' => 'Medical record stored',
            'status' => 'OK'
        ], 201);
    }

    public function getServicesByScheduleId($scheduleId)
    {
        $medicalRecords = MedicalRecord::where('patient_schedule_id', $scheduleId)->get();

        $services = [];

        foreach ($medicalRecords as $medicalRecord) {
            foreach ($medicalRecord->medicalRecordServices as $service) {
                $serviceMedicine = ServiceMedicine::find($service->service_medicine_id);
                $services[] = [
                    'id' => $service->service_medicine_id,
                    'quantity' => $service->quantity,
                    'name' => $serviceMedicine->name,
                    'price' => $serviceMedicine->price,
                    'total' => $service->quantity * $serviceMedicine->price
                ];
            }
        }

        return response([
            'data' => $services,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('doctorSchedule')
            ->when($request->input('name'), function ($query, $search) {
                return $query->where('doctor_name', 'like', '%' . $search . '%')
                ->orWhere('doctor_specialist', 'like', '%' . $search . '%');

            })
            ->when($request->input('day'), function ($query, $search) {
                return $query->whereHas('doctorSchedule', function ($query) use ($search) {
                    return $query->where('day', 'like', '%' . $search . '%');
                });
            })

            ->orderBy('id', 'desc')
            ->get();
        return response([
            'data' => $doctors,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
    public function show(Doctor $doctor)
    {
        return response([
            'data' => $doctor,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
}

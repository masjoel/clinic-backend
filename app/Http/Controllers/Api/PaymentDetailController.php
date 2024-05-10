<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Http\Controllers\Controller;

class PaymentDetailController extends Controller
{
    public function index(Request $request)
    {
        $paymentDetails = PaymentDetail::with(['patientSchedule', 'patient', 'patientSchedule.medicalRecord'])
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('patient', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $paymentDetails,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_schedule_id' => 'required',
            'patient_id' => 'required',
            'payment_method' => 'required',
            'total_price' => 'required',
            'transaction_time' => 'required',
        ]);
        $paymentDetail = PaymentDetail::create([
            'patient_schedule_id' => $request->patient_schedule_id,
            'patient_id' => $request->patient_id,
            'payment_method' => $request->payment_method,
            'total_price' => $request->total_price,
            'transaction_time' => $request->transaction_time,
        ]);
        $patientSchedule = $paymentDetail->patientSchedule;
        $patientSchedule->status = 'completed';
        $patientSchedule->payment_method = $request->payment_method;
        $patientSchedule->total_price = $request->total_price;
        $patientSchedule->save();

        return response([
            'data' => $paymentDetail,
            'message' => 'Payment detail stored',
            'status' => 'OK'
        ], 201);
    }
}

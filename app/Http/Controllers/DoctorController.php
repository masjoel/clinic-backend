<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDoctorReq;
use App\Http\Requests\UpdateDoctorReq;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Doctors';
        $doctors = Doctor::
            when($request->input('search'), function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('doctors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'New Doctor';
        return view('pages.doctors.create', compact('title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorReq $request)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        Doctor::create($validate);
        DB::commit();
        return redirect(route('doctors.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('pages.doctors.edit')->with(['doctor' => $doctor, 'title' => 'Edit Doctor']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorReq $request, Doctor $doctor)
    {
        $pass = $doctor->password;
        if ($request->password) {
            $pass = Hash::make($request->password);
        }
        $validate = $request->validated();
        $doctor->update($validate);
        return redirect()->route('doctors.index')->with('success', 'Edit Doctor Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        DB::beginTransaction();
        $doctor->delete();
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Succesfully Deleted Data'
        ]);
    }
}

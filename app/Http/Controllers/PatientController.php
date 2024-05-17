<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatientReq;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\KabupatenController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\KelurahanController;
use App\Http\Controllers\Api\SatuSehatTokenController;
use App\Http\Requests\UpdatePatientReq;

class PatientController extends Controller
{
    protected $satuSehatToken;
    protected $provinsiController;
    protected $kabupatenController;
    protected $kecamatanController;
    protected $kelurahanController;

    public function __construct(ProvinsiController $provinsiController, KabupatenController $kabupatenController, KecamatanController $kecamatanController, KelurahanController $kelurahanController, SatuSehatTokenController $satuSehatTokenController)
    {
        $this->satuSehatToken = $satuSehatTokenController;
        $this->provinsiController = $provinsiController;
        $this->kabupatenController = $kabupatenController;
        $this->kecamatanController = $kecamatanController;
        $this->kelurahanController = $kelurahanController;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Patients';
        $patients = Patient::when($request->input('search'), function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.patients.index', compact('patients', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = 'New Patient';
        $request->merge(['codes' => '']);
        $provinsi = $this->provinsiController->index($request)->getData()->data;
        // $token = $this->satuSehatToken->token()->getData()->token;
        return view('pages.patients.create', compact('title', 'provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientReq $request)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        $validate['is_deceased'] = $request->is_deceased;
        $validate['province'] = $request->province;
        $validate['city'] = $request->city;
        $validate['district'] = $request->district;
        $validate['village'] = $request->village;
        Patient::create($validate);
        DB::commit();
        return redirect(route('patients.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, Request $request)
    {
        $title = 'New Service Medicine';
        $patient = $patient;
        $request->merge(['province_codes' => $patient->province_code]);
        $request->merge(['city_codes' => $patient->city_code]);
        $request->merge(['district_codes' => $patient->district_code]);
        $provinsi = $this->provinsiController->index($request)->getData()->data;
        $kabupaten = $this->kabupatenController->index($request)->getData()->data;
        $kecamatan = $this->kecamatanController->index($request)->getData()->data;
        $kelurahan = $this->kelurahanController->index($request)->getData()->data;
        return view('pages.patients.edit', compact('title', 'patient', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientReq $request, Patient $patient)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        $validate['is_deceased'] = $request->is_deceased;
        $validate['province'] = $request->province;
        $validate['city'] = $request->city;
        $validate['district'] = $request->district;
        $validate['village'] = $request->village;
        $patient->update($validate);
        DB::commit();
        return redirect()->route('patients.index')->with('success', 'Edit Patient Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        DB::beginTransaction();
        $patient->delete();
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Succesfully Deleted Data'
        ]);
    }
}

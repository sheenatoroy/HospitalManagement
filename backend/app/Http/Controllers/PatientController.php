<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Create a new patient
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients',
            // Add more validation rules as needed
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        // Add more fields as needed
        $patient->save();

        return response()->json(['message' => 'Patient created successfully'], 201);
    }

    // Get all patients
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    // Get a single patient by id
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient);
    }

    // Update a patient
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients,email,' . $id,
            // Add more validation rules as needed
        ]);

        $patient = Patient::findOrFail($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        // Add more fields as needed
        $patient->save();

        return response()->json(['message' => 'Patient updated successfully']);
    }

    // Delete a patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;

class MedicalRecordController extends Controller
{
    // Create a new medical record
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required',
            // Add more validation rules as needed
        ]);

        $medicalRecord = new MedicalRecord();
        $medicalRecord->patient_id = $request->patient_id;
        $medicalRecord->description = $request->description;
        // Add more fields as needed
        $medicalRecord->save();

        return response()->json(['message' => 'Medical record created successfully'], 201);
    }

    // Get all medical records
    public function index()
    {
        $medicalRecords = MedicalRecord::all();
        return response()->json($medicalRecords);
    }

    // Get a single medical record by id
    public function show($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);
        return response()->json($medicalRecord);
    }

    // Update a medical record
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            // Add more validation rules as needed
        ]);

        $medicalRecord = MedicalRecord::findOrFail($id);
        $medicalRecord->description = $request->description;
        // Add more fields as needed
        $medicalRecord->save();

        return response()->json(['message' => 'Medical record updated successfully']);
    }

    // Delete a medical record
    public function destroy($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);
        $medicalRecord->delete();

        return response()->json(['message' => 'Medical record deleted successfully']);
    }
}

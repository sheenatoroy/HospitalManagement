<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // Create a new doctor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            // Add more validation rules as needed
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->specialization = $request->specialization;
        // Add more fields as needed
        $doctor->save();

        return response()->json(['message' => 'Doctor created successfully'], 201);
    }

    // Get all doctors
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    // Get a single doctor by id
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return response()->json($doctor);
    }

    // Update a doctor
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            // Add more validation rules as needed
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->specialization = $request->specialization;
        // Add more fields as needed
        $doctor->save();

        return response()->json(['message' => 'Doctor updated successfully']);
    }

    // Delete a doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return response()->json(['message' => 'Doctor deleted successfully']);
    }
}

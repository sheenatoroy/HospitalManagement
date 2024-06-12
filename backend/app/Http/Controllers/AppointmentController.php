<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // Create a new appointment
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            // Add more validation rules as needed
        ]);

        $appointment = new Appointment();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->patient_id = $request->patient_id;
        $appointment->appointment_date = $request->appointment_date;
        // Add more fields as needed
        $appointment->save();

        return response()->json(['message' => 'Appointment created successfully'], 201);
    }

    // Get all appointments
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }

    // Get a single appointment by id
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }

    // Update an appointment
    public function update(Request $request, $id)
    {
        $request->validate([
            'appointment_date' => 'required|date',
            // Add more validation rules as needed
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->appointment_date = $request->appointment_date;
        // Add more fields as needed
        $appointment->save();

        return response()->json(['message' => 'Appointment updated successfully']);
    }

    // Delete an appointment
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}

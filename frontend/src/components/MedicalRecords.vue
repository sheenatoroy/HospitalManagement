<template>
  <div>
    <nav class="navbar">
      <ul class="navbar-list">
        <li class="navbar-item">
          <router-link to="/patients">Patient Management</router-link>
        </li>
        <li class="navbar-item">
          <router-link to="/doctors">Doctor Management</router-link>
        </li>
        <li class="navbar-item">
          <router-link to="/appointments">Appointment Management</router-link>
        </li>
        <li class="navbar-item">
          <router-link to="/medical-records">Medical Records</router-link>
        </li>
      </ul>
    </nav>

    <div class="admin-view">
      <h1>DOCTOR'S MEDICAL RECORDS</h1>
      <table class="record-table">
        <thead>
          <tr>
            <th>Record ID</th>
            <th>Patient Name</th>
            <th>Date of Birth</th>
            <th>Condition</th>
            <th>Treatment</th>
            <th>Doctor</th>
            <th>Notes</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="record in medicalRecords" :key="record.id">
            <td>{{ record.id }}</td>
            <td>{{ record.patientName }}</td>
            <td>{{ record.dob }}</td>
            <td>{{ record.condition }}</td>
            <td>{{ record.treatment }}</td>
            <td>{{ record.doctor }}</td>
            <td>{{ record.notes }}</td>
            <td><button @click="editRecord(record.id)" class="btn btn-primary">UPDATE</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MedicalRecords',
  data() {
    return {
      medicalRecords: [
        { 
          id: 1, 
          patientName: 'John Doe', 
          dob: '1990-01-01', 
          condition: 'Hypertension', 
          treatment: 'Medication', 
          doctor: 'Dr. Smith', 
          notes: 'Follow up in 3 months' 
        },
        { 
          id: 2, 
          patientName: 'Jane Smith', 
          dob: '1985-05-12', 
          condition: 'Diabetes', 
          treatment: 'Insulin therapy', 
          doctor: 'Dr. Johnson', 
          notes: 'Monitor blood sugar levels daily' 
        }
      ]
    };
  }
}
</script>

<style scoped>
/* Styles for the navbar */
.navbar {
  background-color: #2c3e50; /* Dark blue */
  color: #fff;
  padding: 10px 20px;
}

.navbar-list {
  list-style-type: none;
  padding: 0;
}

.navbar-item {
  display: inline;
  margin-right: 20px;
}

.navbar-item a {
  color: #fff;
  text-decoration: none;
}

.navbar-item a:hover {
  text-decoration: underline;
}

/* Styles for the admin view */
.admin-view {
  padding: 20px;
  background-color: #f0f0f0; /* Light gray */
}

.record-table {
  width: 100%;
  border-collapse: collapse;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adding the box shadow */
}

.record-table th, .record-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.record-table th {
  background-color: #f2f2f2;
}

.record-table th:first-child, .record-table td:first-child {
  width: 10%;
}

.record-table td:first-child {
  font-weight: bold;
}

.record-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.record-table tr:hover {
  background-color: #f0f0f0;
}

/* Button Styles */
.btn {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border: none;
  border-radius: 5px;
}

.btn-primary {
  background-color: #007bff; /* Blue */
  color: #fff;
}

.btn-primary:hover {
  background-color: #0056b3; /* Darker blue on hover */
}
</style>

<template>
    <nav class="navbar">
      <div class="container">
        <i class='bx bx-plus-medical' style="font-size: 3rem; color: white;"></i>
        <ul class="navbar-list">
        
          <li class="navbar-item">
            <router-link to="/appointments" class="navbar-link">Appointments</router-link>
          </li>
          <li class="navbar-item">
            <router-link to="/medical-records" class="navbar-link">Medical Records</router-link>
          </li>
          <li class="navbar-item">
            <router-link to="/" class="navbar-link">Logout</router-link>
          </li>
        </ul>
      </div>
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


.navbar {
    background-color: #2c3e50;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
    margin-top: -4%;
    text-decoration: none;
  }
  
  .navbar:hover {
    background-color: #1f2a36;
  }
  
  .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
  }
  
  .navbar-list {
    list-style: none;
    display: flex;
    gap: 2rem;
    padding: 0;
    margin: 0;
  }
  
  .navbar-item {
    margin: 0;
  }
  
  .navbar-link {
    color: #fff;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  
  .navbar-link:hover {
    background-color: #ffd700;
    color: #2c3e50;
    text-decoration: none;
  }
  
  .navbar-link:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.5);
  }
  
  @media (max-width: 768px) {
    .navbar-list {
      flex-direction: column;
      align-items: center;
    }
  
    .navbar-link {
      display: block;
      width: 100%;
      text-align: center;
    }
  }
</style>

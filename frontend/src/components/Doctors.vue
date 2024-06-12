<template>
    <div>
      <nav class="navbar">
        <div class="container">
          <i class='bx bx-plus-medical' style="font-size: 3rem; color: white;"></i>
          <ul class="navbar-list">
            <li class="navbar-item">
              <router-link to="/patients" class="navbar-link">Patients</router-link>
            </li>
            <li class="navbar-item">
              <router-link to="/doctors" class="navbar-link">Doctors</router-link>
            </li>
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
  
      <div class="container mt-5">
        <div v-if="doctorAppointments.length" class="table-responsive">
          <table class="table table-white table-striped">
            <thead>
              <tr>
                <th scope="col">Record ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Date of Appointment</th>
                <th scope="col">Selected Doctor</th>
                <th scope="col">Purpose</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(appointment, index) in doctorAppointments" :key="appointment.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ appointment.patient_name }}</td>
                <td>{{ appointment.date_of_appointment }}</td>
                <td>{{ appointment.doctor_name }}</td>
                <td>{{ appointment.purpose }}</td>
                <td><button @click="editAppointmentModal(appointment)" class="btn btn-success">Edit</button></td>
                <td><button @click="deleteAppointmentModal(appointment.id)" class="btn btn-danger">Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <div v-else class="text-center">
          <p>No appointments available.</p>
        </div>
  
        <div class="modal" :class="{ 'show': showModal }" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">{{ modalTitle }}</h5>
                <button type="button" class="close" @click="closeModal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="saveAppointment" class="modal-form">
                  <div class="form-group">
                    <label for="patientName">Patient Name:</label>
                    <input type="text" id="patientName" v-model="currentAppointment.patient_name" required>
                  </div>
                  <div class="form-group">
                    <label for="dateOfAppointment">Date of Appointment:</label>
                    <input type="text" id="dateOfAppointment" v-model="currentAppointment.date_of_appointment" required>
                  </div>
                  <div class="form-group">
                    <label for="doctorName">Doctor Name:</label>
                    <input type="text" id="doctorName" v-model="currentAppointment.doctor_name" required>
                  </div>
                  <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose" v-model="currentAppointment.purpose" required>
                  </div>
                  <button type="submit" class="btn btn-primary">{{ modalAction }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'DoctorAppointments',
    data() {
      return {
        doctorAppointments: [
          { id: 1, patient_name: 'Nuela Jane Rabino', date_of_appointment: '2024-06-10', doctor_name: 'Daniel Villare', purpose: 'Follow up checkup' },
        ],
        appointmentDetails: '',
        showModal: false,
        modalTitle: '',
        modalAction: '',
        currentAppointment: null,
      };
    },
    methods: {
      editAppointmentModal(appointment) {
        this.modalTitle = 'Edit Appointment';
        this.modalAction = 'Save';
        // Clone the appointment object to avoid directly modifying the original data
        this.currentAppointment = appointment ? { ...appointment } : {};
        this.showModal = true;
      },
      deleteAppointmentModal(id) {
        // Set currentAppointment to an empty object since you're not passing an appointment
        this.currentAppointment = {};
        // Assign the appointment ID directly, no need to set it to currentAppointment
        this.appointmentDetails = id;
        this.showModal = true;
      },
      saveAppointment() {
        // Your save appointment logic here
        this.closeModal();
      },
      closeModal() {
        this.showModal = false;
        this.modalTitle = '';
        this.modalAction = '';
        this.currentAppointment = null;
      }
    }
  };
  </script>
  
  <style scoped>
  .navbar {
    background-color: #2c3e50;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
    margin-top: -4%
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
  
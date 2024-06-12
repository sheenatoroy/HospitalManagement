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
            <h1 class="mt-5">HISTORY OF APPOINTMENTS</h1>
            <table class="table table-white table-striped">
                <thead>
                <tr>
                    <th scope="col">Record ID</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Date of Appointment</th>
                    <th scope="col">Selected Doctor</th>
                    <th scope="col">Purpose</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(appointment, index) in patientAppointments" :key="appointment.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ appointment.patient_name }}</td>
                    <td>{{ appointment.date_of_appointment }}</td>
                    <td>{{ appointment.doctor_name }}</td>
                    <td>{{ appointment.purpose }}</td>
                </tr>
                </tbody>
            </table>
              
</template>
  
  <script>
  
  export default {
    name: 'PatientView',
    components: {
    
    },
    data() {
      return {
        newAppointmentDetails: '',
        updatedAppointment: '',
        editAppointmentId: null,
        patientAppointments: [
          { id: 1, patient_name: 'Sheena Jane B. Toroy', date_of_appointment: 'June 10, 2024', doctor_name: '', purpose: 'Follow up checkup'  },
          { id: 2, patient_name: 'Daniel Villare',date_of_appointment: 'May 12, 2024', doctor_name: '', purpose: 'Therapy'  },
          { id: 3, patient_name: 'Roldan Valencia',date_of_appointment: 'April 10, 2024', doctor_name: '',purpose: 'Consultation'  },
          { id: 4, patient_name: 'Nicole Mae Velasco',date_of_appointment: 'January 9, 2024', doctor_name: '', purpose: 'Laboratory' }
        ],
        showModal: false,
        newAppointment: {
          name: '',
          dob: '',
          condition: '',
          doctor: ''
        }
      };
    },
    methods: {
      bookAppointment() {
        if (this.newAppointmentDetails) {
          this.patientAppointments.push({
            id: Date.now(),
            details: this.newAppointmentDetails
          });
          this.newAppointmentDetails = '';
        }
      },
      bookAppointmentModal() {
        if (this.newAppointment.name && this.newAppointment.dob && this.newAppointment.condition && this.newAppointment.doctor) {
          this.patientAppointments.push({
            id: Date.now(),
            details: `Appointment with ${this.newAppointment.doctor} for ${this.newAppointment.name} on ${this.newAppointment.dob} regarding ${this.newAppointment.condition}`
          });
          this.newAppointment = { name: '', dob: '', condition: '', doctor: '' };
          this.showModal = false;
        }
      },
      cancelAppointment(id) {
        this.patientAppointments = this.patientAppointments.filter(app => app.id !== id);
      },
      enableEditing(appointment) {
        this.editAppointmentId = appointment.id;
        this.updatedAppointment = appointment.details;
      },
      updateAppointment(id) {
        const appointment = this.patientAppointments.find(app => app.id === id);
        if (appointment) {
          appointment.details = this.updatedAppointment;
          this.editAppointmentId = null;
          this.updatedAppointment = '';
        }
      }
    }
  }
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: auto;
    text-align: center; 
  }
  
  .table {
    margin-top: 20px;
  }
  
  .btn-danger {
    background-color: rgb(239, 92, 92);
    border-color: rgb(239, 92, 92);
    transition: background-color 0.3s ease, border-color 0.3s ease;
    color: #ffffff;
  }
  
  .btn-danger:hover {
    background-color: darkred;
    border-color: darkred;
  }
  
  .btn-warning {
    background-color: #2c3e50;
    border-color: #2c3e50;
    transition: background-color 0.3s ease, border-color 0.3s ease;
    color: #ffffff;
  }
  
  .btn-warning:hover {
    background-color: #405f7e;
    border-color: #405f7e;
  }
  
  .btn-success {
    background-color: #5cb85c;
    border-color: #5cb85c;
    transition: background-color 0.3s ease, border-color 0.3s ease;
    color: #ffffff;
  }
  
  .btn-success:hover {
    background-color: #4cae4c;
    border-color: #4cae4c;
  }

  .input-group-append {
    margin-left: -1px;
  }

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
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
  
      <div class="appointment-section">
        <h2>DOCTOR'S MANAGEMENT</h2>
  
        <table class="table table-white table-striped mt-5">
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
            <tr v-for="(appointment, index) in patientAppointments" :key="appointment.id">
              <th scope="row">{{ index + 1 }}</th>
              <td>{{ appointment.patient_name }}</td>
              <td>{{ appointment.date_of_appointment }}</td>
              <td>{{ appointment.doctor_name }}</td>
              <td>{{ appointment.purpose }}</td>
              <td><button @click="editAppointment(index)" class="btn btn-success">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <div v-if="showModal" class="modal">
        <div class="modal-content">
          <span class="close" @click="cancelEdit">&times;</span>
          <h2 class="modal-title">Edit Appointment</h2>
          <form @submit.prevent="submitAppointment" class="modal-form">
            <div class="form-group">
              <label for="patient_name">Fullname:</label>
              <input type="text" id="patient_name" v-model="newAppointmentDetails.fullname" required>
            </div>
            <div class="form-group">
              <label for="appointment_date">Date of Appointment:</label>
              <input type="date" id="appointment_date" v-model="newAppointmentDetails.date" required>
            </div>
            <div class="form-group">
              <label for="purpose">Select Purpose of Appointment:</label>
              <select id="purpose" v-model="newAppointmentDetails.purpose" required>
                <option value="Checkup">Checkup</option>
                <option value="Consultation">Consultation</option>
                <option value="Treatment">Treatment</option>
              </select>
            </div>
            <div class="form-group">
              <label for="doctor">Select Doctor:</label>
              <select id="doctor" v-model="newAppointmentDetails.doctor" required>
                <option value="Dr. Daniel Villare">Dr. Daniel Villare</option>
                <option value="Dr. Abegil Tutor">Dr. Abegil Tutor</option>
                <option value="Dr. Abegil Tutor">Dr. Roldan Valencia</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'appointmentSection',
    data() {
      return {
        patientAppointments: [
          { id: 1, patient_name: 'Nuela Jane Rabino', date_of_appointment: '2024-06-10', doctor_name: 'Daniel Villare', purpose: 'Follow up checkup' },
        ],
        showModal: false,
        newAppointmentDetails: {
          fullname: '',
          date: '',
          purpose: '',
          doctor: ''
        },
        editedAppointmentIndex: null // Index of the appointment being edited
      };
    },
    methods: {
      editAppointment(index) {
        // Set the index of the appointment being edited and populate the modal with appointment details
        this.editedAppointmentIndex = index;
        this.newAppointmentDetails = { ...this.patientAppointments[index] }; // Clone the appointment details
        this.showModal = true;
      },
      submitAppointment() {
        if (this.editedAppointmentIndex !== null) {
          // If an appointment is being edited, update it
          this.patientAppointments.splice(this.editedAppointmentIndex, 1, {
            id: this.patientAppointments[this.editedAppointmentIndex].id,
            patient_name: this.newAppointmentDetails.fullname,
            date_of_appointment: this.newAppointmentDetails.date,
            doctor_name: this.newAppointmentDetails.doctor,
            purpose: this.newAppointmentDetails.purpose
          });
          this.editedAppointmentIndex = null; // Reset the edited appointment index
        } else {
          // Otherwise, add a new appointment
          const newId = this.patientAppointments.length + 1;
          this.patientAppointments.push({
            id: newId,
            patient_name: this.newAppointmentDetails.fullname,
            date_of_appointment: this.newAppointmentDetails.date,
            doctor_name: this.newAppointmentDetails.doctor,
            purpose: this.newAppointmentDetails.purpose
          });
        }
        this.resetFormAndCloseModal();
      },
      resetFormAndCloseModal() {
        // Reset form data and close the modal
        this.newAppointmentDetails = {
          fullname: '',
          date: '',
          purpose: '',
          doctor: ''
        };
        this.showModal = false;
      },
      cancelEdit() {
        // Reset edited appointment index and close modal
        this.editedAppointmentIndex = null;
        this.resetFormAndCloseModal();
      }
    }
  };
  </script>


<style scoped>
.navbar {
  background-color: #2c3e50;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s ease;
  margin-top: -4%;
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

.appointment-section {
  margin: 2rem;
  text-align: center;
}

.appointment-table {
  width: 100%;
  border-collapse: collapse;
  margin: 1rem 0;
}

.appointment-table th, .appointment-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.appointment-table th {
  background-color: #f2f2f2;
}

.btn {
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary {
  background-color: #007bff;
  color: #fff;
}

.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background: #fff;
  padding: 2rem;
  border-radius: 4px;
  width: 100%;
  max-width: 500px;
  position: relative;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 1.5rem;
  cursor: pointer;
}

.modal-content {
        background: #fff;
        padding: 2rem;
        border-radius: 8px; /* Increased border radius for a softer look */
        width: 90%;
        max-width: 500px;
        position: relative;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Added a slight shadow for depth */
    }

    .modal-title {
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        color: #333; /* Changed title color for better readability */
    }

    .modal-form {
        margin-top: 1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #555; /* Changed label color for better contrast */
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc; /* Improved input border */
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #007bff; /* Changed focus border color to match button */
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.5rem 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover for better feedback */
    }

</style>

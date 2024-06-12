<template>
    <div class="container">
        <h1 class="text-primary mb-4">Patient View</h1>
        
        <nav class="mb-4">
            <router-link to="/appointments" class="navbar-link btn btn-outline-primary me-2">Appointments</router-link>
            <router-link to="/medical-records1" class="navbar-link btn btn-outline-primary">Medical Records</router-link>
        </nav>

        <div class="input-group mb-3">
            <input v-model="newAppointment" class="form-control" placeholder="New Appointment Details" />
            <div class="input-group-append">
                <button @click="bookAppointment" class="btn btn-primary">Book Appointment</button>
            </div>
        </div>

        <table class="table table-white table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Appointment Details</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(appointment, index) in patientAppointments" :key="appointment.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td v-if="editAppointmentId !== appointment.id">{{ appointment.details }}</td>
                    <td v-else>
                        <input v-model="updatedAppointment" class="form-control" />
                    </td>
                    <td>
                        <button v-if="editAppointmentId === appointment.id" @click="updateAppointment(appointment.id)" class="btn btn-success me-2">Save</button>
                        <button v-if="editAppointmentId !== appointment.id" @click="enableEditing(appointment)" class="btn btn-warning me-2">Edit</button>
                        <button @click="cancelAppointment(appointment.id)" class="btn btn-danger">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
      <h1 class="text-primary">Patient View</h1>
      <div class="input-group mb-3">
        <div class="input-group-append">
          <button @click="showModal = true" class="btn btn-primary">Book Appointment</button>
        </div>
      </div>
      <div v-for="appointment in patientAppointments" :key="appointment.id" class="card mb-3">
        <div class="card-body">
          <p class="card-text">{{ appointment.details }}</p>
          <button @click="cancelAppointment(appointment.id)" class="btn btn-danger">Cancel</button>
        </div>
      </div>
  
      <!-- Modal for Booking Appointment -->
      <b-modal v-model:visible="showModal" title="Book Appointment">
        <form @submit.prevent="bookAppointment">
          <div class="form-group">
            <label for="name">Name</label>
            <input v-model="newAppointment.name" type="text" class="form-control" id="name" required>
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input v-model="newAppointment.dob" type="date" class="form-control" id="dob" required>
          </div>
          <div class="form-group">
            <label for="condition">Condition</label>
            <input v-model="newAppointment.condition" type="text" class="form-control" id="condition" required>
          </div>
          <div class="form-group">
            <label for="doctor">Doctor</label>
            <select v-model="newAppointment.doctor" class="form-control" id="doctor" required>
              <option disabled value="">Please select one</option>
              <option>Dr. Smith</option>
              <option>Dr. Johnson</option>
              <option>Dr. Williams</option>
            </select>
          </div>
          <b-button type="submit" variant="primary">Book</b-button>
          <b-button @click="showModal = false" variant="secondary">Cancel</b-button>
        </form>
      </b-modal>
    </div>
</template>

<script>
/* eslint-disable vue/multi-word-component-names */
export default {
    name: 'Patients',
  </template>
  
  <script>
  export default {
    name: 'PatientView',
    data() {
        return {
            newAppointment: '',
            updatedAppointment: '',
            editAppointmentId: null,
            patientAppointments: [
                { id: 1, details: 'Patient Appointment 1' },
                { id: 2, details: 'Patient Appointment 2' },
                { id: 3, details: 'Patient Appointment 3' },
                { id: 4, details: 'Patient Appointment 4' }             
            ]
        };
      return {
        showModal: false,
        newAppointment: {
          name: '',
          dob: '',
          condition: '',
          doctor: ''
        },
        patientAppointments: [
          { id: 1, details: 'Patient Appointment 1' },
          { id: 2, details: 'Patient Appointment 2' },
          { id: 3, details: 'Patient Appointment 3' },
          { id: 4, details: 'Patient Appointment 4' }
        ]
      };
    },
    methods: {
      bookAppointment() {
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

.navbar-link {
    text-decoration: none;
    color: #000000;
}

.navbar-link:hover {
    color: #2c3e50;
}

.input-group-append {
    margin-left: -1px;
}
</style>

  }
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: auto;
    text-align: center;
  }
  
  .card {
    background-color: #2c3e50;
    width: 90%;
    margin: 20px auto;
    transition: transform 0.3s ease;
  }
  
  .card-text {
    color: #ffffff;
  }
  
  .card:hover {
    transform: scale(1.05);
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
  </style>
  
<template>
    <div class="container">
      <h1 class="text-primary">Patient View</h1>
      <div class="input-group mb-3">
        <input v-model="newAppointment" class="form-control" placeholder="New Appointment Details" />
        <div class="input-group-append">
          <button @click="bookAppointment" class="btn btn-primary">Book Appointment</button>
        </div>
      </div>
      <div v-for="appointment in patientAppointments" :key="appointment.id" class="card mb-3">
        <div class="card-body">
          <p class="card-text">{{ appointment.details }}</p>
          <button @click="cancelAppointment(appointment.id)" class="btn btn-danger">Cancel</button>
        </div>
      </div>
    </div>
  </template>

<script>
/* eslint-disable vue/multi-word-component-names */
export default {
    name: 'Patients',
    data() {
        return {
            newAppointment: '',
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
            if (this.newAppointment) {
                this.patientAppointments.push({ id: Date.now(), details: this.newAppointment });
                this.newAppointment = '';
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

/* Component-specific styles go here */
</style>

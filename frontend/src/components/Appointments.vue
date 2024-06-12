<template>
    <div>
      <nav class="navbar">
        <div class="container">
          <i class='bx bx-plus-medical' style="font-size: 3rem; color: white;"></i>
          <ul class="navbar-list">
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
        <h2>Appointments</h2>
        <button @click="showModal = true" class="btn btn-primary">Book Appointment</button>
  
        <table class="appointment-table">
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
            <tr v-for="appointment in appointments" :key="appointment.id">
              <td>{{ appointment.id }}</td>
              <td>{{ appointment.details }}</td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <div v-if="showModal" class="modal">
        <div class="modal-content">
          <span class="close" @click="showModal = false">&times;</span>
          <h2>Book Appointment</h2>
          <form @submit.prevent="bookAppointment">
            <label for="appointment-details">Fullname:</label>
            <input type="text" id="appointment-details" v-model="newAppointmentDetails" required>

            <label for="appointment-details">Age:</label>
            <input type="text" id="appointment-details" v-model="newAppointmentDetails" required>

            <label for="appointment-details">Age:</label>
            <input type="text" id="appointment-details" v-model="newAppointmentDetails" required>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </template>

<script>
export default {
  name: 'AppointmentSection', // Changed the component name to multi-word format
  data() {
    return {
      appointments: [
        { id: 1, details: 'Appointment 1' },
        { id: 2, details: 'Appointment 2' }
      ],
      showModal: false,
      newAppointmentDetails: ''
    };
  },
  methods: {
    bookAppointment() {
      const newId = this.appointments.length + 1;
      this.appointments.push({
        id: newId,
        details: this.newAppointmentDetails
      });
      this.newAppointmentDetails = '';
      this.showModal = false;
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
</style>

<template>
    <div class="container mt-5">
      <button @click="goBack" class="btn btn-secondary mb-4">Back</button>
      <h1 class="mb-4 text-center text-primary">Doctor Appointments</h1>
      <div v-if="doctorAppointments.length" class="row row-cols-1 row-cols-md-2 g-4">
        <div
          v-for="appointment in doctorAppointments"
          :key="appointment.id"
          class="col"
        >
          <div
            class="card h-100 shadow-sm border-primary animate__animated animate__fadeInUp"
          >
            <div class="card-body">
              <h5 class="card-title">Appointment {{ appointment.id }}</h5>
              <p class="card-text">{{ appointment.details }}</p>
              <button
                @click="cancelAppointment(appointment.id)"
                class="btn btn-danger"
              >
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="text-center">
        <p>No appointments available.</p>
      </div>
  
      <!-- Cancel Confirmation Modal -->
      <div
        class="modal fade"
        id="cancelModal"
        tabindex="-1"
        aria-labelledby="cancelModalLabel"
        aria-hidden="true"
        @hidden="onModalHidden"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="cancelModalLabel">Confirm Cancellation</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              Are you sure you want to cancel this appointment?
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                class="btn btn-danger"
                @click="confirmCancel"
              >
                Cancel Appointment
              </button>
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
          { id: 1, details: 'Doctor Appointment 1' },
          { id: 2, details: 'Doctor Appointment 2' },
          { id: 3, details: 'Doctor Appointment 3' },
          { id: 4, details: 'Doctor Appointment 4' },
          { id: 5, details: 'Doctor Appointment 5' },
        ],
        appointmentToCancel: null,
      };
    },
    methods: {
      goBack() {
        this.$router.go(-1);
      },
      cancelAppointment(id) {
        this.doctorAppointments = this.doctorAppointments.filter(
          (app) => app.id !== id
        );
      },
      onModalHidden() {
        this.appointmentToCancel = null;
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 900px;
    margin: auto;
    padding: 2rem;
    background: #f8f9fa;
    border-radius: 0.5rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .text-primary {
    color: #007bff;
  }
  
  .bg-primary {
    background-color: #007bff;
  }
  
  .text-white {
    color: #fff;
  }
  
  .border-primary {
    border-color: #007bff;
  }
  
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }
  
  .btn-secondary {
    background-color: #6c757d;
    border: none;
    transition: background-color 0.3s ease;
  }
  
  .btn-secondary:hover {
    background-color: #5a6268;
  }
  
  .btn-danger {
    background-color: #dc3545;
    border: none;
    transition: background-color 0.3s ease;
  }
  
  .btn-danger:hover {
    background-color: #c82333;
  }
  
  .modal-content {
    border-radius: 0.5rem;
  }
  
  .modal-header {
    border-bottom: none;
  }
  
  .modal-footer {
    border-top: none;
  }
  </style>
  
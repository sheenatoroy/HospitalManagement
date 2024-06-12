<template>
  <div class="container mt-5">
    <button @click="goBack" class="btn btn-secondary mb-4">Back</button>
    <h1 class="mb-4 text-center text-primary">Doctor Appointments</h1>
    <button @click="addAppointmentModal" class="btn btn-primary mb-4">Add Appointment</button>
    <div v-if="doctorAppointments.length" class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="bg-primary text-white">
          <tr>
            <th>ID</th>
            <th>Details</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="appointment in doctorAppointments" :key="appointment.id">
            <td>{{ appointment.id }}</td>
            <td>{{ appointment.details }}</td>
            <td>
              <button @click="editAppointmentModal(appointment)" class="btn btn-warning btn-sm">Edit</button>
              <button @click="deleteAppointmentModal(appointment.id)" class="btn btn-danger btn-sm">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else class="text-center">
      <p>No appointments available.</p>
    </div>

    <!-- Add/Edit Appointment Modal -->
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
            <form @submit.prevent="saveAppointment">
              <div class="form-group">
                <label for="details">Details</label>
                <input type="text" class="form-control" id="details" v-model="appointmentDetails">
              </div>
              <button type="submit" class="btn btn-primary">{{ modalAction }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// eslint-disable-next-line
/* eslint-disable */
export default {
  name: 'DoctorAppointments',
  data() {
    return {
      doctorAppointments: [
        { id: 1, details: 'Doctor Appointment 1' },
        { id: 2, details: 'Doctor Appointment 2' },
        { id: 3, details: 'Doctor Appointment 3' },
        { id: 4, details: 'Doctor Appointment 4' },
        { id: 5, details: 'Doctor Appointment 5' }
      ],
      appointmentDetails: '',
      showModal: false,
      modalTitle: '',
      modalAction: '',
      currentAppointment: null,
    };
  },
  methods: {
    goBack() {
      this.$router.go(-1);
    },
    addAppointmentModal() {
      this.modalTitle = 'Add Appointment';
      this.modalAction = 'Add';
      this.appointmentDetails = '';
      this.showModal = true;
    },
    editAppointmentModal(appointment) {
      this.modalTitle = 'Edit Appointment';
      this.modalAction = 'Save';
      this.appointmentDetails = appointment.details;
      this.currentAppointment = appointment;
      this.showModal = true;
    },
    deleteAppointmentModal(id) {
      this.currentAppointment = id;
      this.showModal = true;
    },
    saveAppointment() {
      if (this.modalAction === 'Add') {
        const newId = this.doctorAppointments.length + 1;
        this.doctorAppointments.push({ id: newId, details: this.appointmentDetails });
      } else {
        const index = this.doctorAppointments.findIndex(app => app.id === this.currentAppointment.id);
        this.doctorAppointments[index].details = this.appointmentDetails;
      }
      this.closeModal();
    },
    closeModal() {
      this.showModal = false;
    },
    confirmDelete() {
      const index = this.doctorAppointments.findIndex(app => app.id === this.currentAppointment);
      this.doctorAppointments.splice(index, 1);
      this.closeModal();
    }
  }
};
</script>



<style scoped>

</style>

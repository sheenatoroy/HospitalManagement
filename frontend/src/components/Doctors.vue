<template>
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">Doctor Appointments</h1>
        <div v-if="doctorAppointments.length" class="row row-cols-1 row-cols-md-2 g-4">
            <div v-for="appointment in doctorAppointments" :key="appointment.id" class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Appointment {{ appointment.id }}</h5>
                        <p class="card-text">{{ appointment.details }}</p>
                        <button @click="openCancelModal(appointment)" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="text-center">
            <p>No appointments available.</p>
        </div>

        <!-- Cancel Confirmation Modal -->
        <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="cancelModalLabel">Confirm Cancellation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel this appointment?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" @click="confirmCancel">Cancel Appointment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
/* eslint-disable vue/multi-word-component-names */
/*eslint-disable */
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
            appointmentToCancel: null
        };
    },
    methods: {
        openCancelModal(appointment) {
            this.appointmentToCancel = appointment;
            const cancelModal = new bootstrap.Modal(document.getElementById('cancelModal'));
            cancelModal.show();
        },
        confirmCancel() {
            if (this.appointmentToCancel) {
                this.doctorAppointments = this.doctorAppointments.filter(app => app.id !== this.appointmentToCancel.id);
                this.appointmentToCancel = null;
                const cancelModal = bootstrap.Modal.getInstance(document.getElementById('cancelModal'));
                cancelModal.hide();
            }
        }
    }
}
</script>

<style scoped>
/* Component-specific styles go here */
.text-primary {
    color: #007bff;
    /* Blue color for headings */
}

.bg-primary {
    background-color: #007bff;
    /* Blue background for modal header */
}

.text-white {
    color: #fff;
    /* White text color for modal header */
}

.border-primary {
    border-color: #007bff;
    /* Blue border color for cards */
}
</style>
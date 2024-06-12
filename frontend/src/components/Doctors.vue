<template>
    <div>

        <h1>Doctor View</h1>
        <div v-for="appointment in doctorAppointments" :key="appointment.id">
            <p>{{ appointment.details }}</p>
            <button @click="cancelAppointment(appointment.id)">Cancel</button>
        </div>
    </div>
</template>

<script>
/* eslint-disable vue/multi-word-component-names */
export default {
    name: 'Docts',
    data() {
        return {
            doctorAppointments: [
                { id: 1, details: 'Doctor Appointment 1' },
                { id: 2, details: 'Doctor Appointment 2' }
            ]
        };
    },
    methods: {
        cancelAppointment(id) {
            this.doctorAppointments = this.doctorAppointments.filter(app => app.id !== id);
        }
    }
}
</script>

<style scoped>
/* Component-specific styles go here */
</style>

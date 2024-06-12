<template>
    <div>
        <!-- sample ui lang to sorry hahaha  -->
        <h1>Admin View</h1>
        <div v-for="appointment in appointments" :key="appointment.id">
            <p>{{ appointment.details }}</p>
        </div>
    </div>
</template>

<script>
/* eslint-disable vue/multi-word-component-names */
export default {
    name: 'Appointment',
    // Component logic goes here
    data() {
        return {
            appointments: [
                { id: 1, details: 'Appointment 1' },
                { id: 2, details: 'Appointment 2' }
            ]
        };
    }
}
</script>

<style scoped>
/* Component-specific styles go here */
</style>

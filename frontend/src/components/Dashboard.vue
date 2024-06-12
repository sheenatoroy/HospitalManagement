<template>
    <div>
        <nav class="navbar">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <router-link to="/patients">Patient Management</router-link>
                </li>
                <li class="navbar-item">
                    <router-link to="/doctors">Doctor Management</router-link>
                </li>
                <li class="navbar-item">
                    <router-link to="/appointments">Appointment Management</router-link>
                </li>
                <li class="navbar-item">
                    <router-link to="/medical-records">Medical Records</router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
/* eslint-disable vue/multi-word-component-names */
export default {
    name: 'Dashboard',
    // Component logic goes here
}
</script>

<style scoped>
.navbar {
    background-color: #2c3e50;
    padding: 1rem;
}

.navbar-list {
    list-style: none;
    display: flex;
    justify-content: space-around;
    margin: 0;
    padding: 0;
}

.navbar-item {
    margin: 0 1rem;
}

.navbar-item a {
    color: #fff;
    text-decoration: none;
}

.navbar-item a:hover {
    text-decoration: underline;
}
</style>

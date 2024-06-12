import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';
import Patients from './components/Patients.vue';
import Doctors from './components/Doctors.vue';
import Appointments from './components/Appointments.vue';
import MedicalRecords from './components/MedicalRecords.vue';
import Registration from './components/Registration.vue';

const routes = [
  { path: '/', component: Login },
  { path: '/dashboard', component: Dashboard },
  { path: '/patients', component: Patients },
  { path: '/doctors', component: Doctors },
  { path: '/appointments', component: Appointments },
  { path: '/medical-records', component: MedicalRecords },
  { path: '/registration', component: Registration },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

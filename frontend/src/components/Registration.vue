<template>
  <div class="splitter-container">
    <div class="wrapper">
      <div class="logo">
      </div>
      <div class="text-center name">
        User Registration
      </div>
      <form @submit.prevent="register" class="form">
        <div class="form-field">
          <input type="text" name="name" v-model="name" placeholder="Name">
        </div>
        <div class="form-field">
          <input type="email" name="email" v-model="email" placeholder="Email">
        </div>
        <div class="form-field">
          <input type="password" name="password" v-model="password" placeholder="Password">
        </div>
        <div class="form-field">
          <input type="password" name="password_confirmation" v-model="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="form-field">
          <select v-model="account_type">
            <option disabled value="">Select Account Type</option>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
          </select>
        </div>
        <button type="submit" class="btn">Register</button>
      </form>
      <div class="text-center">
        <p>Already have an account? <router-link to="/" class="link-sign">Login here!</router-link></p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/lib/axios'; // Ensure correct path to axios

export default {
  name: 'UserRegistration',
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      account_type: ''
    };
  },
  methods: {
    async register() {
      try {
        await axios.post("http://127.0.0.1:8000/api/create", {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
          account_type: this.account_type
        });

        alert("Registration Successful");

        this.name = "";
        this.email = "";
        this.password = "";
        this.password_confirmation = "";
        this.account_type = "";
      } catch (error) {
        console.log(error);
        alert('Error registering: ', error);
      }
    }
  }
};
</script>

<style scoped>
/* Your CSS styles here */
</style>

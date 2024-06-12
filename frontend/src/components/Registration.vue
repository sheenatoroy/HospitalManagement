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
/* eslint-disable vue/multi-word-component-names */
export default {
  name: 'RegistrationForm',
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
    register() {
      if (this.name && this.email && this.password && this.password_confirmation && this.account_type) {
        // All fields are filled, registration successful
        alert('Registration Successful!');

        this.name = "";
        this.email = "";
        this.password = "";
        this.password_confirmation = "";
        this.account_type = "";
        // Here you can add code to submit the registration data to your server
      } else {
        // Missing credentials, show alert
        alert('Missing credentials!');
      }
    }
  }
}
</script>

<style scoped>
/* Your CSS styles here */
</style>

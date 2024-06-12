<template>
    <div>
      <h2>Registration</h2>
      <form @submit.prevent="registerUser">
        <div>
          <label for="account_type">Account Type:</label>
          <select id="account_type" v-model="formData.accountType" required>
            <option value="">Select Account Type</option>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
            <!-- Add more options as needed -->
          </select>
        </div>
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="formData.name" required />
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="formData.email" required />
        </div>
        <div>
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="formData.password" required />
        </div>
        <div>
          <label for="confirmPassword">Confirm Password:</label>
          <input type="password" id="confirmPassword" v-model="formData.confirmPassword" required />
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </template>
  
  <script>
  /* eslint-disable vue/multi-word-component-names */

  import axios from 'axios';
  
  export default {
    name: 'Registration',
    data() {
      return {
        formData: {
          name: '',
          email: '',
          password: '',
          confirmPassword: '',
          accountType: ''
        }
      };
    },
    methods: {
      async registerUser() {
        try {
            const response = await axios.post('http://localhost:8080/api/register', this.formData);
            console.log(response.data); // Handle success message or redirect here
        } catch (error) {
          console.error(error.response.data); // Handle error message display
        }
      }
    }
  };
  </script>
  
  <style scoped>
  /* Your CSS styles here */
  </style>
  
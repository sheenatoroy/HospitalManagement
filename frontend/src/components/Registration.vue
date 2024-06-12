<template>
  <div class="splitter-container">
    <div class="wrapper">
      <i class='bx bx-plus-medical' style="font-size: 3rem;"></i>
      <div class="text-center name">
        Account Registration
      </div>
      <form @submit.prevent="register" class="form">
        <div class="form-field">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" v-model="name" placeholder="Name">
        </div>
        <div class="form-field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" v-model="email" placeholder="Email">
        </div>
        <div class="form-field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" v-model="password" placeholder="Password">
        </div>
        <div class="form-field">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" v-model="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="form-field">
          <label for="account_type">Account Type</label>
          <select id="account_type" v-model="account_type">
            <option disabled value="">Select Account Type</option>
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

label{

  text-align: left;
}
.splitter-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f7f7f7;
}

.wrapper {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 400px;
}

.logo {
  text-align: center;
  margin-bottom: 20px;
}

.name {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
 
}

.form {
  display: flex;
  flex-direction: column;
}

.form-field {
  margin-bottom: 15px;
}

.form-field label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-field input,
.form-field select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
}

.btn {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  text-align: center;
}

.btn:hover {
  background-color: #0056b3;
}

.text-center {
  text-align: center;
}

.link-sign {
  color: #007bff;
  text-decoration: none;
}

.link-sign:hover {
  text-decoration: underline;
}
</style>

<template>
  <div class="login-form">
    <h2>Login</h2>
    <form @submit.prevent="login">
      <input type="email" v-model="email" placeholder="Email" required>
      <input type="password" v-model="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <p v-if="errorMessage" class="error-message">{{ errorMessage }}</p>
    </form>
    <p>Don't have an account? <router-link :to="{ path: '/registration' }">Register</router-link></p>
  </div>
</template>

<script>
/* eslint-disable vue/multi-word-component-names */

export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
      errorMessage: ''
    };
  },
  methods: {
    login() {
      const userData = {
        email: this.email,
        password: this.password
      };

      // Make API call to login endpoint
      fetch('/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(userData)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Login failed');
        }
        return response.json();
      })
      .then(data => {
        // Handle successful login response
        console.log('Login successful', data);
        // Redirect the user or perform other actions
      })
      .catch(error => {
        // Handle login error
        console.error('Login error', error);
        this.errorMessage = 'Invalid email or password';
      });
    }
  }
}
</script>

<style scoped>
.login-form {
  max-width: 300px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.login-form h2 {
  text-align: center;
}

.login-form input[type="email"],
.login-form input[type="password"] {
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.login-form button {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

.login-form button:hover {
  background-color: #0056b3;
}

.error-message {
  color: #ff0000;
  margin-top: 5px;
  text-align: center;
}

p {
  text-align: center;
}
</style>
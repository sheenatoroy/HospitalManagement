<template>
  <div class="login-form">
    <h2>Login Form</h2>
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
  name: 'LoginForm',
  data() {
    return {
      email: '',
      password: '',
      errorMessage: ''
    };
  },
  methods: {
    login() {
      // Check email against predefined accounts
      switch (this.email) {
        case 'nicolemaevelasco@gmail.com':
          this.checkAccountType('patient');
          break;
        case 'danielvillare@gmail.com':
          this.checkAccountType('doctor');
          break;
        case 'toroysheena@gmail.com':
          this.checkAccountType('admin');
          break;
        default:
          this.errorMessage = 'Invalid email or password';
      }
    },
    checkAccountType(accountType) {
      // Here you can handle authentication logic, such as checking password, etc.
      // For simplicity, I'm just setting account type here.
      // You might want to call an API for authentication.
      // For now, I'm just setting a dummy token and redirecting to respective pages.
      const token = 'dummyToken';

      switch (accountType) {
        case 'patient':
          // Assuming '/patient' is the route for patient dashboard
          this.$router.push({ path: '/patients', query: { token } });
          break;
        case 'doctor':
          // Assuming '/doctor' is the route for doctor dashboard
          this.$router.push({ path: '/doctors', query: { token } });
          break;
        case 'admin':
          // Assuming '/admin' is the route for admin dashboard
          this.$router.push({ path: '/dashboard', query: { token } });
          break;
      }
    }
  }
};
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
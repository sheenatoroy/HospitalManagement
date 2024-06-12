<template>
    <nav class="navbar">
      <div class="container">
        <ul class="navbar-list">
          <li class="navbar-item">
            <router-link to="/patients" class="navbar-link">Patients</router-link>
          </li>
          <li class="navbar-item">
            <router-link to="/doctors" class="navbar-link">Doctors</router-link>
          </li>
          <li class="navbar-item">
            <router-link to="/appointments" class="navbar-link">Appointments</router-link>
          </li>
          <li class="navbar-item">
            <router-link to="/medical-records" class="navbar-link">Medical Records</router-link>
          </li>
        </ul>
      </div>
    </nav>
  </template>
  
  <script>
  /*dont remove!!*/
  /* eslint-disable */
  export default {
    name: 'Dashboard',
  }
  </script>
  
  <style scoped>
  .navbar {
    background-color: #2c3e50;
    padding: 1rem 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
  }
  
  .navbar:hover {
    background-color: #1f2a36;
  }
  
  .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
  }
  
  .navbar-list {
    list-style: none;
    display: flex;
    gap: 2rem;
    padding: 0;
    margin: 0;
  }
  
  .navbar-item {
    margin: 0;
  }
  
  .navbar-link {
    color: #fff;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  
  .navbar-link:hover {
    background-color: #ffd700;
    color: #2c3e50;
  }
  
  .navbar-link:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.5);
  }
  
  @media (max-width: 768px) {
    .navbar-list {
      flex-direction: column;
      align-items: center;
    }
  
    .navbar-link {
      display: block;
      width: 100%;
      text-align: center;
    }
  }
  </style>
  
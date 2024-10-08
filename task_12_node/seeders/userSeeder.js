// seeders/userSeeder.js

// const db = require('../db');
require("dotenv").config();
const { faker } = require("@faker-js/faker");

const mysql = require("mysql");
const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_NAME,
});

const seedUsers = () => {
  const users = [];
  for (let i = 0; i < 10; i++) {
    users.push([
      faker.name.fullName(), // Name
      faker.internet.userName(), // Username
      faker.phone.number(), // Phone
      faker.internet.email(), // Email
      faker.internet.url(), // Website
      faker.company.name(),
    ]);
  }

  pool.query(
    "INSERT INTO user (name, username, phone, email, website, companyname) VALUES ?",
    [users],
    (err) => {
      if (err) throw err;
      console.log("Users seeded successfully!");
      process.exit();
    }
  );
};

seedUsers();

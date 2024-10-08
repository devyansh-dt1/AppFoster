require("dotenv").config();
const { faker } = require("@faker-js/faker");

const mysql = require("mysql");
const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_NAME,
});

// const seedProjects = () => {

//     pool.query('SELECT id from user', (err,results)=>{
//         if (err) throw err;
//         const userIds = results.map(user => user.id);

//         const projects = [];

//     })

//   const projects = [];
//   for (let userId = 1; userId <= 10; userId++) {
//     for (let j = 0; j < 3; j++) {
//       projects.push([
//         faker.lorem.words(3),
//         faker.lorem.paragraph(),
//         userId,
//       ]);
//     }
//   }

//   pool.query(
//     "INSERT INTO project (name, body, user_id) VALUES ?",
//     [projects],
//     (err) => {
//       if (err) throw err;
//       console.log("Projects seeded successfully!");
//       process.exit();
//     }
//   );
// };

// seedProjects();

const seedProjects = () => {
  // First, fetch all user IDs from the users table
  pool.query("SELECT id FROM user", (err, results) => {
    if (err) throw err;

    const userIds = results.map((user) => user.id); // Extract all user IDs into an array

    // Now, generate projects for each user
    const projects = [];

    // Loop through each user id and generate 3 projects per user
    userIds.forEach((userId) => {
      for (let j = 0; j < 3; j++) {
        projects.push([
          faker.lorem.words(3), // Project title
          faker.lorem.paragraph(), // Project body (description)
          userId, // Valid user ID from the database
        ]);
      }
    });

    // Insert the projects into the database
    pool.query(
      `INSERT INTO project (name, body, user_id) VALUES ?`,
      [projects],
      (err) => {
        if (err) throw err;
        console.log("Projects seeded successfully!");
        process.exit();
      }
    );
  });
};

seedProjects();

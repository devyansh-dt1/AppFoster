const mysql = require("mysql");

const pool = mysql.createPool({
  
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_NAME,
});

// project list
exports.viewProject = (req, res) => {
  pool.getConnection((err, connection) => {
    if (err) throw err;
    console.log("Connected");

    const user_id = req.params.user_id;

    connection.query(
      "SELECT * FROM project WHERE user_id=?",
      [user_id],
      (err, project) => {
        connection.release();
        if (!err) {
          res.render("homePro", { user_id, project });
        } else {
          console.log(err);
        }
      }
    );
  });
};

//add new project page

exports.projectform = (req, res) => {
  const user_id = req.params.user_id;
  res.render("add-project", { user_id });
};

// add new project

exports.createProject = (req, res) => {
  const { name, body } = req.body;
  const user_id = req.params.user_id;

  pool.getConnection((err, connection) => {
    if (err) throw err;
    console.log("Connected");

    connection.query(
      "INSERT INTO project SET user_id=?, name=?, body=? ",
      [user_id, name, body],
      (err, project) => {
        connection.release();

        if (!err) {
          res.render("add-project", {
            user_id,
            alert: "Project added successfully",
          });
        } else {
          console.log(err);
        }
        // console.log("The data from project : \n", project);
      }
    );
  });
};

// show edit project page

exports.editProject = (req, res) => {
  pool.getConnection((err, connection) => {
    if (err) throw err;
    console.log("Connected");

    const project_id = req.params.project_id;

    connection.query(
      "SELECT * FROM project WHERE id=?",
      [project_id],
      (err, project) => {
        connection.release();
        if (!err) {
          res.render("edit-project", { project });
        } else {
          console.log(err);
        }
      }
    );
  });
};

//update project

exports.updateProject = (req, res) => {
  const project_id = req.params.project_id;
  const { name, body } = req.body;

  pool.getConnection((err, connection) => {
    if (err) throw err;
    console.log("Connected");

    connection.query(
      "UPDATE project SET name=?, body=? WHERE id=?",
      [name, body, project_id],
      (err, project) => {
        connection.release();

        if (!err) {
          pool.getConnection((err, connection) => {
            if (err) throw err;
            console.log("Connected");

            const project_id = req.params.project_id;

            connection.query(
              "SELECT * FROM project WHERE id=?",
              [project_id],
              (err, project) => {
                connection.release();
                if (!err) {
                  res.render("edit-project", {
                    project,
                    alert: "Project Updated Successfully",
                  });
                } else {
                  console.log(err);
                }
              }
            );
          });
        } else {
          console.log(err);
        }
      }
    );
  });
};

//delete Project

exports.deleteProject = (req, res) => {
  pool.getConnection((err, connection) => {
    if (err) throw err;
    console.log("Connected");

    const project_id = req.params.project_id;
    const user_id = req.body.user_id;

    connection.query(
      "DELETE FROM project WHERE id=?",
      [project_id],
      (err, project) => {
        connection.release();
        if (!err) {
          res.redirect(`/project/user/${user_id}`);
        } else {
          console.log(err);
        }
      }
    );
  });
};

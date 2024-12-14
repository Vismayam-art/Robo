<?php
session_start();

include('connection.php');

// Check if the user is trying to log in
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $stmt = $conn->prepare("SELECT * FROM admin_login_tab WHERE Email = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['user_uid'];
        session_regenerate_id();
        header("Location: control.php");
        exit();
    } else {
        echo '<script>
                window.location.href = "admin.php";
                alert("Login failed. Invalid username or password!!");
              </script>';
    }
}


// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<br>";
}

// Process course insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['academic_year'])) {
    // Assign values to variables
    $academic_year = $_POST["academic_year"];
    $semester = $_POST["semester"];
    $course_code = $_POST["course_code"];
    $dept_id = $_POST["dept_id"];
    $batch = $_POST["batch"];
    $course_name = $_POST["course_name"];

    // Check if "Is Elective" is selected
    $is_elective = isset($_POST["is_elective"]) ? 1 : 0;

    // Check if dept_id exists in department_tab
    $check_dept_sql = "SELECT * FROM department_tab WHERE dept_id = '$dept_id'";
    $result = $conn->query($check_dept_sql);

    if ($result === false) {
        // Handle the SQL error if any
        die("Error executing department check query: " . $conn->error);
    } else {
        // Check if the department exists
        if ($result->num_rows > 0) {
            // Department exists, proceed to insert into academic_tab

            // Use prepared statement to insert data into the database
            $insert_sql = "INSERT INTO courses_tab (academic_year, semester, course_code, dept_id, batch, course_name, is_elective)
                           VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Prepare the statement
            $stmt = $conn->prepare($insert_sql);

            if ($stmt === false) {
                // Handle the preparation error
                die("Error preparing statement: " . $conn->error);
            } else {
                // Bind parameters with data types
                $stmt->bind_param("ssssiss", $academic_year, $semester, $course_code, $dept_id, $batch, $course_name, $is_elective);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "Data inserted successfully";
                } else {
                    // Log the error and provide a message
                    die("Error executing statement: " . $stmt->error);
                }

                // Close the statement
                $stmt->close();
            }
        } else {
            // Department does not exist, handle accordingly
            die("Error: Department with ID $dept_id does not exist.");
        }
    }
}

// Process Parameters Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['no_of_iats'])) {
    // Retrieve form data
    $no_of_iats = $_POST['no_of_iats'];
    $iat_max_questions = $_POST['iat_max_questions'];
    $iat_max_sub_questions = $_POST['iat_max_sub_questions'];
    $max_no_assignments = $_POST['max_no_assignments'];
    $assignments_max_sub_questions = $_POST['assignments_max_sub_questions'];
    $see_max_questions = $_POST['see_max_questions'];
    $see_max_sub_questions = $_POST['see_max_sub_questions'];
    $co_po_attainment_level = $_POST['co_po_attainment_level'];

    // Prepare the SQL statement
    $sql = "INSERT INTO parameters_tab (no_of_iats, iat_max_questions, iat_max_sub_questions, max_no_assignments, assignments_max_sub_questions, see_max_questions, see_max_sub_questions, co_po_attainment_level)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiid", $no_of_iats, $iat_max_questions, $iat_max_sub_questions, $max_no_assignments, $assignments_max_sub_questions, $see_max_questions, $see_max_sub_questions, $co_po_attainment_level);

    // Execute the query
    if ($stmt->execute()) {
        echo "Parameters data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close the database connection
$conn->close();
?>

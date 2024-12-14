<?php 
    include("connection.php");
    include("login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <title>Combined Page</title>
    <style>
        .custom-border {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #12914b;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            width: 70px; /* Adjust the width as needed */
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #12914b;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #12914b;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        .btn {
            background-color: #12914b
        }

        .custom-border{
            max-width: 100%;
        }

        @media screen and (max-width: 570px) {
    #form {
      width: 65%;
      margin-left:none;
      padding:40px;
    }
  }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="custom-border">
                <h2>Parameters</h2>
                <form name="form" action="login.php" method="POST">
                    <div class="form-group">
                        <label for="maxIATs">Max IAT's:</label>
                        <div class="d-flex">
                            <input type="number" class="form-control mr-2" id="maxIATs" name="no_of_iats" min="0" max="10" oninput="validateInput(this);">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="maxIATQuestions">IAT Max Questions:</label>
                      <div class="d-flex">
                        <input type="number" class="form-control mr-2" id="maxIATQuestions" name="iat_max_questions" min="0" max="10" oninput="validateInput(this);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="maxIATSubQuestions">IAT Max Sub Questions:</label>
                      <div class="d-flex">
                        <input type="number" class="form-control mr-2" id="maxIATSubQuestions" name="iat_max_sub_questions" min="0" max="10" oninput="validateInput(this);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="maxAssignments">Max No of Assignments:</label>
                      <div class="d-flex">
                        <input type="number" class="form-control mr-2" id="maxAssignments" name="max_no_assignments" min="0" max="10" oninput="validateInput(this);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="assignmentSubQuestions">Assignments Max Sub Questions:</label>
                      <div class="d-flex">
                        <input type="number" class="form-control mr-2" id="assignmentSubQuestions" name="assignments_max_sub_questions" min="0" max="10" oninput="validateInput(this);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="seeMaxQuestions">SEE Max Questions:</label>
                      <div class="d-flex">
                        <input type="number" class="form-control mr-2" id="seeMaxQuestions" name="see_max_questions" min="0" max="10" oninput="validateInput(this);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="seeMaxSubQuestions">SEE Max Sub Questions:</label>
                      <div class="d-flex">
                        <input type="number" class="form-control mr-2" id="seeMaxSubQuestions" name="see_max_sub_questions" min="0" max="10" oninput="validateInput(this);">
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="coPoAttainment">Co-po Attainment Level:</label>
                    <div class="d-flex">
                     <input type="number" class="form-control mr-2" id="coPoAttainment" name="co_po_attainment_level" min="0" max="10" step="0.1" oninput="validateInput(this);">
                    </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Right Section - Courses Form -->
        <div class="col-md-6">
            <div class="custom-border">
                <h2 class="center-title">Courses</h2>
                <form action="login.php" method="post">
                    <!-- Add your form fields here -->
                    <!-- Example field -->
                    <div class="form-group">
                        <label for="academic_year">Academic Year</label>
                        <select class="form-control" id="academic_year" name="academic_year" placeholder="Enter Academic Year">  
                            <option>2017-2018</option>
                            <option>2018-2019</option>
                            <option>2019-2020</option>
                            <option>2020-2021</option>
                            <option>2021-2022</option>
                            <option>2022-2023</option>
                            <option>2023-2024</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="semester">Semester</label>
                    <select class="form-control" id="semester" name="semester">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                   </div>
                   <div class="form-group">
                      <label for="course_code">Course Code</label>
                      <input type="text" class="form-control" id="course_code" name="course_code" placeholder="Enter Course Code">
                </div>
                <div class="form-group">
                <label for="dept_id">Department ID</label>
                <select class="form-control" id="dept_id" name="dept_id">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <!-- Add more options as needed -->
                </select>
                </div>
                <div class="form-group">
                    <label for="batch">Batch</label>
                    <select class="form-control" id="batch" name="batch">
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                    </select>
                </div>
                  <div class="form-group">
                      <label for="course_name">Course Name</label>
                      <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name">
                  </div>
   
                  <div class="form-group">
                   <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="is_elective" name="is_elective" value="1">
                   <label class="form-check-label" for="is_elective">Is Elective</label><br>
                   <input class="form-check-input" type="checkbox" id="is_not_elective" name="is_not_elective" value="0">
                  <label class="form-check-label" for="is_not_elective">Is Not Elective</label><br>
               </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
        <a href="admin.php" class="btn btn-secondary"><-Back</a>
    </div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function validateInput(input) {
        if (input.id === 'coPoAttainment') {
            // Validate Co-po Attainment Level as a decimal
            var value = parseFloat(input.value);

            if (isNaN(value) || value < 0 || value > 10) {
                input.setCustomValidity('Please enter a decimal number between 0 and 10 for Co-po Attainment Level.');
            } else {
                input.setCustomValidity('');
            }
        } else {
            // Validate other inputs as whole numbers
            var value = parseInt(input.value);

            if (isNaN(value) || value < 1 || value > 10) {
                input.setCustomValidity('Please enter a whole number between 1 and 10.');
            } else {
                input.setCustomValidity('');
            }
        }
    }
</script>
>

</body>
</html>

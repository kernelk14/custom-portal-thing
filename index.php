<?php
	$host = "localhost";
	$user = "root";
	$pass = $user;
	$db = "ports";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    } else {
        echo '<script>console.log("Database connected successfully.")</script>';
    }

    $query = "SELECT * FROM Students";
    $result = $conn->query($query);
    $count = (int)$result->num_rows;

    function printCard($row): void {
        $name = htmlspecialchars($row['last_name'] . ", " . $row['first_name'] . " " . $row['mid_name']);
        $details = htmlspecialchars($row['student_number'] . " | " . $row['email']);
        $course = htmlspecialchars($row['course'] . " " . $row['yr_lvl'] . "-" . $row['section']);
        
        echo "
            <div class='container border border-secondary rounded-3 mt-3'>
                <h3><b>{$name}</b></h3>
                <h4>{$details}</h4>
                <h4>{$course}</h4>
            </div>";
    }

    function printRowCol($row): void {
        $name = htmlspecialchars($row['last_name'] . ", " . $row['first_name'] . " " . $row['mid_name']);
        $sid = htmlspecialchars($row['student_number']);
        $email = htmlspecialchars($row['email']);
        $course = htmlspecialchars($row['course'] . " " . $row['yr_lvl'] . "-" . $row['section']);

        echo "
            <tr>
                <th scope='row'>{$sid}</th>
                <td>{$name}</td>
                <td>{$course}</td>
                <td>{$email}</td>
            </tr>
        ";
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <title>Ports</title>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </head>
    <body>
        <!--form method="POST" action="actions/add_student">
            <input type="submit" name="submit" value="Add Student" class="btn btn-outline-dark m-2 mt-2">
        </form -->
        <h3 class="m-2">List of Students:</h3>
        <div class="container-fluid">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Course, Year and Section</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($count < 1) echo "<h4>No records found.</h4>";
                        else {
                            $query = "SELECT * FROM Students ORDER BY last_name ASC";
                            $result = $conn->query($query);
                            while ($row = $result->fetch_assoc()) {
                                // printCard($row);
                                printRowCol($row);
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <center>
                <form method="POST" action="actions/add_student">
                    <input type="submit" name="submit" value="Add Student" class="btn btn-outline-dark m-2 mt-2">
                </form>
            </center>
        </div>
    </body>
</html>

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

    $query = "SELECT COUNT(*) AS total FROM Students";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $count = (int)$row;

    function printCard($row) {
        echo "<div class='container border border-secondary rounded-3 mt-3'>";
        echo "<h3><b>" . $row['last_name'] . ", " . $row['first_name'] . " " . $row['mid_name'] . "</b></h3>";
        echo "<h4>" . $row['student_number'] . " | " . $row['email'] . "</h4>";
        echo "<h4>" . $row['course'] . " " . $row['yr_lvl'] . "-" . $row['section'] . "</h4>";
        echo "</div>";
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
        <form method="POST" action="actions/add_student">
            <input type="submit" name="submit" value="Add Student" class="btn btn-outline-dark m-2 mt-2">
        </form>
        <h3 class="m-2">List of Students:</h3> 
        <?php
            if ($count < 1) echo "<h4>No records found.</h4>";
            else {
                $query = "SELECT * FROM Students ORDER BY last_name ASC";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    printCard($row);
                }
            }
        ?>
    </body>
</html>

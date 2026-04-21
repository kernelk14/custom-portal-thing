<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" />
        <title>Add Student</title>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </head>
    <body>
        <form method="POST" action="../../">
            <input type="submit" name="go_back" value="Go Back" class="btn btn-outline-dark m-2 mt-2">
            <h3 class="m-2">Add Students</h3>
        </form>
        
        <div class="container">
            <form method="POST" action="./action.php">
                <div class="form-group">
                    <label for="stud_num">Enter the student number</label>
                    <input type="text" id="stud_num" name="student_number" class="form-control" placeholder="Student Number" autocomplete="off">
                </div>
                <br />
                <div class="form-row">
                    <div class="form-group col-auto">
                        <label for="lname">Enter your last name</label>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" autocomplete="off">
                        <label for="lname">Enter your first name</label>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" autocomplete="off">
                        <label for="lname">Enter your middle name</label>
                        <input type="text" id="mname" name="mname" class="form-control" placeholder="Middle Name" autocomplete="off">
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <label for="email_add">Institutional email address</label>
                    <input type="email" class="form-control" name="email_add" id="email_add" placeholder="firstname.lastname@citycollegeoftagaytay.edu.ph" autocomplete="off">
                </div>
                <br />
                <div class="form-group">
                    <label for="course">Enter the course initials</label>
                    <input type="text" id="course" name="course" class="form-control" placeholder="Course" autocomplete="off">

                    <label for="yr_lvl">Year Level</label>
                    <select class="form-control" name="yr_lvl" id="yr_lvl">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>

                    <label for="secs">Section Number</label>
                    <select class="form-control" name="section" id="secs">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <input type="submit" name="action_add_student" class="btn btn-primary mb-2" value="Submit" />
                </div>
            </form>
        </div>
    </body>
</html>

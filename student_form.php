<?php
if (isset($_POST["submit"])) {
    $name=$_POST["Full_Name"];
    $Student=$_POST["Student_ID"];
    $email=$_POST["email"];
    $Registration=$_POST["Registration_Number"];
    $Course=$_POST["Course"];
    echo $name;
    echo $email;
    echo $Registration;
    echo $Course;
    echo $Student;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>  
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device_width initial_scale=1.0">
     <style>
     #Welcome{
        color:Red;
        text_align:center;
        background_color:black;

     }
     p{
        text_align:center;
        text_hover:green;
     }
     #form{
        text_align:center;
        color:white;
        background_color:yellow;
        
     }
     </style>

    </head>

    <body>
        <section class="Welcome">
            <p>Welcome to Student Registration portal</p>
        </section>
        <section class="form">
            <p>Fill Your details</p>
            <form action="" method="post">
                <label for="Full_Name">Full Name:</label>
                <input type="text" name="Full_Name" id="Full_Name">
                <br><br>
                <label for="Student_ID">Student ID</label>
                <input type="text" id="Student_ID" name="Student_ID">
                <br><br>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" >
                <br><br>
                <label for="Registration_number">Registration Number</label>
                <input type="number" id="Registration_Number" name="Registration_Number">
                <br><br>
                <label for="Course">Course</label>
                <input type="text" name="Course" id="Course">
                <br><br>
                <button type="submit" name="submit">Submit</button>

            </form>
        </section>
    </body>
</html>
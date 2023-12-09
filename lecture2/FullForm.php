<?php

$DATABASE_HOSTNAME = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "fullform";


$conn = mysqli_connect($DATABASE_HOSTNAME, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$conn) {
    die("Database is not connected Something wrong");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $classX_board = $_POST["classX_board"];
    $classX_percentage = $_POST["classX_percentage"];
    $classX_year = $_POST["classX_year"];

    $classXII_board = $_POST["classXII_board"];
    $classXII_percentage = $_POST["classXII_percentage"];
    $classXII_year = $_POST["classXII_year"];

    $graduation_board = $_POST["graduation_board"];
    $graduation_percentage = $_POST["graduation_percentage"];
    $graduation_year = $_POST["graduation_year"];

    $masters_board = $_POST["masters_board"];
    $masters_percentage = $_POST["masters_percentage"];
    $masters_year = $_POST["masters_year"];


    $insertsql = "INSERT INTO qualification ( Board_name, user_Percentage, Year_of_Passing) 
    VALUES ('$classX_board', '$classX_percentage', '$classX_year'),
           ('$classXII_board', '$classXII_percentage', '$classXII_year'),
           ('$graduation_board', '$graduation_percentage', '$graduation_year'),
           ('$masters_board', '$masters_percentage', '$masters_year');";


    $connect_query = mysqli_query($conn, $insertsql);


    if ($connect_query) {
        echo "<script> alert('Update')</script>";
    } else {
        echo "<script> alert('not upadte Check Form')</script>";
    }
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registration form</title>
    <link rel="stylesheet" href="index2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        div {
            margin: 20px 0;
            display: flex;
            align-items: center;
        }

        input,
        select,
        textarea {
            margin-left: 1rem;
        }
    </style>
</head>

<body style="background-color: #F8F9FA;">
    <div class="container m-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if ($_POST['submit']) {

                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $DOB = $_POST['DOB'];
                        $user_email = $_POST['user_email'];
                        $user_num = $_POST['mobile_num'];
                        $user_gender = $_POST['user_gender'];
                        $user_address = $_POST['user_address'];
                        $user_city = $_POST['user_city'];
                        $user_pin_code = $_POST['user_pin_code'];
                        $user_state = $_POST['user_state'];
                        $user_country = $_POST['user_counthobbies'];
                        $user_hobbies = $_POST['user_hobbies'];
                        $user_applied_courses = $_POST['user_applied_courses'];

                        $select_query = "SELECT * from qualification";
                        $con_query = mysqli_query($conn, $select_query);
                        $Result = mysqli_fetch_assoc($con_query);

                        $qualification_id = $Result['Qualification_id'];

                        $insert_sql_query = "INSERT INTO `user _data`(`user_first_name`, `user_last_name`, `user_dob`, `user_email`, `user_num`, `user_gender`, `user_address`, `user_city`, `user_pin`, `user_state`, `user_country`, `user_hobbies`, `user_qualification`, `user_applied_courses`) VALUES ('$first_name','$last_name','$DOB','$user_email','$user_num','$user_gender','$user_address','$user_city','$user_pin_code','$user_state','$user_country','$user_hobbies','$qualification_id','$user_applied_courses')";


                        if ($insert_sql_query) {
                            echo("<div class='alert alert-success'>Update done</div>");
                        }
                    }
                }
                ?>
                <form method="post" action="./FullForm.php" enctype="multipart/form-data">


                    <!-- FN -->
                    <div>
                        <label for="1">FIRST NAME</label>
                        <input name="first_name" class="me-4" type="text" id="1" /><span>(max 30 characters and A-Z)</span>
                    </div>

                    <!-- LN -->
                    <div>
                        <label for="2">LAST NAME</label>
                        <input name="last_name" class="me-4" type="text" id="2" /><span>(max 30 characters and A-Z)</span>
                    </div>

                    <!-- DOB -->
                    <div>
                        <label for="3">DATE OF BIRTH</label>
                        <input name="DOB" type="date" />
                    </div>

                    <!-- EMI -->
                    <div>
                        <label for="4">EMAIL ID</label>
                        <input name="user_email" class="me-4" type="email" id="4" />
                    </div>

                    <!-- MN -->
                    <div>
                        <label for="5">MOBILE NUMBER</label>
                        <input id="5" name="mobile_num" class="me-4" type="number" /><span>(10 digit number)</span>
                    </div>

                    <!-- GENDER -->
                    <div>
                        <label name="user_gender" style="margin-right: 10px;" for="gender">GENDER</label>
                        <input value="Male" type="radio" id="gender" /> Male
                        <input value="Female" type="radio" id="gender" /> Female
                    </div>

                    <!-- ADD -->
                    <div>
                        <label for="7">ADDRESS</label>
                        <textarea name="user_address" id="7" cols="25" rows="1"></textarea><span>(max 30 characters a-z and A-Z)</span>
                    </div>

                    <!-- CITY -->
                    <div>
                        <label for="8">CITY</label>
                        <select id="8" name="user_city">
                            <option value="Karachi" selected>Karachi</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Islamabad">Islamabad</option>
                            <option value="Multan">Multan</option>
                            <option value="Faisalabad">Faisalabad</option>
                            <option value="Apna Ghar">Apna Ghar</option>
                        </select>
                    </div>

                    <!-- PC -->
                    <div>
                        <label for="9">PIN CODE</label>
                        <input class="me-4" type="text" id="9" name="user_pin_code" /><span>
                            (6 digit number)
                        </span>
                    </div>

                    <!-- ST -->
                    <div>
                        <label for="10">STATE</label>
                        <input class="me-4" type="text" id="10" name="user_state" /><span>
                            (max 30 charactersa-z and A-Z)
                        </span>
                        <!-- CUN -->
                    </div>
                    <div>
                        <label for="11">COUNTRY</label>
                        <select name="user_country" id="11">
                            <option value="Paksitan" selected>Paksitan</option>
                            <option value="India">India</option>
                            <option value="Australia">Australia</option>
                            <option value="Germany">Germany</option>
                        </select>
                    </div>
                    <!-- HOBBIES -->
                    <div>
                        <label style="margin-right: 10px;" for="hobbies">HOBBIES</label>
                        <input name="user_hobbies" value="Drawing" id="hobbies" type="radio" />Drawing
                        <input name="user_hobbies" value="Singing" id="hobbies" type="radio" />Singing
                        <input name="user_hobbies" value="Dancing" id="hobbies" type="radio" />Dancing
                        <input name="user_hobbies" value="Sketching" id="hobbies" type="radio" />Sketching
                        <label style="margin-left: 10px;" for="hobbies">Others</label>
                        <input name="user_hobbies" id="12" type="text" />
                    </div>
                    <!-- QF -->
                    <label>QUALIFICATION</label>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>SI?.No Examination</th>
                                    <th>Board</th>
                                    <th>Percentage</th>
                                    <th>Year of Passing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 Class X</td>
                                    <td><input class="me-4" type="text" name="classX_board" /></td>
                                    <td><input class="me-4" type="text" name="classX_percentage" /></td>
                                    <td><input class="me-4" type="text" name="classX_year" /></td>
                                </tr>
                                <tr>
                                    <td>2 Class XII</td>
                                    <td><input class="me-4" type="text" name="classXII_board" /></td>
                                    <td><input class="me-4" type="text" name="classXII_percentage" /></td>
                                    <td><input class="me-4" type="text" name="classXII_year" /></td>
                                </tr>
                                <tr>
                                    <td>3 Graduation</td>
                                    <td><input class="me-4" type="text" name="graduation_board" /></td>
                                    <td><input class="me-4" type="text" name="graduation_percentage" /></td>
                                    <td><input class="me-4" type="text" name="graduation_year" /></td>
                                </tr>
                                <tr>
                                    <td>4 Masters</td>
                                    <td><input class="me-4" type="text" name="masters_board" /></td>
                                    <td><input class="me-4" type="text" name="masters_percentage" /></td>
                                    <td><input class="me-4" type="text" name="masters_year" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <!-- CAF -->
                    <div>
                        <label name="user_applied_courses" style="margin-right: 50px;" for="courses"> COURSES APPLIED FOR</label>
                        <input name="user_applied_courses" for="courses" value="BCA" type="radio" />BCA
                        <input name="user_applied_courses" value="B.Sc" for="courses" type="radio" />B.Sc
                        <input name="user_applied_courses" value="B.Com" type="radio" for="courses" />B.Com
                        <input name="user_applied_courses" value="B.A" type="radio" for="courses" />B.A
                    </div>
                    <!-- SUB reset -->

                    <button name="submit" style="margin: 10px 5rem;" type="submit" class="btn btn-success w-25">Submit</button>
                    <button style="margin: 10px 5rem;" type="reset" class="btn btn-danger w-25">Reset</button>
                </form>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
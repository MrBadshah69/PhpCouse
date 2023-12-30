<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "FILESUPLOADING";


$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("database is not connected" . mysqli_connect_error());
};

$db = "CREATE DATABASE IF NOT EXISTS " . $database;

$con_db = mysqli_query($conn, $db);

$db_table = "CREATE TABLE IF NOT EXISTS info(

    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    User_Image VARCHAR(1000),
    User_Resume VARCHAR(1000)

)";

$sql = mysqli_query($conn, $db_table);

if (!$sql) {
    echo "table not exists";
};

if (isset($_FILES['pic_passport_size'])) {

    $pic_passport_size_name = $_FILES['pic_passport_size']['name'];
    $pic_passport_size_type = $_FILES['pic_passport_size']['type'];
    $pic_passport_size_tmp_name = $_FILES['pic_passport_size']['tmp_name'];
    $pic_passport_size = $_FILES['pic_passport_size']['size'];

    if ($pic_passport_size_type == "image/jpg" || $pic_passport_size_type == "image/png") {

        if ($pic_passport_size < 1000000 && $pic_passport_size > 1000) {
            $move_pp_pic = move_uploaded_file($pic_passport_size_tmp_name, "fileuploading/$pic_passport_size_name");
            if ($move_pp_pic) {
                $pp_insert = "insert into info (User_Image) values ('$pic_passport_size_name')";
                $insert_query = mysqli_query($conn, $pp_insert);

                if ($insert_query) {
                    echo "Passport Size Image Inserted";
                }
            }
        } else {
            echo "<div class='container
            mt-5'>
            <div class='alert alert-danger'>Image size is not less lhen 1Mb</div>
            </div>";
        }
    } else {

        echo "<div class='container
        mt-5'>
        <div class='alert alert-danger'>Only jpg and png allowed</div>
        </div>";
    }

    $user_resume_name = $_FILES['resume']['name'];
    $user_resume_type = $_FILES['resume']['type'];
    $user_resume_tmp_name = $_FILES['resume']['tmp_name'];
    $user_resume_size = $_FILES['resume']['size'];

    if ($user_resume_type == "pdf") {
        $move_user_resume = move_uploaded_file($user_resume_tmp_name, "filesuploading/resume/$user_resume_name");

        if ($move_user_resume) {

            $insert_pdf = "INSERT INTO INFO (User_Resume) VALUES ('$user_resume_name')";
            $Result = mysqli_query($conn, $insert_pdf);
            if ($Result) {
                echo "Rusume Inserted";
            }
        }
    } else {
        echo "<div class='container
    mt-5'>
    <div class='alert alert-danger'>Only Pdf format allowed</div>
    </div>";
    }

    // echo "<div class='container
    // mt-5'><pre>";
    // print_r($_FILES);
    // echo "</pre></div>";
};

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filesuploading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .star {
            display: inline;
            font-size: 10px;
            color: red;
        }

        span {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container
    mt-5">
        <form action="Filesuploadinglecture.php" method="post" enctype="multipart/form-data">


            <label class="" for="inputGroupFile04">Attach your passport Size Picture: <sup class="star">size less then 1MB jpg png only&bigstar;</sup></label>
            <div class="input-group">
                <input required name="pic_passport_size" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>


            <label class="mt-5" for="inputGroupFile04">Attach your Resume (CVs): <sup class="star"> only PDF&bigstar;</sup></label>
            <div class="input-group">
                <input name="resume" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>


            <button class="btn btn-outline-secondary mt-5" type="submit">Submit</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
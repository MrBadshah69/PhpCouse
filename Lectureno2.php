<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .bn53 {
            background-color: #b81515;
            padding: 7px;
            width: 100%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            animation: bn53bounce 4s infinite;
            cursor: pointer;
        }

        @keyframes bn53bounce {

            5%,
            50% {
                transform: scale(1);
            }

            10% {
                transform: scale(1);
            }

            15% {
                transform: scale(1);
            }

            20% {
                transform: scale(1) rotate(-5deg);
            }

            25% {
                transform: scale(1) rotate(5deg);
            }

            30% {
                transform: scale(1) rotate(-3deg);
            }

            35% {
                transform: scale(1) rotate(2deg);
            }

            40% {
                transform: scale(1) rotate(0);
            }
        }

        h1,
        h3 {
            color: #b81515;
            text-decoration: underline;
        }

        /* WHATSAPP ICON  */
        .whatsapp-icon-link {
            display: inline-block;
            position: fixed;
            bottom: 20px;
            right: 20px;
            text-decoration: none;
        }

        .whatsapp-icon-link img {
            width: 50px;
            height: auto;
            border-radius: 50%;
        }


        .whatsapp-icon-link:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body style="background-color: #26282B;">

    <!-- WHATSAPP ICON -->

    <a style="z-index: 1;" data-aos="fade-left" data-aos-duration="1000" href="https://wa.me/message/QMU3ADQXKCE5M1" target="_blank" class="whatsapp-icon-link">
        <img src="https://play-lh.googleusercontent.com/bYtqbOcTYOlgc6gqZ2rwb8lptHuwlNE75zYJu6Bn076-hTmvd96HH-6v7S0YUAAJXoJN=w240-h480-rw" alt="WhatsApp Icon">
    </a>

    <!-- WHATSAPP ICON END -->
    <!-- HEADING -->
    <div>
        <a href="Lectureno2.php"><h1 class="text-center py-5">Currency Converter</h1></a>
    </div>

    <!-- CONTAINER -->
    <div class="container">
        <?php


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tocuurency = $_POST['to_Currency'];
            $fromcuurency = $_POST['From_Currency'];
            $number = $_POST['number'];

            $exchangerates = [

                'PKR' => 0.0028,
                'SAR' => 0.21,
                'TRY' => 0.027,
                'JOD' => 0.0025,


            ];

            $Exchange_value = $number * ($exchangerates[$tocuurency]) / ($exchangerates[$fromcuurency]);
        }






        ?>

        <form method="post">
            <div class="form-floating mt-3">
                <input name="number" type="number" class="form-control" id="floatingInput" placeholder="Enter Your Amount">
                <label for="floatingInput">Enter Your Amount</label>
            </div>


            <select name="From_Currency" class="form-select mt-3" aria-label="Default select example">
                <option selected>Open This Select Currency</option>
                <option value="PKR">PKR</option>
                <option value="SAR">SAR</option>
                <option value="TRY">TRY</option>
                <option value="JOD">JOD</option>
            </select>



            <select name="to_Currency" class="form-select mt-3" aria-label="Default select example">
                <option selected>Open This Select Currency</option>
                <option value="PKR">PKR</option>
                <option value="SAR">SAR</option>
                <option value="TRY">TRY</option>
                <option value="JOD">JOD</option>
            </select>


            <button name="convert" type="submit" class="my-5 bn53">CONVERT</button>

        </form>

        <h3 class="mt-5">RESULT</h3>
        <input type="text" readonly class="form-control" value="<?php
                                                                echo "$number $fromcuurency = $Exchange_value $tocuurency";
                                                                ?>">






    </div>






</body>

</html>
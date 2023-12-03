<?php
// Mein Highlight ; terminertor Is req ///////////////////////

// Use for print any string
echo  "<div class='container'><h6 class='text-center'>HELLO WORLD!!!!!!!!!!!!!!!!!!</h6>";
echo  "<h1 class='text-center'>Calculator</h1>";

$Answer = "";

// for get Name From Html
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    // Using IF_ELSE STATEMENTS
    if ($num1 == "" or $num2 == "") {
        echo "<div class='container mt-5'>
                <div class='alert alert-danger'>Field Values.....</div>
            </div>";
    } else {
        if ($operator == "Addition") {
            $Answer = $num1 + $num2;
        } else if ($operator == "Subtraction") {
            $Answer = $num1 - $num2;
        } else if ($operator == "Multiplication") {
            $Answer = $num1 * $num2;
        } else if ($operator == "division") {
            $Answer = $num1 / $num2;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            background-image: url(https://png.pngtree.com/background/20211215/original/pngtree-cartoon-satellite-ruler-calculator-linear-education-background-picture-image_1458755.jpg);
            background-repeat: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form method="post">
            <label class="form-label">First Value</label><br>
            <input name="num1" type="number" class="form-control"><br>

            
            <label class="form-label">Operator</label><br>
            <select name="operator" class="form-control">
                <option value="Addition">Addition</option>
                <option value="Subtraction">Subtraction</option>
                <option value="Multiplication">Multiplication</option>
                <option value="division">Division</option>
            </select><br>
            
            <label class="form-label">Second Value</label><br>
            <input name="num2" type="number" class="form-control"><br>
            
            <label class="form-label">Answer</label>
            <input class="form-control" type="text" name="Answer" readonly value="<?php echo $Answer; ?>">

            <br>
            <input type="submit" name="submit" value="Calculate" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
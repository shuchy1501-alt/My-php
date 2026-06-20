<!DOCTYPE html>
<html>
<body>

<form method="post">
    First Number:
    <input type="number" name="num1"><br><br>

    Second Number:
    <input type="number" name="num2"><br><br>

    Third Number:
    <input type="number" name="num3"><br><br>

    <input type="submit" value="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];

    if ($num1 >= $num2 && $num1 >= $num3) {
        echo "<h3>Largest number is: $num1</h3>";
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        echo "<h3>Largest number is: $num2</h3>";
    } else {
        echo "<h3>Largest number is: $num3</h3>";
    }
}
?>

</body>
</html>
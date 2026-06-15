<?php

if(isset($_POST['submit'])){
    $marks = $_POST['marks'];

    if($marks >= 80){
        echo "<h2 style='color:green'>Grade: A+</h2>";
    }elseif($marks >= 70){
        echo "<h2 style='color:green'>Grade: A</h2>";
    }elseif($marks >= 60){
        echo "<h2 style='color:green'>Grade: B</h2>";
    }elseif($marks >= 40){
        echo "<h2 style='color:green'>Grade: D</h2>";
    }else{
        echo "<h2 style='color:red'>Grade: F</h2>";
    }
}
?>

<form method="post">
    <input type="number" name="marks"><br><br>
    <input type="submit" name="submit" value="submit">
</form>
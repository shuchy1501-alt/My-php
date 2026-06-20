<?php 


if(isset($_POST['submit'])){
    $marks = $_POST['marks'];

    if($marks >="A+"){
        echo "outstanding";
    }elseif($marks >= "A"){
        echo "very good";
    }elseif($marks >= "B"){
        echo "good";
    }elseif($marks >= "C"){
        echo "poor";
    }else{
        echo "fail";
    }
}
?>

<form method="post">
    <input type="text" name="marks"><br><br>
    <input type="submit" name="submit" value="submit">
</form>



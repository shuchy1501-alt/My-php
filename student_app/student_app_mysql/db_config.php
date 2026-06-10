<?php
try{
    $db= new mysqli("localhost", "root","","carrierhub");
     echo "data connect succesfully";
}catch(\Throwable $th){
    echo $th->getMessage();
 
}
$data = $db->query("select* from student");
$student = $data->fetch_all(MYSQLI_ASSOC);
foreach($student as $value){
      print_r($value);
      echo $value["id"] ."<br>";
      echo $value["Name"] ."<br>";
      echo $value["email"] ."<br>";
      echo $value["Address"] ."<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";

}


?>
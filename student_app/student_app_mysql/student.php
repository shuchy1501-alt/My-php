<?php
class Student
{
  public $id;
  public $name;
  public $email;
  public $gender;
  public $mobile;

  public function __construct($_id, $_name, $_email, $_gender, $_mobile)
  {
    $this->id = trim($_id);
    $this->name = trim($_name);
    $this->email = trim($_email);
    $this->gender = trim($_gender);
    $this->mobile = trim($_mobile);
  }
  function save()
  {
    $data = PHP_EOL . "$this->id,$this->name,$this->email,$this->gender,$this->mobile";
    file_put_contents("students_data.txt", $data, FILE_APPEND);
    return "Saved succesfully";
  }
  static function find($_id)
  {
    $data = file("students_data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $result = [];

    foreach ($data as $key => $value) {
      list($sid, $name, $email, $gender, $mobile) = explode(",", $value);
      if ($sid == $_id) {
        $result = compact("sid", "name", "email", "gender", "mobile");
      }
    }
    if (count($result)) {
      return $result;
    }
    return $result;
  }
  static function all()
  {
    $data = file("students_data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return $data;
  }
  function update()
  {
    $students = $this->getData();
    $data = "";
    foreach ($students as $student) {
      list($id) = explode(",", $student);

      if ($id == $this->id) {
        $data .= "$this->id,$this->name,$this->email,$this->gender,$this->mobile" . PHP_EOL;
      } else {
        $data .= $student.PHP_EOL;
      }
    }
    file_put_contents("students_data.txt", $data);
    return "Deleted Succesfully";
  }
  private function getData()
  {
    return file("students_data.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
  }
}

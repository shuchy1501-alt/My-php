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

    // Save Student
    public function save()
    {
        $data = PHP_EOL . "$this->id,$this->name,$this->email,$this->gender,$this->mobile";

        file_put_contents("students_data.txt", $data, FILE_APPEND);

        return "Saved Successfully";
    }

    // Find Student by ID
    public static function find($_id)
    {
        $students = file(
            "students_data.txt",
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );

        $result = [];

        foreach ($students as $student) {

            list($sid, $name, $email, $gender, $mobile) =
                explode(",", $student);

            if ($sid == $_id) {

                $result = compact(
                    "sid",
                    "name",
                    "email",
                    "gender",
                    "mobile"
                );

                break;
            }
        }

        return $result;
    }

    // Get All Students
    public static function all()
    {
        return file(
            "students_data.txt",
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );
    }

    // Update Student
    public function update()
    {
        $students = self::all();

        $data = "";

        foreach ($students as $student) {

            list($id) = explode(",", $student);

            if ($id == $this->id) {

                $data .=
                    "$this->id,$this->name,$this->email,$this->gender,$this->mobile"
                    . PHP_EOL;

            } else {

                $data .= $student . PHP_EOL;
            }
        }

        file_put_contents("students_data.txt", trim($data));

        return "Updated Successfully";
    }

    // Delete Student
    public static function delete($_id)
    {
        $students = self::all();

        $data = "";

        foreach ($students as $student) {

            list($id) = explode(",", $student);

            if ($id != $_id) {

                $data .= $student . PHP_EOL;
            }
        }

        file_put_contents("students_data.txt", trim($data));

        return "Deleted Successfully";
    }

    // Private Helper Method
    private function getData()
    {
        return file(
            "students_data.txt",
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );
    }
}
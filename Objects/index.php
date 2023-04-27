<?php
class SchoolPerson {
    public $name;
    public $surname;
    private $group;
    private $bday;
    function __construct($name, $surname, $group, $bday) {
        $this->name = $name;
        $this->surname = $surname;
        $this->group = $group;
        $this->bday = $bday;
    }
    function getGroup() {
        return $this->group;
    }
    function getAge() {
        $timeBday = new DateTime($this->bday);
        $timeNow = new DateTime();
        $age = ($timeNow->diff($timeBday))->y;
        return $age;
    }
    function getFullName() {
        $name = $this->name;
        $surname = $this->surname;
        return $name.' '.$surname;
    }
    function setName($name) {
        $this->name = $name;
    }
    function setSurname($surname) {
        $this->surname = $surname;
    }
    function setBday($bday) {
        $this->bday = $bday;
    }
}
class Teacher extends SchoolPerson {
    private $salary;
    function __construct($a,$b,$c,$d, $salary) {
        parent::__construct($a,$b,$c,$d);
        $this->salary = $salary;
    }
    function setSalary($salary) {
        $this->salary = $salary;
    }
    function getSalary() {
        return $this->salary;
    }
}
class Student extends SchoolPerson {
    private $stipend;
    function __construct($a,$b,$c,$d, $stipend) {
        parent::__construct($a,$b,$c,$d);
        $this->stipend = $stipend;
    }
    function setStipend($stipend) {
        $this->stipend = $stipend;
    }
    function getStipend() {
        return $this->stipend;
    }
}
$teacher = new Teacher('Juris', 'Ozols', '5', '09/15/1980', 2000);
$student = new Student('Emils', 'Petersons', 'IPa22', '11/26/2006', 95);
echo "<pre>";
var_dump($teacher);
var_dump($student);
echo $teacher->getGroup();
?>
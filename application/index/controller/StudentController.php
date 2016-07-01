<?php
namespace app\index\controller;
use app\model\Student;      // student
/**
 * student
 */
class StudentController extends IndexController
{
    public function index()
    {
        // get datas
        $students = Student::paginate();

        // assign
        $this->assign('students', $students);
        return $this->fetch();
    }
}
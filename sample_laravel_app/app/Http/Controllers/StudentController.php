<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function getIndex()
    {
        $query = Student::query();
        // 全件取得 +ページネーション  studentsテーブルからカラムがidをdesc = 昇順で10件。
        $students = $query->orderBy('id','desc')->paginate(10);
        return view('student.list')->with('students',$students);
    }
}
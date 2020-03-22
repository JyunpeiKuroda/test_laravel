<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    //一覧画面(一覧取得)
    public function getIndex() {
        $query = Student::query();
        // 全件取得 +ページネーション  studentsテーブルからカラムがidをdesc = 昇順で10件。
        $students = $query->orderBy('id','desc')->paginate(10);
        return view('student.list')->with('students',$students);
    }

    //新規登録(入力画面)
    public function new_index() {
        return view('student.new_index');
    }

    //新規登録(確認画面)
    public function new_confirm(\App\Http\Requests\CheckStudentRequest $req) {
        $data = $req->all();
        return view('student.new_confirm')->with($data);
    }

    //新規登録(完了画面)
    public function new_finish(Request $request) {
        // Studentオブジェクト生成
        $student = new \App\Student;

        // 値の登録
        $student->username = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;

        // 保存
        $student->save();

        // 一覧にリダイレクト
        return redirect()->to('student/list');
    }
}
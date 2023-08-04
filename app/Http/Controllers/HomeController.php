<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    private $students;
    public function __construct()
    {
        $this->students = new Student();
    }
    public function index()
    {
        $students = $this->students->getAll();
        return view('welcome', compact('students'));
    }
    public function add()
    {
        return view('add');
    }
    public function postAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'major' => 'required',
            'image' => 'mimes:png,jpg'
        ], [
            'name.required' => 'Vui lòng nhập tên sinh viên',
            'gender.required' => 'Vui lòng chọn giới tính',
            'major.required' => 'Vui lòng chọn chuyên ngành',
            'image.mimes' => 'Vui lòng chọn đúng định dạng của ảnh'
        ]);
        $image_name = $request->file('image')->getClientOriginalName();
        $data = [
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'major_id' => $request->input('major'),
            'image_path' => $image_name,
            'created_at' => date('Y-m-d H:i:s')
        ];
        if (!Storage::exists('public/image/' . $image_name)) {
            $request->file('image')->move(public_path('images'), $image_name);
        }
        $this->students->add($data);
        return redirect()->route('index')->with('msg', 'Thêm sinh viên thành công !');
    }
    public function edit($id)
    {
        $student = $this->students->find($id)->first();
        return view('edit', compact('student'));
    }
    public function postEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'major' => 'required',
            'image' => 'mimes:png,jpg'
        ], [
            'name.required' => 'Vui lòng nhập tên sinh viên',
            'gender.required' => 'Vui lòng chọn giới tính',
            'major.required' => 'Vui lòng chọn chuyên ngành',
            'image.mimes' => 'Vui lòng chọn đúng định dạng của ảnh'
        ]);
        $image_name = $request->file('image')->getClientOriginalName();
        $data = [
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'major_id' => $request->input('major'),
            'image_path' => $image_name,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if (!Storage::exists('public/image/' . $image_name)) {
            $request->file('image')->move(public_path('images'), $image_name);
        }
        $this->students->edit($data, $id);
        return redirect()->route('index')->with('msg', 'Cập nhật sinh viên thành công !');
    }
    public function postDelete($id)
    {
        $this->students->remove($id);
        return redirect()->route('index')->with('msg', 'Xoá sinh viên thành công !');
    }
}
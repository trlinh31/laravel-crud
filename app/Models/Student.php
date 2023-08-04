<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public function getAll()
    {
        $students = DB::table($this->table)
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->select('students.*', 'majors.name as major_name')
            ->orderBy('students.id', 'asc')
            ->get();
        return $students;
    }
    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }
    public function find($id)
    {
        $student = DB::table($this->table)
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->select('students.*', 'majors.name as major_name')
            ->where('students.id', $id)
            ->get();
        return $student;
    }
    public function edit($data, $id)
    {
        DB::table($this->table)->where('id', $id)->update($data);
    }
    public function remove($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
    }
}

@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-primary text-uppercase py-5 fw-bold">Danh sách sinh viên</h1>
            <a href="{{ route('students.add') }}" class="btn btn-primary text-uppercase ">Thêm mới sinh viên</a>
            @if (session('msg'))
                <div class="alert alert-danger my-3" role="alert">{{ session('msg') }}</div>
            @endif
            <hr>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ & tên</th>
                        <th>Giới tính</th>
                        <th>Chuyên ngành</th>
                        <th>Ảnh</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($students))
                        @foreach ($students as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->gender ? 'Nam' : 'Nữ' }}</td>
                                <td>{{ $item->major_name }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $item->image_path) }}" alt="" height="100px">
                                </td>
                                <td colspan="2">
                                    <a href="{{ route('students.edit', ['id' => $item->id]) }}"
                                        class="btn btn-warning">Sửa</a>
                                    <a href="{{ route('students.postDelete', ['id' => $item->id]) }}"
                                        class="btn btn-danger">Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

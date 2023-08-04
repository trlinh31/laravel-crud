@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-primary text-uppercase py-5 fw-bold">Sửa sinh viên</h1>
            <hr>
            <form action="{{ route('students.postEdit', ['id' => $student->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sinh viên</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ $student->name }}"
                        placeholder="Nhập tên sinh viên">
                    @error('name')
                        <span class="text-danger mt-3 d-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="1"
                            {{ $student->gender == 1 ? 'checked' : false }}>
                        <label class="form-check-label" for="male">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="0"
                            {{ $student->gender == 0 ? 'checked' : false }}>
                        <label class="form-check-label" for="female">
                            Nữ
                        </label>
                    </div>
                    @error('gender')
                        <span class="text-danger mt-3 d-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Chuyên ngành</label>
                    <select class="form-select" name="major">
                        <option value="">-- Chọn chuyên ngành --</option>
                        <option {{ $student->major_id == 1 ? 'selected' : false }} value="1">Công nghệ thông tin
                        </option>
                        <option {{ $student->major_id == 2 ? 'selected' : false }} value="2">Kế toán</option>
                        <option {{ $student->major_id == 3 ? 'selected' : false }} value="3">Điện</option>
                    </select>
                    @error('major')
                        <span class="text-danger mt-3 d-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh</label>
                    <input type="file" name="image" id="image">
                    @error('image')
                        <span class="text-danger mt-3 d-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{ route('index') }}" class="btn btn-light ms-3">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection

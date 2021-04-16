@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mata Kuliah</h1>
        <a href="{{ route('courses.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="card bg-success text-white shadow mb-4">
            <div class="card-body">
                {{ $message }}
            </div>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Kuliah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Semester</th>
                            <th>Perlu Lab</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->semester }}</td>
                                @if ($course->is_lab_required == 0)
                                    <td>Tidak</td>
                                @else
                                    <td>Ya</td>
                                @endif
                                <td>{{ $course->majors }}</td>
                                @if ($course->time == '0')
                                    <td>Pagi</td>
                                @else
                                    <td>Malam</td>
                                @endif
                                <td>
                                    <a href="{{ route('courses.edit', $course->id) }}"
                                        class="btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-pen fa-sm text-white"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id], 'style' => 'display:inline']) !!}
                                    <button class="btn btn-sm btn-danger shadow-sm" type="submit">
                                        <i class="fa fa-trash fa-sm text-white"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

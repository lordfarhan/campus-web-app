@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Mata Kuliah</h1>
    </div>

    {{ Form::model($course, ['method' => 'PATCH', 'route' => ['courses.update', $course->id]]) }}
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('courses.index') }}" class="btn btn-outline-info">Kembali</a>
        </div>
        <div class="card-body">
            @if (!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all()) }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('code', 'Kode') }}
                        {{ Form::text('code', $course->code, ['placeholder' => 'SI2020', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Nama') }}
                        {{ Form::text('name', $course->name, ['placeholder' => 'Pengembangan Web', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('semester', 'Semester') }}
                        {{ Form::number('semester', $course->semester, ['placeholder' => '1', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::checkbox('is_lab_required', true, $course->is_lab_required) }}
                        {{ Form::label('is_lab_required', 'Perlu Lab') }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('majors[]', 'Jurusan') }}
                        {{ Form::select('majors[]', ['Teknik Informatika' => 'Teknik Informatika', 'Sistem Informasi' => 'Sistem Informasi'], $majors, ['multiple' => 'multiple', 'class' => 'form-control majors']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('time', 'Kelas') }}
                        <div>
                            {{ Form::radio('time', '0', $course->time == '0' ? 'true' : 'false') }}
                            {{ Form::label('time', 'Pagi') }}
                        </div>
                        <div>
                            {{ Form::radio('time', '1', $course->time == '1' ? 'true' : 'false') }}
                            {{ Form::label('time', 'Malam') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            {{ Form::submit('Simpan', ['class' => 'btn btn-primary pull-right']) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.majors').select2();
        });

    </script>
@endsection

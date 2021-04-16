@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Mata Kuliah</h1>
    </div>

    {{ Form::open(['route' => 'courses.store', 'method' => 'POST']) }}
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
                        {{ Form::text('code', null, ['placeholder' => 'SI2020', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Nama') }}
                        {{ Form::text('name', null, ['placeholder' => 'Pengembangan Web', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('semester', 'Semester') }}
                        {{ Form::number('semester', null, ['placeholder' => '1', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::checkbox('is_lab_required', true, null) }}
                        {{ Form::label('is_lab_required', 'Perlu Lab') }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('majors[]', 'Jurusan') }}
                        {{ Form::select('majors[]', ['Teknik Informatika' => 'Teknik Informatika', 'Sistem Informasi' => 'Sistem Informasi'], null, ['multiple' => 'multiple', 'class' => 'form-control majors']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('time', 'Kelas') }}
                        <div>
                            {{ Form::radio('time', '0', true) }}
                            {{ Form::label('time', 'Pagi') }}
                        </div>
                        <div>
                            {{ Form::radio('time', '1', false) }}
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

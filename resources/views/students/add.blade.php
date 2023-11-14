@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Estudantes') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger border-left-danger" role="alert">
                                <ul class="pl-4 my-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('students.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome: *</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="registration">Matrícula: *</label>
                                <input type="text" class="form-control" id="registration" name="registration" value="{{ old('registration') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Data de nascimento: *</label>
                                <input id="birth_date" name="birth_date" type="date" class="form-control" value="{{ old('birth_date') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="course_id">Curso: *</label>
                                <select class="form-control" id="course_id" name="course_id" required>
                                    <option value="">Selecione</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == old('course_id') ? 'selected="selected"' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

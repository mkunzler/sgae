@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Semestres') }}</h1>

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
                        <form method="post" action="{{ route('semesters.update', $semester->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Título: *</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $semester->title }}" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="year">Ano: *</label>
                                    <input type="text" class="form-control" id="year" name="year" maxlength="4" value="{{ $semester->year }}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="course_id">Curso: *</label>
                                    <select class="form-control" id="course_id" name="course_id" required>
                                        <option value="">Selecione</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ $course->id == $semester->course_id ? 'selected="selected"' : '' }}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Planos de acessibilidade'. ' - '.$student->name) }}</h1>

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
                        <h5 class="d-inline">Estudante: </h5>{{ $student->name }}<br>
                        <h5 class="d-inline">Curso: </h5>{{ $student->course->name }}
                    </div>
                </div>
            </div>
        </div>
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
                        <form method="post" action="{{ route('accessibility.plans.update', $accessibilityPlan->id) }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="semester_id">Semestre: *</label>
                                    <select class="form-control" id="semester_id" name="semester_id" required>
                                        <option value="">Selecione</option>
                                        @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}" {{ $semester->id == $accessibilityPlan->semester_id ? 'selected="selected"' : '' }}>{{ $semester->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="chronogram">Cronograma de Atendimento: *</label>
                                    <input type="text" class="form-control" id="chronogram" name="chronogram" value="{{ $accessibilityPlan->chronogram }}" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="deficiency" class="form-label">Tipo de Deficiência ou Necessidade Educacional Especifica: *</label>
                                    <textarea class="form-control" id="deficiency" name="deficiency" rows="5" required>{{ $accessibilityPlan->deficiency }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="objective" class="form-label">Objetivos do AEE: *</label>
                                    <textarea class="form-control" id="objective" name="objective" rows="5" required>{{ $accessibilityPlan->objective }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="methodology" class="form-label">Metodologia de Ensino: *</label>
                                    <textarea class="form-control" id="methodology" name="methodology" rows="5" required>{{ $accessibilityPlan->methodology }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="instrument" class="form-label">Instrumentos a serem usados pelas professora educadora especial: *</label>
                                    <textarea class="form-control" id="instrument" name="instrument" rows="5" required>{{ $accessibilityPlan->instrument }}</textarea>
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

@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Turmas'. ' - '.$student->name) }}</h1>

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
                        <form method="post" action="{{ route('class.rooms.create') }}">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <div class="form-group">
                                <label for="semester_id">Semestre: *</label>
                                <select class="form-control" id="semester_id" name="semester_id" required>
                                    <option value="">Selecione</option>
                                    @foreach($semesters as $semester)
                                    <option value="{{ $semester->id }}" {{ $semester->id == old('semester_id') ? 'selected="selected"' : '' }}>{{ $semester->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Disciplina: *</label>
                                <select class="form-control" id="subject_id" name="subject_id" required>
                                    <option value="">Selecione</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == old('subject_id') ? 'selected="selected"' : '' }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Professor: *</label>
                                <select class="form-control" id="teacher_id" name="teacher_id" required>
                                    <option value="">Selecione</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $teacher->id == old('teacher_id') ? 'selected="selected"' : '' }}>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="situation">Situação: *</label>
                                <select class="form-control" id="situation" name="situation" required>
                                    <option value="">Selecione</option>
                                    @foreach($enumSituation::cases() as $situation)
                                    <option value="{{ $situation->value }}" {{ $situation->value == old('situation') ? 'selected="selected"' : '' }}>{{ $situation->description() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="workload">Carga horária: *</label>
                                <select class="form-control" id="workload" name="workload" required>
                                    <option value="">Selecione</option>
                                    @foreach($enumWorkload::cases() as $workload)
                                    <option value="{{ $workload->value }}" {{ $workload->value == old('workload') ? 'selected="selected"' : '' }}>{{ $workload->description() }}</option>
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

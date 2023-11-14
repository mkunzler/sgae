@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Disciplinas') }}</h1>

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
                        <form method="post" action="{{ route('multiple.create') }}">
                            @csrf
                            <input type="hidden" id="hidden-course" value="{{ $course_id }}">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="button" name="remove" id="remove" class="btn btn-danger" data-num="1" style="display: none;"><span><i class="fa fa-minus"></i></span></button>
                                    <button type="button" name="add" id="add" class="btn btn-success"><span><i class="fa fa-plus"></i></span></button>
                                </div>
                            </div>
                            <div id="div-subjects">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome: *</label>
                                        <input type="text" class="form-control" id="name" name="subjects[0][name]"  required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_id">Curso: *</label>
                                        <select class="form-control" id="course_id" name="subjects[0][course_id]" required readonly="readonly" tabindex="-1" aria-disabled="true">
                                            <option value="">Selecione</option>
                                            @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $course->id == old('course_id') || $course->id == $course_id ? 'selected="selected"' : '' }}>{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('assets/js/subjects.js') }}"></script>
@endsection

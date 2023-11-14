@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Estudantes') }}</h1>
        <a href="{{ route('students.add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cadastrar Estudante</a>
    </div>

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
            <div class="col-12">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="table-students">
                            <thead>
                              <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col">Curso</th>
                                <th data-orderable="false" scope="col">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                              <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->registration }}</td>
                                <td>{{ $student->course->name }}</td>
                                <td>
                                    {{-- <a href="{{ route('class.rooms.index', $student->id) }}" class="btn btn-warning btn-circle btn-sm" title="Ver salas">
                                        <i class="fas fa-book"></i>
                                    </a> --}}
                                    <a href="{{ route('follows.index', $student->id) }}" class="btn btn-primary btn-circle btn-sm" title="Ver Acompanhamentos">
                                        <i class="fas fa-tasks"></i>
                                    </a>
                                    <a href="{{ route('accessibility.plans.index', $student->id) }}" class="btn btn-success btn-circle btn-sm" title="Ver Planos">
                                        <i class="fas fa-table"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-circle btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button
                                        onclick="deleteRegister({{ $student->id }}, 'Deseja realmente excluir este estudante ?', '{{ route('students.delete', $student->id) }}')"
                                        class="btn btn-danger btn-circle btn-sm" title="Excluir">
                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#table-students').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
                },
            });
        });
    </script>
@endsection

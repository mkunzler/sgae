@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Cursos') }}</h1>
        <a href="{{ route('courses.add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cadastrar Curso</a>
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
                        <table class="table table-striped table-bordered" id="table-courses">
                            <thead>
                              <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Modalidade</th>
                                <th data-orderable="false" scope="col">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $course)
                              <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->modality->description() }}</td>
                                <td>
                                <a href="{{ route('subjects.multiple', $course->id) }}" class="btn btn-warning btn-circle btn-sm" title="Adicionar disciplinas">
                                    <i class="fas fa-book"></i>
                                </a>
                                <a href="{{ route('subjects.index', $course->id) }}" class="btn btn-success btn-circle btn-sm" title="Ver disciplinas">
                                    <i class="fas fa-list"></i>
                                </a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-info btn-circle btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button
                                    onclick="deleteRegister({{ $course->id }}, 'Deseja realmente excluir este curso ?', '{{ route('courses.delete', $course->id) }}')"
                                    class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip"
                                    title="Excluir">
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
            $('#table-courses').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
                },
            });
        });
    </script>
@endsection

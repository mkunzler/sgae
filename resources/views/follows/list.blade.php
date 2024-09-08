@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Acompanhamentos'. ' - '.$student->name) }}</h1>
        <a href="{{ route('follows.add', $student->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cadastrar Acompanhamento</a>
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
                        <table class="table table-striped table-bordered" id="table-follows">
                            <thead>
                              <tr>
                                <th scope="col">Nome do Aluno</th>
                                <th scope="col">Disciplina</th>
                                <th scope="col">Professor</th>
                                <th data-orderable="false" scope="col">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($follows as $follow)
                              <tr>
                                <td>{{ $follow->student->name }}</td>
                                <td>{{ $follow->subject->name }}</td>
                                <td>{{ $follow->teacher->name }}</td>
                                <td>
                                    <a href="{{ route('follows.report', $follow->id) }}" class="btn btn-success btn-circle btn-sm" title="Gerar Relatório PDF">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('follows.edit', [$follow->id, $follow->student->id]) }}" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button
                                        onclick="deleteRegister({{ $follow->id }}, 'Deseja realmente excluir este acompanhamento ?', '{{ route('follows.delete', $follow->id) }}')"
                                        class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip"
                                        data-original-title="Excluir">
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
            $('#table-follows').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
                },
            });
        });
    </script>
@endsection

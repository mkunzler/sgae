@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Users') }}</h1>
        <a href="{{ route('users.add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cadastrar Usuário</a>
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
                        <table class="table table-striped table-bordered" id="table-users">
                            <thead>
                              <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Permissão</th>
                                <th data-orderable="false" scope="col">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                              <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->registration }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->permission->description() }}</td>
                                <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button
                                    onclick="deleteRegister({{ $user->id }}, 'Deseja realmente excluir este usuário ?', '{{ route('users.delete', $user->id) }}')"
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
            $('#table-users').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
                },
            });
        });
    </script>
@endsection

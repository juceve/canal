@extends('layouts.app')

@section('template_title')
User
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;" class="mb-3">

        <h4>Usuarios</h4>

        <div class="float-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                <i class="fas fa-plus"></i> Nuevo
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <table class="table dataTable">
                            <thead class="table-info">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles[0]->name }}</td>
                                    <td>
                                        @if ($user->status)
                                        <span class="badge rounded-pill bg-success">Activo</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Inactivo</span>
                                        @endif
                                    </td>

                                    <td align="right">

                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Opciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"
                                                style="z-index: 5000">

                                                <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Info
                                                </a>
                                                @can('users.edit')
                                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                                <a href="{{ route('users.asignaRol', $user->id) }}"
                                                    class="dropdown-item"><i class="fas fa-user-shield"></i> Asignar
                                                    Rol</a>
                                                <a href="{{ route('resetpassword', $user->id) }}"
                                                    class="dropdown-item"><i class="fas fa-key"></i> Reset Password</a>
                                                @endcan
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @can('users.edit')
                                                    <button class="dropdown-item">
                                                        <i class="fa-solid fa-rotate"></i> Cambia Estado</button>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete')
                                                        }}</button> --}}
                                                </form>
                                            </div>
                                        </div>

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
</div>
@endsection
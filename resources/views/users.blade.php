@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Usuarios</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Usuario</th>
                                <th>Email</th>
                                <th>Fuente</th>
                                <th>Fecha de Creación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Usuarios locales de Laravel -->
                            @foreach ($localUsers as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>Local (Laravel)</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @endforeach

                            <!-- Usuarios de LearnWorlds -->
                            @if (!empty($learnWorldsUsers))
                                @foreach ($learnWorldsUsers as $user)
                                    <tr>
                                        <td>{{ $user['id'] ?? 'N/A' }}</td>
                                        <td>{{ $user['username'] ?? 'N/A' }}</td>
                                        <td>{{ $user['email'] ?? 'N/A' }}</td>
                                        <td>LearnWorlds</td>
                                        <td>{{ $user['created_at'] ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No se pudieron cargar los usuarios de LearnWorlds</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
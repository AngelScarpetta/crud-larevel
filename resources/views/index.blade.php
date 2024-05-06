@extends('layouts.base')

@section('content')
<!DOCTYPE html>
<html lang="es">
<!--//Angel Scarpetta NRC:66988 ID:862954 fecha: 06/05/2024 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Tareas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #3D317D;
        }

        .container {
            max-width: 600px;
            background-color: #2874A6;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            max-width: 150px;
        }

        input[type="text"],
        textarea,
        select {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 8px;
            width: 100%;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #FFC300;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #C70039;
        }

        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #DC3545;
            border-color: #DC3545;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
            border-color: #a71d2a;
        }

        .text-white {
            color: #fff;
        }

        .text-secondary {
            color: #6c757d;
        }

        .bg-warning {
            background-color: #ffc107 !important;
        }

        /* Estilos para la tabla */
        table {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!--//Angel Scarpetta NRC:66988 ID:862954 fecha: 06/05/2024 -->
            <div class="col-12">
            <div class="logo-container">
                    <img src="https://th.bing.com/th/id/OIP.dLKaLeoDJwD4NZmIYmjmkgHaHa?w=640&h=640&rs=1&pid=ImgDetMain" alt="Logo">
                </div>
                <div>
                    <h2 class="text-white">CRUD de Tareas</h2>
                </div>
                <div>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear tarea</a>
                </div>
            </div>

            @if(Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{ Session::get('success') }}</strong>
            </div>
            @endif

            <div class="col-12 mt-4">
                <table class="table table-bordered text-white">
                    <thead class="text-secondary">
                        <tr>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td class="fw-bold">{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <span class="badge bg-warning fs-6">{{ $task->status }}</span>
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Editar</a>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</body>

</html>
@endsection

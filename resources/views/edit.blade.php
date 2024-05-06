<!DOCTYPE html>
<html lang="es">
 <!--//Angel Scarpetta NRC:66988 ID:862954 fecha: 06/05/2024 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    
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
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); 
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
            background-color: #FFC300 ; 
            border: none; 
            border-radius: 5px; 
            color: #ffffff; 
            padding: 10px 20px; 
            cursor: pointer; 
        }

        button[type="submit"]:hover {
            background-color: #21618C ; 
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
                    <h2>Editar Tarea</h2>
                </div>
                <div>
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <strong>¡Ups!</strong> Algo salió mal..<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.update', $task) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <strong>Tarea:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{ $task->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción...">{{ $task->descripcion }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Fecha límite:</strong>
                            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Estado (inicial):</strong>
                            <select name="status" class="form-select" id="">
                                <option value="">-- Elige el status --</option>
                                <option value="Pendiente" {{ $task->status == "Pendiente" ? "selected" : "" }}>Pendiente</option>
                                <option value="En progreso" {{ $task->status == "En progreso" ? "selected" : "" }}>En progreso</option>
                                <option value="Completada" {{ $task->status == "Completada" ? "selected" : "" }}>Completada</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

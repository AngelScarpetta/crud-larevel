<!DOCTYPE html>
<html lang="es">
 <!--//Angel Scarpetta NRC:66988 ID:862954 fecha: 06/05/2024 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
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
                    <h2>Crear Tarea</h2>
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

            <form action="{{ route('tasks.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <strong>Tarea:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Tarea">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Fecha límite:</strong>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Estado (inicial):</strong>
                            <select name="status" class="form-select">
                                <option value="">-- Elige el status --</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En progreso">En progreso</option>
                                <option value="Completada">Completada</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

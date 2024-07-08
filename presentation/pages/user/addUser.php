<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Tailwind CSS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include ('../../components/navigation.php'); ?>

    <div class="container mx-auto max-w-md py-8">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Ingresar Usuarios</h1>
        </div>

        <form id="userForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="nameUser" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nameUser" name="nameUser" placeholder="Ingrese su nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="lastnameUser" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" id="lastnameUser" name="lastnameUser" placeholder="Ingrese su apellido"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="photoUser" class="block text-gray-700 text-sm font-bold mb-2">Foto:</label>
                <input type="text" id="photoUser" name="photoUser" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ingresar</button>
            </div>
        </form>
    </div>
    <script src="../../scripts/user/add-user.js"></script>
</body>

</html>
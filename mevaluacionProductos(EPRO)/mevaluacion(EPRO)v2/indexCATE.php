<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación</title>
    <link rel="stylesheet" href="../mcategorizacion(CATE)/assets/styles/styleCATE.css">
</head>

<body>
    <div class="App">
        <header>
            <h1 class="title-compras">BIENVENIDO AL MÓDULO DE </h1>
            <h1 class="title-compras">EVALUACIÓN</h1>
            <h1 class="title-compras">DE PRODUCTOS</h1>
        </header>
        <main class="container">
            <div class="task">
                <nav>
                    <ul>
                        <div>
                            <li><a href="../mcategorizacion(CATE)/guardarCATE.php">Añadir</a></li>
                        </div>
                        <div>
                            <li><a href="../mcategorizacion(CATE)/editarCATE.php">Editar</a></li>
                        </div>
                        <div>
                            <li><a href="../mcategorizacion(CATE)/buscarCATE.php">Buscar</a></li>
                        </div>
                        <div>
                            <li><a href="../mcategorizacion(CATE)/estadoCATE.php">Estado</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </main>
    </div>
</body>

</html>
<style>
    /* Global styles */
    body {
        font-family: 'Roboto', sans-serif;
        /* Tipografía moderna y legible */
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f7f7f7;
        /* Fondo claro y suave */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        /* Asegura que el contenido se centre verticalmente en toda la altura de la ventana */
    }

    /* Main app container styling */
    .App {
        width: 90%;
        /* Usa un ancho del 90% para mantener el contenido dentro de los bordes de la pantalla */
        max-width: 800px;
        /* Define un ancho máximo para pantallas más grandes */
        margin: 20px auto;
        /* Centra el contenedor horizontalmente y añade un margen superior/inferior */
        padding: 20px;
        background-color: #fff;
        /* Fondo blanco para el contenedor */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Sombra suave para dar profundidad */
        border-radius: 10px;
        /* Esquinas redondeadas */
    }

    /* Header styling */
    header {
        text-align: center;
        margin-bottom: 20px;
        /* Añade espacio inferior */
    }

    .title-compras {
        margin: 0;
        /* Elimina el margen por defecto */
        font-size: 2em;
        /* Tamaño de fuente más grande */
        color: #333;
        /* Color de texto oscuro */
    }

    header h1:first-of-type {
        color: #e99c2e;
        /* Color primario para el primer título */
    }

    header h1:last-of-type {
        color: #6666;
        /* Color secundario para el segundo título */
    }

    /* Navigation styling */
    nav {
        background-color: #6666;
        /* Color de fondo oscuro para la navegación */
        border-radius: 8px;
        /* Esquinas redondeadas */
        padding: 10px 0;
        /* Espaciado interno */
        margin-bottom: 20px;
        /* Espacio inferior */
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: space-around;
        /* Espacia uniformemente los elementos */
        flex-wrap: wrap;
        /* Permite que los elementos se envuelvan en líneas adicionales si es necesario */
    }

    nav ul li {
        margin: 10px;
        /* Añade espacio alrededor de cada elemento de la lista */
    }

    nav ul li a {
        color: #fff;
        /* Color del texto blanco */
        text-decoration: none;
        padding: 10px 20px;
        /* Espaciado interno */
        border-radius: 5px;
        /* Esquinas redondeadas */
        transition: background-color 0.3s ease, transform 0.3s ease;
        /* Transiciones suaves */
        background-color: #e99c2e
            /* Color de fondo inicial */
    }

    nav ul li a:hover {
        background-color: #e99c2e;
        /* Color de fondo al pasar el mouse */
        transform: translateY(-3px);
        /* Levanta el enlace un poco */
    }

    /* Responsive navigation */
    @media (max-width: 600px) {
        nav ul {
            flex-direction: column;
            /* Cambia a una columna en pantallas pequeñas */
            align-items: center;
            /* Centra los elementos en la columna */
        }

        nav ul li {
            margin: 10px 0;
            /* Espacio vertical entre los elementos */
        }
    }

    /* Extra Styles (if needed for content) */
    .container {
        display: flex;
        justify-content: center;
        /* Centra el contenido horizontalmente */
        align-items: center;
        /* Centra el contenido verticalmente */
        padding: 20px;
    }

    /* Additional Typography */
    body,
    h1,
    p,
    a {
        line-height: 1.5;
        /* Mejora la legibilidad con un espaciado de línea adecuado */
    }

    a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #6666;
        /* Cambia el color al pasar el mouse */
    }
</style>
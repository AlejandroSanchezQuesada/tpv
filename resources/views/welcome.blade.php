<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a FreedomTPV - API</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>


    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Bienvenido a FreedomTPV</h1>
            <p class="lead">En esta pagina principal te mostramos las caracteristicas de la API.</p>
        </div>
    </div>




    <div class="container">
        <span class="badge badge-pill badge-primary">Las rutas de creación,eliminación,modificación de
            Productos,Puestos,Categorias estan protegidas. Tiene que ser un usuario Jefe para realizar esas
            tareas</span>
        <div class="row">
            <div class="col-12">
                <h4>Productos</h4>
                <h4>Metodos para crear, editar, consultar y eliminar productos</h4>
                <ul>
                    <li>Obtener todos los productos - GET rutaapi/api/productos</li>
                    <li>Obtener un producto en concreto - GET rutapi/api/productos/id_producto</li>
                    <li>Crear un producto - POST rutaapi/api/productos</li>
                    <ul>
                        <li>Nombre</li>
                        <li>Precio</li>
                        <li>Categoria</li>
                        <li>Foto (opcional)</li>
                    </ul>
                    <li>Editar un producto - PUT rutapi/api/productos/id_producto</li>
                    <li>Eliminar un producto - DELETE rutapi/api/productos/id_producto</li>
                    <li>Encontrar un producto por nombre - POST rutapi/findproductobynombre</li>
                    <ul>
                        <li>Nombre</li>
                    </ul>
                </ul>
            </div>

            <div class="col-12">
                <h4>Categorias</h4>
                <h4>Metodos para crear, editar, consultar y eliminar categorias</h4>
                <ul>
                    <li>Obtener todos las categorias - GET rutaapi/api/categorias</li>
                    <li>Obtener una categoria en concreto - GET rutapi/api/categoria/id_categoria</li>
                    <li>Crear una categoria - POST rutaapi/api/categorias</li>
                    <ul>
                        <li>Nombre</li>
                    </ul>
                    <li>Editar una categoria - PUT rutapi/api/categorias/id_categoria</li>
                    <li>Eliminar una categoria - DELETE rutapi/api/categorias/id_categoria</li>
                    <li>Encontrar una categoria por nombre - POST rutapi/findcategoriabynombre</li>
                    <ul>
                        <li>Nombre</li>
                    </ul>
                </ul>
            </div>

            <div class="col-12">
                <h4>Puestos</h4>
                <h4>Metodos para crear, editar, consultar y eliminar puestos</h4>
                <ul>
                    <li>Obtener todos las puestos - GET rutaapi/api/puestos</li>
                    <li>Obtener un puesto en concreto - GET rutapi/api/puestos/id_puesto</li>
                    <li>Crear un puesto - POST rutaapi/api/puestos</li>
                    <ul>
                        <li>Nombre</li>
                    </ul>
                    <li>Editar un puesto - PUT rutapi/api/puestos/id_puesto</li>
                    <li>Eliminar un puesto - DELETE rutapi/api/puestos/id_puesto</li>
                    <li>Encontrar un puesto por nombre - POST rutapi/puestos/findpuestobynombre</li>
                    <ul>
                        <li>Nombre</li>
                    </ul>
                </ul>
            </div>

        </div>
        <div closs="col-12">
            <h4>Pedidos</h4>
            <h4>Metodos para crear, editar, consultar y eliminar pedidos</h4>
            <ul>
                <li>Obtener todos los pedidos - GET rutaapi/api/pedidos</li>
                <li>Obtener un catgoria en concreto - GET rutapi/api/pedidos/id_pedido</li>
                <li>Crear un pedido - POST rutaapi/api/pedidos</li>
                <ul>
                    <li>id_puesto</li>
                    <li>id_usuario</li>
                    <li>fecha_pedido</li>
                </ul>
                <li>Editar un pedido - PUT rutapi/api/pedidos/id_pedido</li>
                <li>Eliminar un pedido - DELETE rutapi/api/pedidos/id_pedido</li>
                <li>Encontrar un pedido por fecha - POST rutapi/pedidos/findpedidosbyfecha</li>
                <ul>
                    <li>Fecha</li>
                </ul>
                <li>Encontrar un pedido por usuario - POST rutapi/findpedidosbyfecha</li>
                <ul>
                    <li>Fecha</li>
                </ul>
                <li>Encontrar un pedido por puesto - POST rutapi/findPedidobyPuesto</li>
                <ul>
                    <li>id_puesto</li>
                </ul>
            </ul>
        </div>

        <div closs="col-12">
            <h4>Usuarios</h4>
            <h4>Metodos para crear, editar, consultar y eliminar users</h4>
            <ul>
                <li>Obtener todos los users - GET rutaapi/api/users</li>
                <li>Obtener un user en concreto - GET rutapi/api/users/id_user</li>
                <li>Crear un user - POST rutaapi/api/users</li>
                <ul>
                    <li>Nombre</li>
                    <li>Email</li>
                    <li>Password</li>
                    <li>Password_confirmation</li>
                    <li>Avatar (Opcional)</li>

                </ul>
                <li>Editar un user - PUT rutapi/api/users/id_user</li>
                <li>Eliminar un user - DELETE rutapi/api/users/id_user</li>
                <li>Encontrar un user por email - POST rutapi/users/finduserbyemail</li>
                <ul>
                    <li>Email</li>
                </ul>
                <li>Encontrar un user por nombre - POST rutapi/finduserbynombre</li>
                <ul>
                    <li>Nombre</li>
                </ul>
                <li>Mostrar los jefes - GET rutapi/finduserisjefe</li>
                <li>Mostrar usuario autenticado - GET rutapi/userlogged</li>

            </ul>
        </div>
        <div closs="col-12">
            <h4>Productos de Pedidos</h4>
            <h4>Metodos para crear, editar, consultar y eliminar productosdepedidos</h4>
            <span class="badge badge-pill badge-info">Estos son los productos que hay en un Pedido, así como su
                cantidad</span>
            <ul>
                <li>Obtener todos los productosdepedidos - GET rutaapi/api/productosdepedidos</li>
                <li>Obtener un catgoria en concreto - GET rutapi/api/productosdepedidos/id_productosdepedido</li>
                <li>Crear un productosdepedido - POST rutaapi/api/productosdepedidos</li>
                <ul>
                    <li>id_pedido</li>
                    <li>id_producto</li>
                    <li>cantidad</li>
                </ul>
                <li>Editar un productosdepedido - PUT rutapi/api/productosdepedidos/id_productosdepedido</li>
                <li>Eliminar un productosdepedido - DELETE rutapi/api/productosdepedidos/id_productosdepedido</li>
                <li>Encontrar productos mas vendidos - GET rutapi/productosmasvendidos</li>

            </ul>
        </div>

        <div closs="col-12">
            <h4>Rutas Autenticacion</h4>
            <h4>Metodos para registrarse y hacer login</h4>
            <ul>
                <li>Registrarse - POST rutaapi/api/registrarse</li>
                <ul>

                    <li>Nombre</li>
                    <li>Email</li>
                    <li>Password</li>
                    <li>Password_confirmation</li>
                    <li>Avatar (opcional)</li>
                </ul>
            </ul>
            <ul>
                <li>Hacer Login - POST rutapi/api/login</li>
                <ul>
                    <li>Email</li>
                    <li>Password</li>
                </ul>

            </ul>
            </ul>
        </div>


    </div>

</body>

<style>


</style>

</html>

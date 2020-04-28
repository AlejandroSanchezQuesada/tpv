<!DOCTYPE html>
<html>

<head>
    <title>Probando</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        <div class="container">
            <h1>Listado de Productos con VUE Axios</h1>

            <div v-for="producto in productos.data">
                <tr>
                    <td>{{ producto.id }}</td>
                    <td>{{ producto.nombre }}</td>
                    <td>{{ producto.descripcion }}</td>
                    <td>{{ producto.precio }}</td>
                    <td><img :src="producto.foto" alt="" height="50px" width="50px"></td>
                    <td>{{ producto.categoria.nombre }}</td>
                    <td><button v-on:click="editar(producto)">Editar</button></td>

                </tr>
            </div>
        <label for="">nombre</label>
        <input v-model="nombre" type="text" class="col-12"/>
        <label for="">descripcion</label>
        <input v-model="descripcion" type="text" class="col-12" />
        <label for="">precio</label>
        <input v-model="precio" type="number" class="col-12"/>
        <label for="">categoria</label>
        <input v-model="categoria" type="text"class="col-12" />


        <button v-on:click="aceptarCambios()">Aceptar Edicion</button>


            <button v-on:click="muestraToken()" >MuestraElToken</button>
            <button v-on:click="saludar()">MuestraElToken</button>
        </div>


    </div>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/codigoPersonalizadoJS/probando.js"></script>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Probando</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        <h1>Creacion de Productos con VUE Axios</h1>
        <div class="container">
            <form method="post">

                <label for="nombre">nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" v-model="nombre">

                <label for="descripcion">descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" v-model="descripcion">

                <label for="precio">precio</label>
                <input type="number" class="form-control" name="precio" id="precio" v-model="precio">

                <label for="foto">foto</label>
                <input type="file" class="form-control" v-on:change="imageChanged">

                <label for="categoria">categoria</label>
                <input type="text" class="form-control" name="categoria" id="categoria" v-model="categoria">


        </div>


        <button @click="crearProducto">Crear</button>
    </div>









    </div>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/codigoPersonalizadoJS/probandoproductos.js"></script>
</body>

</html>

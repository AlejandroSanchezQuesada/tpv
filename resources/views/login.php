<!DOCTYPE html>
<html>

<head>
	<title>Probando Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
	<div id="app">

		<h1>Login TPV</h1>

<div class="form-group">
  <label for="email">Email</label>
  <input type="email" name="email" id="email" class="form-control" v-model="email" placeholder="email@correo.com">

  <label for="password">Contraseña</label>
  <input type="password" name="password" id="password" class="form-control" v-model="password" placeholder="tuclave123">
</div>
<button v-on:click="logear()">Clicame</button>


	</div>
	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/codigoPersonalizadoJS/login.js"></script>
</body>

</html>

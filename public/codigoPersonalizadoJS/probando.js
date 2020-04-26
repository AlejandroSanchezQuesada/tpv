var aplicacion = new Vue({
    el: "#app",
    data: {

        productos:[{}]

    }, mounted() {
        axios.get('/api/productos', {headers: {'Accept':'application/json','Authorization':'Bearer '+localStorage.getItem("access_token")}})
        .then(response => (this.productos = response.data))


    },
    methods: {
        muestraToken: function (event) {
            console.log(localStorage.getItem("access_token"));
          },
          saludar: function (event) {
            alert("hola");
          }
    },


});

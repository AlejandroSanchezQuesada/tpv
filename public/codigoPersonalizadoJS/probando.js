var aplicacion = new Vue({
    el: "#app",
    data: {
        id:"",
        nombre:"",
        descripcion:"",
        categoria:"",
        precio:"",
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
          },
          editar: function (producto){
            this.id = producto.id;

          },
          aceptarCambios: function (params) {
            axios.put('/api/productos/'+this.id, {

                nombre: this.nombre,
                descripcion: this.descripcion,
                precio: this.precio,
                categoria: this.categoria,
                foto: "sinfoto"
            }, {
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("access_token"),
                    'Content-Type': 'multipart/form-data'
                }

            })
                .then(response => {
                    console.log(response)
                    if (response.data.access_token) {
                        localStorage.setItem("access_token", response.data.access_token);
                    }
                })
                .catch(error => {
                    console.log(error.response)

                });
          }
    },


});

var aplicacion = new Vue({
    el: "#app",
    data: {
        nombre: "",
        descripcion: "",
        precio: "",
        categoria: "",
        foto: "",
        productos: [{}]

    }, mounted() {
        axios.get('/api/productos', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + localStorage.getItem("access_token") } })
            .then(response => (this.productos = response.data))


    },
    methods: {
        crearProducto: function (event) {
            console.log(this.file);

            axios.post('/api/productos', {
                nombre: this.nombre,
                descripcion: this.descripcion,
                precio: this.precio,
                categoria: this.categoria,
                foto: this.foto
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

        }, imageChanged(e){
            console.log(e.target.files[0]);
            var fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);

            fileReader.onload = (e) => {
                this.foto = e.target.result;
            }

            console.log(this.foto);


        }


    },


});

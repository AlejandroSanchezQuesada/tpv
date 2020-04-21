var aplicacion = new Vue({
    el: "#app",
    data: {

        productos:[{}]

    }, mounted() {
        axios
        .get('http://tpv.test/api/productos')
        .then(response => (this.productos = response.data))

    },
    methods: {

    },


});

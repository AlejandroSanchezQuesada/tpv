var aplicacion = new Vue({
    el: "#app",
    data: {
        email:"",
        password:""

    }, mounted() {

    },


    methods: {

        logear: function (event) {
            axios.post('/api/login', {
                email: this.email,
                password: this.password
            })
            .then(response => {
                console.log(response)
                if (response.data.access_token) {
                    localStorage.setItem("access_token",response.data.access_token);
                }
            })
            .catch(error => {
                console.log(error.response)

            });
          }



    },


});

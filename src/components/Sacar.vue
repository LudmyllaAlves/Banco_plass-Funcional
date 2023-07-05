<template>
    <div>
        <form id="inputform" method="POST">
            <label>Digite o valor:</label>
            <input type="number" step="0.01" name="valor" id="valor" v-model="form.valor">
            <button type="submit" @click="postSacar()">Sacar</button>
        </form>
    </div>
</template>
<script>
const axios = require('axios').default;
export default{
    name: "Sacar",
    data(){
        return{
            form:{
                valor
            }
        }
    }, 
    methods:{
        postSacar(){
                let form = document.querySelector('#inputform');
                axios.post('http://localhost/banco/controler/realizarSaque.php', form)
                .then(response => {
                alert(response.data)
                })
                .catch(error => error)
            },
    }
}
</script>
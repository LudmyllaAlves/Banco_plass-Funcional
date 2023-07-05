<template>
    <div>
        <form action="">
            <label>Digite o Cpf/Cnpj:</label>
            <input type="text" name="receptor" v-model="form.receptor">
            <label>Digite o valor:</label>
            <input type="number" name="valor" v-model="form.valor">
            <button type="submit" @click="postTransferir()">Tranferir</button>
        </form>
    </div>
</template>
<script>
const axios = require('axios').default;
export default{
    name: "Transferir",
    data(){
        return{
            form:{
                receptor,
                valor
            }
        }
    },
    methods: {
        postTransferir(){
                let form = document.querySelector('#inputform');
                axios.post('http://localhost/banco/controler/realizarTransferencia.php', form)
                .then(response => {
                alert(response.data)
                    if(response.data){
                        window.location.href='http://localhost:8080/home';
                    }else{
                        window.location.href='http://localhost:8080/'
                    }
                })
                .catch(error => error)
            },
    },
}
</script>
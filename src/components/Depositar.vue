<template>
    <div>
        <form action="">
            <label>Digite o valor:</label>
            <input type="number" name="valor">
            <button type="submit" @click="postDepositar()">Depositar</button>
        </form>
    </div>
</template>
<script>
const axios = require('axios').default;
export default{
    name: "Depositar",
    data(){
        return{
            form:{
                valor,
            }
        }
    }, 
    methods:{
        postDepositar(){
                let form = document.querySelector('#inputform');
                axios.post('http://localhost/banco/controler/realizarDeposito.php', form)
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
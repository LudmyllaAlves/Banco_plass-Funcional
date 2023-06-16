<template>
    <div>
        <form id="inputform" method="post">
            <label>Digite o valor:</label>
            <input type="number" step="0.01" name="valor" id="valor" v-model="form.valor">
            <button>Sacar</button>
        </form>
    </div>
</template>
<script>
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
                axios.post('http://localhost/banco/controler/login.php', form)
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
    }
}
</script>
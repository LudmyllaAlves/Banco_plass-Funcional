<template>
    <div>
        <Header></Header>
        <main>
            <div id="form">
                <fieldset>
                <h1 id="titulo">Login</h1><br>
                <form id="inputform" method="POST">
                    <label>Digite seu cpf/cnpj:</label><br>
                    <input type="text" name="cpfcnpj" v-model="form.cpfcnpj"><br>
                    <label>Digite sua senha:</label><br>
                    <input type="password" name="senha" v-model="form.senha"><br>   
                    <button @click="postLogin()" type="submit" class="botao">Login</button><br>
                </form>
                <p id="link"><a href="/cadastro">Cadastrar-se</a></p>
            </fieldset>
        </div>
    </main>
    <Footer></Footer>
    </div>
</template>

<script>
const axios = require('axios').default;
import "../css/forms.css";
import Footer from "../components/Footer";
import Header from "../components/Header"
export default{
    name:"Login",
    components:{
        Footer,
        Header
    },
    data(){
        return{
            form:{
                cpfcnpj: "",
                senha: ""
            },
            resultes:[]
        }
    },
    methods:{
    postLogin(){
                let form = document.querySelector('#inputform');
                axios.post('http://localhost/banco/controler/login.php', form)
                .then(response => {
                alert(response.data)
                    if(response.data == "20"){
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
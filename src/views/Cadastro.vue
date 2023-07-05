<template>
	<div>
		<Header></Header>
		<main>
			<div id="form">
				<fieldset>
					<h1 id="titulo">Cadastrar-se</h1>
					<form id="inputform" method="POST">
						<label>Digite seu nome completo :</label><br>
						<input required placeholder="joão da silva" type="text" name="nome" v-model="form.nome"><br>
						<label>Digite seu cpf ou cnpj :</label><br>
						<input required placeholder="123.456.789.01" type="text" name="cpfcnpj" v-model="form.cpfcnpf"><br>
						<label>Digite seu telefone :</label><br>
						<input required placeholder="(12)91234-5678" type="text" name="telefone" v-model="form.telefone"><br>
						<label>Digite seu endereço :</label><br>
						<input required	placeholder="rua Ana Maria" type="text" name="endereco" v-model="form.endereco"><br>
						<label>Digite sua senha :</label><br>
						<input required placeholder="**********" type="password" name="senha" v-model="form.senha"><br>
						<button @click="postCadastro()" type="submit">cadastrar</button>
					</form>
				</fieldset>
			</div>
		</main>
		<Footer></Footer>
	</div>
</template>
<script>
import "../css/forms.css";
import Footer from "@/components/Footer.vue";
import Header from "@/components/Header.vue";
const axios = require('axios').default;
export default{
    name: "Cadastro",
	components:{
		Footer,
		Header
	},
	data(){
        return{
            form:{
				nome: "",
                cpfcnpf: "",
				telefone: "",
				endereco:"",
                senha: ""
            }
        }
    },
    methods:{
    postCadastro(){
                let form = document.querySelector('#inputform');
                axios.post('http://localhost/banco/controler/novoCliente.php', form)
                .then(response => {
                console.log(response.data);
                    if(response.data == "Bem-vindo!!!"){
						window.location.href='http://localhost:8080/home';
					}else{
						window.location.href='http://localhost:8080/cadastro';
					}
                })
                .catch(error => error)
            },
    }
}
</script>
<template>
	<div id="cadastro">
		<div>
			<h1>Bem Vindo ao Banco Plass!</h1>
		</div>
		<div id="form">
			<h2>Cadastrar-se</h2>
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
		</div>
	</div>
</template>
<script>
import "../css/forms.css";
const axios = require('axios').default;
export default{
    name: "Cadastro",
	data(){
        return{
            form:{
				nome: "",
                cpfcnpf: "",
				telefone: "",
				endereco:"",
                senha: ""
            },
            resultes:[]
        }
    },
    methods:{
    postCadastro(){
                let form = document.querySelector('#inputform');
                axios.post('http://localhost/banco/controler/novoCliente.php', form)
                .then(response => {
                alert(response.data)
                    
                })
                .catch(error => error)
            },
    }
}
</script>
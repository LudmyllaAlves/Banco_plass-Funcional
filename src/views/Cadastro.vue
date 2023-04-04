<template>
    <div>
		<h1>Bem Vindo ao Banco Plass!</h1>
	</div>
	<div class="form">
		<h2>Cadastrar-se</h2>
		<form action="http://localhost/banco/controler/novoCliente.php" method="POST">
			<label>Digite seu nome completo :</label><br>
			<input placeholder="joão da silva" type="text" name="nome"><br>
			<label>Digite seu cpf ou cnpj :</label><br>
			<input placeholder="123.456.789.01" type="text" name="cpf_cnpj"><br>
			<label>Digite seu endereço :</label><br>
			<input placeholder="rua Ana Maria" type="text" name="endereco"><br>
			<label>Digite seu telefone :</label><br>
			<input placeholder="(12)91234-5678" type="text" name="telefone"><br>
			<label>Digite sua senha :</label><br>
			<input placeholder="**********" type="password" name="senha"><br>
			<button type="submit">cadastrar</button>
		</form>
	</div>
</template>
<script>

export default{
    name: "Cadastro"
}
</script>
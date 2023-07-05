<template>
    <div>
        <main>
            <form action="http://localhost/banco/controler/login.php" method="POST">
                <label>Digite seu cpf/cnpj:</label><br>
                    <input type="text" name="cpfcnpj"><br>
                    <label>Digite sua senha:</label><br>
                    <input type="password" name="senha" ><br>   
                    <button  type="submit" class="botao">Login</button><br>
            </form>
        </main>
    </div>
</template>
<template>
    <div v-if="saldo "  id="saldo" name="saldo">
        <button id="valor" v-if="visivel" >R$: {{ saldo }}</button>
        <button  id="visualizar" >
                <img v-if="aberto" id="olho" src="../icone/eye.svg"> 
        </button>
    </div>
</template>
<script>

export default{
    name: 'Saldo',
    data(){
        return{
            visivel: true,
            aberto: "aberto"
        }

    },
    props:{
        saldo: Array,
    },
    methods:{
        DeixaInvisivel(){
            this.visivel =!this.visivel;
        },
        /*mudarIcone(){
            if(this.aberto == "aberto"){
                document.getElementById("olho"). src="../icone/eye-slash.svg"
                this.aberto = "fechado";
            }else{
                document.getElementById("olho"). src="../icone/eye.svg"
            }
            
            
        }*/
    }
    
    }
</script>
<template>
    <main>
        <div v-for="saldo in saldos" :key="saldo.id" id="saldo" name="saldo">
            <h1>{{ saldos.valor }}</h1>
        </div>
    </main>
</template>
<script>
export default{
    name: 'Saldo',
    props:{
        saldos: Array,
    }
}
</script>

<template>
    <span v-text="formatearFecha"> </span>
</template>

<script>
export default {

    props: ['fecha'],

    //UNA VEZ QUE EL COMPONENTE ESTE LISTO Y SE PUEDA VER
    //mounted() {
      //  console.log('El componente esta listo con', this.fecha);
    //},
    computed: {
        formatearFecha(){
            return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY')
        }
    }
}
</script>

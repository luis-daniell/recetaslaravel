<template>
     <input
        type="submit"
        class="btn btn-danger d-block w-100 mb-2"
        value="Eliminar"
        @click="eliminarReceta"
     >
</template>

<script>
    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta(){
                this.$swal({
                    title: 'Deseas eliminar esta receta?',
                    text: "Una vez eliminada no se puede recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'NO'
                }).then((result) => {
                    if (result.isConfirmed) {

                        const params = {
                            id: this.recetaId
                        }

                        //Enviar la peticion al servidor
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                            .then( respuesta => {
                                //Eliminar receta del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error);
                            })



                        this.$swal({
                            title: 'Receta eliminada',
                            text: 'Se elimino la receta',
                            icon: 'success'
                        }
                        )
                    }
                })
            }
        }
    }
</script>

<template>
  <input
    type="submit"
    class="btn btn-danger w-100 mb-2 d-block"
    value="Eliminar ×"
    v-on:click="eliminarReceta"
  />
</template>

<script>
    export default {
    props: ["recetaId"],
    methods: {
        eliminarReceta() {
        this.$swal({
            title: "Desea eliminar esta receta?",
            text: "Una vez eliminada no se puede recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si",
            cancelButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
            const params = {
                id: this.recetaId,
            };

            //Enviar la petición al servidor
            axios
                .post(`/recetas/${this.recetaId}`, { params, _method: "delete" })
                .then((respuesta) => {
                this.$swal({
                    title: "Receta Eliminada",
                    text: "se eliminó la receta",
                    icon: "success",
                });
                    //Eliminar del DOM -> hay que ir al padre de todos(tbody) $el hace referencia al elemento 
                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);


                })
                .catch((error) => {
                console.log(error);
                });
            }
        });
        },
    },
    };
</script>
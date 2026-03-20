<template>
    <AuthenticatedLayout>

        <v-card>

            <v-card-title class="pb-4">
                <div class="d-flex justify-space-between align-center w-100">

                    <div class="d-flex align-center">
                        <span class="text-h5 font-weight-bold">Gestión de Estudiantes</span>
                    </div>


<!--                    <v-btn-->
<!--                        color="primary"-->
<!--                        size="large"-->
<!--                        @click=""-->

<!--                    >-->
<!--                        Nuevo Estudiante-->
<!--                    </v-btn>-->
                </div>
            </v-card-title>

            <v-card-text>
                <v-data-table
                    :headers="headers"
                    :items="estudiantes"
                    density="compact"
                    item-key="name"
                ></v-data-table>

            </v-card-text>

        </v-card>

    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'

export default {
    name: 'Estudiantes',
    components: {AuthenticatedLayout, Link},
    setup() {
        const page = usePage()

        const estudiantes = computed(() => page.props.estudiantes)

        const headers = [
            {title: 'Código', key: 'student_code'},
            {title: 'Nombre', key: 'name'},
            {title: 'Email', key: 'email'},
            {title: 'Semestre', key: 'semester'},
             {title: 'Facultad', key: 'faculty_name'},
            // {title: 'ID de Facultad', key: 'faculty_id'},
            {title: 'Estado', key: 'status'}
        ]

        return {
            headers,
            estudiantes
        }
    }
}

</script>
<style scoped>

</style>

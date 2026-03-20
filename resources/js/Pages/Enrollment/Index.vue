<template>
    <AuthenticatedLayout>

        <v-card>

            <v-card-title class="pb-4">
                <div class="d-flex justify-space-between align-center w-100">

                    <div class="d-flex align-center">
                        <span class="text-h5 font-weight-bold">Gestión de Inscripciones</span>
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
                    :items="enrollments"
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
    name: 'Enrollment',
    components: {AuthenticatedLayout, Link},
    setup() {
        const page = usePage()

        const enrollments = computed(() => page.props.enrollments)

        const headers = [
            {title: 'Enrollment Date', key: 'enrollment_date'},

            {title: 'Estado', key: 'status'},
            {title: 'Estudiante', key: 'student_name'},
            {title: 'Curso', key: 'course_name'},
            {title: 'Descripción del Curso', key: 'course_description'}
        ]

        return {
            headers,
            enrollments
        }
    }
}

</script>
<style scoped>

</style>

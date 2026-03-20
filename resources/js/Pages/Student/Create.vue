

<template>
<AuthenticatedLayout>




    <v-card>
        <v-card-title>
            REGISTRO DE ESTUDIANTES
        </v-card-title>



        <v-card-text>

            <form>
                <v-text-field
                    v-model="state.name"
                    :counter="10"
                    :error-messages="v$.name.$errors.map(e => e.$message)"
                    label="Name"
                    required
                    base-color="grey"
                    @blur="v$.name.$touch"
                    @input="v$.name.$touch"
                ></v-text-field>

                <v-text-field
                    v-model="state.email"
                    :error-messages="v$.email.$errors.map(e => e.$message)"
                    label="E-mail"
                    required
                    @blur="v$.email.$touch"
                    @input="v$.email.$touch"
                ></v-text-field>

                <v-select
                    v-model="state.id"

                    :error-messages="v$.select.$errors.map(e => e.$message)"
                    :items="faculties"
                    label="Facultades"

                    item-title="name"
                    item-value="id"
                    variant="outlined"
                    density="comfortable"

                    required
                    @blur="v$.select.$touch"
                    @change="v$.select.$touch"
                ></v-select>

                <v-checkbox
                    v-model="state.checkbox"
                    :error-messages="v$.checkbox.$errors.map(e => e.$message)"
                    label="Do you agree?"
                    indent-details
                    required
                    @blur="v$.checkbox.$touch"
                    @change="v$.checkbox.$touch"
                ></v-checkbox>

                <v-btn
                    class="me-4"
                    @click="v$.$validate"
                >
                    submit
                </v-btn>
<!--                <v-btn @click="clear">-->
<!--                    clear-->
<!--                </v-btn>-->
            </form>

        </v-card-text>

    </v-card>

</AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'


import { reactive } from 'vue'
import { useVuelidate } from '@vuelidate/core'
import { email, required, helpers } from '@vuelidate/validators'
export default {
    name: 'Create',
    components: {AuthenticatedLayout, Link},
    setup() {
        const page = usePage()

        const faculties = computed(() => page.props.faculties)

        // const headers = [
            // {title: 'Enrollment Date', key: 'enrollment_date'},

            // {title: 'Estado', key: 'status'},
            // {title: 'Estudiante', key: 'student_name'},
            // {title: 'Curso', key: 'course_name'},
            // {title: 'Descripción del Curso', key: 'course_description'}
        // ]






        const form = {
            name: '',
            email: '',
            select: null,
            checkbox: null,
        }

        const state = reactive({
            ...form,
        })

        const items = [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4',
        ]

        const rules = {
            name: { required: helpers.withMessage('Nombre es Obligatorio',required) },
            email: { required, email },
            select: { required },
            items: { required },
            checkbox: { required },
        }

        const v$ = useVuelidate(rules, state)

        // function clear () {
        //     v$.value.$reset()
        //
        //     for (const [key, value] of Object.entries(initialState)) {
        //         state[key] = value
        //     }
        // }

        return {
            // headers,
            faculties,
            v$,
            state,
            rules,
            items,
            form,
        }
    }
}

</script>

<style scoped>

</style>

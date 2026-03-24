<template>
    <AuthenticatedLayout>
        <v-card>
            <v-card-title>
                REGISTRO DE ESTUDIANTES
            </v-card-title>

            <v-card-text>
                <form @submit.prevent="submit">
                <v-container fluid>
                    <v-row>

                        <v-col cols="12" md="6">
                            <v-text-field
                                v-model="form.student_code"
                                :counter="10"
                                :error-messages="v$.student_code.$errors.map(e => e.$message)"
                                label="CÓDIGO"
                                required
                                base-color="grey"
                                @blur="v$.student_code.$touch"
                                @input="v$.student_code.$touch"
                            />
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field
                                v-model="form.name"
                                :counter="10"
                                :error-messages="v$.name.$errors.map(e => e.$message)"
                                label="NOMBRE"
                                required
                                base-color="grey"
                                @blur="v$.name.$touch"
                                @input="v$.name.$touch"
                            />
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field
                                v-model="form.email"
                                :error-messages="v$.email.$errors.map(e => e.$message)"
                                label="E-mail"
                                required
                                @blur="v$.email.$touch"
                                @input="v$.email.$touch"
                            />
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field
                                v-model="form.semester"
                                :error-messages="v$.semester.$errors.map(e => e.$message)"
                                label="SEMESTRE"
                                required
                                @blur="v$.semester.$touch"
                                @input="v$.semester.$touch"
                            />
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-select
                                v-model="form.faculty_id"
                                :error-messages="v$.faculty_id.$errors.map(e => e.$message)"
                                :items="faculties"
                                label="FACULTADES"
                                item-title="name"
                                item-value="id"
                                variant="outlined"
                                density="comfortable"
                                required
                                @blur="v$.faculty_id.$touch"
                                @update:modelValue="v$.faculty_id.$touch"
                            />
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-select
                                v-model="form.status"
                                :error-messages="v$.status.$errors.map(e => e.$message)"
                                :items="statusOptions"
                                label="ESTADOS"
                                variant="outlined"
                                density="comfortable"
                                required
                                @blur="v$.status.$touch"
                                @update:modelValue="v$.status.$touch"
                            />
                        </v-col>



                        <v-col cols="12">
                            <v-btn
                                color="primary"
                                :loading="form.processing"
                                :disabled="form.processing"
                               type="submit"
                            >
                                Registrar
                            </v-btn>
                        </v-col>

                    </v-row>
                </v-container>
                </form>
            </v-card-text>
        </v-card>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, usePage, useForm } from '@inertiajs/vue3'
import { computed } from 'vue'
import { useVuelidate } from '@vuelidate/core'
import { email, required, helpers } from '@vuelidate/validators'

export default {
    name: 'Create',
    components: { AuthenticatedLayout, Link },
    setup() {
        const page = usePage()
        const faculties = computed(() => page.props.faculties)

        const statusOptions = ['active', 'inactive']


        const form = useForm({
            student_code: '',
            name: '',
            email: '',
            semester: '',
            faculty_id: '',
            status: '',
        })

        const rules = {
            student_code: { required: helpers.withMessage('El código es obligatorio', required) },
            name:         { required: helpers.withMessage('El nombre es obligatorio', required) },
            email:        { required: helpers.withMessage('El correo es obligatorio', required), email },
            semester:     { required: helpers.withMessage('El semestre es obligatorio', required) },
            faculty_id:   { required: helpers.withMessage('La facultad es obligatoria', required) },
            status:       { required: helpers.withMessage('El estado es obligatorio', required) },
        }

        const v$ = useVuelidate(rules, form)


        function submit() {
            form.post(route('student.store'), {
                onSuccess: () => {
                    alert('SE HA ENVIADO CORRECTAMENTE EL FORMULARIO')
                }
            })
        }

        return {
            faculties,
            statusOptions,
            form,
            v$,
            submit,
        }
    },
}
</script>

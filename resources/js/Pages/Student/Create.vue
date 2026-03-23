<template>
  <AuthenticatedLayout>

    <v-card>
      <v-card-title>
        REGISTRO DE ESTUDIANTES
      </v-card-title>

      <v-card-text>
        <form>
          <v-container fluid>
            <v-row>


              <v-col cols="12" md="6">
                <v-text-field
                    v-model="state.student_code"
                    :counter="10"
                    :error-messages="v$.student_code.$errors.map(e => e.$message)"
                    label="CÓDIGO"
                    required
                    base-color="grey"
                    @blur="v$.student_code.$touch"
                    @input="v$.student_code.$touch"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                    v-model="state.name"
                    :counter="10"
                    :error-messages="v$.name.$errors.map(e => e.$message)"
                    label="NOMBRE"
                    required
                    base-color="grey"
                    @blur="v$.name.$touch"
                    @input="v$.name.$touch"
                ></v-text-field>
              </v-col>


              <v-col cols="12" md="6">
                <v-text-field
                    v-model="state.email"
                    :error-messages="v$.email.$errors.map(e => e.$message)"
                    label="E-mail"
                    required
                    @blur="v$.email.$touch"
                    @input="v$.email.$touch"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <v-text-field
                    v-model="state.semester"
                    :error-messages="v$.semester.$errors.map(e => e.$message)"
                    label="SEMESTRE"
                    required
                    @blur="v$.semester.$touch"
                    @input="v$.semester.$touch"
                ></v-text-field>
              </v-col>


              <v-col cols="12" md="6">
                <v-select
                    v-model="state.id"
                    :error-messages="v$.faculty_id.$errors.map(e => e.$message)"
                    :items="faculties"
                    label="FACULTADES"
                    item-title="name"
                    item-value="id"
                    variant="outlined"
                    density="comfortable"
                    required
                    @blur="v$.faculty_id.$touch"
                    @change="v$.faculty_id.$touch"
                ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <v-select
                    v-model="state.items"
                    :error-messages="v$.status.$errors.map(e => e.$message)"
                    :items="items"
                    label="ESTADOS"
                    item-title="name"
                    item-value="id"
                    variant="outlined"
                    density="comfortable"
                    required
                    @blur="v$.status.$touch"
                    @change="v$.status.$touch"
                ></v-select>
              </v-col>


              <v-col cols="12">
                <v-btn
                    class="me-4"
                    @click="v$.$validate"
                >
                  submit
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
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'


import {reactive} from 'vue'
import {useVuelidate} from '@vuelidate/core'
import {email, required, helpers,minLength,maxLength} from '@vuelidate/validators'

export default {
  name: 'Create',
  components: {AuthenticatedLayout, Link},
  setup() {
    const page = usePage()

    const faculties = computed(() => page.props.faculties)

    const form = {
      student_code:'',
      name: '',
      email: '',
      select: null,
      checkbox: null,
      semester: '',
      status:'',
      faculty_id:''
    }

    const state = reactive({
      ...form,
    })

    const items = [
      'active',
      'inactive',

    ]

    const rules = {
        student_code: {
            required: helpers.withMessage('El código es Obligatorio', required),
        },
        name: {
        required: helpers.withMessage('Nombre es Obligatorio', required),
      },
      email: {required: helpers.withMessage('El correo es Obligatorio',required), email},
      semester: {required: helpers.withMessage('El semestre es Obligatorio',required)},
      faculty_id: {required: helpers.withMessage('La facultad es Obligatoria',required)},
      status: {required: helpers.withMessage('El estado es Obligatorio',required)},
      select: {required},
      items: {required},
      // checkbox: {required},
    }

    const v$ = useVuelidate(rules, state)


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

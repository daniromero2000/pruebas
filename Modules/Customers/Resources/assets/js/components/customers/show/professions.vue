<template>
  <div class="container-fluid">
    <b-card no-body class="card bg-white shadow border-0">
      <b-card-header class="bg-white">
        <h3 class="card-title">Datos de Profesiones</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </b-card-header>
      <div class="card-body">
        <table v-if="customer.customer_identities != ''" class="table table-hover text-center">
          <thead class="small">
            <tr>
              <th class="text-center" scope="col">Fecha Registro</th>
              <th class="text-center" scope="col">Profesión</th>
            </tr>
          </thead>
          <tbody class="small">
            <tr v-for="(data, key) in customer.customer_professions" :key="key">
              <td scope="row">{{data.created_at}}</td>
              <td v-if="data.professions_list" scope="row">{{data.professions_list.profession}}</td>
              <td v-else></td>
            </tr>
          </tbody>
        </table>
        <div v-else class="col-9">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td scope="row">Aún no tiene Profesiones relacionadas</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-right mt-2">
          <a href="#" class="btn btn-sm btn-primary">
            <i class="fas fa-user"></i> Agregar Profesion
          </a>
        </div>
        <b-overlay :show="show" no-wrap></b-overlay>
      </div>
    </b-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        from: "",
        to: "",
        search: ""
      },
      show: true
    };
  },
  mounted() {
    this.$store.commit("toggleBusy", true);
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      this.$store.commit("toggleBusy", true);
    }
  },
  computed: {
    customer() {
      return this.$store.state.customer;
    }
  },
  watch: {
    customer() {
      this.show = false;
    }
  }
};
</script>

<template>
  <div class="container-fluid">
    <b-card no-body class="card bg-white shadow border-0">
      <b-card-header class="bg-white">
        <h3 class="card-title">Datos de Referencias</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </b-card-header>
      <div class="card-body">
        <table v-if="customer.customer_references != ''" class="table table-hover text-center">
          <thead class="small">
            <tr>
              <th class="text-center" scope="col">Nombre</th>
              <th class="text-center" scope="col">Apellido</th>
              <th class="text-center" scope="col">Escolaridad</th>
              <th class="text-center" scope="col">Tipo Referencia</th>
              <th class="text-center" scope="col">Parentesco</th>
            </tr>
          </thead>
          <tbody class="small">
            <tr v-for="(data, key) in customer.customer_references" :key="key">
              <td v-if="data.relationship" scope="row">{{data.customer_phone.customer.name}}</td>
              <td v-else></td>
              <td v-if="data.customer_phone" scope="row">{{data.customer_phone.customer.last_name}}</td>
              <td v-else></td>
              <td
                v-if="data.customer_phone"
                scope="row"
              >{{data.customer_phone.customer.scholarity.scholarity}}</td>
              <td v-else></td>
              <td
                v-if="data.relationship"
                scope="row"
              >{{data.relationship.reference_type.reference_type}}</td>
              <td v-else></td>
              <td v-if="data.relationship" scope="row">{{data.relationship.relationship}}</td>
              <td v-else></td>
            </tr>
          </tbody>
        </table>
        <table v-else class="table table-hover">
          <tbody class="small">
            <tr>
              <td scope="row">Aún no tiene Referencias relacionadas</td>
            </tr>
          </tbody>
        </table>
        <div class="text-right mt-2">
          <a href="#" class="btn btn-sm btn-primary">
            <i class="fas fa-user"></i> Agregar Referencia
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

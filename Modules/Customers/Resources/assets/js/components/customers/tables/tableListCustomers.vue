<template>
  <div>
    <div class="table-responsive mb-3 p-0 height-table">
      <b-table
        :busy="isBusy"
        :items="dataCustomers"
        :borderless="true"
        :hover="true"
        :fields="fields"
        responsive
      >
        <template v-slot:table-busy>
          <div class="text-center text-primary my-2">
            <b-spinner class="align-middle"></b-spinner>
            <strong>Cargando...</strong>
          </div>
        </template>

        <template v-slot:cell(Estado)="data">
          <span>
            <b-badge :style="'color:white; background:'+data.value.color">{{ data.value.status }}</b-badge>
          </span>
        </template>
        <template v-slot:cell(Opciones)="row">
          <a class="btn btn-info btn-sm" :href="'/admin/customers/'+row.item['#']">Ver mas</a>
        </template>
      </b-table>
    </div>
    <nav class="text-center">
      <b-button pill variant="outline-primary" v-if="skip >= 1" @click="previousPage">Anterior</b-button>
      <b-button pill variant="outline-primary" @click="nextPage">Siguiente</b-button>
    </nav>
  </div>
</template>
<script>
export default {
  data() {
    return {
      localCustomers: [],
      fields: [
        { key: "#", sortable: true },
        { key: "Nombre", sortable: true },
        { key: "Apellido", sortable: true },
        { key: "Fecha de Ingreso", sortable: true },
        { key: "Lead", sortable: true },
        { key: "Estado", sortable: true },
        { key: "Opciones", sortable: false }
      ]
    };
  },
  mounted() {
    this.$store.dispatch("getCustomers");
    this.$store.commit("toggleBusy", true);
  },
  methods: {
    previousPage() {
      var skip = Number(this.skip) - 1;
      this.$store.commit("vauleSkip", skip);
      this.$store.commit("toggleBusy", true);
      this.$store.dispatch("getCustomers");
    },
    nextPage() {
      console.log(this.skip);
      var skip = Number(this.skip) + 1;
      this.$store.commit("vauleSkip", skip);
      this.$store.commit("toggleBusy", true);
      this.$store.dispatch("getCustomers");
    }
  },
  computed: {
    isBusy() {
      return this.$store.state.isBusy;
    },
    skip() {
      return this.$store.state.skip;
    },
    customers() {
      return this.$store.state.customers;
    },
    dataCustomers() {
      var data = [];
      this.customers.forEach(element => {
        data.push({
          "#": element.id,
          Nombre: element.name,
          Apellido: element.last_name,
          ["Fecha de Ingreso"]: element.created_at,
          Lead: element.customer_lead.lead,
          Estado: {
            status: element.customer_status.status,
            color: element.customer_status.color
          }
        });
      });
      return data;
    }
  },
  watch: {
    customers() {
      this.$store.commit("toggleBusy", false);
    }
  }
};
</script>
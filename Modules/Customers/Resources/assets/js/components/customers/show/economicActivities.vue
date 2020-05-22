<template>
  <div class="container-fluid">
    <b-card no-body class="card bg-white shadow border-0">
      <b-card-header class="bg-white">
        <h3 class="card-title">Actividades Económicas</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </b-card-header>
      <div class="card-body">
        <table
          v-if="customer.customer_economic_activities != ''"
          class="table table-hover text-center"
        >
          <thead class="small">
            <tr>
              <th class="text-center" scope="col">Tipo Actividad</th>
              <th class="text-center" scope="col">Nombre Entidad</th>
              <th class="text-center" scope="col">Cargo</th>
              <th class="text-center" scope="col">Dirección Entidad</th>
              <th class="text-center" scope="col">Teléfono Entidad</th>
              <th class="text-center" scope="col">Ciudad</th>
            </tr>
          </thead>
          <tbody class="small">
            <tr v-for="(data, key) in customer.customer_economic_activities" :key="key">
              <td
                v-if="data.economic_activity_type"
                scope="row"
              >{{data.economic_activity_type.economic_activity_type}}</td>
              <td v-else></td>
              <td scope="row">{{data.entity_name}}</td>
              <td v-if="data.professions_list" scope="row">{{data.professions_list.profession}}</td>
              <td v-else></td>
              <td scope="row">{{data.entity_address}}</td>
              <td scope="row">{{data.entity_phone}}</td>
              <td v-if="data.city" scope="row">{{data.city.city}}</td>
              <td v-else></td>
            </tr>
          </tbody>
        </table>
        <table v-else class="table table-hover">
          <tbody class="small">
            <tr>
              <td scope="row">Aún no tiene Actividades Económicas relacionadas</td>
            </tr>
          </tbody>
        </table>
        <div class="text-right mt-2">
          <b-button variant="primary" v-b-modal.modal-prevent-closing>Agregar Actividad Económica</b-button>

          <!-- <a
            href="#"
            data-toggle="modal"
            data-target="#economicactivitymodal"
            class="btn btn-sm btn-primary"
          >
            <i class="fas fa-user"></i> 
          </a>-->
        </div>

        <b-overlay :show="show" no-wrap></b-overlay>
        <add-modal></add-modal>
      </div>
    </b-card>
  </div>
</template>

<script>
import addModal from "../modals/addEconomicActivity";

export default {
  components: {
    addModal
  },
  data() {
    return {
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
      console.log(this.customer.id);
    }
  }
};
</script>

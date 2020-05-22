<template>
  <div class="container-fluid">
    <b-card no-body>
      <b-tabs card>
        <b-tab no-body title="Cliente">
          <b-card-body>
            <b-row>
              <b-col sm="5">
                <generals></generals>
                <vehicles></vehicles>
                <professions></professions>
              </b-col>
              <b-col sm="7">
                <customer-ids></customer-ids>
                <references></references>
                <economicActivities></economicActivities>
              </b-col>
            </b-row>
          </b-card-body>
        </b-tab>

        <b-tab title="Picture 2">
          <b-card-title>
            This tab does not have the
            <code>no-body</code> prop set
          </b-card-title>
          <b-card-text>
            Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum
            consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex
            consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt
            veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua
            esse irure.
          </b-card-text>
        </b-tab>

        <b-tab title="Picture 3">
          <b-card-title>
            This tab does not have the
            <code>no-body</code> prop set
          </b-card-title>
          <b-card-text>
            Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum
            consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex
            consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt
            veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua
            esse irure.
          </b-card-text>
        </b-tab>

        <b-tab title="Text">
          <b-card-title>
            This tab does not have the
            <code>no-body</code> prop set
          </b-card-title>
          <b-card-text>
            Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum
            consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex
            consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt
            veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua
            esse irure.
          </b-card-text>
        </b-tab>
      </b-tabs>
    </b-card>
  </div>
</template>

<script>
import generals from "./show/generals.vue";
import customerIds from "./show/ids.vue";
import vehicles from "./show/vehicles.vue";
import professions from "./show/professions.vue";
import references from "./show/references.vue";
import economicActivities from "./show/economicActivities.vue";

export default {
  props: { customerId: Number },
  components: {
    generals,
    customerIds,
    vehicles,
    professions,
    references,
    economicActivities
  },
  mounted() {
    this.$store.dispatch("getCustomerForId", this.customerId);
  },
  methods: {}
};
</script>

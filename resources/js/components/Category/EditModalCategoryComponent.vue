<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="editModal2"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-show="!mode2" id="exampleModalLabel">Add New</h5>
            <h5 class="modal-title" v-show="mode2" id="exampleModalLabel">{{form.name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" v-on:click="hiddenModal()">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="mode2? updateCategory(): createCategory()">
              <div class="form-group">
                <label for="name">
                  Name
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  placeholder="Name"
                  class="form-control"
                  v-model="form.name"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea
                  class="form-control ckeditor"
                  name="description"
                  id="description"
                  rows="5"
                  v-model="form.description"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                  placeholder="Description"
                ></textarea>
                <has-error :form="form" field="description"></has-error>
              </div>

              <div class="form-group">
                <img :src="'/storage/'+ localdata.cover" alt class="img-responsive" />
                <br />
                <a
                  v-show="mode2"
                  onclick="return confirm('Are you sure?')"
                  href
                  class="btn btn-danger"
                >Remove image?</a>
              </div>

              <div class="form-group">
                <label for="cover">Cover</label>
                <input type="file" name="cover" id="cover" class="form-control" />
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select
                  name="status"
                  id="status"
                  v-model="form.status"
                  :class="{ 'is-invalid': form.errors.has('status') }"
                  class="form-control"
                >
                  <has-error :form="form" field="status"></has-error>
                  <option value="0">Disable</option>
                  <option value="1">Enable</option>
                </select>
              </div>
              <button type="button" class="btn btn-secondary" v-on:click="hiddenModal()">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["category", "mode"],
  data() {
    return {
      mode2: "",
      localdata: [],
      form: new Form({
        name: "",
        description: "",
        cover: "",
        status: ""
      })
    };
  },
  mounted() {
    this.localdata = this.category;
    this.mode2 = this.mode;
    this.form.fill(category);
  },
  methods: {
    createCategory() {
      // Submit the form via a POST request
      // this.$Progress.start();
      this.form.post("/admin/categories").then(({ data }) => {
        $("#editModal").modal("hide");
        // Toast.fire({
        //   icon: "success",
        //   title: "Signed in successfully"
        // });
        // $(".modal-backdrop").remove();
        // Fire.$emit("AfterCreate");
      });
      // this.$Progress.finish();
    },
    updateCategory() {
      // this.$Progress.start();
      this.form
        .put("/admin/categories/" + this.form.id)
        .then(() => {
          $("#editModal").modal("hide");
          // Toast.fire({
          //   icon: "success",
          //   title: "Update successfully"
          // });
          // $(".modal-backdrop").remove();
          // Fire.$emit("AfterCreate");
          // this.$Progress.finish();
        })
        .catch(() => {
          // this.$Progress.fail();
        });
    },
    hiddenModal: function() {
      $("#editModal").modal("hide");
    }
  }
};
</script>
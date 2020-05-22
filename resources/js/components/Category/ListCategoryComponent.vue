<template>
  <div>
    <div class="card m-3">
      <div class="card-header d-flex">
        <h3 class="card-title">Caregorias</h3>
        <button class="btn btn-primary btn-sm ml-auto" v-on:click="newModal()">Crear Categoria</button>
        <div class="card-tools">
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
            data-toggle="tooltip"
            title="Collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="remove"
            data-toggle="tooltip"
            title="Remove"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover table-striped text-nowrap text-center">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Cover</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="category in localCategories" :key="category.id">
              <td>
                <a :href="'/admin/categories/' + category.id">{{ category.name }}</a>
              </td>
              <td>
                <img :src="
              '/storage/' + category.cover" alt class="img-responsive" />
              </td>
              <td>
                <span class="badge badge-success">{{ (category.status) ? 'Activo' : 'Inactivo' }}</span>
              </td>
              <td scope="col">
                <form action method="post" class="form-horizontal">
                  <input type="hidden" name="_method" value="delete" />
                  <div class="btn-group">
                    <a class="btn btn-primary btn-sm" v-on:click="editModal(category)">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a>
                    <button
                      onclick="return confirm('Are you sure?')"
                      type="submit"
                      class="btn btn-danger btn-sm"
                    >
                      <i class="fa fa-times"></i>
                      Delete
                    </button>
                  </div>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-show="!editMode" id="exampleModalLabel">Add New</h5>
            <h5 class="modal-title" v-show="editMode" id="exampleModalLabel">{{form.name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form
              enctype="multipart/form-data"
              @submit.prevent="editMode? updateCategory(): createCategory()"
            >
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
              <div class="form-group" v-show="editMode">
                <img :src="'/storage/'+ localdata.cover" alt class="img-responsive" />
                <br />
                <a
                  onclick="return confirm('Are you sure?')"
                  href
                  class="btn btn-danger"
                >Remove image?</a>
              </div>

              <div class="form-group">
                <label for="cover">Cover</label>
                <input
                  type="file"
                  name="cover"
                  @change="coverValue"
                  id="cover"
                  class="form-control"
                />
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
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["categories"],
  created() {
    this.localCategories = this.categories;
  },
  data() {
    return {
      localCategories: [],
      localdata: [],
      editMode: false,
      form: new Form({
        id: "",
        name: "",
        description: "",
        cover: "",
        status: ""
      })
    };
  },
  methods: {
    coverValue(e) {
      // let file = e.target.files[0].name;

      // this.form.cover = file;
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        //   swal({
        //     type: "error",
        //     title: "Oops...",
        //     text: "You are uploading a large file"
        //   });
        //   console.log(reader);
        //   return false;
      }
      reader.onloadend = file => {
        this.form.cover = reader.result;
      };
      reader.readAsDataURL(file);
    },
    editModal: function(category) {
      this.editMode = true;
      this.form.reset();
      this.form.fill(category);
      $("#editModal").modal("show");
    },
    newModal() {
      this.editMode = false;
      this.form.reset();
      $("#editModal").modal("show");
    },
    updateCategory() {
      // this.$Progress.start();
      this.form
        .put("/admin/categories/" + this.form.id)
        .then(() => {
          $("#editModal").modal("hide");
          this.form.cover = "";
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
    }
  }
};
</script>
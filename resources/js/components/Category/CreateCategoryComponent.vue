<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="createModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" v-on:click="hiddenModal()">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form v-on:submit.prevent="newCategory()">
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
                  value
                />
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea
                  class="form-control ckeditor"
                  name="description"
                  id="description"
                  rows="5"
                  v-model="localdata.description"
                  placeholder="Description"
                ></textarea>
              </div>
              <!-- <div class="form-group">
                <img alt class="img-responsive" />
                <br />
                <a
                  onclick="return confirm('Are you sure?')"
                  href
                  class="btn btn-danger"
                >Remove image?</a>
              </div>-->
              <div class="form-group">
                <label for="cover">Cover</label>
                <input type="file" name="cover" id="cover" class="form-control" />
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="0">Enable</option>
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
  data() {
    return {
      localdata: []
    };
  },
  methods: {
    hiddenModal: function() {
      $("#createModal").modal("hide");
    },
    newCategory() {}
  }
};
</script>
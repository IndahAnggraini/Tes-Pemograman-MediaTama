@extends('layouts.lay_home')

@section('menu_sub_barang', 'active')

@section('konten')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Responsive Hover Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data,index) in list_db">
                <td>@{{ index+1 }}.</td>
                <td>@{{ data.nama_barang }}</td>
                <td>@{{ data.jumlah }}</td>
                <td>@{{ data.harga }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            Action
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="#" @click="editbrg(data.id_barang)">Edit</a>
                          <a class="dropdown-item" href="#" @click="deletebrg(data.id_barang)">Delete</a>
                        </div>
                      </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('script')
<script>
const App = {
    data() {
        return {
            list_db: ''
        }
    },
    mounted() {
        this.viewData();
    },
    unmounted() {

    },
    methods: {
        viewData() {
            axios.get('/getdb')
            .then(r => {
                console.log("sukses");
                this.list_db = r.data;
                console.log(this.list_db);
            });
        },
        deletebrg(item) {
            console.log("masuk delete");
            console.log(item);

            axios.get('/hapusdata/'+item)
                .then(r => {
                    console.log(r.data);
                    this.viewData;
                });
        },
        editbrg(item) {
            window.location.href="/editdata/"+item;
        }
    }
}

Vue.createApp(App).mount('#app');
</script>
@endsection

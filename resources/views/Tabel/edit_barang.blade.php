@extends('layouts.lay_home')

@section('konten')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Barang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form v-for = "(data,index) in list_edit">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <input type="text" class="form-control" placeholder="Enter nama" v-model="data.nama_barang">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Jumlah</label>
            <input type="number" class="form-control" placeholder="Enter jumlah" v-model="data.jumlah">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input class="form-control" placeholder="Enter harga" v-model="data.harga">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" class="btn btn-primary" @click="editData">Submit</button>
      </div>
    </form>
  </div>
@endsection

@section('script')
<script>
const id_brg = {{ $id_barang }};

const App = {
    data() {
        return {
            list_edit:''
        }
    },
    mounted() {
        this.viewData();
    },
    unmounted() {

    },
    methods: {
        viewData(){
            console.log("masuk")
            axios.get('/edit-fetch/'+id_brg)
                .then(r => {
                    this.list_edit=r.data;
                    console.log(this.list_edit);
                });
        },
        editData() {
            console.log('Masuk edit');

            let formData = new FormData();
            formData.append('edit_form', JSON.stringify(this.list_edit));

            axios.post('/edit-submit', formData)
                .then(r => {
                    console.log("sukses");
                    console.log(r.data);
                });
        }
    }
}
</script>
@endsection

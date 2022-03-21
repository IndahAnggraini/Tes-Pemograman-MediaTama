@extends('layouts.lay_home')

@section('konten')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambahkan Barang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <input type="text" class="form-control" placeholder="Enter nama" v-model="list_brg.nama_barang">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Jumlah</label>
            <input type="number" class="form-control" placeholder="Enter jumlah" v-model="list_brg.jumlah">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input class="form-control" placeholder="Enter harga" v-model="list_brg.harga">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" class="btn btn-primary" @click="save">Submit</button>
      </div>
    </form>
  </div>
@endsection

@section('script')
<script>
const App = {
    data() {
        return {
            list_brg : {
                nama_barang: '',
                jumlah: '',
                harga: ''
            }
        }
    },
    mounted() {

    },
    unmounted() {

    },
    methods: {
        save() {
            console.log("sukses ini");
            console.log(this.list_brg);

            // javascript ke php, list_form_to_php = utk di panggil di controller,
            // JSON.stringify utk mengambil data brdsrkan objek
            let formData = new FormData();
            formData.append('list_form_to_php', JSON.stringify(this.list_brg));

            //axios utk post dari route
            axios.post('/savebarang', formData)
                .then(r => {
                    console.log("sukses");
                    console.log(r.data);
                });
        }
    }
}

Vue.createApp(App).mount('#app');
</script>
@endsection

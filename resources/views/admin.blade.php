@include('header')

<div class="container">
    <nav class="navbar navbar-expand-sm navbar-dark" id="navbar_top">
        <a class="navbar-brand text-dark" href="/"><h3>BajuStore</h3></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">              
            </ul>
            <form class="form-inline my-2 my-lg-0">                                               
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href=""><i class="fa fa-info-circle text-success"></i> Anda Login Sebagai Admin BajuStore</a>                
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/admin"><i class="fa fa-book text-success"></i> Data Katalog</a>                
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/daftarorder"><i class="fa fa-shopping-cart text-success"></i> Daftar Order</a>                
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/"><i class="fa fa-sign-out text-success"></i> Keluar</a>        
            </form>
        </div>
    </nav>
</div>

<div class="container py-5">    

    <!-- For Demo Purpose-->
    <header class="text-center mb-5 mt-5">       
        <h1 class="display-4 font-weight-bold">Admin BajuStore</h1>                   
    </header>           

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Two  Row [Prosucts]-->
    <div class="col-md mb-5" data-aos="fade-down">
        <div class="row">
            <h2 class="font-weight-bold">Data Katalog</h2>
            <form action="/admin/cari" method="get" class="ml-5 col-md-6 mx-auto">                  
                <div class="input-group">           
                        <input type="search" class="form-control rounded" name="q" value="{{old('q')}}" placeholder="Cari Barang..." aria-label="Search"
                            aria-describedby="search-addon" required/>
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-search"></i> Cari</button>
                </div>                                       
            </form>
            <a class="btn btn-dark text-light ml-auto" data-toggle="modal" data-target="#tambah_katalog"><i class="fa fa-plus text-light"></i> Tambah Produk</a>
            
        </div>        
    </div>
    
    <div class="row pb-5 mb-4">
        @foreach ($katalog as $data)
            <div class="card rounded shadow-sm border-0 col-md-3" data-aos="fade-down">
                <div class="card-body p-4"><img src="{{ asset('images/'.$data->foto_katalog)}}" alt="" class="img-fluid d-block mx-auto mb-3 col-md">
                    <h5> <a href="#" class="text-dark">{{$data->nama_katalog}}</a></h5>
                    <p class="small text-muted font-italic">{{$data->deskripsi_katalog}}</p>
                    <ul class="list-inline small row col-md mx-auto">
                        <li class="list-inline-item md"><a class="btn btn-dark text-light" data-toggle="modal" data-target="#edit_katalog{{$data->id_katalog}}"><i class="fa fa-pencil text-success"></i> Edit</a></li>   
                        <li class="list-inline-item md"><a class="btn btn-danger text-light" href="/katalog/hapus/{{$data->id_katalog}}"><i class="fa fa-trash"></i> Hapus</a></li>                                    
                    </ul>
                </div>
            </div>          
        
            <div class="modal fade" id="edit_katalog{{$data->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title text-white" id="exampleModalLongTitle">Tambah Katalog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                            
                          <form action="/katalog/edit" method="post" enctype="multipart/form-data">
                              <div class="row">
                                <div class="form-group col-md-12">
                                  @csrf
                                    <label for="nama">Nama Katalog</label>
                                    <input class="form-control @error('nama_katalog') is-invalid @enderror" type="text" value="{{$data->nama_katalog}}" name="nama_katalog" id="nama_katalog"  placeholder="Masukkan Nama Katalog"> 
                                    <input type="text" value="{{$data->id_katalog}}" name="id_katalog" hidden>
                                    @error('nama_katalog')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror                                                                        
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="harga">Harga</label>
                                    <input type="number" value="{{$data->harga_katalog}}" class="form-control" id="harga_katalog" name="harga_katalog" placeholder="Harga">                                    
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="harga">Jenis Katalog</label>
                                  <select class="form-control" name="jenis_katalog" id="jenis_katalog">
                                    <option value="baju">Baju</option>                                                  
                                    <option value="celana">Celana</option>                                                  
                                </select>
                                </div>                              
                                <div class="form-group col-md-12">
                                    <label for="deskripsi">Deskripsi Menu</label>
                                    <textarea type="text" rows="3" class="form-control" id="deskripsi" name="deskripsi_katalog" placeholder="Deskripsi Katalog">{{$data->deskripsi_katalog}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="gambar">Foto</label>
                                  <input type="file" accept=".jpg,.png" class="form-control-file" name="gambar" id="gambar">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stok">Stok</label>                                            
                                    <input type="text" name="stok_katalog" class="form-control" value="{{$data->stok_katalog}}" min="0" max="100">                                                  
                                </div>                                                                                                                  
                        </div>
                        <div class="modal-footer">                            
                            <button type="submit" class="btn btn-success" name="btn-tambah"><i class="fa fa-plus"></i> Tambahkan</button>
                        </form>
                            <button type="button" class="btn btn-danger" name="btn-hapus" data-dismiss="modal"><i class=""></i> Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach

        <div class="justify-content-center mx-auto d-flex mt-5">
            {{ $katalog->links() }}
        </div>

    </div>  
</div>


<div class="modal fade" id="tambah_katalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Tambah Katalog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                            
              <form action="/katalog/add" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-md-12">
                      @csrf
                        <label for="nama">Nama Katalog</label>
                        <input class="form-control @error('nama_katalog') is-invalid @enderror" type="text" name="nama_katalog" id="nama_katalog"  placeholder="Masukkan Nama Katalog"> 
                        @error('nama_katalog')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror                                                                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga_katalog" name="harga_katalog" placeholder="Harga">                                    
                    </div>
                    <div class="form-group col-md-6">
                      <label for="harga">Jenis Katalog</label>
                      <select class="form-control" name="jenis_katalog" id="jenis_katalog">
                        <option value="baju">Baju</option>                                                  
                        <option value="celana">Celana</option>                                                  
                    </select>
                    </div>                              
                    <div class="form-group col-md-12">
                        <label for="deskripsi">Deskripsi Menu</label>
                        <textarea type="text" rows="3" class="form-control" id="deskripsi" name="deskripsi_katalog" placeholder="Deskripsi Katalog"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="gambar">Foto</label>
                      <input type="file" accept=".jpg,.png" class="form-control-file" name="gambar" id="gambar">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stok">Stok</label>                                            
                        <input type="text" name="stok_katalog" class="form-control" value="10" min="0" max="100">                                                  
                    </div>                                                                                                                  
            </div>
            <div class="modal-footer">                            
                <button type="submit" class="btn btn-success" name="btn-tambah"><i class="fa fa-plus"></i> Tambahkan</button>
            </form>
                <button type="button" class="btn btn-danger" name="btn-hapus" data-dismiss="modal"><i class=""></i> Batal</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row pb-5 mb-4">
    <div class="card border-primary col-md-8 mx-auto">         
      <div class="card-body">
           <div class="">
             <a class="card-text justify-content-center d-flex">Nomor Whatsapp Toko Saat Ini</a>
             @foreach ($wa as $data)                                
                 <h3 class="card-title ml-4 mr-5  justify-content-center d-flex"><b>{{$data->no_wa}}</b></h3>   
                 <div class="mx-auto d-flex justify-content-center">         
                    <a href="" class="btn btn-success col-md-3 mr-2 ml-2"  data-toggle="modal" data-target="#edit_wa"><i class="fa fa-whatsapp"></i> Ganti Nomor</a>
                    <a href="" class="btn btn-secondary col-md-3 mr-2 ml-2"  data-toggle="modal" data-target="#edit_pesan"><i class="fa fa-envelope"></i> Rubah Pesan</a>
                    <a href="https://wa.me/62{{$data->no_wa}}?text=test" class="btn btn-dark col-md-3 mr-2 ml-2" target="_blank"><i class="fa fa-recycle"></i>  Coba</a>
                </div>   
             @endforeach
         </div>
      </div>
    </div>
 </div>
            
</div>

<div class="modal fade" id="edit_wa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit Nomor Whatsapp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">                            
          <form action="/wa/edit" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-12">
                  @csrf                          
                    @foreach ($wa as $data)                                                  
                        <label for="no_wa">Nomor WhatsApp</label>
                        <input type="number" value="{{$data->no_wa}}" class="form-control" id="no_wa" name="no_wa" placeholder="Nomor WhatsApp"> 
                        <p class="mt-2 small text-muted font-italic">Masukkan Nomor Whatsapp yang Akan Digunakan sebagai whatsapp BajuStore tanpa angka 0 atau kode negara. Cth : 89680591192.</p>                                   
                    @endforeach           
                </div>
            </div>                                                                                                                                    
        </div>
        <div class="modal-footer">                            
            <button type="submit" class="btn btn-success" name="btn-tambah"><i class="fa fa-check"></i> Ganti</button>
        </form>
            <button type="button" class="btn btn-danger" name="btn-hapus" data-dismiss="modal"><i class=""></i> Batal</button>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="edit_pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit Nomor Whatsapp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">                            
          <form action="/wa/pesan" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-12">
                  @csrf                          
                    @foreach ($wa as $data)                                                  
                        <label for="no_wa">Pesan WhatsApp</label>
                        <input type="text" value="{{$data->pesan}}" class="form-control" id="pesan" name="pesan" placeholder="Pesan WhatsApp">                                    
                        <p class="mt-2 small text-muted font-italic">Rangkai Kata Sesuka Anda, Nomor Order Akan Tertulis Otomatis di Akhir Kata yang Anda Buat.</p>
                    @endforeach           
                </div>
            </div>                                                                                                                                    
        </div>
        <div class="modal-footer">                            
            <button type="submit" class="btn btn-success" name="btn-tambah"><i class="fa fa-check"></i> Rubah</button>
        </form>
            <button type="button" class="btn btn-danger" name="btn-hapus" data-dismiss="modal"><i class=""></i> Batal</button>
        </div>
    </div>
</div>
</div>
</div>

<script>
    AOS.init();
</script>
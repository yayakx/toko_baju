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
    <div class="row col-md mb-5">
        <h2 class="font-weight-bold mb-2">Daftar Order</h2>           
        <a class="btn btn-danger text-light ml-auto" href="/order/reset" data-toggle="tooltip" data-placement="top" title="Bersihkan Pesanan yang tidak dicheckout oleh pelanggan"><i class="fa fa-recycle text-light"></i> Bersihkan Sampah</a>                    
    </div>
    <form action="/daftarorder/cari" method="get" class="ml-5 col-md-6 mx-auto mb-5">                  
        <div class="input-group">           
                <input type="search" class="form-control rounded" name="q" value="{{old('q')}}" placeholder="Masukkan ID atau Nama..." aria-label="Search"
                    aria-describedby="search-addon" required/>
                <button type="submit" class="btn btn-outline-success col-md-4"><i class="fa fa-search"></i> Cari</button>
        </div>                                       
    </form>
    
    <div class="row pb-5 mb-4">
        @foreach ($order as $data)
            @php
                $total = 0;
                $id = $data->id_session;               
                $dx = DB::table('keranjang')
                    ->join('katalog', 'keranjang.id_katalog', '=', 'katalog.id_katalog')                                        
                    ->select('keranjang.*', 'katalog.*')
                    ->where('keranjang.id_session', '=', $id)                                        
                    ->get();

            @endphp    
            <div class="card rounded shadow-sm border-0 col-md-3" data-aos="fade-down">
                <div class="card-body p-4">
                    <h5> <a href="#" class="text-dark">ORDER{{$data->id_order}}BJS</a></h5>
                    <p class="small text-muted font-italic">Rp{{$data->total_harga}}</p>
                    <p class="small text-muted font-italic">Status Order : {{$data->status_order}}</p>
                    <ul class="list-inline small row col-md mx-auto">
                        <li class="list-inline-item md"><a class="btn btn-dark text-light" data-toggle="modal" data-target="#lihat_order{{$data->id_order}}"><i class="fa fa-info-circle"></i> Detil</a></li>   
                        <li class="list-inline-item md"><a class="btn btn-danger text-light" href="/order/hapus/{{$data->id_order}}"><i class="fa fa-trash"></i> Hapus</a></li>                                    
                    </ul>
                </div>
            </div>          

            
            <!-- Modal -->
            <div class="modal fade" id="lihat_order{{$data->id_order}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detil Pesanan ORDER{{$data->id_order}}BJS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            @php
                                $total = 0;                                                                              
                            @endphp 
                            <p class="mt-2 small text-muted font-italic mr-auto">Nama : {{$data->nama}}</p>   
                            <p class="mt-2 small text-muted font-italic mr-auto">Order : </p>                                                      
                            @foreach ($dx as $datas)
                                @php
                                    $hargafix    = $datas->harga_katalog;                                       
                                    $total       = $total + $hargafix;                 
                                    $harga = number_format($total, 0, ",", ".");         
                                @endphp                                
                                <p class="mt-2 small text-muted font-italic ml-3">1x {{$datas->nama_katalog}}</p>                                  
                            @endforeach      
                            <p class="mt-2 small text-muted font-italic">Total : <h3>Rp{{$harga}}</h3></p>     
                            <p class="mt-2 small text-muted font-italic">Alamat : {{$data->alamat}}</p>                           
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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
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
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/"><i class="fa fa-book text-success"></i> Katalog Toko</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/keranjang"><i class="fa fa-shopping-cart text-success notification"></i> Keranjang Saya <span class="badge badge-danger">{{$titem}}</span></a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/about"><i class="fa fa-whatsapp text-success"></i> Hubungi Kami</a>
            </form>
        </div>
    </nav>
</div>

<div class="container py-5">    

    <!-- For Demo Purpose-->
    <header class="text-center mb-5 mt-5">       
        <h1 class="display-4 font-weight-bold">Keranjang BajuStore Katalog</h1>
        <p class="font-italic text-muted mb-0">Tentukan barang pilihan Anda sesuka hati.</p>       
        <p class="font-italic text-muted">Hanya Ada di <a href="https://bajustore.com" class="text-muted">
            <u>BajuStore</u></a>
        </p>
    </header>           

    <!-- Two  Row [Prosucts]-->
    <h2 class="font-weight-bold mb-2">Keranjang Saya</h2>
    <p class="font-italic text-muted mb-4">Cek barang Anda dengan hati-hati sebelum proses checkout.</p>
    
    <div class="row pb-5 mb-4">
        @php
            $total = 0;
        @endphp  
        @foreach ($keranjang as $data)
            @php
                $hargafix    = $data->harga_katalog;                                       
                $total       = $total + $hargafix;                        
            @endphp    
        <div class="card rounded shadow-sm border-0 col-md-3" data-aos="fade-down">
            <div class="card-body p-4"><img src="{{ asset('images/'.$data->foto_katalog)}}" alt="" class="img-fluid d-block mx-auto mb-3 col-md">
                <h5> <a href="#" class="text-dark">{{$data->nama_katalog}}</a></h5>
                <p class="small text-muted font-italic">{{$data->deskripsi_katalog}}</p>
                <ul class="list-inline small">                                            
                    <li class="list-inline-item md-8"><a class="btn btn-dark text-light">Rp{{$data->harga_katalog}}</a></li>   
                        @php
                            $cek = DB::table('keranjang')->where('id_katalog', $data->id_katalog)->where('id_session', $sid)->first();       
                        @endphp                            
                        @if ($data->stok_katalog != 0 and $cek == null)
                        <li class="list-inline-item md-4"><a class="btn btn-success" href="/beli/tambah/{{$data->id_katalog}}">Beli</a></li>
                        @elseif ($data->stok_katalog != 0 and $cek != null)
                        <li class="list-inline-item md-4"><a class="btn btn-danger" href="/beli/hapus/{{$data->id_katalog}}">Batal</a></li>   
                        @else
                        <a class="btn btn-danger text-white col-md disabled" ></i> HABIS</a>
                        @endif
                </ul>
            </div>                      
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detil{{$data->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detil Baju</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    {{$data->nama_katalog}}                        
                    <img src="{{ asset('images/'.$data->foto_katalog)}}" alt="" class="img-fluid d-block mx-auto mb-3">
                    <p class="small text-muted font-italic">Ukuran yang Tersedia : <a class="badge badge-success text-light">M</a> <a class="badge badge-success text-light">L</a> <a class="badge badge-success text-light">XL</a> </p>
                    <p class="small text-muted font-italic">{{$data->deskripsi_katalog}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>                
                </div>
            </div>
        </div>
    </div>

    @endforeach

    </div>

    <div class="row pb-5 mb-4" data-aos="fade-up">
        <div class="card border-primary col-md">         
          <div class="card-body justify-content-center d-flex">
               <div class="">
                 <a class="card-text"></a>
                 <h3 class="card-title ml-4 mr-5 justify-content-center d-flex"><b>Data Pengiriman</b></h3> 
                 <p class="font-italic small text-muted justify-content-center d-flex mb-4">Isikan Nama dan Alamat penerima sedetail mungkin untuk memudahkan proses pengiriman.</p> 
                 <div class="row">     
                    <form action="/beli/checkout" method="post" enctype="multipart/form-data">         
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="harga">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Penerima" required>                                    
                        <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{$total}}" hidden required>                                    
                    </div>
                    <div class="form-group col-md-10">
                        <label for="harga">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pengiriman" required>                                    
                        <p class="font-italic small text-muted mt-4">*Ongkos kirim untuk daerah Jawa Timur adalah Rp10.000. Luar Jawa Timur menyesuaikan alamat penerima.</p> 
                    </div>
                    
                </div>
             </div>
          </div>
        </div>
     </div>

    <div class="row pb-5 mb-4" data-aos="fade-up">
       <div class="card border-primary col-md">         
         <div class="card-body">
            <div class="row">
                <a class="card-text">Total Harga</a>                
                <h3 class="card-title ml-4 mr-5"><b>Rp{{$total}}</b></h3>
                <button type="submit" class="btn btn-success mr-5 ml-5 col-md text-white"><i class="fa fa-shopping-cart"></i> Checkout</button>                
            </div>
            <p class="font-italic small text-muted mt-4">*Harga di atas belum termasuk ongkos kirim. Setelah melakukan checkout, silahkan tunggu konfirmasi dari admin untuk total harga yang harus Anda bayarkan.</p> 
        </form>
         </div>
       </div>
    </div>
                
</div>

<script>
    AOS.init();
</script>
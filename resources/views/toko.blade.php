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
        <h1 class="display-4 font-weight-bold">BajuStore Katalog</h1>
        <p class="font-italic text-muted mb-0">Pilihan Banyak dengan Harga nan Bersahabat.</p>
        <p class="font-italic text-muted">Hanya Ada di <a href="https://bajustore.com" class="text-muted">
            <u>BajuStore</u></a>
        </p>
    </header>    
    
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif

    <!-- First Row [Prosucts]-->
    <h2 class="font-weight-bold mb-2">Produk Unggulan Terlaris</h2>
    <p class="font-italic text-muted mb-4">Kumpulan produk yang sering diburu oleh para pemuda karismatik yang sayang untuk Anda lewatkan.</p>
    
    
    <div class="row pb-5 mb-4" >

        @foreach ($knew as $data)
            @php
                $harga = number_format($data->harga_katalog, 0, ",", ".");    
            @endphp            
            <div class="card rounded shadow-sm border-0 col-md-3" data-aos="fade-down">
                <div class="card-body p-4"><img src="{{ asset('images/'.$data->foto_katalog)}}" alt="" class="img-fluid d-block mx-auto mb-3 col-md">
                    <h5> <a  class="text-dark">{{$data->nama_katalog}}</a></h5>
                    <p> <a  class="text-dark">Rp{{$harga}}</a></p>
                    <p class="small text-muted font-italic">{{$data->deskripsi_katalog}}</p>
                    <ul class="list-inline small">
                        <li class="list-inline-item"><a class="btn btn-dark text-light" data-toggle="modal" data-target="#detil{{$data->id_katalog}}"><i class="fa fa-info-circle"></i> Detail</a></li>                           
                            @php
                                $cek = DB::table('keranjang')->where('id_katalog', $data->id_katalog)->where('id_session', $sid)->first();       
                            @endphp                            
                            @if ($data->stok_katalog != 0 and $cek == null)
                            <li class="list-inline-item"><a class="btn btn-success" href="/beli/tambah/{{$data->id_katalog}}"><i class="fa fa-shopping-cart"></i> Beli</a></li>
                            @elseif ($data->stok_katalog != 0 and $cek != null)
                            <li class="list-inline-item"><a class="btn btn-danger" href="/beli/hapus/{{$data->id_katalog}}"><i class="fa fa-trash"></i> Batal</a></li>   
                            @elseif ($data->stok_katalog <= 0)
                            <li class="list-inline-item"><a class="btn btn-secondary disabled" ><i class="fa fa-info-circle"></i> Habis</a></li>
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



    <!-- Two  Row [Prosucts]-->
    <h2 class="font-weight-bold mb-2">Produk Terbaru</h2>
    <p class="font-italic text-muted mb-4">Kumpulan produk terbaru dan trendi yang pastinya cocok untuk Anda.</p>
    <form action="/cari" method="get">         
    <div class="row mt-5 mb-5">      
        <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1 col-md"  href="/"><i class="fa fa-book text-success"></i> Semua Produk</a>
        <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1 col-md" href="/baju"><i class="fa fa-book text-success"></i> Baju</a>
        <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1 col-md" href="/celana"><i class="fa fa-book text-success"></i> Celana</a>       
            <div class="input-group col-md">           
                    <input type="search" class="form-control rounded" name="q" value="{{old('q')}}" placeholder="Cari Barang..." aria-label="Search"
                        aria-describedby="search-addon" required/>
                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-search"></i> Cari</button>
            </div>       
    </div>
    </form>

    <div class="row pb-5 mb-4">

        @foreach ($katalog as $data)
        @php
            $harga = number_format($data->harga_katalog, 0, ",", ".");    
        @endphp            
        <div class="card rounded shadow-sm border-0 col-md-3" data-aos="fade-down">
            <div class="card-body p-4"><img src="{{ asset('images/'.$data->foto_katalog)}}" alt="" class="img-fluid d-block mx-auto mb-3 col-md">
                <h5> <a  class="text-dark">{{$data->nama_katalog}}</a></h5>
                <p> <a  class="text-dark">Rp{{$harga}}</a></p>
                <p class="small text-muted font-italic">{{$data->deskripsi_katalog}}</p>
                <ul class="list-inline small">
                    <li class="list-inline-item"><a class="btn btn-dark text-light" data-toggle="modal" data-target="#detil{{$data->id_katalog}}"><i class="fa fa-info-circle"></i> Cek Detail</a></li>   
                        @php
                            $cek = DB::table('keranjang')->where('id_katalog', $data->id_katalog)->where('id_session', $sid)->first();       
                        @endphp                            
                        @if ($data->stok_katalog != 0 and $cek == null)
                        <li class="list-inline-item"><a class="btn btn-success" href="/beli/tambah/{{$data->id_katalog}}"><i class="fa fa-shopping-cart"></i> Beli</a></li>
                        @elseif ($data->stok_katalog != 0 and $cek != null)
                        <li class="list-inline-item"><a class="btn btn-danger" href="/beli/hapus/{{$data->id_katalog}}"><i class="fa fa-trash"></i> Batal</a></li>   
                        @else
                        <li class="list-inline-item"><a class="btn btn-danger text-white col-md disabled" ><i> </i> HABIS</a>
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
    
    <div class="justify-content-center mx-auto d-flex ">
        {{ $katalog->links() }}
    </div>
    

    
    <!-- First Row [Statistics]-->
    <h2 class="font-weight-bold mb-2">Tentang BajuStore</h2>
    <p class="font-italic text-muted mb-4">BajuStore merupakan sebuah toko baju yang memiliki toko retail dan digital sekaligus. Pembeli bisa dengan mudah memilih baju apa yang akan mereka beli dengan leluasa tanpa adanya gangguang yang berarti. Ada berbagai pilihan dan juga ukuran yang bisa pembeli pilih untuk mereka beli.</p>
    
    <div class="row pb-5">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
            <!-- Card-->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-5"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h5>Penjualan Saat Ini</h5>
                    <p class="small text-muted font-italic">Kami sudah melayani berbagai transaksi pembelian produk baju pria.</p>
                    <div class="progress rounded-pill">
                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar rounded-pill"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
            <!-- Card -->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-5"><i class="fa fa-tasks fa-2x mb-3 text-success"></i>
                    <h5>Total Kunjungan</h5>
             
                    <p class="small text-muted font-italic">Ada banyak sekali pengunjung yang melakukan pembelian atau sekedar melihat.</p>
                    <div class="progress rounded-pill">
                        <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;" class="progress-bar bg-success rounded-pill"></div>
                    </div>
                </div>
            </div>
        </div>                
        
        <!-- Card -->
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-5"><i class="fa fa-shopping-bag fa-2x mb-3 text-warning"></i>
                    <h5>Ada Berbagai Produk</h5>
                    <p class="small text-muted font-italic">Toko kami menjual berbagai macam produk dengan berbagai jenis dan ukuran.</p>
                    <div class="progress rounded-pill">
                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar bg-warning rounded-pill"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    AOS.init();
</script>
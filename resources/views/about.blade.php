@include('header')

<div class="container">
    <nav class="navbar navbar-expand-sm navbar-dark" id="navbar_top">
        <a class="navbar-brand text-dark" href="#"><h3>BajuStore</h3></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">              
            </ul>
            <form class="form-inline my-2 my-lg-0">               
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/"><i class="fa fa-book text-success"></i> Katalog Toko</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/keranjang"><i class="fa fa-shopping-cart text-success"></i> Keranjang Saya</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/about"><i class="fa fa-whatsapp text-success"></i> Hubungi Kami</a>
            </form>
        </div>
    </nav>
</div>

<div class="container py-5">    

    <!-- For Demo Purpose-->
    <header class="text-center mb-5 mt-5">       
        <h1 class="display-4 font-weight-bold">Tentang BajuStore</h1>
        <p class="font-italic text-muted mb-0">Hubungi Kami Melalui Berbagai Media di Bawah Ini.</p>       
        <p class="font-italic text-muted">Semua Ada di <a href="https://bajustore.com" class="text-muted">
            <u>BajuStore</u></a>
        </p>
    </header>           

    <!-- Two  Row [Prosucts]-->
    <h2 class="font-weight-bold mb-2">Hubungi Kami</h2>
    <p class="font-italic text-muted mb-4">Anda punya pertanyaan? Atau sekedar ingin bertegur sapa? Hubungi Kami melalui media berikut ini.</p>
    
    <div class="row pb-5 mb-4">

       
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="https://cdn.icon-icons.com/icons2/1706/PNG/512/3986701-online-shop-store-store-icon_112278.png" alt="" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="#" class="text-dark">Toko Retail</a></h5>
                    <p class="small text-muted font-italic">Toko Retail kami beralamat di Dsn. Pagerwojo RT 11 RW 03 No. 252, Kecamatan Buduran, Kabupaten Sidoarjo, Jawa Timur</p>
                    <ul class="list-inline small row">
                        <li class="list-inline-item col-md text-center"><a class="btn btn-dark text-light"><i class="fa fa-map text-light"></i> Cek Maps</a></li>                          
                    </ul>
                </div>
            </div>          
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="https://image.flaticon.com/icons/png/512/124/124034.png" alt="" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="#" class="text-dark">Whatsapp</a></h5>
                    <p class="small text-muted font-italic">Ada kesulitan saat memesan atau memilih produk yang ingin Anda beli? Hubungi saja kami melalui aplikasi Whatsapp yang sedia selama 12 jam sehari </p>
                    <ul class="list-inline small row">
                        <li class="list-inline-item col-md text-center"><a class="btn btn-success text-light"> 089680591197</a></li>                          
                    </ul>
                </div>
            </div>          
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="https://cdn.icon-icons.com/icons2/2621/PNG/512/brand_facebook_messenger_icon_157342.png" alt="" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="#" class="text-dark">Messenger</a></h5>
                    <p class="small text-muted font-italic">Tidak biasa menghubungi melalui Whatsapp? Tenang, Anda bisa menghubungi kami melalui Messenger Facebook melalui tombol di bawah ini. </p>
                    <ul class="list-inline small row">
                        <li class="list-inline-item col-md text-center"><a class="btn btn-primary text-light"> Klik di sini</a></li>                          
                    </ul>
                </div>
            </div>          
        </div>               

    </div>   
                
</div>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KOPERASI BMT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
     <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm fixed-top">
         <h5 class="my-0 mr-md-auto font-weight-normal">
             <img src="{{asset('asset/logo/koperasi_indonesia.png')}}" class="rounded mx-auto d-block" width="20%" height="20%">
         </h5>
         <nav class="my-2 my-md-0 mr-md-3">
             <a class="p-2 text-dark" href="#">Home</a>
             <a class="p-2 text-dark" href="#">Produk</a>
             <a class="p-2 text-dark" href="#">Tentang Kami</a>
         </nav>
         <a class="btn btn-outline-primary" href="#">Sign up</a>
     </div>

        <main role="main">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('asset/img/2.jpg')}}" class="bd-placeholder-img" width="100%" height="100%">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Koperasi BMT.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                                    at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                            <title>Pinjaman Pokok</title>
                            <rect fill="#777" width="100%" height="100%" /><text fill="#777" dy=".3em" x="50%"
                                y="50%">140x140</text>
                        </svg>
                        <h2>Pinjaman Pokok</h2>
                        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
                            vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
                            cursus magna.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                            <title>Simpanan wajib</title>
                            <rect fill="#777" width="100%" height="100%" /><text fill="#777" dy=".3em" x="50%"
                                y="50%">140x140</text>
                        </svg>
                        <h2>Simpanan Wajib</h2>
                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                            mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                            condimentum nibh.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                            <title>Tabungan Investasi/Simpanan sukarela</title>
                            <rect fill="#777" width="100%" height="100%" /><text fill="#777" dy=".3em" x="50%"
                                y="50%">140x140</text>
                        </svg>
                        <h2>Tabungan Investasi</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                            porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                            fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                </div>
                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span>
                        </h2>
                        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                            semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
                            commodo.</p>
                    </div>
                    <div class="col-md-5">
                        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                            height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                            role="img" aria-label="Placeholder: 500x500">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                        </svg>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

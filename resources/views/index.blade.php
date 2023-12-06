<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon-32x32.webp') }}" type="image/webp" />

  <!-- CSS files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Plugins -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/slick/slick.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/slick/slick-theme.css') }}" />

  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet">


  <title>Sayonara</title>
</head>

<body>


  <!--page loader-->
  <div class="loader-wrapper">
    <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
      <div class="spinner-border text-dark" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>
  <!--end loader-->

  <!--start top header-->
  <header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
      <a class="navbar-brand d-none d-xl-inline" href="#"><img src="assets/images/logo.webp" class="logo-img"
          alt=""></a>
      <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <i class="bi bi-list"></i>
      </a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <div class="offcanvas-logo"><img src="assets/images/logo.webp" class="logo-img" alt=""></div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body primary-menu">
          <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
            </li>
            <li class="nav-item">
              @if (Auth::check())
              <a class="nav-link" href="#">
                <div>Hello, {{ Auth::user()->name }}</div>
              </a>
              @else
              <a class="nav-link" href="{{ route('login') }}" target="_blank">
                <div>Login</div>
              </a>
              @endif
            </li>
            <li class="nav-item">
              @if (Auth::check())
              @else
              <a class="nav-link" href="{{ route('register') }}" target="_blank">
                <div>Register</div>
              </a>
              @endif
            </li>
          </ul>
        </div>
      </div>
      <ul class="navbar-nav secondary-menu flex-row">
        <li class="nav-item">
          <a class="nav-link dark-mode-icon" href="javascript:;">
            <div class="mode-icon">
              <i class="bi bi-moon"></i>
            </div>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
          <a class="nav-link position-relative" href="javascript:;">
            <div class="cart-badge">0</div>
            <i class="bi bi-basket2"></i>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <!--end top header-->


  <!--start page content-->
  <div class="page-content">

    <!--start carousel-->
    <section class="slider-section">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active bg-primary">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">New Arrival</h3>
                  <h1 class="h1 text-white fw-bold">Women Fashion</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 25%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_1.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-red">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Latest Trending</h3>
                  <h1 class="h1 text-white fw-bold">Fashion Wear</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 35%</i></p>
                  <div class=""> <a class="btn btn-dark btn-ecomm" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_2.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-purple">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">New Trending</h3>
                  <h1 class="h1 text-white fw-bold">Kids Fashion</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 15%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_3.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-yellow">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-dark fw-bold">Latest Trending</h3>
                  <h1 class="h1 text-dark fw-bold">Electronics Items</h1>
                  <p class="text-dark fw-bold"><i>Last call for upto 45%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_4.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-green">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Super Deals</h3>
                  <h1 class="h1 text-white fw-bold">Home Furniture</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 24%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="assets/images/sliders/s_5.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!--end carousel-->




    <!--start tabular product-->

    <section class="product-tab-section section-padding bg-light">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Latest Products</h3>
          <p class="mb-0 text-capitalize"></p>
        </div>
        <hr>
        <div class="tab-content tabular-product">
          <div class="tab-pane fade show active" id="new-arrival">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
              @foreach ($products as $product)
              <div class="col">
                <div class="card">
                  <div class="position-relative overflow-hidden">
                    <div
                      class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                      @if(Auth::check())
                      <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="post">
                        @csrf
                        <input class="form-control" type="number" name="quantity" value="1" min="1">
                        <button class="btn" type="submit">Add to Cart</button>
                      </form>
                      @else
                      <p style="text-align: center;">You need to <br> <button class="btn loginbtn"
                          style="background-color: transparent; text-align:center !important; color:black !important;">log
                          in</button> <br> to add items to the cart.</p>
                      @endif
                    </div>
                    <a href="#">
                      <img src="{{ $product->imageLink }}" class="card-img-top" alt="{{ $product->title }}">
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="product-info text-center">
                      <h6 class="mb-1 fw-bold product-name">{{ $product->title }}</h6>
                      <div class="ratings mb-1 h6">
                        @for ($i = 0; $i < $product->rating; $i++)
                          <i class="bi bi-star-fill text-warning"></i>
                          @endfor
                      </div>
                      <p class="mb-0 h6 fw-bold product-price">${{ $product->price }}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      const button = document.querySelector('.loginbtn');
      button.addEventListener('click', () => {
        window.location.href = '/login';
      });

    </script>
    <!--end tabular product-->



    <!--start footer-->
    <section class="footer-section bg-section-2 section-padding">
      <div class="container">
        <div class="row row-cols-1 row-cols-lg-4 g-4">
          <div class="col">
            <div class="footer-widget-6">
              <img src="assets/images/logo.webp" class="logo-img mb-3" alt="">
              <h5 class="mb-3 fw-bold">About Us</h5>
              <p class="mb-2">University Project</p>

              <a class="link-dark" href="javascript:;">Read More</a>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget-7">
              <h5 class="mb-3 fw-bold">Explore</h5>
              <ul class="widget-link list-unstyled">
                <li><a href="javascript:;">Fashion</a></li>
                <li><a href="javascript:;">Women</a></li>
                <li><a href="javascript:;">Furniture</a></li>
                <li><a href="javascript:;">Shoes</a></li>
                <li><a href="javascript:;">Topwear</a></li>
                <li><a href="javascript:;">Brands</a></li>
                <li><a href="javascript:;">Kids</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget-8">
              <h5 class="mb-3 fw-bold">Company</h5>
              <ul class="widget-link list-unstyled">
                <li><a href="javascript:;">About Us</a></li>
                <li><a href="javascript:;">Contact Us</a></li>
                <li><a href="javascript:;">FAQ</a></li>
                <li><a href="javascript:;">Privacy</a></li>
                <li><a href="javascript:;">Terms</a></li>
                <li><a href="javascript:;">Complaints</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget-9">
              <h5 class="mb-3 fw-bold">Follow Us</h5>
              <div class="social-link d-flex align-items-center gap-2">
                <a href="javascript:;"><i class="bi bi-facebook"></i></a>
                <a href="javascript:;"><i class="bi bi-twitter"></i></a>
                <a href="javascript:;"><i class="bi bi-linkedin"></i></a>
                <a href="javascript:;"><i class="bi bi-youtube"></i></a>
                <a href="javascript:;"><i class="bi bi-instagram"></i></a>
              </div>
              <div class="mb-3 mt-3">
                <h5 class="mb-0 fw-bold">Support</h5>
                <p class="mb-0 text-muted">rinvee@rinvee.com</p>
              </div>
              <div class="">
                <h5 class="mb-0 fw-bold">Toll Free</h5>
                <p class="mb-0 text-muted">017********</p>
              </div>
            </div>
          </div>
        </div><!--end row-->


      </div>
    </section>
    <!--end footer-->

    <footer class="footer-strip text-center py-3 bg-section-2 border-top positon-absolute bottom-0">
      <p class="mb-0 text-muted">© 2023 Designed And Developed by Ms. Rinvee | All rights reserved.</p>
    </footer>


    <!--start cart-->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasRight"
      aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header bg-section-2">
        <h5 class="mb-0 fw-bold" id="offcanvasRightLabel">8 items in the cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="cart-list">

          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/01.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/02.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/03.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/04.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/05.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/06.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/07.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/08.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/09.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="#">
                <img src="assets/images/new-arrival/10.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="offcanvas-footer p-3 border-top">
        <div class="d-grid">
          <button type="button" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">Checkout</button>
        </div>
      </div>

    </div>
    <!--end cat-->


    <!--start quick view-->

    <!-- Modal -->
    <div class="modal fade" id="QuickViewModal" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-0">

          <div class="modal-body">
            <div class="row g-3">
              <div class="col-12 col-xl-6">

                <div class="wrap-modal-slider">

                  <div class="slider-for">
                    <div>
                      <img src="assets/images/product-images/01.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                      <img src="assets/images/product-images/02.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                      <img src="assets/images/product-images/03.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                      <img src="assets/images/product-images/04.jpg" alt="" class="img-fluid">
                    </div>
                  </div>

                  <div class="slider-nav mt-3">
                    <div>
                      <img src="assets/images/product-images/01.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                      <img src="assets/images/product-images/02.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                      <img src="assets/images/product-images/03.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                      <img src="assets/images/product-images/04.jpg" alt="" class="img-fluid">
                    </div>
                  </div>

                </div>

              </div>
              <div class="col-12 col-xl-6">
                <div class="product-info">
                  <h4 class="product-title fw-bold mb-1">Check Pink Kurta</h4>
                  <p class="mb-0">Women Pink & Off-White Printed Kurta with Palazzos</p>
                  <div class="product-rating">
                    <div class="hstack gap-2 border p-1 mt-3 width-content">
                      <div><span class="rating-number">4.8</span><i class="bi bi-star-fill ms-1 text-success"></i></div>
                      <div class="vr"></div>
                      <div>162 Ratings</div>
                    </div>
                  </div>
                  <hr>
                  <div class="product-price d-flex align-items-center gap-3">
                    <div class="h4 fw-bold">$458</div>
                    <div class="h5 fw-light text-muted text-decoration-line-through">$2089</div>
                    <div class="h4 fw-bold text-danger">(70% off)</div>
                  </div>
                  <p class="fw-bold mb-0 mt-1 text-success">inclusive of all taxes</p>

                  <div class="more-colors mt-3">
                    <h6 class="fw-bold mb-3">More Colors</h6>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                      <div class="color-box bg-red"></div>
                      <div class="color-box bg-primary"></div>
                      <div class="color-box bg-yellow"></div>
                      <div class="color-box bg-purple"></div>
                      <div class="color-box bg-green"></div>
                    </div>
                  </div>

                  <div class="size-chart mt-3">
                    <h6 class="fw-bold mb-3">Select Size</h6>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                      <div class="">
                        <button type="button" class="rounded-0">XS</button>
                      </div>
                      <div class="">
                        <button type="button" class="rounded-0">S</button>
                      </div>
                      <div class="">
                        <button type="button" class="rounded-0">M</button>
                      </div>
                      <div class="">
                        <button type="button" class="rounded-0">L</button>
                      </div>
                      <div class="">
                        <button type="button" class="rounded-0">XL</button>
                      </div>
                      <div class="">
                        <button type="button" class="rounded-0">XXL</button>
                      </div>
                    </div>
                  </div>
                  <div class="cart-buttons mt-3">
                    <div class="buttons d-flex flex-column gap-3 mt-4">
                      <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 flex-grow-1"><i
                          class="bi bi-basket2 me-2"></i>Add to Bag</a>
                      <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i
                          class="bi bi-suit-heart me-2"></i>Wishlist</a>
                    </div>
                  </div>
                  <hr class="my-3">
                  <div class="product-share">
                    <h6 class="fw-bold mb-3">Share This Product</h6>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                      <div class="">
                        <button type="button" class="btn-social bg-twitter"><i class="bi bi-twitter"></i></button>
                      </div>
                      <div class="">
                        <button type="button" class="btn-social bg-facebook"><i class="bi bi-facebook"></i></button>
                      </div>
                      <div class="">
                        <button type="button" class="btn-social bg-linkden"><i class="bi bi-linkedin"></i></button>
                      </div>
                      <div class="">
                        <button type="button" class="btn-social bg-youtube"><i class="bi bi-youtube"></i></button>
                      </div>
                      <div class="">
                        <button type="button" class="btn-social bg-pinterest"><i class="bi bi-pinterest"></i></button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!--end row-->
          </div>

        </div>
      </div>
    </div>
    <!--end quick view-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!--End Back To Top Button-->


    <!-- JavaScript files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/slick/slick.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/loader.js"></script>

</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.webp" type="image/webp" />

    <!-- CSS files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css" />

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">

    <title>Shopingo - eCommerce HTML Template</title>
</head>

<body>

    <!--page loader-->
    <div class="loader-wrapper">
        <div
            class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
            <div class="spinner-border text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!--end loader-->

    <!--start top header-->
    <header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
    <a class="navbar-brand d-none d-xl-inline" href="#"><img src="assets/images/logo.webp" class="logo-img" alt=""></a>
    <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
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
                <li class="nav-item ">
                    <a class="nav-link" target="_blank" href="{{ route('login') }}" >
                    @if (Auth::check())
                            <div>Hello, {{ Auth::user()->name }}</div>
                        @else
                            <div>Login</div>
                        @endif
                    </a>
                    <!-- Dropdown Menu Goes Here -->
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


        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->


        <!--start product details-->
        <section class="section-padding">
            <div class="container">
                <div class="d-flex align-items-center px-3 py-2 border mb-4">
                    <div class="text-start">
                    <h4 class="mb-0 h4 fw-bold">My Bag ({{ count($cartItems) }} items)</h4>
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-light btn-ecomm">Continue Shopping</button>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-12 col-xl-8">

                        @foreach ($cartItems as $cartItem)
                        <div class="card rounded-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-lg-row gap-3">
                                    <div class="product-img">
                                        <img src="{{ $cartItem->product->imageLink }}" width="150"
                                            alt="{{ $cartItem->product->title }}">
                                    </div>
                                    <div class="product-info flex-grow-1">
                                        <h5 class="fw-bold mb-0">{{ $cartItem->product->title }}</h5>
                                        <div class="product-price d-flex align-items-center gap-2 mt-3">
                                            <div class="h6 fw-bold">{{ number_format($cartItem->product->price, 2) }} bdt
                                            </div>
                                            <!-- You can add discount and original price here if needed -->
                                        </div>
                                        <div class="mt-3 hstack gap-2">
                                            <!-- <button type="button" class="btn btn-sm btn-light border rounded-0"
                                                data-bs-toggle="modal" data-bs-target="#SizeModal">Size : M</button> -->
                                            <button type="button" class="btn btn-sm btn-light border rounded-0"
                                                data-bs-toggle="modal" data-bs-target="#QtyModal">Qty : {{
                                                $cartItem->quantity }}</button>
                                        </div>
                                    </div>
                                    <div class="d-none d-lg-block vr"></div>
                                    <div class="d-grid gap-2 align-self-start align-self-lg-center">
                                    <form action="{{ route('cart.delete', ['cart' => $cartItem->id]) }}" method="post">
                                            
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-ecomm"><i
                                                    class="bi bi-x-lg me-2"></i>Remove</button>
                                        </form>
                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card rounded-0 mb-3">
                            <div class="card-body">
                                <h5 class="fw-bold mb-4">Order Summary</h5>

                                @php
                                $bagTotal = $totalPrice ?? 0;
                                $deliveryFee = 29.00;
                                $totalAmount = $bagTotal + $deliveryFee;
                                @endphp

                                <div class="hstack align-items-center justify-content-between">
                                    <p class="mb-0">Bag Total</p>
                                    <p class="mb-0">{{ number_format($bagTotal, 2) }} bdt</p>
                                </div>
                                <hr>
                                <div class="hstack align-items-center justify-content-between">
                                    <p class="mb-0">Delivery</p>
                                    <p class="mb-0">{{ number_format($deliveryFee, 2) }} bdt</p>
                                </div>
                                <hr>
                                <div class="hstack align-items-center justify-content-between fw-bold text-content">
                                    <p class="mb-0">Total Amount</p>
                                    <p class="mb-0">{{ number_format($totalAmount, 2) }} bdt</p>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="button" class="btn btn-dark btn-ecomm py-3 px-5">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!--end row-->

    </div>
    </section>
    <!--start product details-->




    </div>
    <!--end page content-->


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
  </section><!--end footer-->

    <footer class="footer-strip text-center py-3 bg-section-2 border-top positon-absolute bottom-0">
        <p class="mb-0 text-muted">© 2022. www.example.com | All rights reserved.</p>
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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
                        <a href="product-details.html">
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


    <!--start size modal-->
    <div class="modal" id="SizeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-body">
                    <div class="d-flex gap-3">
                        <div class="product-img">
                            <img src="assets/images/featured-products/01.webp" width="80" alt="">
                        </div>
                        <div class="product-info flex-grow-1">
                            <h6 class="fw-bold mb-0">AKS - Checked Straight Kurta</h6>
                            <div class="product-price d-flex align-items-center gap-2 mt-2">
                                <div class="h6 fw-bold">$458</div>
                                <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                                <div class="h6 fw-bold text-danger">(70% off)</div>
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <hr>
                    <div class="size-chart mt-4">
                        <h5 class="fw-bold mb-4">Select Size</h5>
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="">
                                <button type="button">XS</button>
                            </div>
                            <div class="">
                                <button type="button">S</button>
                            </div>
                            <div class="">
                                <button type="button">M</button>
                            </div>
                            <div class="">
                                <button type="button">L</button>
                            </div>
                            <div class="">
                                <button type="button">XL</button>
                            </div>
                            <div class="">
                                <button type="button">XXL</button>
                            </div>
                            <div class="">
                                <button type="button">3XL</button>
                            </div>
                            <div class="">
                                <button type="button">4XL</button>
                            </div>
                            <div class="">
                                <button type="button">5XL</button>
                            </div>
                            <div class="">
                                <button type="button">6XL</button>
                            </div>
                            <div class="">
                                <button type="button">7XL</button>
                            </div>
                            <div class="">
                                <button type="button">8XL</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="button" class="btn btn-dark btn-ecomm">Done</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end size modal-->


    <!--start qty modal-->
    <div class="modal" id="QtyModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h5 class="fw-bold mb-0">Select Quantity</h5>
                        </div>
                        <div class="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <hr>
                    <div class="size-chart">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="">
                                <button type="button">1</button>
                            </div>
                            <div class="">
                                <button type="button">2</button>
                            </div>
                            <div class="">
                                <button type="button">3</button>
                            </div>
                            <div class="">
                                <button type="button">4</button>
                            </div>
                            <div class="">
                                <button type="button">5</button>
                            </div>
                            <div class="">
                                <button type="button">6</button>
                            </div>
                            <div class="">
                                <button type="button">7</button>
                            </div>
                            <div class="">
                                <button type="button">8</button>
                            </div>
                            <div class="">
                                <button type="button">9</button>
                            </div>
                            <div class="">
                                <button type="button">10</button>
                            </div>
                            <div class="">
                                <button type="button">11</button>
                            </div>
                            <div class="">
                                <button type="button">12</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="button" class="btn btn-dark btn-ecomm">Done</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end qty modal-->



    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!--End Back To Top Button-->


    <!-- JavaScript files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/slick/slick.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/loader.js"></script>


</body>

</html>
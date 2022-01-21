
<!-- Header -->
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+111444989">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            Telephone:+111-444-989</a>
                    </li>
                    <li>
                        <a href="mailto:contact@domain.com">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            E-mail: contact@domain.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a class="show-contact-form"><i class="far fa-paper-plane"></i> Contact Us</a>
                    </li>
                    <li>
                        <a>
                            Mon compte
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="cart.html">
                                    <i class="fas fa-cog u-s-m-r-9"></i>
                                    My Cart</a>
                            </li>
                            <li>
                                <a href="wishlist.html">
                                    <i class="far fa-heart u-s-m-r-9"></i>
                                    My Wishlist</a>
                            </li>
                            <li>
                                <a href="checkout.html">
                                    <i class="far fa-check-circle u-s-m-r-9"></i>
                                    Checkout</a>
                            </li>
                            @guest()
                                <li>
                                    <a href="{{ route("login") }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Login / Signup</a>
                                </li>
                            @endguest
                            @auth("web")
                                <li>
                                    <form method="post" action="{{ route("logout") }}">
                                        @csrf
                                        <i class="fas fa-sign-out-alt u-s-m-r-9"></i>
                                        <input type="submit" class="btn btn-sm" value="Log out">
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </li>
                    {{--
                    <li>
                        <a>USD
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">($) USD</a>
                            </li>
                            <li>
                                <a href="#">(£) GBP</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>ENG
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">ARB</a>
                            </li>
                        </ul>
                --}}
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="home.html">
                            <img src="{{asset("template")}}/images/main-logo/groover-branding-1.png" alt="Groover Brand Logo" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    <form class="form-searchbox">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Search everything">
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label>
                                <select class="select-box" id="select-category">

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="home.html">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li class="u-d-none-lg">
                                <a href="wishlist.html">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter">4</span>
                                    <span class="item-price">$220.00</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="wishlist.html">
                <i class="far fa-heart"></i>
                <span class="fixed-item-counter">4</span>
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->
    <!-- Mini Cart -->
    <div class="mini-cart-wrapper">
        <div class="mini-cart">
            <div class="mini-cart-header">
                YOUR CART
                <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
            </div>
            <ul class="mini-cart-list">
                <li class="clearfix">
                    <a href="single-product.html">
                        <img src="{{asset("template")}}/images/product/product@1x.jpg" alt="Product">
                        <span class="mini-item-name">Casual Hoodie Full Cotton</span>
                        <span class="mini-item-price">$55.00</span>
                        <span class="mini-item-quantity"> x 1 </span>
                    </a>
                </li>
                <li class="clearfix">
                    <a href="single-product.html">
                        <img src="{{asset("template")}}/images/product/product@1x.jpg" alt="Product">
                        <span class="mini-item-name">Black Rock Dress with High Jewelery Necklace</span>
                        <span class="mini-item-price">$55.00</span>
                        <span class="mini-item-quantity"> x 1 </span>
                    </a>
                </li>
                <li class="clearfix">
                    <a href="single-product.html">
                        <img src="{{asset("template")}}/images/product/product@1x.jpg" alt="Product">
                        <span class="mini-item-name">Xiaomi Note 2 Black Color</span>
                        <span class="mini-item-price">$55.00</span>
                        <span class="mini-item-quantity"> x 1 </span>
                    </a>
                </li>
                <li class="clearfix">
                    <a href="single-product.html">
                        <img src="{{asset("template")}}/images/product/product@1x.jpg" alt="Product">
                        <span class="mini-item-name">Dell Inspiron 15</span>
                        <span class="mini-item-price">$55.00</span>
                        <span class="mini-item-quantity"> x 1 </span>
                    </a>
                </li>
            </ul>
            <div class="mini-shop-total clearfix">
                <span class="mini-total-heading float-left">Total:</span>
                <span class="mini-total-price float-right">$220.00</span>
            </div>
            <div class="mini-action-anchors">
                <a href="cart.html" class="cart-anchor">View Cart</a>
                <a href="checkout.html" class="checkout-anchor">Checkout</a>
            </div>
        </div>
    </div>
    <!-- Mini Cart /- -->
    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                            <span class="v-title">
                                <i class="ion ion-md-menu"></i>
                                All Categories
                                <i class="fas fa-angle-down"></i>
                            </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">

                                    @foreach($categories as $category)
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-md-arrow-dropright"></i>
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="custom-deal-page.html">New Arrivals
                                <span class="superscript-label-new">NEW</span>
                            </a>
                        </li>
                        <li>
                            <a href="custom-deal-page.html">Exclusive Deals
                                <span class="superscript-label-hot">HOT</span>
                            </a>
                        </li>
                        <li>
                            <a href="custom-deal-page.html">Flash Deals
                            </a>
                        </li>

                        <li>
                            <a href="custom-deal-page.html">Super Sale
                                <span class="superscript-label-discount">-15%</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->

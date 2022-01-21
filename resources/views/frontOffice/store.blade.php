@extends('frontOffice.layout.main')


@section('title','Home page')


@section('content-wrapper')

    <!-- Main-Slider -->
        <div class="default-height">
        <div class="slider-main owl-carousel owl-loaded owl-drag">



            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(-1519px, 0px, 0px); transition: all 0.25s ease 0s; width: 4558px;">
                    <div class="owl-item" style="width: 1519.2px;">
                        <div class="bg-image one">
                             <div class="slide-content slide-animation">
                                <h1>Bijoux fantastiques</h1>
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 1519.2px;">
                        <div class="bg-image two">
                             <div class="slide-content-2 slide-animation">
                                <h2 class="slide-2-h2-a">Bijoux</h2>
                                <h2 class="slide-2-h2-b">fantastiques</h2>
                                <h1>2022</h1>
                            </div>
                        </div>
                    </div>
                    <div class="owl-item" style="width: 1519.2px;">
                        <div class="bg-image three">
                             <div class="slide-content slide-animation">
                                <h1>Bijoux
                                    <span style="color:#333">fantastiques</span>
                                </h1>
                                <h2 style="color:#333"># shopping</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-nav">
                <div class="main-slider-previous"><i class="fas fa-angle-left"></i>
                </div>
                <div class="main-slider-next"><i class="fas fa-angle-right"></i>
                </div>
            </div>
            <div class="owl-dots disabled">

            </div>
        </div>
    </div>
    <!-- Main-Slider -->


    <!-- Last Products -->
    <section class="section-maker">
        <div class="container">

            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">Les derniers articles</h3>
            </div>

            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="men-latest-products">
                            <div>
                                <div class="products-slider owl-carousel owl-loaded owl-drag" data-item="4">

                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2220px;">


                                            @foreach($products as $product)

                                                <div class="owl-item active" style="width: 277.5px;">
                                                    <div class="item">
                                                        <div class="image-container">
                                                            <a class="item-img-wrapper-link" href="#">
                                                                <img class="img-fluid" src="{{asset("/uploads/products/")}}/{{$product->pictures[0]->name}}" alt="Product">
                                                            </a>
                                                            <div class="item-action-behaviors">
                                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                                </a>
                                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="what-product-is">
                                                                <ul class="bread-crumb">
                                                                    <li class="has-separator">
                                                                        <a href="#">{{ $product->category->name }}</a>
                                                                    </li>
                                                                </ul>
                                                                <h6 class="item-title">
                                                                    <a href="#">{{ substr($product->name,0,46) }}</a>
                                                                </h6>
                                                                <div class="item-stars">
                                                                    <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                        <span style="width:0"></span>
                                                                    </div>
                                                                    <span>(0)</span>
                                                                </div>
                                                            </div>
                                                            <div class="price-template">
                                                                <div class="item-new-price">
                                                                    {{ ($product->price*$product->discount)/100 }} MAD
                                                                </div>
                                                                <div class="item-old-price">
                                                                    {{ $product->price }} MAD
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tag new">
                                                            <span>NEW</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                            {{--<div class="owl-item active" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Tops</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">T-Shirts</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Mischka Plain Men T-Shirt</a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Tops</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v4-filter-as-category.html">T-Shirts</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Black Bean Plain Men T-Shirt</a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Bottoms</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Jeans</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Regular Rock Blue Men Jean</a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tag new">
                                                        <span>NEW</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Tops</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Suits</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Black Maire Full Men Suit</a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tag sale">
                                                        <span>SALE</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Outwear</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Jackets</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Woodsmoke Rookie Parka Jacket</a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Accessories</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Ties</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Blue Zodiac Boxes Reg Tie
                                                                </a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 277.5px;">
                                                <div class="item">
                                                    <div class="image-container">
                                                        <a class="item-img-wrapper-link" href="single-product.html">
                                                            <img class="img-fluid" src="{{asset("/template/")}}/images/product/product@3x.jpg" alt="Product">
                                                        </a>
                                                        <div class="item-action-behaviors">
                                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                            </a>
                                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="what-product-is">
                                                            <ul class="bread-crumb">
                                                                <li class="has-separator">
                                                                    <a href="shop-v1-root-category.html">Men's</a>
                                                                </li>
                                                                <li class="has-separator">
                                                                    <a href="shop-v2-sub-category.html">Bottoms</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Shoes</a>
                                                                </li>
                                                            </ul>
                                                            <h6 class="item-title">
                                                                <a href="single-product.html">Zambezi Carved Leather Business Casual Shoes
                                                                </a>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                                    <span style="width:0"></span>
                                                                </div>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                $55.00
                                                            </div>
                                                            <div class="item-old-price">
                                                                $60.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tag discount">
                                                        <span>-15%</span>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="owl-nav">
                                        <div class="product-slider-previous"><i class="fas fa-angle-left"></i>
                                        </div>
                                        <div class="product-slider-next">
                                            <i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                    <div class="owl-dots disabled">

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Last Products -->


    <!-- All products -->
        @include("frontOffice.allProducts")
    <!-- All products -->




@endsection

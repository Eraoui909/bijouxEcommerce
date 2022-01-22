@extends('frontOffice.layout.main')


@section('title','Single product')


@section('content-wrapper')

    <div class="page-detail u-s-p-t-80">
        <div class="container">

            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-zoom-area -->
                    <div class="zoom-area">
                        <img id="zoom-pro" class="img-fluid ha-set-image"
                             src="{{ asset("/uploads/products/") }}/{{ $product->pictures[0]->name }}"
                                data-zoom-image="images/product/product@4x.jpg" alt="Zoom Image">
                                <div id="gallery" class="u-s-m-t-10">

                    @foreach($product->pictures as $pic)
                    <a id="ha-change-pic" data-image="{{ asset("/uploads/products/") }}/{{ $pic->name }}"
                       data-zoom-image="{{ asset("/uploads/products/") }}/{{ $pic->name }}">
                        <img src="{{ asset("/uploads/products/") }}/{{ $pic->name }}" alt="Product">
                    </a>
                    @endforeach
                </div>
            </div>
<!-- Product-zoom-area /- -->
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
    <!-- Product-details -->
    <div class="all-information-wrapper">
        <div class="section-1-title-breadcrumb-rating">
            <div class="product-title">
                <h1>
                    <a href="single-product.html">{{ $product->name }}</a>
                </h1>
            </div>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <a href="home.html">Home</a>
                </li>
                <li class="has-separator">
                    <a href="shop-v1-root-category.html">Men's Clothing</a>
                </li>
                <li class="has-separator">
                    <a href="shop-v2-sub-category.html">Tops</a>
                </li>
                <li class="is-marked">
                    <a href="shop-v3-sub-sub-category.html">Hoodies</a>
                </li>
            </ul>
            <div class="product-rating">
                <div class="star" title="4.5 out of 5 - based on 23 Reviews">
                    <span style="width:67px"></span>
                </div>
                <span>(23)</span>
            </div>
        </div>
        <div class="section-2-short-description u-s-p-y-14">
            <h6 class="information-heading u-s-m-b-8">Description:</h6>
            <p>{!!  $product->description !!}</p>
        </div>
        <div class="section-3-price-original-discount u-s-p-y-14">
            <div class="price">
                <h4>{{ $product->price - (($product->price*$product->discount)/100) }} MAD </h4>
            </div>
            <div class="original-price">
                <span>Original Price:</span>
                <span>{{ $product->price }} MAD</span>
            </div>
            <div class="discount-price">
                <span>Discount:</span>
                <span>{{ ceil($product->discount) }}%</span>
            </div>
            <div class="total-save">
                <span>Save:</span>
                <span>{{ ($product->price*$product->discount)/100 }} MAD</span>
            </div>
        </div>
        <div class="section-4-sku-information u-s-p-y-14">
            <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
            <div class="availability">
                <span>Availability:</span>
                <span>In Stock</span>
            </div>
            <div class="left">
                <span>Only:</span>
                <span>{{ ceil($product->stock) }} left</span>
            </div>
        </div>
        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
            <form action="#" class="post-form">
                <div class="quantity-wrapper u-s-m-b-22">
                    <span>Quantity:</span>
                    <div class="quantity">
                        <input type="text" class="quantity-text-field" value="1">
                        <a class="plus-a" data-max="1000">+</a>
                        <a class="minus-a" data-min="1">-</a>
                    </div>
                </div>
                <div>
                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                </div>
            </form>
        </div>
    </div>
    <!-- Product-details /- -->
</div>
</div>
<!-- Product-Detail -->
</div>
</div>




@endsection

@section("script")
    <script>
        $(document).on("#ha-change-pic","click",function (e){
           e.preventDefault();
           console.log("success");
        });
    </script>
@endsection

@extends('frontOffice.layout.main')


@section('title','Single product')

@section("styles")
    <style>
        * {
            box-sizing: border-box;
        }

        img {
            max-width: 100%;
            vertical-align: top;
        }

        .gallery {
            display: flex;
            margin: 10px auto;
            max-width: 600px;
            position: relative;
            padding-top: 66.6666666667%;
        }
        @media screen and (min-width: 600px) {
            .gallery {
                padding-top: 400px;
            }
        }
        .gallery__img {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            display: none;
            height: 70%;
            overflow: auto;
        }

        .gallery__thumb {
            padding-top: 6px;
            margin: 6px;
            display: block;
            max-width: 100px;
            cursor: pointer;
        }
        .gallery__selector {
            position: absolute;
            opacity: 0;
            visibility: hidden;
        }
        .gallery__selector:checked + .gallery__img {
            opacity: 1;
            display: block;
        }
        .gallery__selector:checked ~ .gallery__thumb > img {
            box-shadow: 0 0 0 3px var(--maincolor);
        }
    </style>
@endsection

@section('content-wrapper')




    <div class="page-detail u-s-p-t-80">
        <div class="container">

            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-zoom-area -->
                    <section class="gallery">

                        @foreach($product->pictures as $i => $pic)
                            <div class="gallery__item">
                                <input type="radio" id="img-{{$i+1}}" checked name="gallery" class="gallery__selector"/>
                                    <div class="gallery__img">
                                        <img class="" src="{{ asset("/uploads/products/") }}/{{ $pic->name }}" alt=""/>
                                    </div>
                                <label for="img-{{$i+1}}" class="gallery__thumb"><img src="{{ asset("/uploads/products/") }}/{{ $pic->name }}" alt=""/></label>
                            </div>
                        @endforeach

                    </section>

                    <!-- Product-zoom-area /- -->
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
    <!-- Product-details -->
    <div class="all-information-wrapper">
        <div class="section-1-title-breadcrumb-rating">
            <div class="product-title">
                <h1>
                    <a href="#">{{ $product->name }}</a>
                </h1>
            </div>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <a href="#">{{ $product->category->name }}</a>
                </li>

            </ul>
            <div class="product-rating">
                <div class="star" title="4.5 out of 5 - based on 23 Reviews">
                    <span style="width:67px"></span>
                </div>
                <span>(23)</span>
            </div>
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
                @if(ceil($product->stock)>0)
                    <span>In Stock</span>
                @else
                    <span class="text-danger">Out Of Stock</span>
                @endif
            </div>
            <div class="left">
                <span>Only:</span>
                <span>{{ ceil($product->stock) }} left</span>
            </div>
        </div>
        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
            <form action="{{ route("cart.store") }}" method="POST" class="post-form">
                @csrf
                <input type="hidden" name="product" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="discount" value="{{ $product->discount }}">
                <input type="hidden" name="stock" value="{{ $product->discount }}">
                <div class="quantity-wrapper u-s-m-b-22">
                    <span>Quantity:</span>
                    <div class="quantity">
                        <input type="text" name="quantity" class="quantity-text-field" value="1">
                        <a class="plus-a" data-max="{{ ceil($product->stock) }}">+</a>
                        <a class="minus-a" data-min="1">-</a>
                    </div>
                </div>
                <div>
                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                </div>
            </form>
            <div class="section-2-short-description u-s-p-y-14">
                <h6 class="information-heading u-s-m-b-8">Description:</h6>
                <p>{!!  $product->description !!}</p>
            </div>

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
           alert("success");
        });
    </script>
@endsection

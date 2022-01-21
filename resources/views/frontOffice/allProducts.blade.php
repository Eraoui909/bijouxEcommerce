



<!-- All products -->
<div class="page-deal u-s-p-t-80">
    <div class="container">
        <div class="deal-page-wrapper">
            <h1 class="deal-heading">Les produits diponible</h1>
            <h6 class="deal-has-total-items">27 Items</h6>
        </div>
        <!-- Page-Bar -->
        <div class="page-bar clearfix">

            <!-- Toolbar Sorter 1  -->
            <div class="toolbar-sorter">
                <div class="select-box-wrapper">
                    <label class="sr-only" for="sort-by">Sort By</label>
                    <select class="select-box" id="sort-by">
                        <option selected="selected" value="">Sort By: Best Selling</option>
                        <option value="">Sort By: Latest</option>
                        <option value="">Sort By: Lowest Price</option>
                        <option value="">Sort By: Highest Price</option>
                        <option value="">Sort By: Best Rating</option>
                    </select>
                </div>
            </div>
            <!-- //end Toolbar Sorter 1  -->
            <!-- Toolbar Sorter 2  -->
            <div class="toolbar-sorter-2">
                <div class="select-box-wrapper">
                    <label class="sr-only" for="show-records">Show Records Per Page</label>
                    <select class="select-box" id="show-records">
                        <option selected="selected" value="">Show: 8</option>
                        <option value="">Show: 16</option>
                        <option value="">Show: 28</option>
                    </select>
                </div>
            </div>
            <!-- //end Toolbar Sorter 2  -->
        </div>
        <!-- Page-Bar /- -->
        <!-- Row-of-Product-Container -->
        <div class="row product-container grid-style">

            @foreach($products as $product)
                <div class="product-item col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="image-container">
                        <a class="item-img-wrapper-link" href="#">
                            <img class="img-fluid" src="{{asset("/uploads/products/")}}/{{ $product->pictures[0]->name }}" alt="Product">
                        </a>
                        <div class="item-action-behaviors">
                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="what-product-is">
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="shop-v1-root-category.html">{{ $product->category->name }}</a>
                                </li>

                            </ul>
                            <h6 class="item-title">
                                <a href="#">{{ substr($product->name,0,46) }}</a>
                            </h6>

                            <div class="item-stars">
                                <div class="star" title="4.5 out of 5 - based on 23 Reviews">
                                    <span style="width:67px"></span>
                                </div>
                                <span>(23)</span>
                            </div>
                        </div>
                        <div class="price-template">
                            <div class="item-new-price">
                                {{ $product->price - (($product->price*$product->discount)/100) }} MAD
                            </div>
                            <div class="item-old-price">
                                {{ $product->price }} MAD
                            </div>
                        </div>
                    </div>
                    <div class="tag discount">
                        <span>{{ ceil($product->discount) }} <strong>%</strong></span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Row-of-Product-Container /- -->
        <!-- Shop-Pagination -->
        <div class="pagination-area">
            <div class="pagination-number">
                <ul>
                    <li style="display: none">
                        <a href="shop-v1-root-category.html" title="Previous">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="shop-v1-root-category.html">1</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">2</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">3</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">...</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">10</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html" title="Next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                {{ $products->links() }}
            </div>
        </div>
        <!-- Shop-Pagination /- -->
    </div>
</div>
<!-- All products -->






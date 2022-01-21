<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                For special offers and other discount information
            </h6>
            <h1>
                Subscribe to our Newsletter
            </h1>
            <p>
                Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.
            </p>
            <form method="POST" action="{{route("newsletter")}}" class="newsletter-form">
                @csrf
                <label class="sr-only" for="newsletter-field">Enter your Email</label>
                <input type="email" name="email" id="newsletter-field" placeholder="Your Email Address">
                <button type="submit" class="button news-subscribe">SUBMIT</button>
            </form>
        </div>
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>CUSTOMER SERVICE</h6>
                        <ul>
                            <li>
                                <a href="faq.html">FAQs</a>
                            </li>
                            <li>
                                <a href="track-order.html">Track Order</a>
                            </li>
                            <li>
                                <a href="terms-and-conditions.html">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COMPANY</h6>
                        <ul>
                            <li>
                                <a href="home.html">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>INFORMATION</h6>
                        <ul>
                            <li>
                                <a href="store-directory.html">Categories Directory</a>
                            </li>
                            <li>
                                <a href="wishlist.html">My Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">My Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Address</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>819 Sugar Camp Road, West Concord, MN 55985</span>
                            </li>
                            <li>
                                <a href="tel:+923086561801">
                                    <i class="fas fa-phone u-s-m-r-9"></i>
                                    <span>+111-444-989</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:contact@domain.com">
                                    <i class="fas fa-envelope u-s-m-r-9"></i>
                                    <span>
                                            contact@domain.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Copyright &copy; {{ date("Y") }}
                 All Right Reserved</p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
<!-- Footer /- -->

<!-- NoScript -->
<noscript>
    <div class="app-issue">
        <div class="vertical-center">
            <div class="text-center">
                <h1>JavaScript is disabled in your browser.</h1>
                <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser to register for Groover.</span>
            </div>
        </div>
    </div>
    <style>
        #app {
            display: none;
        }
    </style>
</noscript>

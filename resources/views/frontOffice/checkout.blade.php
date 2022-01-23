
@extends('frontOffice.layout.main')


@section('title','Checkout')

@section("styles")
    <style>
        .is-invalid{
            border-color: var(--danger);
        }
    </style>
@endsection

@section('content-wrapper')


    <div class="page-checkout u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- First-Accordion -->
                    <div>
                        <div class="message-open u-s-m-b-24">
                            Returning customer?
                            <strong>
                                <a class="u-c-brand" data-toggle="collapse" href="#showlogin">Click here to login
                                </a>
                            </strong>
                        </div>
                        <div class="collapse u-s-m-b-24" id="showlogin">
                            <h6 class="collapse-h6">Welcome back! Sign in to your account.</h6>
                            <h6 class="collapse-h6">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</h6>
                            <form>
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="user-name-email">Username or Email
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="user-name-email" class="text-field" placeholder="Username / Email">
                                    </div>
                                    <div class="group-2">
                                        <label for="password">Password
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="password" class="text-field" placeholder="Password">
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <button type="submit" class="button button-outline-secondary">Login</button>
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Remember me</label>
                                </div>
                                <div class="page-anchor">
                                    <a href="#" class="u-c-brand">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- First-Accordion /- -->
                    <!-- Second Accordion -->
                    <div>
                        <div class="message-open u-s-m-b-24">
                            Have a coupon?
                            <strong>
                                <a class="u-c-brand" data-toggle="collapse" href="#showcoupon">Click here to enter your code</a>
                            </strong>
                        </div>
                        <div class="collapse u-s-m-b-24" id="showcoupon">
                            <h6 class="collapse-h6">
                                Enter your coupon code if you have one.
                            </h6>
                            <div class="coupon-field">
                                <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                <input id="coupon-code" type="text" class="text-field" placeholder="Coupon Code">
                                <button type="submit" class="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                    <!-- Second Accordion /- -->
                    <form action="{{ route("checkout.order") }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Billing Details</h4>
                                <!-- Form-Fields -->
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="first-name">First Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" name="first_name" id="first-name" class="text-field @error('first_name') is-invalid @enderror">
                                        @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="group-2">
                                        <label for="last-name">Last Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" name="last_name" id="last-name" class="text-field @error('last_name') is-invalid @enderror">
                                        @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="select-country">Country
                                        <span class="astk">*</span>
                                    </label>
                                    <div class="select-box-wrapper">
                                        <select class="select-box @error('country') is-invalid @enderror" name="country" id="select-country">
                                            <option selected="selected" value="">Choose your country...</option>
                                            <option value="maroc">Maroc</option>
                                            <option value="exterieur">exterieur de maroc</option>
                                        </select>
                                        @error('country')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="street-address u-s-m-b-13">
                                    <label for="req-st-address">Street Address
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" name="street_address" id="req-st-address" class="text-field @error('street_address') is-invalid @enderror" placeholder="House name and street name">
                                    @error('street_address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <label class="sr-only" for="opt-st-address"></label>
                                    <input type="text" name="second_street_address @error('second_street_address') is-invalid @enderror"  id="opt-st-address" class="text-field" placeholder="Apartment, suite unit etc. (optional)">
                                    @error('second_street_address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="town-city">Town / City
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" name="city" id="town-city" class="text-field @error('city') is-invalid @enderror">
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="postcode">Code postal / Zip
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" name="zip" id="postcode" class="text-field @error('zip') is-invalid @enderror">
                                    @error('zip')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="email">Email address
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="email" name="email" id="email" class="text-field @error('email') is-invalid @enderror">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="group-2">
                                        <label for="phone">Phone
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="tel" name="phone" id="phone" class="text-field @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="order-notes">Order Notes</label>
                                    <textarea name="notes" class="text-area @error('notes') is-invalid @enderror" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    @error('notes')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="u-s-m-b-30">
                                    <input type="checkbox" name="create_account" class="check-box" id="create-account">
                                    <label class="label-text" for="create-account">Create Account</label>
                                </div>



                                <!-- Form-Fields /- -->
                                <h4 class="section-h4">Shipping Details</h4>
                                <div class="u-s-m-b-24">
                                    <input type="checkbox" class="check-box collapsed" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent" aria-expanded="false">
                                    <label class="label-text" for="ship-to-different-address">Ship to a different address?</label>
                                </div>
                                <div class="collapse" id="showdifferent" style="">
                                    <!-- Form-Fields -->
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="first-name-extra">First Name
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="first-name-extra" class="text-field">
                                        </div>
                                        <div class="group-2">
                                            <label for="last-name-extra">Last Name
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="last-name-extra" class="text-field">
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="select-country-extra">Country
                                            <span class="astk">*</span>
                                        </label>
                                        <div class="select-box-wrapper">
                                            <select class="select-box" id="select-country-extra">
                                                <option selected="selected" value="">Choose your country...</option>
                                                <option value="">United Kingdom (UK)</option>
                                                <option value="">United States (US)</option>
                                                <option value="">United Arab Emirates (UAE)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="street-address u-s-m-b-13">
                                        <label for="req-st-address-extra">Street Address
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="req-st-address-extra" class="text-field" placeholder="House name and street name">
                                        <label class="sr-only" for="opt-st-address-extra"></label>
                                        <input type="text" id="opt-st-address-extra" class="text-field" placeholder="Apartment, suite unit etc. (optional)">
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="town-city-extra">Town / City
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="town-city-extra" class="text-field">
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="select-state-extra">State / Country
                                            <span class="astk"> *</span>
                                        </label>
                                        <div class="select-box-wrapper">
                                            <select class="select-box" id="select-state-extra">
                                                <option selected="selected" value="">Choose your state...</option>
                                                <option value="">Alabama</option>
                                                <option value="">Alaska</option>
                                                <option value="">Arizona</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="postcode-extra">Postcode / Zip
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="postcode-extra" class="text-field">
                                    </div>
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="email-extra">Email address
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="email-extra" class="text-field">
                                        </div>
                                        <div class="group-2">
                                            <label for="phone-extra">Phone
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="phone-extra" class="text-field">
                                        </div>
                                    </div>
                                    <!-- Form-Fields /- -->
                                </div>
                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Your Order</h4>
                                    <div class="order-table">
                                        <table class="u-s-m-b-13">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cartItems as $item)
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">{{ $item["name"] }}</h6>
                                                        <span class="order-span-quantity">x {{ $item["quantity"] }}</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">{{ ($item["price"] - ($item["price"]*$item["discount"])/100 ) }} MAD</h6>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Subtotal</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">{{ $totalPrice }} MAD</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Shipping</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">0.00 MAD</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Tax</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">0.00 MAD</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Total</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">{{ $totalPrice }} MAD</h3>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment-method" id="cash-on-delivery">
                                            <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                        </div>
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment-method" id="credit-card-stripe">
                                            <label class="label-text" for="credit-card-stripe">Credit Card (Stripe)</label>
                                        </div>
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment-method" id="paypal">
                                            <label class="label-text" for="paypal">Paypal</label>
                                        </div>
                                        <div class="u-s-m-b-13">
                                            <input type="checkbox" class="check-box" id="accept">
                                            <label class="label-text no-color" for="accept">I’ve read and accept the
                                                <a href="terms-and-conditions.html" class="u-c-brand">terms &amp; conditions</a>
                                            </label>
                                        </div>
                                        <button type="submit" class="button button-outline-secondary">Place Order</button>
                                    </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("scripts")

@endsection

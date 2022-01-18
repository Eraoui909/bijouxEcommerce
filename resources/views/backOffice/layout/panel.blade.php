
@include("backOffice.layout.includes.header")

<div class="container-scroller">

    @include("backOffice.layout.includes.navbar")

    <div class="container-fluid page-body-wrapper">

        @include("backOffice.layout.includes.sidebar")


        <div class="main-panel">
            <div class="content-wrapper">


                @yield('content-wrapper')

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date("Y")}}.  All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

</div>

@include("backOffice.layout.includes.footer")

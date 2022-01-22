@extends("backOffice.layout.panel")

@section("style")
    <link rel="stylesheet" href="{{asset("adminPanel")}}/vendors/mdi/css/materialdesignicons.min.css">
    <style>

    </style>
@endsection

@section("title", "Inscriptions Newsletter")


@section("content-wrapper")
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
    @endif
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Inscriptions Aux NEWSLETTER</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            #ID
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            date d'inscription
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($inscriptions as $inscription)
                                        <tr>
                                            <td class="py-1">
                                                {{$inscription->id}}
                                            </td>
                                            <td>
                                                {{$inscription->email}}
                                            </td>
                                            <td>
                                                <label for="" class="state badge {{$inscription->state == 1 ? "badge-success" : "badge-danger" }}">{{$inscription->state == 1 ? "Activé" : "Bloqué" }}</label>
                                            </td>
                                            <td>
                                                {{$inscription->created_at}}
                                            </td>
                                            <td>
                                                <form style="display: inline;" class="change-state-form" method="POST" action="{{ route('admin.managers.changeRole')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$inscription->id}}">
                                                    <input type="hidden" class="state" name="state" value="{{$inscription->state == 1 ? 0 : 1}}">
                                                    <button type="submit" class="btn badge badge-success change-state">{{$inscription->state == 1 ? "Bloquer" : "Activer"}}</button>
                                                </form>
                                                <a href=""></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection


@section("script")

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(".change-state").on("click",function (e) {
            e.preventDefault();
            e.stopPropagation();
            let form = $(this).parent("form.change-state-form");
            let data = form.serialize();
            let btn = this;


            $.ajax("/admin/newsletter/changeState",{
                type: "post",
                data: data,
                success: function (data) {
                    if(data === "ok"){
                        console.log(btn);
                        let label = form.parent("td").siblings("td").children("label.state.badge")[0];
                        let newstate   = label.innerText === "Activé" ? "Bloqué" : "Activé";
                        btn.innerText = newstate === "Activé" ? "Bloquer" : "Activer";
                        console.log($(btn).siblings("input.state"))
                        $(btn).siblings("input.state")[0].value = newstate === "Activé" ? 0 : 1;

                        label.classList.toggle("badge-success");
                        label.classList.toggle("badge-danger");

                        btn.classList.toggle("badge-success");
                        btn.classList.toggle("badge-danger");

                        label.innerText = newstate;
                        Swal.fire(
                            newstate + '!',
                            'Cette inscription a été ' + newstate + '.',
                            'success'
                        )
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "Quelque chose s'est mal passé!",
                        })
                    }
                },
            });
        })

    </script>
@endsection

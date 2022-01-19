@extends("backOffice.layout.panel")


@section("title","Catégories")

@section("style")
    <link rel="stylesheet" href="{{asset("adminPanel")}}/vendors/mdi/css/materialdesignicons.min.css"">

    <style>
        .mdi{
            font-size: 22px !important;
        }

        .mdi-border-color{
            color: var(--success);
            top: 4px;
            position: relative;
        }
        .mdi-delete-forever{
            color: var(--danger);
        }
    </style>
@endsection

@section("content-wrapper")

    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Les catégories</h4>

            <p class="card-description">
                <a href="{{ route("admin.create.category") }}"  class="btn btn-sm btn-outline-success">
                    <i class="mdi mdi-plus-box"></i> <strong style="position: relative;top: -5px;font-size: 16px;">Ajouter</strong>
                </a>
            </p>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Créer</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="odd ha-category-row">
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="{{ route("admin.edit.category",["id" => $category->id ]) }}" style="margin: 0 5px">
                                        <i class="mdi mdi-border-color"></i>
                                    </a>
                                    <a href="#" data-id="{{ $category->id }}" class="ha-delete-category">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


@section("script")

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(".ha-delete-category").on("click",function (e) {
            e.preventDefault();
            let category_id = $(this).attr("data-id");
            let row = $(this);
            Swal.fire({
                title: 'Es-tu sûr?',
                text: "Vous souhaitez supprimer cette catégorie!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimez-le !'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax("/admin/management/destroy-category/"+category_id,{
                       type: "get",
                        success: function (data) {
                            if(data === "success"){
                                row.parent().parent().hide();
                                Swal.fire(
                                    'Supprimé!',
                                    'Votre catégorie a été supprimée.',
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


                }
            })
        })

    </script>
@endsection

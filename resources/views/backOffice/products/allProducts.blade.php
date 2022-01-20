@extends("backOffice.layout.panel")

@section("title","Produits")

@section("style")
    <link rel="stylesheet" href="{{asset('adminPanel')}}/vendors/mdi/css/materialdesignicons.min.css">

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
            <h2 class="card-title">produits</h2>
            <p class="card-description">
                <a href="{{ route("admin.create.product") }}" class="btn btn-outline-primary"> <strong>Ajouter produit</strong></a>
            </p>
            <div class="card-description">
                <form action="{{ route("admin.search.product") }}" method="GET">
                    <div class="form-group">
                    <div class="input-group">
                            <input type="text" class="form-control" name="search_product" placeholder="Rechercher un produit" aria-label="Rechercher un produit">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="submit">Search</button>
                            </div>
                    </div>
                </div>
                </form>

            </div>

            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Réduction</th>
                        <th>Stock</th>
                        <th>Visibilité</th>
                        <th>Date</th>
                        <th>Catégorie</th>
                        <th>Publier par</th>
                        <th>Actions</th>
                        {{-- <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                            <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                         --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="font-weight-bold">{{ $product->price }} MAD</td>
                            <td>{{ $product->discount }} %</td>
                            <td>{{ $product->stock }}</td>
                            @if($product->visibility)
                                <td class="font-weight-medium">
                                    <a href="{{ route("admin.visibility.product",["id" => $product->id]) }}">
                                        <div class="badge badge-success" title="clicker pour changer la visibilité">visible</div>
                                    </a>
                                </td>
                            @else
                                <td class="font-weight-medium">
                                    <a href="{{ route("admin.visibility.product",["id" => $product->id]) }}">
                                        <div class="badge badge-warning" title="clicker pour changer la visibilité">caché</div>
                                    </a>
                                </td>
                            @endif
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->publishedBy?? "ERROR FROM ME" }}</td>
                            <td>
                                <a title="modifier le produit" href="{{ route("admin.edit.product",["id" => $product->id]) }}" style="margin: 0 5px">
                                    <i class="mdi mdi-border-color"></i>
                                </a>
                                <a title="supprimer le produit" href="#" data-id="{{ $product->id }}" class="ha-delete-product">
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection


@section("script")

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(".ha-delete-product").on("click",function (e) {
            e.preventDefault();
            let product_id = $(this).attr("data-id");
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

                    $.ajax("/admin/products/destroy-product/"+product_id,{
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

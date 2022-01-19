@extends("backOffice.layout.panel")

@section("title","Ajouter une catégorie")

@section("content-wrapper")


    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
    @endif


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Créer une catégorie</h4>

            <form class="forms-sample" id="ha-add-category-form" method="POST" action="{{ route("admin.store.category") }}">
                @csrf
                <div class="form-group">
                    <label for="nomCat">Nom</label>
                    <input type="text" name="name"  required class="form-control @error('name') is-invalid @enderror" id="nomCat" placeholder="Nom du catégorie">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descriptionCat">Description</label>
                    <textarea rows="4" name="description" required class="form-control @error('name') is-invalid @enderror" id="descriptionCat" placeholder="Description du catégorie"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2">Créer</button>
                <span class="btn btn-light ha-rest-form" >Annuler</span>
            </form>
        </div>
    </div>

@endsection

@section("script")
    <script>


        $(".ha-rest-form").on("click",function (e) {
            e.preventDefault();
            $("[name='name']").val("");
            $("[name='description']").val("");
        })
    </script>
@endsection

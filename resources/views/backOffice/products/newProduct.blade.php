@extends("backOffice.layout.panel")

@section("title","Ajouter un nouveau produit")

@section("style")

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="{{ asset("adminPanel/vendors/image-uploader") }}/image-uploader.min.css">

@endsection

@section("content-wrapper")


    <div class="card" style="width: 70%">
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
        @endif
        <div class="card-body">
            <h4 class="card-title">Créer un produit</h4>

            <form class="forms-sample" method="POST" action="{{ route("admin.store.product") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Nom</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="selectCategory">Gategory</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="selectCategory">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prixInput">Prix</label>
                    <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="prixInput" placeholder="prox de produit">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="discountInput">Réduction</label>
                    <input name="discount" type="text" class="form-control  @error('discount') is-invalid @enderror" id="discountInput" placeholder="Réduction (en %)">
                    @error('discount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sotckInput">Stock</label>
                    <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" id="sotckInput" placeholder="stock disponible">
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summernote">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote" rows="4"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="input-images"></div>


                <button type="submit" class="btn btn-primary mr-2">Sauvgarder</button>
                <button class="btn btn-light ha-rest-form" >Cancel</button>
            </form>
        </div>
    </div>


@endsection


@section("script")


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Saisir la description de produit',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset("adminPanel/vendors/image-uploader") }}/image-uploader.min.js"></script>

    <script>
        $('.input-images').imageUploader();
    </script>

    <script>
        $(".ha-rest-form").on("click",function (e) {
            e.preventDefault();
            $("[name='name']").val("");
            $("[name='description']").val("");
            $("[name='price']").val("");
            $("[name='discount']").val("");
            $("[name='stock']").val("");
        })
    </script>



@endsection

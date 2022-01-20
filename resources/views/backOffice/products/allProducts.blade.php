@extends("backOffice.layout.panel")

@section("title","Ajouter un nouveau produit")

@section("style")


@endsection

@section("content-wrapper")

    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
    @endif


    @foreach($products as $product)
        <pre>
            {{ print_r($product->category) }}
        </pre>
    @endforeach

@endsection


@section("script")


@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
            @endcomponent
        </div>
        <div class="col-9">
            <div class="container">
                @if ($category !== null)
                    <a href="{{ route('products.index') }}">トップ</a> > <a
                        href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                    <h1>{{ $category->name }}の商品一覧{{ $total_count }}件</h1>
                @elseif ($keyword !== null)
                    <a href="{{route('products.index')}}">トップ</a> > 商品一覧
                    <h1>"{{$keyword}}"の検索結果{{$total_count}}件</h1>
                @endif
            </div>
            <div class="container mt-4">
                <div class="row w-100">
                    @foreach ($products as $product)
                        <div class="col-3">
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="samuraimart-product-label mt-2">
                                        {{ $product->name }}<br>
                                        <label>￥{{ $product->price }}</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- {{ $products->links() }} --}}
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection

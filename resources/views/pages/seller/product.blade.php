@extends('layouts.dashboard')
@section('title')
    Store Products
@endsection

@section('content')
<div class="py-4">
    <div class="dropdown">
        
        <a href="{{route ('seller-productAdd')}}" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Add New Product
        </a>
    </div>
</div>
<div class="row">
    @foreach ($products as $product)
    
    <div class="col-3 mb-4">
        <a href="{{ route('seller-productDetails', $product->id) }}" class="">
        <div class="card shadow border-0 text-center p-0">
            <img src="{{ Storage::url($product->galleries->first()->photos ?? '')}}" class="card-img-top" alt="...">
            
            <div class="card-body pb-3">
                <h4 class="h3">{{$product->name}}</h4>
                <h5 class="fw-normal">{{$product->category->name}}</h5>
                <p class="text-gray mb-2">IDR {{$product->price}}</p>
                
                {{-- <a class="btn btn-sm btn-secondary" href="#">Delete</a> --}}
                <a href="{{ route('seller-productDelete', $product->id) }}" class="btn btn-sm btn-secondary">Delete</a>
            </div>
         </div>
        </a>
    </div>
    @endforeach
</div>


@endsection
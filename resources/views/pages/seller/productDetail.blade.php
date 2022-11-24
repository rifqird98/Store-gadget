@extends('pages/seller/template')
@section('judul')
<div class="d-flex align-items-center">
    <h3 class="h3 mx-4 mb-0">Product Detail</h3>
</div>
@endsection

@section('productDetail')
<div class="row mx-3 my-4">
    <div class="col-12 mb-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="{{ route('seller-productUpdate', $product->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                     <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Product Name</label>
                          <input type="text" class="form-control"  name="name" value="{{ $product->name }}">
                        </div>
                        <div class="col">
                            <label for="">Price</label>
                          <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <label for="">Stock</label>
                          <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
                        </div>
                        <div class="col">
                            <label class="my-1 me-2" for="">Category</label>
                            <select name="categories_id" class="form-control">
                                <option value="{{ $product->categories_id }}">({{ $product->category->name }})</option>
                                @foreach ($categories as $categories)
                                  <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="textarea">Description</label>
                        <textarea class="form-control" placeholder="Describe your product here..." name="description" id="editor" rows="4">{!! $product->description !!}</textarea>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" id="formFile">
                    </div> --}}
                    <div class="mb-3">
                        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" type="submit">
                            Update Product
                        </button>
                    </div>
                    
                </form>     
                
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    @foreach ($product->galleries as $gallery)
                      <div class="col-md-4">
                        <div class="gallery-container">
                        <a href="{{ route('seller-galleryDelete', $gallery->id) }}" class="delete-gallery">
                            <img src="/images/icon-delete.svg" alt="" />
                        </a>
                          <img
                            src="{{ Storage::url($gallery->photos ?? '') }}"
                            alt=""
                            class="w-100"
                          />
                          
                        </div>
                      </div>
                    @endforeach
                    <div class="col-12">
                      <form action="{{ route('seller-galleryUpload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="products_id">
                        <input
                          type="file"
                          name="photos"
                          id="file"
                          style="display: none;"
                          multiple
                          onchange="form.submit()"
                        />
                        <button
                          type="button"
                          class="btn btn-secondary btn-block mt-3"
                          onclick="thisFileUpload()"
                        >
                          Add Photo
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    
</div>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>
  <script>
    CKEDITOR.replace("editor");
  </script>

@endsection
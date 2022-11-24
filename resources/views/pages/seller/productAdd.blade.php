@extends('pages/seller/template')
@section('judul')
<div class="d-flex align-items-center">
    <h3 class="h3 mx-4 mb-0">Create New Product</h3>
</div>
@endsection

@section('productAdd')
<div class="row mx-3 my-4">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="{{ route('seller-insertProduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="users_id" value="{{ Auth::user()->id}}">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Product Name</label>
                          <input type="text" class="form-control" placeholder="Product Name" name="name">
                        </div>
                        <div class="col">
                            <label for="">Price</label>
                          <input type="number" class="form-control" placeholder="Price" name="price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <label for="">Stock</label>
                          <input type="number" class="form-control" placeholder="Stock" name="stock">
                        </div>
                        <div class="col">
                            <label class="my-1 me-2" for="">Category</label>
                                <select class="form-select" name="categories_id">
                                    @foreach ($categories as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                  @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="textarea">Description</label>
                        <textarea class="form-control" placeholder="Describe your product here..." id="editor" name="description" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" name="photo" id="formFile">
                    </div>
                    <div class="mb-3">
                        {{-- <a href="" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">Create Product</a> --}}
                        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" type="submit" >
                            Create Product
                        </button>
                    </div>
                    
                </form>     
                
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
  </script>
@endsection
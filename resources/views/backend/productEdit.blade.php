@extends('backend.backend-master-template')
@section('mainContent')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">update product</li>
    </ol>
    <main>
      <div class="row">
        <div class="col-lg-12">
          {{-- @php
              dd($product);
          @endphp --}}
          
          <form action="{{ route('updateProduct', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <input type="text" class="form-control" name="category" value="{{ $product->categoryName }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" name="brand" value="{{ $product->brandName }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image"  value="{{ $product->image }}" accept="image/*">
                <img src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}" width="100" height="100">
            </div>
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
        
          </div>
      </div>
    </main>
</div>
@endsection
@extends('backend.backend-master-template')
@section('mainContent')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">add new product</li>
    </ol>
    <main>
      <div class="row">
        <div class="col-lg-12">
          
          <form action="{{ route('addProduct') }}" method="POST" class="form" enctype="multipart/form-data">
            {{-- enctype-for picture  --}}
            {{-- csrf- cross site request Forgery  --}}
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="productname">
              <label for="floatingInput">Product name</label>
              
              {{-- error  --}}
              @error('name')
                <span class="text-danger">{{ '**'.$message }}</span>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control" id="category" name="category">
              {{-- error  --}}
              @error('category')
                <span class="text-danger">{{ '**'.$message }}</span>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="brand" class="form-label">Brand</label>
              <input type="text" class="form-control" id="brand" name="brand">
            
              {{-- error  --}}
              @error('brand')
                <span class="text-danger">{{ '**'.$message }}</span>
              @enderror
            
            </div>
  
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            
                {{-- error  --}}
              @error('name')
                <span class="text-danger">{{ '**'.$message }}</span>
              @enderror
          
            </div>
            
  
              <div class="form-group mb-3">
                  <label for="imageFile" class="form-label">Choose a pictuer</label>
                  <input class="form-control" type="file" id="imageFile" name="image">
                  {{-- error 
                  @error('name')
                    <span class="text-danger">{{ '**'.$message }}</span>
                  @enderror --}}
                
              </div>
  
            
              <div class="form-group mb-3">
                  <label for="status" class="form-label">Product Status</label>
                  <select class="form-select" id="status" name="status" aria-label="Default select example">
                  <option selected>--Select Product Status--</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
                {{-- error  --}}
                @error('status')
                  <span class="text-danger">{{ '**'.$message }}</span>
                @enderror
            
              </div>
  
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>  
        </div>
      </div>
    </main>
</div>
@endsection
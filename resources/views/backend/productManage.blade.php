@extends('backend.backend-master-template')
@section('mainContent')

@if(session('success'))
    <div class="alert alert-success pe-2">{{ session('success') }}</div>
@endif

<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Products</a></li>
        <li class="breadcrumb-item active">Table</li>
    </ol>

    <main>        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All products
            </div>
            
            {{-- @php
                dd($products);
            @endphp --}}
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Product_Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Picture</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Product_Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Picture</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($products)>0)
                        {{ $no=1 }}
                            @foreach ($products as $product)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->categoryName}}</td>
                                <td>{{ $product->brandName}}</td>
                                <td>
                                    <img src="{{ asset('images/products/'.$product->image) }}" alt="" width="80px" height="80px">
                                </td>
                                <td>
                                    @if ($product->status == 1)

                                        <a href="{{ route('Product.statusChange', $product->id) }}" class="btn btn-success"><i class="fa-solid fa-circle-check me-2"></i>Active</a>
                                    @else
                                        <a href="{{ route('Product.statusChange', $product->id) }}" class="btn btn-danger"><i class="fa-solid fa-circle-xmark me-2"></i>Inactive</a>
                                    @endif</td>
                                <td>
                                    
                                    <a href="{{ route('editProduct',['id' => $product->id]) }}" class="btn btn-primary me-3"><i class="fa-solid fa-edit me-2"></i>Edit</a>
                                    <a href="{{ route('deleteProduct',['id' => $product->id]) }}" class="btn btn-danger">
                                        <i class="fa-solid fa-trash me-2"></i>delete</a>
                                </td>
                            </tr>                                
                            @endforeach
                            
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('addProduct') }}" class="btn btn-dark ">
                    <i class="fas fa-plus me-1"></i>
                    Add Product</a>
            </div>
        </div>
    </main>
</div>
@endsection
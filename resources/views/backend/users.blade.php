@extends('backend.backend-master-template')
@section('mainContent')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Users</a></li>
        <li class="breadcrumb-item active">Table</li>
    </ol>

    <main>        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All Users
            </div>
            
            {{-- @php
                dd($users);
            @endphp --}}
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>User_Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User_Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($users)>0)
                        {{ $no=1 }}
                            @foreach ($users as $user)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ Str::ucfirst($user->name) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary me-3"><i class="fa-solid fa-edit me-2"></i>Edit</a>
                                    <a href="{{ route('profile.destroy') }}" class="btn btn-danger"><i class="fa-solid fa-user-slash me-2"></i>delete</a>
                                </td>
                            </tr>                                
                            @endforeach
                            
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('register') }}" class="btn btn-dark ">
                    <i class="fas fa-plus me-1"></i>
                    Add Users</a>
            </div>
        </div>
    </main>
</div>
@endsection
@extends('backend.master')
@section('content')

    <div class="container">
        
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-success p-2">
                    <div class="card-body">
                        <p class="text-white"><b>Users</b></p>
                        <hr>
                        <p class="text-white">card descriptions</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger p-2">
                    <div class="card-body">
                        <p class="text-white"><b>Products</b></p>
                        <hr>
                        <p class="text-white">card descriptions</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary p-2">
                    <div class="card-body">
                        <p class="text-white"><b>Orders</b></p>
                        <hr>
                        <p class="text-white">card descriptions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
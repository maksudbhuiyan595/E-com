@extends('backend.master')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
    <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                    <div class="d-flex justify-content-between p-3">
                      <h3 class=""><b>Products List</b></h3>
                       <a href="{{ route('product.create') }}" class="btn btn-primary">+Add Product</a>
                      </div>
                      <hr>
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $id=>$product)
                    <tr>
                      <td>{{ ++$id }}</td>
                      <td>
                        <img style=" height:80px;
                                    width:80px;"  src="{{ url('/uploads/products/'.$product->image) }}" alt="image">
                      </td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->discount }}</td>
                      <td>{!!  $product->description !!}</td>
                      <td>{{ $product->status ? "active" : "inactive" }}</td>
                      <td>
                        
                        <a class="btn btn-secondary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                        <a class="btn btn-secondary" href="{{ route('product.destroy',$product->id) }}">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
             
            </div>
          </div>

        </div>
      </div>
    </section>
@endsection
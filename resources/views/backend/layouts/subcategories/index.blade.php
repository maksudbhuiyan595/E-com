@extends('backend.master')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">subcategories</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


    <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                    <div class="d-flex justify-content-between p-3">
                      <h3 class=""><b>Sub-Categories List</b></h3>
                       <a href="{{ route('subCategory.create') }}" class="btn btn-primary">+Add Sub-Cateogry</a>
                      </div>
                      <hr>
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Sub Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $id=>$subcategory)
                        
                    <tr>
                      <td scope="row">{{ $id+1 }} </td>
                      <td>{{ $subcategory->category->name }}</td>
                      <td>{{ $subcategory->name }}</td>
                      <td>
                      
                        <a class="btn btn-secondary" href="{{ route('subCategory.edit',$subcategory->id) }}">Edit</a>
                        <a class="btn btn-secondary" href="{{ route('subCategory.destroy',$subcategory->id) }}">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection
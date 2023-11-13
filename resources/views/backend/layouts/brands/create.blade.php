@extends('backend.master')

@section('content')
<div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between p-3">
                <h5 class="text-center"><b>Brands Create Form</b></h5>
                  <a class="btn btn-primary" href="{{ route('brand.index') }}">Brands List</a>
              </div>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('brand.store') }}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Brand Name:</label>
                  <input type="text" name="name" class="form-control" id="inputName5" value="{{ old('name') }}" placeholder="Enter Name" >
                </div>
                <div class="">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
            </div>
@endsection
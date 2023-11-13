@extends('backend.master')

@section('content')
<div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between p-3">
                <h5 class="text-center"><b>Sub-Category Edit Form</b></h5>
                  <a class="btn btn-primary" href="{{ route('subCategory.index') }}">Sub-Categories List</a>
              </div>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('subCategory.update',$subcategory->id) }}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                  <label for="category" class="form-label">Category Name:</label>
                    <select name="category_id" class="form-control" id="">
                      <option>Choose Category</option>
                      @forelse ($categories as $category)
                        <option @if ($subcategory->category_id == $category->id) selected
                          
                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
                      @empty
                        <option class="text-center bg-danger">-- NO Category Found --</option>
                      @endforelse
                    </select>
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Sub-Category Name:</label>
                  <input type="text" name="name" class="form-control" id="inputName5" value="{{ $subcategory->name }}" placeholder="Enter Name" >
                </div>
                <div class="">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
            </div>
@endsection
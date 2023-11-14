@extends('backend.master')

@section('content')
<div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between p-3">
                <h5 class="text-center"><b>Product Create Form</b></h5>
                  <a class="btn btn-primary" href="{{ route('product.index') }}">Products List</a>
              </div>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-12">
                  <label for="brnad" class="form-label">Brand Name :</label>
                    <select name="brand_id" class="form-control" id="brand">
                      <option>Choose Brand</option>
                      @forelse ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @empty
                        <option class="text-center bg-danger">-- NO Brand Found --</option>
                      @endforelse
                    </select>
                </div>

                <div class="col-md-12">
                  <label for="product" class="form-label">Product Name :</label>
                  <input type="text" name="name" class="form-control" id="product" value="{{ old('name') }}" placeholder="Enter Name" >
                </div>

                <div class="col-md-12">
                  <label for="category" class="form-label">Category Name :</label>
                    <select name="category_id" class="form-control" id="category">
                      <option>Choose Category</option>
                      @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @empty
                        <option class="text-center bg-danger">-- NO Category Found --</option>
                      @endforelse
                    </select>
                </div>

                <div class="col-md-12">
                  <label for="qty" class="form-label">Quantity :</label>
                  <input type="text" name="quantity" class="form-control" id="qty" value="{{ old('quantity') }}" placeholder="Enter Quantity" >
                </div>
                <div class="col-md-12">
                  <label for="subcategory" class="form-label">Category Name :</label>
                    <select name="sub_category_id" class="form-control" id="subcategory">
                      <option>Choose Sub-Category</option>
                      @forelse ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                      @empty
                        <option class="text-center bg-danger">-- NO Sub-Category Found --</option>
                      @endforelse
                    </select>
                </div>

                <div class="col-md-12">
                  <label for="price" class="form-label">Price :</label>
                  <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" placeholder="Enter Price" >
                </div>

                <div class="col-md-12">
                  <label for="discount" class="form-label">Discount :</label>
                  <input type="number" name="discount" class="form-control" id="discount" value="{{ old('discount') }}" placeholder="Enter discount" >
                </div>

                <div class="col-md-12">
                  <label class="form-label">Image :</label>
                  <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12">
                  <label for="des" class="form-label">Descriptions :</label>
                  <textarea name="description" class="form-control description" id="des">
                    {{old('description')}}
                  </textarea>
                </div>

                <div class="">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
            </div> 
@endsection

@section('script')
@include('backend.layouts.includes.summernote')

<script type="text/javascript">
        $(document).ready(function() {
          $('.description').summernote();
        });
    </script>
@endsection
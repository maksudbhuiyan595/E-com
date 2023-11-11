@extends('backend.master')

@section('content')
<div class="card">
            <div class="card-body">
              <h5 class="card-title text-center"><b>Role Edit Form</b></h5>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('role.update',$role->id) }}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Role Name:</label>
                  <input type="text" name="name" class="form-control" id="inputName5" placeholder="Enter Name" value="{{ $role->name }}">
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
            </div>
@endsection
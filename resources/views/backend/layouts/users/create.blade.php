@extends('backend.master')

@section('content')
<div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between p-3">
                <h5 class="text-center"><b>User Create Form</b></h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Notes
                </button>
                  <a class="btn btn-primary" href="{{ route('user.index') }}">Users List</a>
              </div>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('user.store') }}" method="post" class="row g-3">
                @csrf

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="fname" class="form-label">First Name:</label>
                      <input type="text" name="fname" class="form-control" id="fname" value="{{ old('fname') }}" placeholder="Frist Name" >

                    </div>
                    <div class="col-md-6">
                    <label for="lname" class="form-label">Last Name:</label>
                      <input type="text" name="lname" class="form-control" id="lname" value="{{ old('lname') }}" placeholder="Laste Name" >
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="inputName2" class="form-label">User Email:</label>
                  <input type="email" name="email" class="form-control" id="inputName2" value="{{ old('email') }}" placeholder="Enter Email" >
                </div>
                <div class="col-md-12">
                  <label for="password" class="form-label"> User Password:</label>
                  <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Enter Email" >
                </div>
                <div class="col-md-12">
                  <label for="mobile" class="form-label">Mobile</label>
                  <input type="text" name="mobile" class="form-control" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile" >
                </div>
                <div class="col-md-12">
                  <label class="form-label">Gender</label> <br>
                    <input type="radio" name="gender" value="male"> Male
                      <input type="radio" name="gender" value="female"> Female
                        <input type="radio" name="gender" value="other"> Other
                </div>
                <div class="col-md-12">
                  <label for="date" class="form-label">Date Of Birth</label>
                  <input type="date" name="date" class="form-control" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile" >
                </div>
                <div class="col-md-12">
                  <label for="role_id" class="form-label">Role</label>
                  <select name="role_id" class="form-control" id="role_id">
                    @foreach ($roleNames as $roleName)
                    <option value="{{ $roleName->id }}">{{ $roleName->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="role" class="form-label">Role Id</label>
                  <input type="text" name="role" class="form-control" id="role" value="{{ old('role') }}" placeholder="Enter Role" >
                </div>
                <div class="col-md-12">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" name="image" class="form-control" id="image" >
                </div>
                <div class="col-md-12">
                  <label for="text" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" id="text" value="{{ old('text') }}" placeholder="Enter Address" >
                </div>
                <div class="">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">User Create Notes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table border">
            <tr>
               <th>Role</th>
               <th>Role Id</th>
            </tr>
            <tr>
              <td>Admin</td>
              <td>1</td>
            </tr>
            <tr>
              <td>manager</td>
              <td>2</td>
            </tr>
            <tr>
              <td>Seller</td>
              <td>3</td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
@endsection
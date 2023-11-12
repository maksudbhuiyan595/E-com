@extends('backend.master')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Role</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


    <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                    <div class="d-flex justify-content-between p-3">
                      <h3 class=""><b>Users List</b></h3>
                       <a href="{{ route('user.create') }}" class="btn btn-primary">+Add User</a>
                      </div>
                      <hr>
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($users as $id=>$user)
                     <tr>
                        <td>{{ ++$id }}</td>
                        <td>{{ $user->userName}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status ? "active" : "incactive" }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>
                          <a class="btn btn-secondary" href="">View</a>
                          <a class="btn btn-secondary" href="">Edit</a>
                          <a class="btn btn-secondary" href="">Delete</a>
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
@extends('backend.master')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">{{$role->name}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="d-flex justify-content-between p-3">
                    <h3 class=""><b>Assign Role Permission for {{$role->name}}</b></h3>
                    <a class="btn btn-primary" href="{{ route('role.index') }}">Roles List</a>
                </div>
                <hr>
                <div class="card-body">
                    <form action="{{ route('role.permission',$role->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>{{ $role->name }}</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="" form-check-label id="all" name="allCheckbox">
                                            <label for="all">All checked</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach ($permissions as $permission)
                                            <input type="checkbox"  name="permission[]" @if (in_array($permission->id,$assignPermissions)) checked @endif class="form-check-label" value="{{ $permission->id }}" id="checkbox1">
                                            <label class="mb-1" for="checkbox1">{{ ucfirst($permission->name) }}</label><br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Assign Permission</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section("content")
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route("employees.index") }}">Employees</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New Employee</li>
    </x-bread-crumb>


    <form action="{{ route("employees.store") }}" id="category-form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

        @csrf
        <section class="content animated fadeInRight">
            <div class="card card-info">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Employee Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Employee Name
                                </label>

                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm @error("name") is-invalid @enderror" placeholder="User Name">
                                @error("name")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    <span style="font-size: 17px; color: red;">*</span>
                                    Email
                                </label>

                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm @error("email") is-invalid @enderror" placeholder="Email">
                                @error("email")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6" style="padding-left: 50px;">


                        </div>
                        <!--  col-md-6  -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Save
                    </button>

                    <a href="{{ route("employees.index") }}" class="btn btn-sm btn-primary">
                        Cancel
                    </a>
                </div>

            </div>
            <!-- card info -->
        </section>





    </form>

@endsection

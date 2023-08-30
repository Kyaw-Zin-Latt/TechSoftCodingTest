@extends('layouts.app')

@section("title") PS Wallpaper|Users @endsection


@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </x-bread-crumb>

    <div class="row my-3">

        <div class="col-8">
            <form action="{{ route("employees.search") }}" class="form-inline" method="get" accept-charset="utf-8">


                <div class="form-group mr-3">

                    <input type="text" name="searchterm" value="{{ request()->searchterm }}" class="form-control form-control-sm" placeholder="Search">

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Search
                    </button>
                </div>

                <div class="row">
                    <div class="form-group ml-3">
                        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-primary">
                            Reset
                        </a>
                    </div>
                </div>

            </form>
        </div>

        <div class="col-4">
            <a href="{{ route("employees.export") }}" class="btn btn-sm btn-primary pull-right ml-2">
                <span class="fa fa-file-excel-o"></span>
                Export CSV
            </a>
            <a href="{{ route("employees.csvCreate") }}" class="btn btn-sm btn-primary pull-right">
                <span class="fa fa-plus"></span>
                Import CSV
            </a>
            <a href="{{ route("employees.create") }}" class="btn btn-sm btn-primary pull-right mr-2">
                <span class="fa fa-plus"></span>
                Add New
            </a>
        </div>

    </div>

    <div class="">
        <x-session-message></x-session-message>
        <x-error-message name="id"></x-error-message>
    </div>

    <br>
    {{--    table start--}}

    @include("employees.list")

    {{--    table end--}}


@endsection

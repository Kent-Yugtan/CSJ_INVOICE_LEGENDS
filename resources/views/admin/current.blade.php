@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4">
    <h1 class="mt-4">Current Profiles</h1>
    <ol class="breadcrumb mb-4"></ol>

    <div class="row">
        <div class="col">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Pending</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
        <div class="col">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Paid</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col ">
            <form action="{{ route('current.search')}}" method="GET">
                @csrf
                <div class="input-group ">
                    <input name="search" type="text" class="form-control form-check-inline" placeholder="Search">
                    <button class="btn" style=" color:white; background-color: #CF8029;width:30%" type="submit"
                        id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col">
            <div class="card mb-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Current Profile
                </div>
                @if(isset($profiles))
                <div class="card-body table-responsive">
                    <table style=" color: #A4A6B3; " class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Status</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                                <th>latest Invoice</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($profiles as $profile)
                            <tr>
                                <td> <a class="navbar-brand" href="#">
                                        <img style="width:40px;" class="rounded-pill"
                                            src="{{ asset('/storage/images/storage/'.$profile->file_name) }}" title="">

                                    </a> {{$profile->full_name}}</td>
                                <td> {{$profile->profile_status}}</td>
                                <td>{{$profile->phone_number}}</td>
                                <td>{{$profile->position}}</td>
                                <td>Not Yet</td>
                                <td class="text-center">
                                    <a href="{{ route('profile.edit', ['id' => $profile->id]) }}"> <button type="button"
                                            class="btn btn-outline-primary">Edit</button></a>

                                    <a href="viewProfile"> <button type="button"
                                            class="btn btn-outline-primary">View</button></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $profiles->links() !!}
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection
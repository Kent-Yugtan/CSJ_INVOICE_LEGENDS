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
        <div class="col">
            <form>
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn" style=" color:white; background-color: #CF8029;width:30%" type="button"
                        id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
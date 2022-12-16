@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4"></ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Pending</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Overdue</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Completed</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Cancelled</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
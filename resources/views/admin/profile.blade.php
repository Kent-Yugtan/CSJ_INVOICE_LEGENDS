@extends('layouts.master')

@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">Add Profile</h1>
    <ol class="breadcrumb mb-3"></ol>

    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Profile Information</div>
                <div class="row px-4 pb-4">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="image.jpg" id="photo">
                                <input type="file" id="file">
                                <label for="file" id="uploadBtn">Choose Photo</label>
                            </div>
                        </div>
                        <div class="col pt-5">
                            <div class="row">
                                <div class="row pt-2">
                                    <label class="mb-5">(Active or Inactive)</label>
                                </div>
                                <div class="row pt-2">
                                    <label class="mb-5">
                                        <h5>Joshua Saubon</h5>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position">
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Email</label>
                            <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Phone Number</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                placeholder="Phone Number">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                placeholder="Gcash Number">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2"
                                placeholder="Date Hired">
                        </div>

                    </form>

                    <div class="row">
                        <div class="col mb-3">
                            <button type="submit"
                                style="width:110%; height:50px;color:white; background-color: #CF8029;" class="btn"
                                class="btn">Add Profile</button>
                        </div>
                        <div class="col mb-3">
                            <button type="submit"
                                style="width:110%; height:50px;color:white; background-color: #A4A6B3;" class="btn"
                                class="btn">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- <div class="row">
        <div class="col-xl-3 col-md-6">
            <div>
                <div class="card-body">Pending</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-3">
                <div class="card-body">Overdue</div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">Completed</div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-3">
                <div class="card-body">Cancel</div>
                <div class="card-footer d-flex align-items-center justify-content-between">


                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-3">
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
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4 pb-4">
    <h1 class="mt-0">Deduction Types</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row mt-5">
        <div class="col-md-6 px-2">
            <button class="btn w-50" style="color:white; background-color: #CF8029; margin-top:5px "
                data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="button-addon2"> <i
                    class="fa fa-plus pe-1"></i> Add Deduction Type </></button>
            <div class="row mt-3">
                <div class="col">
                    <div class="w-100">
                        <input id="search" name="search" type="text" class="form-control form-check-inline"
                            placeholder="Search">

                    </div>
                </div>
                <div class="col">
                    <button class="btn w-100" style=" color:white; background-color: #CF8029;width:30%"
                        id="button-submit">Search</button>
                </div>
            </div>

            <div class="card shadow mt-3 bg-white rounded " style="width: 100%; height:100%">
                <div class="card-body table-responsive ">
                    <table style="color: #A4A6B3;" class="table" id="datatablesSimple">
                        <thead>
                            <th>Deduction Name</th>
                            <th>Amount</th>
                            <th>Action</th>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="row">
                        <h5> Create Deduction Type </h5>
                        <form name="deductiontype_store" id="deductiontype_store" method="POST">
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Deduction Name</label>
                                <input id="deduction_name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Amount</label>
                                <input id="deduction_amount" type="text" class="form-control" placeholder="">

                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary w-100"
                                            style=" color:#CF8029; background-color:white; "
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" type="submit" class="btn btn-secondary w-100"
                                            style=" color:White; background-color:#CF8029; "
                                            data-bs-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $('deductiontype_store').submit(function(e) {
        e.preventDefault();

        let deduction_name = $("deduction_name").val();
        let deduction_amount = $("deduction_amount").val();

        let data = {
            deduction_name: deduction_name,
            deduction_amount: deduction_name,
        };

        axios
            .post(apiUrl + "/api/settings/deductiontype", data, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(response) {
                console.log("then", response);
                let data = response.data;
                if (data.succcess) {
                    console.alert('success');
                } else {
                    console.alert('error');
                }
            })
            .catch(function(error) {
                console.log("catch", error);
            });

    })
});
</script>
@endsection
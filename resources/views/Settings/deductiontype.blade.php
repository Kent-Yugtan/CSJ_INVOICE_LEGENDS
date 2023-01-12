@extends('layouts.master')
@section('content-dashboard')


<div class="container-fluid px-4 pb-4">
    
    <div class="col mt-5">
            <div>
                <button class="btn w-25" style="color:white; background-color: #CF8029; margin-top:5px " data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="button-addon2"> <i
                    class="fa fa-plus pe-1"></i> Add Deduction Type </></button>
                
           
                    <div class="row mt-4">
                        <div class="col">
                            <div class="w-25">
                                <input id="search" name="search" type="text" class="form-control form-check-inline"
                                    placeholder="Search">
                                <button class="btn" style=" color:white; background-color: #CF8029;width:30%"
                                    id="button-submit">Search</button>
                            </div>
                            
                        </div>
                    </div>
            

           
          
      
           
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document"> 
                    <div class="modal-dialog">
                        <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="row">
                        <h5> Create Deduction Type </h5>
                        <form>

                            <div class="col pt-3">
                                <div class="form-group">

                                    <label for="formGroupExampleInput">Deduction Name</label>
                                    <input type="deduction_name" class="form-control"
                                        id="invoice_no" placeholder="">
                                </div>
                                </div>
                                <div class="col pt-3"
                                <div class="form-group">

                                    <label for="formGroupExampleInput">Amount</label>
                                    <input type="amount" class="form-control"
                                        id="invoice_no" placeholder="">

                                        <div class="row mb-4 mt-5">
                                            <div class="col">
                                                <button type="button"
                                                    class="btn btn-secondary w-100"
                                                    style=" color:#CF8029; background-color:white; "
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col">
                                                <button type="button"
                                                    class="btn btn-secondary w-100"
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

        </div>

        


        
            <br>
            <div class="card mt-1" style="width:61%">

                <div class="card-header ">
                    <div class="card-body table-responsive">
                        <table style=" color: #A4A6B3; " class="table" id="datatablesSimple">
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
    </div>
</div>
</div>

    @endsection
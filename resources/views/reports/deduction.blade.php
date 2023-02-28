@extends('layouts.master')
@section('content-dashboard')


<body>
  <div class="form-group">
    <label for="exampleDate">Date</label>
    <input type="text" class="form-control" id="exampleDate" placeholder="Enter date">
  </div>
</body>
<script>
$(document).ready(function() {
  // Increase the font size of the date picker popup
  $('input[type="text"]').on("click", function() {
    $(".ui-datepicker").css("font-size", "3em");
  });

  // Increase the dimensions of the date picker popup
  $('input[type="text"]').datepicker({
    "beforeShow": function(input, inst) {
      inst.dpDiv.css({
        "width": "400px",
        "height": "400px"
      });
    }
  });
});
</script>
<!-- <div class="container-fluid px-4" id="loader_load">
  <h1 class="mt-0">Deduction Reports</h1>
  <ol class="breadcrumb mb-3"></ol>
  <div class="row">
    <div class="col-lg-12 px-2">
      <div class="card shadow p-2 mb-5 bg-white rounded h-100">
        <div class="card-header">Create Invoice Configuration</div>
        <div class="row px-4 pb-4" id="header">
          <form name="invoiceconfigs_store" id="invoiceconfigs_store" method="post" action="javascript:void(0)"
            class="row g-3 needs-validation" novalidate>
            @csrf

            <div class="mb-3">
              <label style="color: #A4A6B3;" for="formFile" class="form-label">Invoice Logo</label>
              <input class="form-control" id="invoice_logo" name="invoice_logo" type="file">
            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Invoice Title</label>
              <input id="invoice_title" name="email" type="text" class="form-control" placeholder=" Title">
            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Invoice Email</label>
              <input id="invoice_email" name="username" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Bill to Address</label>
              <input id="bill_to_address" name="Email Address" type="text" class="form-control" placeholder="From">
            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Ship to Address</label>
              <input id="ship_to_address" name="Email Address" type="text" class="form-control" placeholder="To">
            </div>

            <div class="col mb-3">
              <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;"
                class="btn ">Save </button>
            </div>

          </form>
        </div>
      </div>
    </div>

  </div>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-body ">
            <div class="row">
              <h5> Update Invoice Configuration </h5>
              <form id="invoice_config_update">
                @csrf
                <input type="text" id="invoice_config_id" hidden>

                <div class="mb-3">
                  <label style="color: #A4A6B3;" for="formFile" class="form-label">Invoice
                    Logo</label>
                  <input class="form-control" id="edit_invoice_logo" name="edit_invoice_logo" type="file">
                </div>


                <div class="mb-3">
                  <label style="color: #A4A6B3;" for="formFile" class="form-label">Invoice
                    Path</label>
                  <div id="edit_invoice_path"></div>
                </div>

                <div class="form-group mt-3">
                  <label for="formGroupExampleInput">Invoice Title</label>
                  <input id="edit_invoice_title" type="text" class="form-control" placeholder="Title">
                </div>

                <div class="form-group mt-3">
                  <label for="formGroupExampleInput">Invoice Email</label>
                  <input id="edit_invoice_email" type="text" class="form-control" placeholder="Email">
                </div>

                <div class="form-group mt-3">
                  <label for="formGroupExampleInput">Bill to Address</label>
                  <input id="edit_to_bill" type="text" class="form-control" placeholder="From">
                </div>

                <div class="form-group mt-3">
                  <label for="formGroupExampleInput">Ship to address</label>
                  <input id="edit_to_ship" type="text" class="form-control" placeholder="To">

                  <div class="row mt-3">
                    <div class="col mt-3">
                      <button type="button" class="btn btn-secondary w-100"
                        style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col mt-3">
                      <button type="submit" class="btn btn-secondary w-100"
                        style="color:White; background-color:#CF8029; " data-bs-dismiss="modal">Update</button>
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

  <div style="position: fixed; top: 60px; right: 20px;">
    <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <div><i class="fa fa-newspaper-o"> </i></div>
        <div><strong class="mr-auto m-l-sm toast-title">Notification</strong></div>
        <div>
          <button type="button" class="ml-2 mb-1 close float-end" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="toast-body">
        Hello, you can push notifications to your visitors with this toast feature.
      </div>
    </div>
  </div>
</div>
<div class="spanner">
  <div class="loader">
  </div>
</div> -->

@endsection
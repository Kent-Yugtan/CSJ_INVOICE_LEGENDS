@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0"></h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row px-4 pb-4"
    <div class="col-md-6 px-2 w-75">
            <div class="card shadow px-5 p-2 bg-white rounded " style="width: 70%; height:100%;">
                <div class="row">
                  <div class="col-12 col-md-4 pt-5 fw-bolder">
                    <div id="fullname"></div>
                    <div class="pt-3" id="email"></div>
                  </div>
                  
                  <div class="col-12 col-md-4 pt-3 fw-bolder text-center">
                    <img style="width:50px; max-width:100%;" id="invoice_logo" src="">
                  </div>
                  
                  <div class="col-12 col-md-4 pt-5 fw-bolder text-right">
                    <h2> INVOICES </h2>
                    <div class="text-muted" id="invoice_no"></div>
                  </div>
                </div>
                
                <div class="row pt-3">
                  <div class="col-md-6 col-sm-12">
                    <div id="address"></div>
                    <div id="city-province"></div>
                    <div id="zip_code"></div>
                  </div>
                </div>
              
                <div class="row pt-3">
                  <div class="col-md-6 col-sm-12">
                    <span class="text-muted">Bill To:</span>
                  </div>
                  <div class="col-md-3 col-sm-6 text-right">
                    <span class="text-muted">Date:</span>
                  </div>
                  <div class="col-md-3 col-sm-6 text-right">
                    <div id="date_created"></div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="fw-bolder" id="invoice_title"></div>
                  </div>
                  <div class="col-md-3 col-sm-6 text-right">
                    <span class="text-muted">Due Date:</span>
                  </div>
                  <div class="col-md-3 col-sm-6 text-right">
                    <div id="show_due_date"></div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-3 col-sm-12">
                    <div id="bill_to_address"></div>
                  </div>
                  <div class="col-md-3 col-sm-6"></div>
                  <div class="col-md-3 col-sm-6 text-right">
                    <span class="text-muted">Invoice Status:</span>
                  </div>
                  <div class="col-md-3 col-sm-6 text-right">
                    <div id="invoice_status"></div>
                  </div>
                </div>
                    <div class="col-md-3 col-sm-6" style="text-align: right;">
                      <div id="invoice_status"></div>
                    </div>
                  
                
                  <div class="row">
                    <div class="col-md-6 col-sm-12"></div>
                    <div class="col-md-3 col-sm-6 text-muted" id="text_date_received" style="text-align: right;">
                    </div>
                    <div class="col-md-3 col-sm-6" id="date_received" style="text-align: right;">
                    </div>
                  </div>
                  
                  <div class="row pt-3">
                    <div class="col-md-3 col-sm-12">
                      <div id="ship_to_address"></div>
                    </div>
                    <div class="col-md-3 col-sm-12"></div>
                    <div class="col-md-6 col-sm-12">
                      <div class="rounded-3" style="height: 50px; background-color: #A4A6B3; display: flex; align-items: center;">
                        <div class="col-md-6 col-sm-6" style="text-align: right;">
                          <h5>
                            <span>Balance Due:</span>
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row pt-3">
                    <div class="col-12 table-responsive">
                      <table class="table" id="table_invoiceItems">
                        <thead class="thead-dark" style="border-radius: 5px; background-color: black; color: white;">
                          <tr>
                            <th class="scope">Description</th>
                            <th class="scope" style="text-align: end;">Quantity</th>
                            <th class="scope" style="text-align: end;">Rate</th>
                            <th class="scope" style="text-align: end;">Amount</th>
                          </tr>
                        </thead>
                        <tbody class="px-3">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="row">
                            <div class="col-12 align-self-start">
                                <label class="fw-bold"> Description: </label>
                            </div>
                            <div class="col-12" id="view_invoice_description"></div>
                        </div>
                    </div>
                
                    <div class="col-md-7 col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="text-muted " style="text-align:"> SubTotal: </label>
                            </div>
                            <div class="col mx-2 h6" id="sub_total" style="text-align:end"></div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mx-2 h6">
                                <label class="text-muted"> Discount:</label><span class="text-muted" id="discountType"></span>
                            </div>
                            <div class="col mx-2 h6" id="discountAmount" style="text-align:end"></div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label class="text-muted"> Total:</label>
                            </div>
                            <div class="col mx-2 h6" id="total" style="text-align:end"></div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label class="text-muted">Converted Amount (PHP): </label>
                                <label class="text-muted" id="peso_rate"></label>
                            </div>
                
                            <div class="col mx-2 h6" id="convertedAmount" style="text-align:end"></div>
                        </div>
                    </div>
                </div>
        



                <div class="row title_deductions pt-3">

                </div>


                <div class="deductions">
                </div>

                <div class="row total_deductions" id="total_deductions">
                </div>

                <div class="row pt-3">
                    <div class="col-5 fw-bold">Notes:</div>
                    <div class="col">
                        <h5> GRAND TOTAL </h5>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-5" id="notes"></div>
                    <div class="col">
                        <label class="text-muted">Total: </label>
                    </div>
                    <div class="col mx-2 h6" id="grand_total_amount" style="text-align:end"></div>
                </div>
            </div>

            <div class="row-md-6 w-25 px-2">
                <div class="card-responsive-md shadow p-2  bg-white rounded "
                    <div class="row pt-3">
                      
                        <div class="w-100 pt-4 pb-2">
                          <button type="button" id="paid_button" class="btn btn-secondary w-100" style="color: White; background-color: green;">Paid Invoice</button>
                        </div>
                        <div class="w-100">
                          <button type="button" id="cancelled_button" class="btn btn-secondary w-100" style="color: White; background-color: gray;">Cancel Invoice</button>
                        </div>
                        <div class="w-100 pt-2">
                          <button type="button" id="delete_button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-secondary w-100" style="color: White; background-color: red;">Delete Invoice</button>
                        </div>
                      
                        <div class="w-100 pt-2">
                          <button type="button" class="btn btn-secondary w-100" style="color: White; background-color: #CF8029;">Download</button>
                        </div>
                        <div class="w-100 pt-2 pb-4">
                          <button type="button" id="edit_invoice" data-bs-toggle="modal" data-bs-target="#updateModal" class="btn btn-secondary w-100" style="color: White; background-color: #CF8029;">Edit Invoice</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
    </div>
    
</div>

<!-- MODAL FOR EDIT INVOICE -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:100%;">
        <div class=" modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Update Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row whole_row">
                    <form id="submit_update_invoice">
                        @csrf
                        <div class="row px-4 pb-4" id="header">
                            <div class="col-md-6 px-2 w-100">
                                <div class="card shadow p-2 mb-5 bg-white rounded">
                                    <div class="row px-4 pb-4" id="header">
                                        <div class="col-12 mb-3">
                                            <div class="form-group w-50">

                                                <input type="text" id="update_invoice_id" hidden>

                                                <!-- <label class="formGroupExampleInput2">Invoice #</label> -->
                                                <input id="invoice_no" style="font-weight: bold;border:none;background-color:white" disabled name="invoice_no" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class=" form-group">
                                                        <label class=" formGroupExampleInput2">Description</label>
                                                        <input id="invoice_description" name="invoice_description" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" id="show_items">
                                            <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                        </div>

                                        <div class="col-8 mb-3"></div>
                                        <div class="col-4 mb-3">
                                            <div class="row">
                                                <div class="col-4 md-2 w-100">
                                                    <div class="form-group">
                                                        </br>
                                                        <button class="btn btn-secondary" style="width:100%;color:white; background-color: #CF8029;" id="add_item">Add
                                                            Item</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col" style="display: flex;flex-direction: column-reverse;align-items: center;">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2">Discount
                                                            Type</label>
                                                        <br>
                                                        <input class="form-check-input" type="radio" name="discount_type" id="discount_type" value="Fixed">
                                                        <label class="formGroupExampleInput2">
                                                            Fxd &nbsp; &nbsp;
                                                        </label>
                                                        <input class="discount_type form-check-input" type="radio" name="discount_type" id="discount_type" value="Percentage">
                                                        <label class="formGroupExampleInput2">
                                                            %
                                                        </label>
                                                        <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2 label_discount_amount">Discount
                                                            Amount ($)</label>
                                                        <input type="text" step="any" style="text-align:right;" name="discount_amount" id="discount_amount" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2 label_discount_total">Discount
                                                            Total ($)</label>
                                                        <input type="text" disabled style="text-align:right; border:0px;background-color:white;" onkeypress="return onlyNumberKey(event)" name="discount_total" id="discount_total" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-12 my-3" style="justify-content:end;display:flex">
                                                    <div class="form-group">
                                                        <!-- border-style:none -->
                                                        <label>Subtotal ($): </label>
                                                        <input type="text" style="font-weight: bold;text-align:right;border:none;background-color:white" name="subtotal" id="subtotal" class="form-control no-outline subtotal" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2">Dollar Amount
                                                            ($)</label>
                                                        <input type="text" id="dollar_amount" style="font-weight: bold;border:none; text-align:right;background-color:white" class="form-control dollar_amount" disabled />

                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2">Peso Rate
                                                            (Php)</label>
                                                        <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="peso_rate" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2" for="form3Example2">Converted
                                                            Amount (Php)</label>
                                                        <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="converted_amount" class="form-control converted_amount" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <h3> DEDUCTIONS </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" id="show_deduction_items"></div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4 text-center mb-3">
                                                    <h4> Grand Total </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-8" style="text-align:right;">
                                                    <label style="vertical-align: -webkit-baseline-middle">Total
                                                        (Php):
                                                        <label>
                                                </div>
                                                <div class="col-4 mb-3" style="justify-content:end;display:flex">
                                                    <!-- border-style:none -->
                                                    <input type="text" id="grand_total" class="form-control no-outline" style="text-align:right;border:0;background-color:white;" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-12 form-control">
                                                    <label for="floatingTextarea">Notes</label>
                                                    <textarea class="form-control" placeholder="Leave a notes here" id="notes" name="notes"></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="pb-3">
                                                <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="pb-3">
                                                <button type="button" id="update" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029;">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
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

<script type="text/javascript">
    let total_deduction_amount = 0
    let x = 1;

    const PHP = value => currency(value, {
        symbol: '',
        decimal: '.',
        separator: ','
    });

    //  For creating invoice codes
    const api = "https://api.exchangerate-api.com/v4/latest/USD";

    $(document).ready(function() {
        show_invoice();
        // display_item_rows();


        let toast1 = $('.toast1');
        toast1.toast({
            delay: 3000,
            animation: true,

        });

        $('.close').on('click', function(e) {
            e.preventDefault();
            toast1.toast('hide');
        })
        $("#error_msg").hide();
        $("#success_msg").hide();

        $('#discount_amount').on('keyup', function() {
            subtotal();
        })


        // FOR UPDATE
        // $('#invoice_items').on('submit', function(e) {
        //     e.preventDefault();
        //     let toast1 = $('.toast1');

        //     // CONDITION IF THERE IS BLANK ROW
        //     $('#show_items .row1').each(function() {
        //         let parent = $(this).closest('.row1');
        //         let row_item = $(this).parent();
        //         let item_rate = $(this).find('.rate').val();
        //         let item_qty = $(this).find('.quantity').val();

        //         if (item_rate == "" && item_qty == "") {

        //             // console.log("row_item", parent);

        //             if ($('#show_items > .row').length === 1) {
        //                 $('#show_items > .row').find('.col-remove-item').removeClass(
        //                         'd-none')
        //                     .addClass(
        //                         'd-none');
        //             } else {
        //                 $(parent).remove();
        //             }
        //         }
        //         x--;
        //     });

        //     let profile_id = $('#profile_id').val();
        //     // let invoice_no = $('#invoice_no').val();
        //     // INVOICE TABLE
        //     let invoice_description = $('#invoice_description').val();
        //     let invoice_subtotal = $('#subtotal').val().replaceAll(',', '');
        //     let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
        //     let invoice_discount_type = $('#discount_type:checked').val();
        //     let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
        //     let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
        //     let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
        //     let invoice_notes = $('#notes').val();

        //     // INVOICE ITEMS TABLE
        //     let invoiceItem = [];
        //     $('#show_items .row').each(function() {
        //         let item_description = $(this).find('.item_description').val() ? $(this).find(
        //             '.item_description').val() : "";
        //         let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(this).find(
        //             '.rate').val().replaceAll(',', '') : 0;
        //         let item_qty = $(this).find('.quantity').val() ? $(this)
        //             .find('.quantity').val() : 0;
        //         let item_total_amount = $(this).find('.amount').val().replaceAll(',', '') ? $(
        //                 this).find('.amount')
        //             .val().replaceAll(',', '') : 0;

        //         invoiceItem.push({
        //             item_description,
        //             item_rate,
        //             item_qty,
        //             item_total_amount,
        //         })
        //     });

        //     // DEDUCTIONS TABLE
        //     let Deductions = [];
        //     $('#show_deduction_items .row').each(function() {
        //         let profile_deduction_type_id = $(this).find('.profile_deduction_type').val() ?
        //             $(this)
        //             .find(
        //                 '.profile_deduction_type').val() : 0;
        //         let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(',',
        //             '') ? $(this).find(
        //             '.deduction_amount').val().replaceAll(',', '') : 0;

        //         Deductions.push({
        //             profile_deduction_type_id,
        //             deduction_amount,
        //         })

        //     });

        //     let data = {
        //         profile_id: profile_id,
        //         // invoice_no: invoice_no,
        //         description: invoice_description,
        //         sub_total: invoice_subtotal,
        //         converted_amount: invoice_converted_amount,
        //         discount_type: invoice_discount_type,
        //         discount_amount: invoice_discount_amount,
        //         discount_total: invoice_discount_total,
        //         grand_total_amount: invoice_total_amount,
        //         notes: invoice_notes,
        //         invoiceItem,
        //         Deductions,
        //     }

        //     console.log("Deductions", data);
        //     axios.
        //     post(apiUrl + "/api/createinvoice", data, {
        //         headers: {
        //             Authorization: token
        //         },
        //     }).then(function(response) {
        //         let data = response.data;
        //         if (data.success) {
        //             console.log("SUCCES", data.success);
        //             $('.toast1 .toast-title').html('Create Invoices');
        //             $('.toast1 .toast-body').html(response.data.message);

        //             toast1.toast('show');
        //             setTimeout(function() {
        //                 $('#exampleModal').modal('hide');
        //             }, 1500);
        //             $("#save").attr("data-bs-dismiss", "modal");
        //         }
        //     }).catch(function(error) {
        //         if (error.response.data.errors) {
        //             let errors = error.response.data.errors;
        //             console.log("errors", errors);
        //             let fieldnames = Object.keys(errors);

        //             Object.values(errors).map((item, index) => {
        //                 fieldname = fieldnames[0].split('_');
        //                 fieldname.map((item2, index2) => {
        //                     fieldname['key'] = capitalize(item2);
        //                     return ""
        //                 });
        //                 fieldname = fieldname.join(" ");

        //                 $('.toast1 .toast-title').html(fieldname);
        //                 $('.toast1 .toast-body').html(Object.values(errors)[0].join(
        //                     "\n\r"));
        //             })
        //             toast1.toast('show');
        //         }
        //     });

        // });

        // function capitalize(s) {
        //     if (typeof s !== 'string') return "";
        //     return s.charAt(0).toUpperCase() + s.slice(1);
        // }

        // CHECK IF THE USER HAVE THE PROFILE
        $("#exampleModal").on('hide.bs.modal', function() {
            window.location.reload();
        });

        $("#updateModal").on('hide.bs.modal', function() {
            window.location.reload();
        });


        // ONLY NUMBERS FOR NUMBER INPUTS
        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
        $('#show_items').on("keyup", ".multi", function() {
            let sub_total = 0;
            let parent = $(this).closest('.row');
            let quantity = parent.find('.quantity').val().replaceAll(',', '') ? parent.find('.quantity')
                .val().replaceAll(',', '') : 0;
            let rate = parent.find('.rate').val().replaceAll(',', '') ? parent.find('.rate').val()
                .replaceAll(',', '') : 0;
            sub_total = parseFloat(quantity * rate);

            parent.find('.amount').val(PHP(sub_total).format());
            // getResults_Converted();
            displayResults();
            Additems_total();
            subtotal();
        });


        $('#show_items').focusout(".multi", function() {
            let invoiceItems_sum = 0;
            $('#show_items .row1').each(function() {
                let parent = $(this).closest('.row1');
                let quantity = parent.find('.quantity').val();
                let rate = parent.find('.rate').val();

                parent.find('.quantity').val(PHP(quantity).format());
                parent.find('.rate').val(PHP(rate).format());
            })
            DeductionItems_total();
        })


        $('#discount_amount').focusout(function() {
            if ($('#discount_amount').val() == "") {
                $('#discount_amount').val('0.00');
            } else {
                let discount_type = $("input[id='discount_type']:checked").val();
                if (discount_type == 'Percentage') {
                    let discount_amount = $('#discount_amount').val();
                    $('#discount_amount').val(parseInt(discount_amount));
                } else {
                    let discount_amount = $('#discount_amount').val();
                    $('#discount_amount').val(PHP(discount_amount).format());
                }
            }
            DeductionItems_total();
        })

        // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
        $('#show_deduction_items').on("keyup", ".multi2", function() {
            let grand_total = 0;
            let parent = $(this).closest('.row');
            let deduction_amount = parent.find('.deduction_amount').val() ? parent
                .find(
                    '.deduction_amount')
                .val() : 0;
            // grand_total = parseFloat($('#converted_amount').val().replaceAll(',', '')) - parseFloat(
            // deduction_amount.replaceAll(',', ''));
            // $('#grand_total').val(PHP(grand_total).format());
            DeductionItems_total();

        });

        $('#show_deduction_items').focusout('.multi2', function() {
            let deduction_sum = 0;
            $('#show_deduction_items .deduction_amount').each(function() {
                let parent = $(this).closest('.row');
                let deduction_amount = parent.find('.deduction_amount').val();
                parent.find('.deduction_amount').val(PHP(deduction_amount).format());
            })
        })

        // DISPLAY CONVERTED AMOUTN FROM DATABASE
        function displayResults() {
            let converted_amount = 0;
            let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
            let peso_rate = $('#peso_rate').val().replaceAll(',', '');
            converted_amount = parseFloat(dollar_amount * peso_rate);
            $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());
        }

        // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
        // function displayResults(currency) {
        //     let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
        //     let peso_rate = 0;
        //     let converted_amount = 0;
        //     let fromRate = currency.rates['USD'];
        //     let toRate = currency.rates['PHP'];
        //     peso_rate = (toRate / fromRate);
        //     converted_amount = ((toRate / fromRate) * dollar_amount);
        //     $('#peso_rate').val(PHP(parseFloat(peso_rate)).format());
        //     $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());
        // }

        $("#discount_amount").addClass('d-none');
        $("#discount_total").addClass('d-none');
        $(".label_discount_amount").addClass('d-none');
        $(".label_discount_total").addClass('d-none');
        $('input[type=radio][id=discount_type]').change(function() {

            if (subtotal == 0) {
                $("#discount_amount").addClass('d-none');
                $("#discount_total").addClass('d-none');
                $(".label_discount_amount").addClass('d-none');
                $(".label_discount_total").addClass('d-none');
            } else {
                if (this.value == 'Fixed') {
                    //write your logic here
                    // console.log("FIXED");
                    $("#discount_amount").removeClass('d-none');
                    $("#discount_total").removeClass('d-none');
                    $(".label_discount_amount").removeClass('d-none');
                    $(".label_discount_total").removeClass('d-none');

                    $('#discount_amount').val('0.00');

                } else if (this.value == 'Percentage') {
                    //write your logic here
                    // console.log("PERCENTAGE");
                    $("#discount_amount").removeClass('d-none');
                    $("#discount_total").removeClass('d-none');
                    $(".label_discount_amount").removeClass('d-none');
                    $(".label_discount_total").removeClass('d-none');

                    $('#discount_amount').val('0.00');
                    $('#discount_total').val('0.00');
                }
            }
            subtotal();
            Additems_total();
        })


        // FUNCTION FOR CALCUTAION DEDUCTIONS
        function DeductionItems_total() {
            var deduction_sum = 0;
            let converted_amount = 0;
            let dollar_amount = 0;
            let converted_amount_input = 0;
            let peso_rate = 0;
            let grand_total = 0;

            $('#show_deduction_items .deduction_amount').each(function() {
                deduction_sum += Number($(this).val().replaceAll(',', ''));
            })

            $('#show_items .amount').each(function() {
                converted_amount += Number($(this).val().replaceAll(',', ''));
            });

            peso_rate = $('#peso_rate').val().replaceAll(',', '') ? $('#peso_rate').val().replaceAll(',', '') :
                0;
            dollar_amount = $('#dollar_amount').val().replaceAll(',', '') ? $('#dollar_amount').val()
                .replaceAll(',', '') : 0;
            converted_amount_input = parseFloat(dollar_amount * peso_rate);
            grand_total = parseFloat(converted_amount_input - deduction_sum);
            $('#grand_total').val(PHP(grand_total).format());
            // console.log("grand_total", grand_total);
        }

        // SUBTOTAL CALCULATIONS
        function subtotal() {
            let discount_type = $("input[id='discount_type']:checked").val();
            let discount_amount = $('#discount_amount').val();
            let discount_total = $('#discount_total').val();
            let subtotal = $('#subtotal').val();
            var sum = 0;

            $('#show_items .amount').each(function() {
                sum += Number($(this).val().replaceAll(',', ''));
            });

            if (discount_type == 'Fixed') {
                $('#discount_total').val(PHP(parseFloat(discount_amount ? discount_amount : 0) * 1).format());
                let sub_total = (sum - $('#discount_total').val().replaceAll(',', ''));
                $('#subtotal').val(PHP(sub_total).format());

                let dollar_amount = $('#subtotal').val();
                $('#dollar_amount').val(PHP(dollar_amount).format());
                DeductionItems_total()
            } else if (discount_type == 'Percentage') {

                let percentage = parseFloat(((discount_amount ? discount_amount : 0) / 100) * sum);
                $('#discount_total').val(PHP(percentage).format());
                let sub_total = (parseFloat(sum) - parseFloat(percentage));
                $('#subtotal').val(PHP(sub_total).format());
                $('#dollar_amount').val(PHP(sub_total).format());
                DeductionItems_total()
            }
            // getResults_Converted();
            displayResults();

        }

        // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
        function Additems_total() {
            var sum = 0;
            let converted_amount = 0;
            $('#show_items .amount').each(function() {
                sum += Number($(this).val().replaceAll(',', ''));
            });
            // $('#subtotal').val(parseFloat(sum).toFixed(2));
            // $('#dollar_amount').val(parseFloat(sum).toFixed(2));

            $('#subtotal').val(PHP(parseFloat(sum)).format());
            $('#dollar_amount').val(PHP(parseFloat(sum)).format());

        }

        // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
        // function getResults_Converted() {
        //     fetch(`${api}`)
        //         .then(currency => {
        //             return currency.json();
        //         }).then(displayResults);
        // }



        // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
        $(document).on('click', '.remove_items', function(e) {
            e.preventDefault();
            let parent = $(this).closest('.row');
            let invoiceItems_id = parent.find('.item_id').val();
            let sub_total = parent.find('.subtotal').val();
            let row_item = $(this).parent().parent().parent();
            $(row_item).remove();

            displayResults();
            Additems_total();
            subtotal();
            DeductionItems_total();
            x--;

            let invoice_id = $('#update_invoice_id').val();
            let invoice_description = $('#invoice_description').val();
            let invoice_subtotal = $('#subtotal').val().replaceAll(',', '');
            let peso_rate = $('#peso_rate').val().replaceAll(',', '')
            let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
            let invoice_discount_type = $('#discount_type:checked').val();
            let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
            let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
            let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
            let invoice_notes = $('textarea#notes').val();

            let invoiceItem = [];
            $('#show_items .row').each(function() {
                let item_invoice_id = $(this).find('.item_id').val();
                let item_description = $(this).find('.item_description').val() ? $(this).find(
                    '.item_description').val() : "";
                let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(this).find(
                    '.rate').val().replaceAll(',', '') : 0;
                let item_qty = $(this).find('.quantity').val() ? $(this)
                    .find('.quantity').val() : 0;
                let item_total_amount = $(this).find('.amount').val().replaceAll(',', '') ? $(
                        this).find('.amount')
                    .val().replaceAll(',', '') : 0;

                invoiceItem.push({
                    item_invoice_id,
                    item_description,
                    item_rate,
                    item_qty,
                    item_total_amount,
                })
            });

            // DEDUCTIONS TABLE
            let Deductions = [];
            $('#show_deduction_items .row').each(function() {
                let deduction_id = $(this).find('.deduction_id').val();
                let profile_deduction_type_id = $(this).find('.profile_deduction_type').val() ?
                    $(this)
                    .find(
                        '.profile_deduction_type').val() : 0;
                let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(',',
                    '') ? $(this).find(
                    '.deduction_amount').val().replaceAll(',', '') : 0;

                Deductions.push({
                    deduction_id,
                    profile_deduction_type_id,
                    deduction_amount,
                })
            });
            let data = {
                invoice_id: invoice_id,
                description: invoice_description,
                subtotal: invoice_subtotal,
                peso_rate: peso_rate,
                converted_amount: invoice_converted_amount,
                discount_type: invoice_discount_type,
                discount_amount: invoice_discount_amount,
                discount_total: invoice_discount_total,
                grand_total_amount: invoice_total_amount,
                notes: invoice_notes,
                invoiceItems_id: invoiceItems_id,
                invoiceItem,
                Deductions,
            }


            console.log("data removed", data);
            axios.post(apiUrl + '/api/createinvoice/', data, {
                headers: {
                    Authorization: token,
                },
            }).then(function(response) {
                let data = response.data
                if (data.success) {

                    $('.toast1 .toast-title').html('Delete Invoice Items');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');


                    if ($('#show_items > .row').length === 1) {
                        $('#show_items > .row').find('.col-remove-item').removeClass('d-none')
                            .addClass(
                                'd-none');
                    }

                    // setTimeout(function() {
                    //     $('#updateModal').modal('hide');
                    // }, 1500);
                    // // getResults_Converted();
                    // $("#update").attr("data-bs-dismiss", "modal");
                }
            }).catch(function(error) {
                if (error.response.data.errors) {
                    let errors = error.response.data.errors;
                    let fieldnames = Object.keys(errors);
                    Object.values(errors).map((item, index) => {
                        fieldname = fieldnames[0].split('_');
                        fieldname.map((item2, index2) => {
                            fieldname['key'] = capitalize(
                                item2);
                            return ""
                        });
                        fieldname = fieldname.join(" ");
                        $('.toast1 .toast-title').html(fieldname);
                        $('.toast1 .toast-body').html(Object.values(
                                errors)[0]
                            .join(
                                "\n\r"));
                    })
                    toast1.toast('show');
                }
            })


        });

        // BUTTON for ADD ITEMS ROWS
        $("#add_item").click(function(e) {
            e.preventDefault();
            display_item_rows()
        });

        // INITIALIZE DISPLAY ITEM ROWS
        function display_item_rows() {
            let max_fields = 10;
            let wrapper = $('#show_items');
            add_rows = '';
            add_rows += '<div class="row row1">';

            add_rows += '<div class="col-md-4 mb-3">';
            add_rows += '<div class="form-group">';
            add_rows += '<label class="formGroupExampleInput2">Item Desctiption</label>';
            add_rows +=
                '<input type="text" name="item_description" id="item_description" class="form-control item_description" />';
            add_rows += '</div>';
            add_rows += '</div>';

            add_rows += '<div class="col-md-2 mb-3">';
            add_rows += '<div class="form-group">';
            add_rows += '<label class="formGroupExampleInput2">Quantity</label>';
            add_rows +=
                '<input type="text" step="any" maxlength="4" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
            add_rows += '</div>';
            add_rows += ' </div>';

            add_rows += '<div class="col-md-3 mb-3">';
            add_rows += '<div class="form-group">';
            add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
            add_rows +=
                '<input type="text" step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
            add_rows += '</div>';
            add_rows += '</div>';

            add_rows += '<div class="col-md-2 mb-3">';
            add_rows += '<div class="form-group">';
            add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Amount</label>';
            // style="text-align:right;border:none;background-color:white"
            add_rows +=
                '<input type="text" style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
            add_rows += '</div>';
            add_rows += '</div>';

            add_rows += '<div class="col-md-1 col-remove-item d-none">';
            add_rows += '<div class="form-group">';
            add_rows += '</br>';
            add_rows +=
                '<button class="btn remove_items" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
            add_rows += '</div>';
            add_rows += '</div>';

            add_rows += '</div>'

            $(wrapper).append(add_rows);

            if ($('#show_items > .row').length > 1) {
                $('#show_items > .row').each(function() {
                    $(this).find('.col-remove-item').removeClass('d-none');
                })
            } else {
                $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
                    'd-none');
            }
        }
        $(document).on('click', '#edit_invoice', function(e) {
            e.preventDefault();

            let url = window.location.pathname;
            let urlSplit = url.split('/');
            if (urlSplit.length == 4) {
                let invoice_id = urlSplit[3]
                $('#update_invoice_id').val(invoice_id)

                axios.get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        console.log("SUCCESS", data);
                        $('#invoice_description').val(data.data.description);
                        if (data.data.discount_type === 'Fixed') {
                            $("#discount_amount").removeClass('d-none');
                            $("#discount_total").removeClass('d-none');
                            $(".label_discount_amount").removeClass('d-none');
                            $(".label_discount_total").removeClass('d-none');
                            $("input[id=discount_type][value=" + data.data.discount_type + "]")
                                .attr('checked', true)

                        } else {
                            $("#discount_amount").removeClass('d-none');
                            $("#discount_total").removeClass('d-none');
                            $(".label_discount_amount").removeClass('d-none');
                            $(".label_discount_total").removeClass('d-none');
                            $("input[id=discount_type][value=" + data.data.discount_type + "]")
                                .attr('checked', true)
                        }
                        $('#discount_amount').val(data.data.discount_amount);
                        $('#discount_total').val(data.data.discount_total);
                        $('#peso_rate').val(data.data.peso_rate);
                        $('textarea#notes').val(data.data.notes);
                        if (data.data.invoice_items.length > 0) {
                            data.data.invoice_items.map((item) => {
                                // console.log(item.item_description + " " + item
                                //     .quantity +
                                //     " " + item.rate + " " + item.total_amount);
                                let wrapper = $('#show_items');
                                add_rows = '';
                                add_rows += '<div class="row row1">';

                                add_rows += '<div class="col-md-4 mb-3">';
                                add_rows += '<div class="form-group">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2">Item Desctiption</label>';
                                add_rows +=
                                    '<input type="text" value="' + item.id +
                                    '" name="item_id" id="item_id" class="form-control item_id" />';
                                add_rows +=
                                    '<input type="text" value="' + item.item_description +
                                    '" name="item_description" id="item_description" class="form-control item_description" />';
                                add_rows += '</div>';
                                add_rows += '</div>';

                                add_rows += '<div class="col-md-2 mb-3">';
                                add_rows += '<div class="form-group">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2">Quantity</label>';
                                add_rows +=
                                    '<input type="text" value=' + PHP(item.quantity)
                                    .format() +
                                    ' step="any" maxlength="4" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
                                add_rows += '</div>';
                                add_rows += ' </div>';

                                add_rows += '<div class="col-md-3 mb-3">';
                                add_rows += '<div class="form-group">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
                                add_rows +=
                                    '<input type="text" value=' + PHP(item.rate)
                                    .format() +
                                    ' step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
                                add_rows += '</div>';
                                add_rows += '</div>';

                                add_rows += '<div class="col-md-2 mb-3">';
                                add_rows += '<div class="form-group">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2" for="form3Example2">Amount</label>';
                                // style="text-align:right;border:none;background-color:white"
                                add_rows +=
                                    '<input type="text" value=' + PHP(item
                                        .total_amount)
                                    .format() +
                                    ' style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
                                add_rows += '</div>';
                                add_rows += '</div>';

                                add_rows +=
                                    '<div class="col-md-1 col-remove-item d-none">';
                                add_rows += '<div class="form-group">';
                                add_rows += '</br>';
                                add_rows +=
                                    '<button class="btn remove_items" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
                                add_rows += '</div>';
                                add_rows += '</div>';

                                add_rows += '</div>'

                                $(wrapper).append(add_rows);

                                if ($('#show_items > .row').length > 1) {
                                    $('#show_items > .row').each(function() {
                                        $(this).find('.col-remove-item')
                                            .removeClass('d-none');
                                    })
                                } else {
                                    $('#show_items > .row').find('.col-remove-item')
                                        .removeClass('d-none').addClass(
                                            'd-none');
                                }

                            })
                        }

                        if (data.data.deductions.length > 0) {
                            data.data.deductions.map((item2) => {
                                let wrapper = $('#show_deduction_items');
                                add_rows = '';
                                add_rows += '<div class="row mb-3">';
                                add_rows += '<div class="col-8">';
                                add_rows += '<div class="form-group w-100">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2">Deduction Type</label>';

                                add_rows +=
                                    '<input type="text" value=' + item2.id +
                                    ' id="deduction_id" name="deduction_id" class="form-control deduction_id" hidden>'
                                add_rows +=
                                    '<select class="form-control profile_deduction_type" id="profile_deduction_type" name="profile_deduction_type">';
                                add_rows += '<option value=' + item2.id +
                                    '>' + item2
                                    .profile_deduction_types.deduction_type
                                    .deduction_name + '</option> ';
                                add_rows += '</select>';

                                add_rows += '</div>';
                                add_rows += '</div>';
                                add_rows += '<div class="col-4">';
                                add_rows += '<div class="form-group ">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2">Deduction Amount (Php)</label>';
                                add_rows +=
                                    '<input type="text" value="' + PHP(item2.amount)
                                    .format() +
                                    '" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                                add_rows += '</div>';
                                add_rows += '</div>';
                                add_rows += '</div>';

                                $(wrapper).append(add_rows);
                                return '';
                                // console.log("asdas", item2.profile_deduction_types);
                            })
                        } else {

                        }
                        // getResults_Converted();
                        displayResults();
                        Additems_total();
                        subtotal();
                        DeductionItems_total();

                        $('#grand_total').val(PHP(data.data.grand_total_amount).format());
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }

        })

        function show_invoice() {
            let url = window.location.pathname;
            let urlSplit = url.split('/');
            if (urlSplit.length == 4) {
                let invoice_id = urlSplit[3];
                // console.log("invoice_id", invoice_id);
                apiUrl
                axios
                    .get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            console.log("DATA", data);
                            const month = ["January", "February", "March", "April", "May", "June",
                                "July",
                                "August", "September", "October", "November", "December"
                            ];
                            var newdate = new Date(data.data.created_at);
                            var mm = month[newdate.getMonth()];
                            var dd = newdate.getDate();
                            var yy = newdate.getFullYear();

                            $('#fullname').html(data.data.profile.user.first_name + " " + data.data
                                .profile.user
                                .last_name);
                            $('#email').html(data.data.profile.user.email);
                            $('#invoice_no').html("#" + data.data.invoice_no);
                            $('#address').html(data.data.profile.address);
                            $('#city-province').html(data.data.profile.city + ", " + data.data.profile
                                .province);
                            $('#zip_code').html("Philippines " + data.data.profile.zip_code);
                            $('#date_created').html(mm + " " + dd + ", " + yy);
                            $('#notes').html(data.data.notes);
                            $('#view_invoice_description').html(data.data.description);
                            $('#notes').html(data.data.notes);

                            if (data.data.invoice_items.length > 0) {
                                let balance_due = parseFloat(data.data.sub_total ? data.data.sub_total :
                                    0);
                                let sub_total = parseFloat(data.data.sub_total) + parseFloat(data.data.discount_total);

                                let discount_amount = parseFloat(data.data.discount_amount);

                                let converted_amount = parseFloat(data.data.converted_amount ? data.data
                                    .converted_amount : 0);

                                $('#balance_due').html((balance_due)
                                    .toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }));

                                $('#sub_total').html(sub_total.toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'USD'
                                }));

                                if (data.data.discount_type === "Fixed") {
                                    $('#discountType').html(" " + data.data.discount_type + " (" + discount_amount.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) + ")");
                                    $('#discountAmount').html(discount_amount.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }));
                                } else {
                                    $('#discountType').html(" " + data.data.discount_type + " (" + discount_amount + "%)");
                                    $('#discountAmount').html("$" + PHP(data.data.discount_total).format());
                                }

                                $('#total').html(balance_due.toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'USD'
                                }));

                                data.data.invoice_items.map((item) => {
                                    // console.log("tem.item_description", item.item_description);
                                    let tr = '<tr>';
                                    tr += '<td class="scope">' + item.item_description + '</td>'
                                    tr += '<td class="scope" style="text-align:end">' + item
                                        .quantity +
                                        '</td>'
                                    tr += '<td class="scope" style="text-align:end">' + item
                                        .rate
                                        .toLocaleString('en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }) +
                                        '</td>'
                                    tr += '<td class="scope" style="text-align:end">' + item
                                        .total_amount.toLocaleString('en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }) + '</td>'
                                    tr += '</tr>';

                                    $('#table_invoiceItems tbody').append(tr);
                                    return '';
                                })

                                $('#convertedAmount').html(converted_amount.toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'PHP'
                                }));
                                $('#peso_rate').html(data.data.peso_rate.toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'PHP'
                                }) + "rate");

                                let grand_total_amount = parseFloat(data.data.grand_total_amount ? data
                                    .data
                                    .grand_total_amount : 0);
                                // console.log("SUCCESS", PHP(data.data.grand_total_amount).format());

                                $('#grand_total_amount').html(grand_total_amount.toLocaleString(
                                    'en-US', {
                                        style: 'currency',
                                        currency: 'PHP'
                                    }));

                                if (data.data.deductions.length > 0) {
                                    let total_deductions = 0;

                                    let parent0 = $(this).closest('.row .title_deductions');
                                    let div_rows0 = '';
                                    div_rows0 += '<div class = "col-5" > </div>';
                                    div_rows0 += '<div class = "col" >';
                                    div_rows0 += '<h5> DEDUCTIONS </h5>';
                                    div_rows0 += '</div>';
                                    div_rows0 += '<div class = "col mx-2" style = "text-align:end" > </div>';
                                    $(".row .title_deductions").append(div_rows0);

                                    data.data.deductions.map((item2) => {
                                        let deduction_amount = parseFloat(item2
                                            .amount ? item2.amount :
                                            0);

                                        let parent = $(this).closest('.row .deductions');
                                        let div_rows = '';
                                        div_rows += '<div class="col-5 row_deductions"></div>';
                                        div_rows += '<div class="col text-muted">' + item2
                                            .profile_deduction_types
                                            .deduction_type.deduction_name + '</div>';
                                        div_rows +=
                                            '<div class="col mx-2 h6" style="text-align:end;color:red;">' +
                                            deduction_amount.toLocaleString('en-US', {
                                                style: 'currency',
                                                currency: 'PHP'
                                            }) + '</div>';
                                        total_deductions += deduction_amount;
                                        $(".row .deductions").append(div_rows);
                                        return '';
                                    })

                                    let parent1 = $(this).closest('.row .total_deductions');
                                    let div_rows1 = '';
                                    div_rows1 += '<div class="col-5 row_deductions"></div>';
                                    div_rows1 += '<div class="col fw-bold">Total Deductions</div>';
                                    div_rows1 +=
                                        '<div class="col mx-2 h6 fw-bold" style="text-align:end;color:red;">' +
                                        total_deductions.toLocaleString('en-US', {
                                            style: 'currency',
                                            currency: 'PHP'
                                        }) + '</div>';

                                    $(".row .total_deductions").append(div_rows1);
                                    return '';

                                } else {
                                    let parent = $(this).closest('.row .deductions');
                                    let div_rows = '';

                                    // let parent0 = $(this).closest('.row .title_deductions');
                                    // let div_rows0 = '';

                                    // div_rows0 += '<div class = "col-5" > </div>';
                                    // div_rows0 += '<div class = "col" >';
                                    // div_rows0 += '<h5> DEDUCTIONS </h5>';
                                    // div_rows0 += '</div>';
                                    // div_rows0 += '<div class = "col mx-2" style = "text-align:end" > </div>';
                                    // $(".row .title_deductions").append(div_rows0);

                                    div_rows += '<div class="col-5 row_deductions"></div>';
                                    div_rows += '<div class="col"></div>';
                                    div_rows +=
                                        '<div class="col mx-2 h6" style="text-align:end;color:red;"></div>';
                                    $(".row .deductions").append(div_rows);
                                    return '';
                                }

                            } else {
                                $("#table_invoiceItems tbody").append(
                                    '<tr><td colspan="4" class="text-center">No data</td></tr>');
                            }
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    });
            }

        }
        show_invoice_config();

        function show_invoice_config() {

            axios.get(apiUrl + '/api/get_invoice_config', {
                headers: {
                    Authorization: token,
                },
            }).then(function(response) {
                let data = response.data;
                // console.log("DATA", data);

                $("#invoice_logo").attr("src", data.data.invoice_logo);
                if (data.data.invoice_logo) {
                    $('#invoice_logo').val(data.data.invoice_logo);
                    $('#invoice_title').html(data.data.invoice_title);
                    $('#bill_to_address').html(data.data.bill_to_address);
                    $('#ship_to_address').html(data.data.ship_to_address);

                } else {
                    $("#invoice_logo").attr("src", "/images/default.png");
                }

            }).catch(function(error) {
                console.log("ERROR", error);
            });
        }

        // $('#submit_update_invoice').on('submit', function(e) {
        $('#update').on('click', function(e) {
            // console.log("sd");

            let invoice_id = $('#update_invoice_id').val();
            let invoice_description = $('#invoice_description').val();
            let invoice_subtotal = $('#subtotal').val().replaceAll(',', '');
            let peso_rate = $('#peso_rate').val().replaceAll(',', '')
            let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
            let invoice_discount_type = $('#discount_type:checked').val();
            let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
            let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
            let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
            let invoice_notes = $('textarea#notes').val();



            let invoiceItem = [];
            $('#show_items .row').each(function() {
                let item_invoice_id = $(this).find('.item_id').val();
                let item_description = $(this).find('.item_description').val() ? $(this).find(
                    '.item_description').val() : "";
                let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(this).find(
                    '.rate').val().replaceAll(',', '') : 0;
                let item_qty = $(this).find('.quantity').val() ? $(this)
                    .find('.quantity').val() : 0;
                let item_total_amount = $(this).find('.amount').val().replaceAll(',', '') ? $(
                        this).find('.amount')
                    .val().replaceAll(',', '') : 0;

                invoiceItem.push({
                    item_invoice_id,
                    item_description,
                    item_rate,
                    item_qty,
                    item_total_amount,
                })
            });

            // DEDUCTIONS TABLE
            let Deductions = [];
            $('#show_deduction_items .row').each(function() {
                let deduction_id = $(this).find('.deduction_id').val();
                let profile_deduction_type_id = $(this).find('.profile_deduction_type').val() ?
                    $(this)
                    .find(
                        '.profile_deduction_type').val() : 0;
                let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(',',
                    '') ? $(this).find(
                    '.deduction_amount').val().replaceAll(',', '') : 0;

                Deductions.push({
                    deduction_id,
                    profile_deduction_type_id,
                    deduction_amount,
                })
            });

            let data = {
                invoice_id: invoice_id,
                description: invoice_description,
                subtotal: invoice_subtotal,
                peso_rate: peso_rate,
                converted_amount: invoice_converted_amount,
                discount_type: invoice_discount_type,
                discount_amount: invoice_discount_amount,
                discount_total: invoice_discount_total,
                grand_total_amount: invoice_total_amount,
                notes: invoice_notes,
                invoiceItem,
                Deductions,
            }

            console.log("data", data);

            axios.post(apiUrl + '/api/createinvoice/', data, {
                headers: {
                    Authorization: token,
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    // console.log("SUCCES", data.success);
                    $('.toast1 .toast-title').html('Create Invoices');
                    $('.toast1 .toast-body').html(response.data.message);

                    toast1.toast('show');
                    setTimeout(function() {
                        $('#updateModal').modal('hide');
                    }, 1500);
                    $("#update").attr("data-bs-dismiss", "modal");
                }
            }).catch(function(error) {
                if (error.response.data.errors) {
                    let errors = error.response.data.errors;
                    let fieldnames = Object.keys(errors);
                    Object.values(errors).map((item, index) => {
                        fieldname = fieldnames[0].split('_');
                        fieldname.map((item2, index2) => {
                            fieldname['key'] = capitalize(
                                item2);
                            return ""
                        });
                        fieldname = fieldname.join(" ");
                        $('.toast1 .toast-title').html(fieldname);
                        $('.toast1 .toast-body').html(Object.values(
                                errors)[0]
                            .join(
                                "\n\r"));
                    })
                    toast1.toast('show');
                }


            })

            // console.log(invoice_id);
            // console.log(invoice_description);
            // console.log(invoice_subtotal);
            // console.log(peso_rate);
            // console.log(invoice_converted_amount);
            // console.log(invoice_discount_type);
            // console.log(invoice_discount_amount);
            // console.log(invoice_discount_total);
            // console.log(invoice_total_amount);
            // console.log(invoiceItem);
            // console.log(Deductions);
            // console.log(invoice_notes);

        })
    })
</script>
@endsection
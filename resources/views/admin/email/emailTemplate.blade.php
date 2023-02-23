<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">
  <title>Send Email</title>
</head>

<body>
  <div class="container-fluid px-4" id="loader_load">
    <h1 class="mt-0"></h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row px-4 pb-4">
      <div class="col-xl-12 px-2 editInvoiceData">
        <!--  style="margin-left: 200px;margin-right: 200px;" -->
        <div class="card shadow px-5 p-2 bg-white rounded">
          <div id="content">
            <div class="row">
              <div class="col-md-12 pt-3 fw-bolder text-center">

                <img style="width:50px; max-width:100%;" id="invoice_logo" src="{{$content['invoice_logo']}}">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 pt-5 fw-bolder">
                <div id="fullname">{{$content['full_name']}}</div>
                <div class="pt-3" id="email">{{$content['user_email']}}</div>
              </div>

              <div class="col-sm-6 pt-5 fw-bolder text-sm-end">
                <h2> INVOICES </h2>
                <div class="text-muted" id="invoice_no">{{$content['invoice_no']}}</div>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-6">

              </div>
              <div class="col-sm-3">
                <span class="text-muted">Status:</span>
              </div>
              <div class="col-sm-3 text-sm-end">
                <div id="invoice_status">{{$content['invoice_status']}}</div>
              </div>
            </div>

            <div class="row pt-1">
              <div class="col-sm-6">
                <div id="address">{{$content['address']}}</div>
                <div id="city-province">{{$content['city']}}, {{$content['province']}} </div>
                <div id="zip_code">Philippines, {{$content['zip_code']}}</div>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-xs-12 col-sm-6">
                <div class="text-muted">Bill To:</div>
              </div>
              <div class="col-xs-12 col-sm-3 text-sm-start">
                <span class="text-muted">Date:</span>
              </div>
              <div class="col-xs-12 col-sm-3 text-sm-end">
                <div id="date_created">
                  {{$content['date_created']}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="fw-bolder" id="invoice_title">{{$content['invoice_title']}}</div>
              </div>
              <div class="col-xs-12 col-sm-3 text-sm-start">
                <span class="text-muted">Due Date:</span>
              </div>
              <div class="col-xs-12 col-sm-3 text-sm-end">
                <div id="show_due_date">
                  {{$content['due_date']}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-6 text-sm-start">
                <div id="bill_to_address">{{$content['bill_to_address']}}</div>
              </div>

              <div class="col-xs-12 col-sm-3 text-sm-start">
                <span class="text-muted">Invoice Status:</span>
              </div>
              <div class="col-xs-12 col-sm-3 text-sm-end">
                <div id="payment_status">{{$content['payment_status']}}</div>
              </div>
            </div>

            @if($content['payment_status'] === "Paid")
            <div class="row">
              <div class="col-xs-12 col-sm-6"></div>
              <div class="col-xs-12 col-sm-3 text-muted text-sm-start">
                <span class="text-muted">Date Received:</span>
              </div>
              <div class="col-xs-12 col-sm-3 text-sm-end">
                <div id="date_received">
                  {{$content['date_received']}}
                </div>
              </div>
            </div>
            @endif

            <div class="row pt-3">
              <div class="col-sm-6">
                <div id="ship_to_address">{{$content['ship_to_address']}}</div>
              </div>

              <div class="col-md-6 col-sm-12">
                <div class="rounded-3" style="height: 50px; background-color: #A4A6B3; display: flex; align-items: center;">
                  <div class="col-6 text-start">
                    <h5>
                      <labe class="ms-3">Balance Due:</label>
                    </h5>
                  </div>
                  <div class="col-6 text-end">
                    <h5>
                      <label class="me-3" id="balance_due">
                        ${{$content['balance_due']}}
                      </label>
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
                    @foreach($content['invoice_items'] as $items)
                    <tr>
                      <td class="scope">{{$items->item_description}}</td>
                      <td class="scope" style="text-align:end">{{$items->quantity}}</td>
                      <td class="scope" style="text-align:end">${{number_format($items->rate,2)}}</td>
                      <td class="scope" style="text-align:end">${{number_format($items->total_amount,2)}}</td>
                    </tr>
                    @endforeach
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
                  <div class="col-12" id="invoice_description">
                    {{$content['invoice_description']}}
                  </div>
                </div>
              </div>

              <div class="col-md-7 col-sm-12 ">
                <div class="row ">
                  <div class="col-md-6 col-sm-6">
                    <label class="text-muted " style="text-align:right"> SubTotal: </label>
                  </div>
                  <div class="col mx-2 h6" id="sub_total" style="text-align:end">
                    ${{$content['sub_total']}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-7 col-sm-7 h6">
                    <label class="text-muted"> Discount Type:</label>
                    @if($content['discount_type'] === "Fixed")
                    <span class="text-muted" id="discountType">
                      Fixed
                    </span>
                    @else
                    <span class="text-muted" id="discountAmount">
                      Percentage ({{$content['discount_amount']}}%)
                    </span>
                    @endif
                  </div>
                  <div class="col mx-2 h6" id="discountTotal" style="text-align:end">
                    ${{$content['discount_total']}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label class="text-muted"> Total:</label>
                  </div>
                  <div class="col mx-2 h6" id="total" style="text-align:end">
                    ${{$content['balance_due']}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-7 col-sm-7">
                    <label class="text-muted">Converted Amount (PHP): <label class="text-muted" id="peso_rate"></label>
                      ₱{{$content['peso_rate']}} Rate</label>
                  </div>
                  <div class="col mx-2 h6 " id="convertedAmount" style="text-align:end">
                    ₱{{$content['converted_amount']}}
                  </div>
                </div>
              </div>
            </div>

            <div class="row title_deductions pt-3">
              <div class="row">
                <div class="col-md-5 col-lg-5">
                </div>
                <div class="col-md-7 col-lg-7 text-start">
                  <h3>Deductions</h3>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="deductions">
                @foreach($content['deductions'] as $deduction)
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-5">

                  </div>
                  <div class="col text-muted">
                    {{$deduction->profile_deduction_types->deduction_type_name}}
                  </div>
                  <div class="col mx-2 h6 " style="text-align:end;color:red;">
                    ₱{{$deduction->amount}}
                  </div>
                </div>
                @endforeach
              </div>
            </div>


            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-5">
              </div>

              <div class="col fw-bold">
                Total Deductions
              </div>

              <div class="col mx-2 h6 fw-bold text-end" id="total_deductions" style="color:red;">
                ₱{{$content['deductions_total']}}
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-5 fw-bold">Notes:</div>
              <div class="col">
                <h5> GRAND TOTAL </h5>
              </div>
            </div>

            <div class="row pb-5">
              <div class="col-5" id="notes">{{$content['notes']}}</div>
              <div class="col">
                <label class="text-muted">Total: </label>
              </div>
              <div class="col mx-2 h6 fw-bold" id="grand_total_amount" style="text-align:end">
                ₱{{$content['grand_total_amount']}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
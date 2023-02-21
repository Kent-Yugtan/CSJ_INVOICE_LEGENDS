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
  <div class="container-fluid pt-0" id="loader_load">
    <h1 class="mt-0"></h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row px-4 pb-4">
      <div class="col-xl-12 px-2 editInvoiceData">
        <div class="card shadow px-5 p-2 bg-white rounded" style="margin-left: 200px;margin-right: 200px;">
          <div id="content">
            <div class="row">
              <div class="col-md-12 pt-3 fw-bolder text-center">

                <img style="width:50px; max-width:100%;" id="invoice_logo" src={{url($data1->invoice_logo)}}>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 pt-5 fw-bolder">
                <div id="fullname">{{$data->profile->user->first_name}} {{$data->profile->user->last_name}}</div>
                <div class="pt-3" id="email">{{$data->profile->user->email}}</div>
              </div>

              <div class="col-sm-6 pt-5 fw-bolder text-md-end">
                <h2> INVOICES </h2>
                <div class="text-muted" id="invoice_no">{{$data->invoice_no}}</div>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-6">

              </div>
              <div class="col-sm-3">
                <span class="text-muted">Status:</span>
              </div>
              <div class="col-sm-3 text-md-end">
                <div id="status">{{$data->status}}</div>
              </div>
            </div>

            <div class="row pt-1">
              <div class="col-sm-6">
                <div id="address">{{$data->profile->address}}</div>
                <div id="city-province">{{$data->profile->city}}, {{$data->profile->province}}</div>
                <div id="zip_code">Philippines, {{$data->profile->zip_code}}</div>
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-6">
                <span class="text-muted">Bill To:</span>
              </div>
              <div class="col-md-3 text-md-start">
                <span class="text-muted">Date:</span>
              </div>
              <div class="col-md-3 text-md-end">
                <div id="date_created">
                  {{\Carbon\Carbon::parse($data->created_at)->isoFormat('MMMM DD YYYY')}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="fw-bolder" id="invoice_title">{{$data1->invoice_title}}</div>
              </div>
              <div class="col-sm-3 text-md-start">
                <span class="text-muted">Due Date:</span>
              </div>
              <div class="col-sm-3 text-md-end">
                <div id="show_due_date">
                  {{\Carbon\Carbon::parse($data->due_date)->isoFormat('MMMM DD YYYY')}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 text-md-start">
                <div id="bill_to_address">{{$data1->bill_to_address}}</div>
              </div>

              <div class="col-sm-3 text-md-start">
                <span class="text-muted">Invoice Status:</span>
              </div>
              <div class="col-sm-3 text-md-end">
                <div id="invoice_status">{{$data->invoice_status}}</div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-3 text-muted text-md-start" id="text_date_received">
              </div>
              <div class="col-sm-3 text-md-end" id="date_received">
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-sm-6">
                <div id="ship_to_address">{{$data1->ship_to_address}}</div>
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
                      <label class="me-3" id="balance_due">${{number_format($data->sub_total,2)}}</label>
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
                    @foreach($data->invoice_items as $items)
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
                  <div class="col-12" id="view_invoice_description">
                    {{$data->description}}
                  </div>
                </div>
              </div>

              <div class="col-md-7 col-sm-12">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label class="text-muted " style="text-align:right"> SubTotal: </label>
                  </div>
                  <div class="col mx-2 h6" id="sub_total" style="text-align:end">
                    ${{number_format($data->sub_total + $data->discount_total,2) }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-7 col-sm-7 h6">
                    <label class="text-muted"> Discount Type:</label>
                    @if($data->discount_type === "Fixed")
                    <span class="text-muted" id="discountType">
                      Fixed
                    </span>
                    @else
                    <span class="text-muted" id="discountType">
                      Percentage ({{$data->discount_amount}}%)
                    </span>
                    @endif
                  </div>
                  <div class="col mx-2 h6" id="discountAmount" style="text-align:end">
                    ${{number_format($data->discount_total,2)}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label class="text-muted"> Total:</label>
                  </div>
                  <div class="col mx-2 h6" id="total" style="text-align:end">
                    ${{number_format($data->sub_total,2)}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label class="text-muted">Converted Amount (PHP): <label class="text-muted" id="peso_rate"></label>{{$data->peso_rate}} Rate</label>
                  </div>
                  <div class="col mx-2 h6" id="convertedAmount" style="text-align:end">
                    ₱{{number_format($data->converted_amount,2)}}
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
                @foreach($data->deductions as $deduction)
                <div class="row">
                  <div class="col-sm-5 col-md-5">

                  </div>
                  <div class="col text-muted">
                    {{$deduction->profile_deduction_types->deduction_type->deduction_name}}
                  </div>
                  <div class="col mx-2 h6" style="text-align:end;color:red;">
                    ₱{{$deduction->amount}}
                  </div>
                </div>
                @endforeach
              </div>
            </div>


            <div class="row">
              <div class="col-sm-5 col-md-5">
              </div>

              <div class="col fw-bold">
                Total Deductions
              </div>

              <div class="col mx-2 h6 fw-bold text-end" style="color:red;">
                ₱{{number_format($data->deductions->sum('amount'),2)}}
              </div>
            </div>

            <div class="row pt-3">
              <div class="col-5 fw-bold">Notes:</div>
              <div class="col">
                <h5> GRAND TOTAL </h5>
              </div>
            </div>

            <div class="row pb-5">
              <div class="col-5" id="notes">{{$data->notes}}</div>
              <div class="col">
                <label class="text-muted">Total: </label>
              </div>
              <div class="col mx-2 h6" id="grand_total_amount" style="text-align:end">
                ₱{{number_format($data->grand_total_amount,2)}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
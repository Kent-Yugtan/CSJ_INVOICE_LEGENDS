@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4" id="loader_load">
  <ol class="breadcrumb mb-3"></ol>

  <div class="card shadow p-2 mb-1 bg-white rounded" style="height:100%">
    <div class="card-header">
      <h1 class="mt-0"><i class="fas fa-file-invoice"></i> Invoice Reports</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card shadow p-2 mb-1 bg-white rounded" style="height:100%">
        <div class="input-group">
          <div class="form-floating me-3" style="width:23vh">
            <input type="date" class="form-control" id="from" placeholder="Date Filter From">
            <label for="from">Date Filter From</label>
          </div>

          <div class="form-floating me-3" style="width:23vh">
            <input type="date" class="form-control" id="to" placeholder="Date Filter To">
            <label for="to">Date Filter To</label>
          </div>
          <button typ="button" class="btn" style=" color:white; background-color: #CF8029;width:24vh"
            id="button-submit">Filter</button>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-md-12 col-lg-12">
      <div class="card shadow p-2 mb-1 bg-white rounded" style="height:100%">
        <div class="card-body  table-responsive">
          <table id="invoiceReports" style="font-size: 14px;" class="table table-hover">
            <thead>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div style="position: fixed; top: 60px; right: 20px;z-index:9999">
  <div class="toast toast1 toast-bootstrap " role="alert" aria-live="assertive" aria-atomic="true">
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
<div class="spanner">
  <div class="loader">
  </div>
</div>

<script type="text/javascript">
const PHP = value => currency(value, {
  symbol: '',
  decimal: '.',
  separator: ','
});
$(document).ready(function() {

  // Define the sum() function
  $.fn.dataTable.Api.register('sum()', function() {
    return this.flatten().reduce(function(a, b) {
      if (typeof a === 'string') {
        a = a.replace(/[^\d.-]/g, '') * 1;
      }
      if (typeof b === 'string') {
        b = b.replace(/[^\d.-]/g, '') * 1;
      }
      return a + b;
    }, 0);
  });


  var dataTable = $('#invoiceReports').DataTable({
    dom: 'lBfrtip',
    "footerCallback": function(row, data, start, end, display) {
      var api = this.api();
      $(api.column(2).footer()).html(api.column(2, {
        page: 'current'
      }).data().sum().toFixed(2));
      $(api.column(3).footer()).html(api.column(3, {
        page: 'current'
      }).data().sum().toFixed(2));
      $(api.column(4).footer()).html(api.column(4, {
        page: 'current'
      }).data().sum().toFixed(2));
    },
    buttons: [{
        extend: 'csvHtml5',
        filename: 'CSV-' + new Date().toLocaleDateString(),
        text: "CSV",
        className: 'btn btn-primary w-5 mx-2',

      }, {
        extend: 'excel',
        filename: 'Excel-' + new Date().toLocaleDateString(),
        text: "EXCEL",
        className: 'btn btn-secondary w-5 mx-2',
        messageTop: 'Invoice Report',
        title: '',
        customize: function(xlsx) {
          var sheet = xlsx.xl.worksheets['sheet1.xml'];
          var col1 = '';

          var rows = $('row', sheet);
          var sums = [];

          // Start iterating from the third row
          for (var i = 2; i < rows.length; i++) {
            var rowData = rows.eq(i).children('c');
            var columns = rowData.length;
            if (sums.length === 0) {
              sums = new Array(columns).fill(0); // Initialize array with zeros
            } else if (sums.length !== columns) {
              sums.length = columns; // Update length of sums array
              sums.fill(0); // Reset all values to 0
            }
            rowData.each(function(cellIndex) {
              if (cellIndex >= 5 && cellIndex <= 8 && $(this).text()) {
                sums[cellIndex] += parseFloat($(this).text());
              }
            });
          }


          var sumsRow = '<row>';
          sumsRow += '<c s="header" t="s"><v>TOTAL</v></c>';
          sumsRow += '<c s="header" t="n"><v></v></c>';
          sumsRow += '<c s="header" t="n"><v></v></c>';
          sumsRow += '<c s="header" t="n"><v></v></c>';
          sumsRow += '<c s="header" t="n"><v></v></c>';
          for (var j = 5; j <= 8; j++) {
            sumsRow += '<c s="header" t="n" style="text-align:right;"><v>' + PHP(sums[j]).format() +
              '</v></c>';
          }
          sumsRow += '</row>';
          $('sheetData', sheet).append(sumsRow);

        }
      },
      {
        extend: 'pdfHtml5',
        text: "PDF",
        filename: 'PDF-' + new Date().toLocaleDateString(),
        className: 'btn btn-success w-5 mx-2',
        title: 'Invoice Reports',
        footer: true,
        customize: function(doc) {
          var col1 = '';
          doc.content[1].table.body.forEach(function(row, rowIndex) {
            if (rowIndex > 0) { // Exclude first row
              row.forEach(function(cell, cellIndex) {
                if (cellIndex >= 5 && cellIndex <= 8) { // Columns 5, 6, 7, 8
                  cell.alignment = 'right';

                }


              });
            }
          });

          var rows = doc.content[1].table.body;
          var columns = rows[0].length;
          var sums = new Array(columns).fill(0); // Initialize array with zeros
          for (var i = 1; i < rows.length; i++) {
            var rowData = rows[i];

            for (var j = 0; j < rowData.length; j++) {
              var colData = rowData[j];
              // Do something with the column data, e.g. add to the sum
              if (j >= 5 && j <= 8 && colData) {
                sums[j] += parseFloat(colData.text.replaceAll(',', ''));
              }
            }
          }
          // Add the sums row to the table
          var sumsRow = new Array(columns).fill("");
          sumsRow[0] = {
            text: "TOTAL",
            bold: true
          };
          for (var j = 5; j <= 8; j++) {
            sumsRow[j] = {
              text: PHP(sums[j]).format(),
              alignment: 'right',
              bold: true
            }; // Format the sum as a decimal number with two decimal places and align it to the right

          }
          rows.push(sumsRow);

          doc.pageOrientation = 'landscape';
          doc.pageSize = 'A4'; // set orientation to landscape

        }
      },
      {
        extend: 'print',
        text: "PRINT",
        filename: 'Print-' + new Date().toLocaleDateString(),
        className: 'btn btn-info w-5 mx-2',
        customize: function(win) {
          $(win.document.body).find('table').addClass('display').css('font-size', '12px');
          $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
            $(this).css('background-color', '#D0D0D0');
          });
          $(win.document.body).find('h1').html('<h2> <center>Invoice Reports </h2 > ');
          var style = $('<style>@page {size: landscape;} </style>');
          $(win.document.head).append(style);

          var table = $(win.document.body).find('table').first();
          var total1 = 0;
          var total2 = 0;
          var total3 = 0;
          var total4 = 0;
          table.find('tr').each(function() {
            var row = $(this);
            var col1 = parseFloat($('td', row).eq(5).text().replaceAll(',', ''));
            var col2 = parseFloat($('td', row).eq(6).text().replaceAll(',', ''));
            var col3 = parseFloat($('td', row).eq(7).text().replaceAll(',', ''));
            var col4 = parseFloat($('td', row).eq(8).text().replaceAll(',', ''));

            total1 += col1 ? col1 : 0;
            total2 += col2 ? col2 : 0;
            total3 += col3 ? col3 : 0;
            total4 += col4 ? col4 : 0;
          });
          table.append(
            '<tr><td></td><td></td><td></td><td></td><td class="fw-bold">Total:</td><td class="text-end fw-bold">' +
            PHP(total1).format() +
            '</td><td class="text-end fw-bold">' +
            PHP(total2).format() + '</td><td class="text-end fw-bold">' + PHP(total3).format() +
            '</td><td class="text-end fw-bold">' + PHP(total4).format() +
            '</td><td></td><td></td></tr>');
        },
      }
    ],
    "createdRow": function(row, data, dataIndex) {
      $(row).css('height', '50px');
      $(row).find('td').css('vertical-align', 'middle');
    },
    "columns": [{
        "title": "Invoice #"
      },
      {
        "title": "Status"
      },
      {
        "title": "Profile Name"
      },
      {
        "title": "Position"
      },
      {
        "title": "Discount Type"
      },
      {
        "title": "Discount Amount"
      },
      {
        "title": "Deductions Amount"
      },
      {
        "title": "Gross Amount"
      },
      {
        "title": "Net Amount"
      },
      {
        "title": "Date Created"
      },
      {
        "title": "Due Date"
      }
    ],
    "columnDefs": [{
        targets: [5, 6, 7, 8],
        className: 'text-end'
      },
      {
        targets: [9, 10],
        className: 'text-center'
      },
    ],

  });

  $(window).on('load', function() {
    $('div.spanner').addClass('show');

    $('html, body').animate({
      scrollTop: $('#loader_load').offset.top
    }, 'smooth');

    setTimeout(function() {
      $('div.spanner').removeClass('show');
      show_data_load()
    }, 2000);

  })

  let toast1 = $('.toast1');
  toast1.toast({
    delay: 3000,
    animation: true,

  });

  $('.close').on('click', function(e) {
    e.preventDefault();
    toast1.toast('hide');
  });
  $("#error_msg").hide();
  $("#success_msg").hide();

  $('#button-submit').on('click', function(e) {
    e.preventDefault();
    $('div.spanner').addClass('show');

    setTimeout(function() {
      $('div.spanner').removeClass('show');
      show_data_click();
    }, 1500);

  });

  function show_data_click(filters) {
    let from = $('#from').val();
    let to = $('#to').val();

    let filter = {
      fromDate: from,
      toDate: to,
      ...filters
    }
    axios.get(`${apiUrl}/api/reports/invoiceReport_click?${new URLSearchParams(filter)}`, {
      headers: {
        Authorization: token,
      },
    }).then(function(response) {
      let data = response.data;
      if (data.success) {
        let table = $('#invoiceReports').DataTable();
        table.clear().draw();
        if (data.data.length > 0) {
          console.log("success", data);
          data.data.map((item) => {


            let total_deductions = 0;
            let discountType = item.discount_type ? item.discount_type : "N/A";
            let dollarAmountofDisountTotal = 0;

            if (item.deductions.length > 0) {
              total_deductions = PHP(item.deductions[0].total_deductions).format();
            }

            if (item.discount_type === "Fixed") {
              discountType = item.discount_type;
              dollarAmountofDisountTotal = item.discount_total;
            } else if (item.discount_type === "Percentage") {
              discountType = item.discount_type + " (" + item.discount_amount + "%)";
              dollarAmountofDisountTotal = (item.discount_total * item.peso_rate) ? (item
                .discount_total * item.peso_rate) : "0.00";
            }

            let newRow = table.row.add([
              item.invoice_no,
              item.invoice_status,
              item.profile.user.first_name + " " + item.profile.user.last_name,
              item.profile.position,
              discountType,
              PHP(dollarAmountofDisountTotal).format(),
              total_deductions ? total_deductions : "0.00",
              PHP(item.converted_amount).format(),
              PHP(item.grand_total_amount).format(),
              moment.utc(item.created_at).tz('America/New_York').format('MM/DD/YYYY'),
              // moment(item.created_at).format("L"),
              moment(item.due_date).format("L"),
            ]).draw().node();
            // add class to invoice status cell based on its value
            let invoiceStatusCell = $(newRow).find("td:eq(1)");
            if (item.invoice_status == "Paid") {
              invoiceStatusCell.css("background-color", "green");
              invoiceStatusCell.css("color", "white");
            } else if (item.invoice_status == "Pending") {
              invoiceStatusCell.css("background-color", "yellow");
              invoiceStatusCell.css("color", "black");
            } else {
              invoiceStatusCell.css("background-color", "red");
              invoiceStatusCell.css("color", "white");
            }

          })
        }
      }
    }).catch(function(error) {
      console.log("error", error);
      if (error.response.data.errors) {
        let errors = error.response.data.errors;
        let fieldnames = Object.keys(errors);
        Object.values(errors).map((item, index) => {
          fieldname = fieldnames[0].split('_');
          fieldname.map((item2, index2) => {
            fieldname['key'] = capitalize(item2);
            return ""
          });
          fieldname = fieldname.join(" ");
          $('.toast1 .toast-title').html("Invoice Reports");
          $('.toast1 .toast-body').html(Object.values(errors)[
              0]
            .join(
              "\n\r"));
        })
        toast1.toast('show');
      }
    });
  }

  function show_data_load() {
    axios.get(apiUrl + '/api/reports/invoiceReport_load', {
      headers: {
        Authorization: token,
      },
    }).then(function(response) {
      let data = response.data;
      if (data.success) {
        let table = $('#invoiceReports').DataTable();
        table.clear().draw();
        if (data.data.length > 0) {
          console.log("success", data);
          data.data.map((item) => {
            let total_deductions = 0;
            let discountType = item.discount_type ? item.discount_type : "N/A";
            let dollarAmountofDisountTotal = 0;

            if (item.deductions.length > 0) {
              total_deductions = PHP(item.deductions[0].total_deductions).format();
            }

            if (item.discount_type === "Fixed") {
              discountType = item.discount_type;
              dollarAmountofDisountTotal = item.discount_total;
            } else if (item.discount_type === "Percentage") {
              discountType = item.discount_type + " (" + item.discount_amount + "%)";
              dollarAmountofDisountTotal = (item.discount_total * item.peso_rate) ? (item
                .discount_total * item.peso_rate) : "0.00";
            }


            let newRow = table.row.add([
              item.invoice_no,
              item.invoice_status,
              item.profile.user.first_name + " " + item.profile.user.last_name,
              item.profile.position,
              discountType,
              PHP(dollarAmountofDisountTotal).format(),
              total_deductions ? total_deductions : "0.00",
              PHP(item.converted_amount).format(),
              PHP(item.grand_total_amount).format(),
              moment.utc(item.created_at).tz('America/New_York').format('MM/DD/YYYY'),
              // moment(item.created_at).format("L"),
              moment(item.due_date).format("L"),
            ]).draw().node();
            // add class to invoice status cell based on its value
            let invoiceStatusCell = $(newRow).find("td:eq(1)");
            if (item.invoice_status == "Paid") {
              invoiceStatusCell.css("background-color", "green");
              invoiceStatusCell.css("color", "white");
            } else if (item.invoice_status == "Pending") {
              invoiceStatusCell.css("background-color", "yellow");
              invoiceStatusCell.css("color", "black");
            } else {
              invoiceStatusCell.css("background-color", "red");
              invoiceStatusCell.css("color", "white");
            }
          })
        }
      }
    }).catch(function(error) {
      console.log("error", error);
    });
  }

  function capitalize(s) {
    if (typeof s !== 'string') return "";
    return s.charAt(0).toUpperCase() + s.slice(1);
  }
})
</script>
@endsection
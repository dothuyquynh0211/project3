@extends('backend.layout.master')
@section('title', 'Trang chủ Admin')

@section('content')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    </style>
<link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css" />
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div>
                    <div class="form-group">
                        <label>Danh sách hoá đơn </label>
                    </div>
                    <table class="table table-hover" id="student_tbl">
                        <thead>
                            <th> Mã</th>
                            <th> Tên khách hàng</th>
                            <th> Địa chỉ</th>
                            <th> Thành tiền </th>
                            <th> Trạng thái</th>
                            <th> Ngày tạo </th>
                            <th>Status</th>
                            <th>action</th>
                        </thead>
                        <tbody id="invoice_table">
                            
                          
                                                               
                           
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function handleUpdate(id, status) {
            // console.log(id);
            var answer = null;
            switch (status) {
                case 0:
                    answer = confirm('Bạn có muốn huỷ đơn không ?');
                    break;
                case 2:
                    answer = confirm('Bạn muốn duyệt đơn ');
                    break;
                default:
                    break;
            }
            if (!answer) {
                return false;
            }
            $.ajax({
                url: `/admin/invoice/update/${id}/${status}`,
                type: "get",
            }).done(function(ketqua) {
                $('#invoice_table').html(ketqua);
            });
        }

        $.ajax({
            url: `/admin/invoice/update/0/0`,
            type: "get",
        }).done(function(ketqua) {
            $('#invoice_table').html(ketqua);
        });
    </script>

   
                        
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script>
      $(document).ready( function () {
      $('#student_tbl').DataTable();
  } );
      </script>

                  
@endsection

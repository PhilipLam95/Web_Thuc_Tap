<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản Lý STUDIO CUNG CẤP ĐỒ GỖ</title>
    <base href="{{asset('http://localhost/Web_Thuc_Tap/public/') }}"/>
    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <link rel="stylesheet" href="ssi-modal/styles/ssi-modal.css"/>

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="admin/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
     {{-- ssi-modal --}}
     <script src="ssi-modal/js/ssi-modal.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              
                <a class="navbar-brand" href="index.html"> TRANG QUẢN TRỊ</a>
            </div>
         
            <ul class="nav navbar-top-links navbar-right">
                    @include('Manager.dropdown');
                <!-- /.dropdown -->
            </ul>
          

                    @include('Manager.Menu')            <!-- /.navbar-static-side -->
        </nav>

        @yield('content_manager')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="admin/vendor/raphael/raphael.min.js"></script>
    <script src="admin/vendor/morrisjs/morris.min.js"></script>
    <script src="admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>


      <!-- DataTables JavaScript -->
    <script src="admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    




    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

        $('#type').on('change',function(e)
        {
            console.log(e);
            var id =  e.target.value;

            //ajax
            $.get('dashboard/select_typechild/'+id,function(data){

            $('#show_product').empty();
            $.each(data,function(key,value){
                console.log(data);
            $('#show_product').append('<option value="'+value.id+'">'+value.name_type+'</option>')
            });
            });
        })

        $('#name').on('change',function(e)
        {
            var id = e.target.value;
            var route = "{{route('post_import_ware','id_sp')}}"; 
            route = route.replace('id_sp',id);
            $.get('dashboard/select_product/'+id,function(data)
            {
                $('.soluong_nhap').empty();
                $('.loai_sanpham').empty();
                $('.nhap').empty();
                $('.gia_nhap').empty();
                $.each(data,function(key,value)
                {
                    console.log(data);
                    $('.soluong_nhap').append('<input  class="form-control" name="import_quantity" value="'+value.import_quantity+'" placeholder="Số lượng nhập"  />');
                    $('.loai_sanpham').append('<input  class="form-control" name="type_child" placeholder="Loai sản phẩm" value="'+value.name_type+'" disabled="" />');
                    $('.gia_nhap').append('<input  class="form-control" name="import_price" value="'+value.import_price+'" placeholder="Gía nhập"  required="" />');
                    $('.nhap').append('<a href="'+ route+'" style="color:white;margin-right:10px;margin-top:-30px;" class="btn btn-primary" >Nhập</a>')


                });
            });
        })
    </script>
    <script>
// Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
    </script>

</body>

</html>

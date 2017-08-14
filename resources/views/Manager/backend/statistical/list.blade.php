  @extends('Manager.manager')     
@section('content_manager')


  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Danh sách thu chi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{route('process')}}">Tổng quan</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Thu chi
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h2>Danh sách sản phẩm nhập </h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID_PRODUCT</th>
                                        <th style="width:200px">TÊN SẢN PHẨM</th>
                                        <th> SỐ LƯỢNG NHẬP</th>
                                         <th>CÒN LẠI</th>
                                        <th>GIÁ NHẬP</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($import_products as $import_product)
                                    <tr>
                                        <td>{{ $import_product->id_product}}</td>
                                        <td>{{ $import_product->Name_Product}}</td>
                                        <td>{{ $import_product->import_quantity}}</td>
                                         <td>{{ $import_product->redisual_quantity}}</td>
                                        <td>{{ $import_product->import_price}}</td>
                                       
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Danh sach sản phẩm </h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID_PRODUCT</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th> SỐ LƯỢNG BAN</th>
                                        <th>GIÁ BAN</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id}}</td>
                                        <td>{{ $product->name}}</td>
                                        <td>{{ $product->sale_quantity}}</td>
                                        <td>{{ $product->unit_price}}</td>
                                        
                                    </tr>
                                 @endforeach
                                </tbody>
                                   
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h2>Sản phẩm bán nhiều nhất</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID_PRODUCT</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th> SỐ LƯỢNG BAN</th>
                                        <th>GIÁ BAN</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($best_product as $best)
                                    <tr>
                                        <td>{{ $best->id}}</td>
                                        <td>{{ $best->name}}</td>
                                        <td>{{ $best->sale_quantity}}</td>
                                        <td>{{ $best->unit_price}}</td>
                                        
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Sản phẩm hết hàng</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID_PRODUCT</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th> TRẠNG THÁI</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ends as $end)
                                    <tr>
                                        <td>{{ $end->id_product}}</td>
                                        <td>{{ $end->Name_Product}}</td>
                                        <td>HẾt HÀNG</td>
                                        
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h2>Doanh thu từng sản phẩm</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                   <tr>
                                        <th style="width: 20px">ID_sp</th>
                                        <th style="width:159px">TÊN SẢN PHẨM</th>
                                        <th>Số lượng bán</th>
                                        <th>Lãi / Lỗ</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($counts as $count)
                                    <tr>
                                        <td>{{ $count->id_product}}</td>
                                        <td>{{ $count->name}}</td>
                                        <td>{{ $count->sale_quantity}}</td>
                                        @if( (($count->sale_quantity) * ($count->unit_price))
                                        	< (($count->import_price)*($count->import_quantity)))
                                        <td> Lỗ : {{ number_format((($count->import_price)*($count->import_quantity)) - (($count->sale_quantity) * ($count->unit_price))) }}  VND</td>	
                                       	@else
                                       	<td> Lãi: {{ number_format((($count->sale_quantity) * ($count->unit_price)) - (($count->import_price)*($count->import_quantity))) }}  VND</td>		
                                       	@endif
                                    </tr>
                                 @endforeach
                                </tbody>
                                   
                            </table>
                        </div>
                    </div>
                    <div class="row">
	                    <div class="col-lg-6">
	                        <h2>Tổng doanh thu</h2>
	                       <p>Tống giá đã bán được: <a> {{ number_format($totals->saleTotal) }} VND</a></p>
	                       <p>Tống giá nhập sản phẩmc: <a> {{ number_format($totals->importTotal) }} VND</a></p>
	                       @if($totals->saleTotal < $totals->importTotal)
	                       	<h2>  Lỗ: {{  number_format(($totals->importTotal)- ($totals->saleTotal)) }}  VND</h2>
	                       @else  
	                       	<h2>  Lãi : {{ number_format(($totals->saleTotal)- ($totals->importTotal)) }} VND </h2>
	                       @endif
	                    </div>
	                </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
 @endsection
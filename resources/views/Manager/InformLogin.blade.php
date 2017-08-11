<div class="row">
            @if(Auth::check())
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Thông tin tài khoản của bạn
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example" >
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Full_Name</th>
                                                <th>Email</th>
                                                <th>Loại tài khoản</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{Auth::user()->id}}</td>
                                                <td>{{Auth::user()->full_name}}</td>
                                                <td>{{Auth::user()->email}}</td>
                                                 @if(Auth::user()->group == 1)
                                                 <td>Nhân viên</td>
                                                 @else
                                                 <td>Admin</td>
                                                 @endif

                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            <!-- /.table-responsive -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            @endif
                <!-- /.col-lg-6 -->
               
                <!-- /.col-lg-6 -->
            </div>
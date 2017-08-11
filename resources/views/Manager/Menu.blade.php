
    <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav in" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input class="form-control" type="text" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{route('process')}}"><i class="fa fa-dashboard fa-fw"></i>Tổng quan</a>
                            </li>
                            <li >
                                <a href="{{route('list_products')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Sản phẩm</a>
                                  
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Loại sản phâm<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" >
                                        <li>
                                            <a href="{{route('big_type')}}">Các loại  nội thất</a>
                                        </li>
                                        <li>
                                            <a href="{{route('small_type')}}"> Các loại  sản phẩm</a>
                                        </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="{{route('warehouse')}}"><i class="fa fa-edit fa-fw"></i> Kho hàng</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Tài Khoản<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="{{route('admin')}}">Admin</a>
                                    </li>
                                    <li>
                                        <a href="{{route('employee')}}">Nhân Viên</a>
                                    </li>
                                    <li>
                                        <a href="{{route('customer')}}">Khách hàng</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Đơn Đặt hàng</a>
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Bình luận khách hàng</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="blank.html">Blank Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login Page</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Thống kê</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
    </div>

@extends('admin.layouts.masterad')
@section('title', 'DASH BOARD')
@section('content')

    <div class="wrapper-for-indexdashboard" id="wrapper">

        <div class="content" id="content">

            <div id="page-wrapper">
                <div class="row">
                    {{-- <div class="col-lg-12">
                        <h1 class="title-asum">THỐNG KÊ </h1>
                    </div>
                    <hr> --}}
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">

                    {{-- Đơn Hàng --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded">add_shopping_cart</i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Đơn Hàng Mới!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Chi Tiết</span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- Tổng tất cả sản phẩm có trong kho --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded">warehouse</i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>Hàng Trong Kho!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Chi Tiết</span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="material-symbols-rounded">data_thresholding</span>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>Đơn Hàng Mới!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="">Chi Tiết</a></span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="">Chi Tiết</a></span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>Hàng Trong Kho!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="">Chi Tiết</a></span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Người Dùng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Chi Tiết</span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Lượt Truy Cập!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Chi Tiết</span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-symbols-rounded"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Chi Tiết</span>
                                    <span class="pull-right"><i class="material-symbols-rounded"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-8">

                        <div class="container">
                            <h1>Top Sản Phẩm Bán Chạy Nhất</h1>
                            <table class="product-table">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Danh Mục</th>
                                        <th>Số Lượng Bán</th>
                                        <th>Technology</th>
                                        <th>Tickets</th>
                                        <th>Sales</th>
                                        <th>Earnings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ihpone 16 nffiuádhfsdffiuádhfsdiuádhfsdffiuádhfsdhfsdhio</td>
                                        <td>SmartPhone</td>
                                        <td>43</td>
                                        <td>Angular</td>
                                        <td>46</td>
                                        <td>356</td>
                                        <td>$2850.06</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">


                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="comments-section">
                            <h2>Bình Luận Mới Nhất</h2>
                            <div class="comment">
                                <img src="user1.jpg" alt="User Profile" class="profile-pic">
                                <div class="comment-content">
                                    <h3>James Anderson <span class="status pending">Pending</span></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                    <span class="date">April 14, 2016</span>
                                </div>
                            </div>
                            <div class="comment">
                                <img src="user2.jpg" alt="User Profile" class="profile-pic">
                                <div class="comment-content">
                                    <h3>Michael Jorden <span class="status approved">Approved</span></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                    <span class="date">April 14, 2016</span>
                                </div>
                            </div>
                            <div class="comment">
                                <img src="user3.jpg" alt="User Profile" class="profile-pic">
                                <div class="comment-content">
                                    <h3>Johnathan Doeting <span class="status rejected">Rejected</span></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                    <span class="date">April 14, 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="comments-section">
                            <h2>Đánh Giá</h2>
                            <div class="comment">
                                <div class="comment-content">
                                    <h3>James Anderson <span class="status pending">Pending</span></h3>
                                    <p>Iphoen 16 pro max</p>
                                    <div class="d-flex flex-row my-3">
                                        <div class="text-warning mb-1 me-2">

                                              <i class="fa fa-star"></i>

                                              <i class="fas fa-star-half-alt"></i>

                                              <i class="far fa-star"></i>


                                        </div>

                                      </div>
                                    <span class="date">April 14, 2016</span>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment-content">
                                    <h3>Michael Jorden <span class="status approved">Approved</span></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                    <span class="date">April 14, 2016</span>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment-content">
                                    <h3>Johnathan Doeting <span class="status rejected">Rejected</span></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                    <span class="date">April 14, 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>

@endsection


<?php 
        include "./view/home/sideheader.php";
        ?>
        <!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Quản Lý Vé Xem Phim <span>/ Chi Tiết Hóa Đơn </span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-30">

                <!--Invoice Head Start-->
                <div class="col-12 mb-30">
                    <div class="invoice-head">
                        <h2 class="fw-700 mb-15">Hóa Đơn #IAD-01</h2>
                        <hr>
                        <div class="d-flex justify-content-between row mbn-20">
                            <!--Invoice Form-->
                            <div class="text-left col-12 col-sm-auto mb-20">
                                <h4 class="fw-600">Địa chỉ</h4>
                                <p> 77 trung tâm phía nam thứ bảy <br> Đường Bắc Hoa Kỳ -2455.<br>
                            +112 666 4558 99 <br>
                            
                            </div>
                            <!--Invoice To-->
                            <div class="text-left text-sm-right col-12 col-sm-auto mb-20">
                                <h4 class="fw-600">Tyler Meyer</h4>
                                <p>25 thứ bảy Trung tâm Bắc <br>Hoa Kỳ Đường Nam -3125. <br>
                            +112 666 4558 99 <br>
                            info@adomx.com</p>
                                    <p><span class="text-heading fw-600">Ngày lập hóa đơn:</span> ngày 11 tháng 3 năm 2019 <br>
                                        <span class="text-heading fw-600">Ngày đến hạn:</span> ngày 20 tháng 4 năm 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Invoice Head End-->

                <!--Invoice Details Table Start-->
                <div class="col-12 mb-30">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><span>Tên Phim </span></th>
                                    <th class="text-right"><span>Số lượng </span></th>
                                    <th class="text-right"><span>Đơn giá </span></th>
                                    <th class="text-right"><span>Tổng cộng </span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#01</td>
                                    <td>Latst Gaming Laptop</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">$1000</td>
                                    <td class="text-right">$5000</td>
                                </tr>
                                <tr>
                                    <td>#02</td>
                                    <td>Gaming Mouse Set</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">$100</td>
                                    <td class="text-right">$500</td>
                                </tr>
                                <tr>
                                    <td>#01</td>
                                    <td>Gaming Headset</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">$100</td>
                                    <td class="text-right">$500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Invoice Details Table End-->

                <!--Invoice Total Start-->
                <div class="col-12 d-flex justify-content-end mb-15">
                    <div class="text-right">
                        <h6>Tổng phụ: $6000</h6>
                        <h6>Thuế(10%): $600</h6>
                        <hr class="mb-10">
                        <h3 class="fw-600 mb-0">Tổng cộng: $6600</h3>
                    </div>
                </div>
                <!--Invoice Total Start-->

                <div class="col-12 mb-15">
                    <hr>
                </div>

                <!--Invoice Action Button Start-->
                <div class="col-12 d-flex justify-content-end mb-30">
                    <div class="buttons-group">
                        <button class="button button-outline button-primary">Tải PDF</button>
                        <button class="button button-outline button-info">Gửi Bản In</button>
                        <button class="button button-outline button-secondary">Quá Trình Thanh Toán</button>
                    </div>
                </div>
                <!--Invoice Action Button Start-->

            </div>

        </div><!-- Content Body End -->


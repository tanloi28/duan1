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
                        <h3>App <span>/ Todo List</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--App Todo List Start-->
                <div class="col-12">
                    <!--Todo List Wrapper Start-->
                    <div class="todo-list-wrapper">

                        <!--Todo List Menu Start-->
                        <div class="todo-list-menu">
                            <ul>
                                <li><a href="#"><i class="zmdi zmdi-star"></i> Stared</a></li>
                                <li><a href="#"><i class="zmdi zmdi-time-restore"></i> Yesterday</a></li>
                                <li><a href="#"><i class="zmdi zmdi-calendar"></i> Last 7 Days</a></li>
                                <li><a href="#"><i class="zmdi zmdi-calendar-check"></i> Last 30 Days</a></li>
                                <li><a href="#"><i class="zmdi zmdi-check-square"></i> Done</a></li>
                                <li><a href="#"><i class="zmdi zmdi-delete"></i> Trash</a></li>
                            </ul>
                        </div>
                        <!--Todo List Menu End-->

                        <!--Todo List Container Start-->
                        <div class="todo-list-container">

                            <!--Todo List Search Start-->
                            <div class="todo-list-search">
                                <form action="#">
                                    <button><i class="zmdi zmdi-search"></i></button>
                                    <input type="text" placeholder="Search To Do">
                                </form>
                            </div>
                            <!--Todo List Search End-->

                            <!--Todo List Start-->
                            <ul class="todo-list">
                                <li>
                                    <div class="list-action">
                                        <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                        <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                    <div class="list-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text.</p>
                                        <span class="time">Time: 03.00 pm (Today)</span>
                                    </div>
                                    <div class="list-action right">
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                </li>
                                <li class="done">
                                    <div class="list-action">
                                        <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                        <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                    <div class="list-content">
                                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                        <span class="time">Time: 03.00 pm (Today)</span>
                                    </div>
                                    <div class="list-action right">
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-action">
                                        <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                        <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                    <div class="list-content">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.</p>
                                        <span class="time">Time: 03.00 pm (Today)</span>
                                    </div>
                                    <div class="list-action right">
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-action">
                                        <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                        <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                    <div class="list-content">
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when.</p>
                                        <span class="time">Time: 03.00 pm (Today)</span>
                                    </div>
                                    <div class="list-action right">
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                </li>
                                <li class="done">
                                    <div class="list-action">
                                        <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                        <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                    <div class="list-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text.</p>
                                        <span class="time">Time: 03.00 pm (Today)</span>
                                    </div>
                                    <div class="list-action right">
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-action">
                                        <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                        <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                    <div class="list-content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
                                        <span class="time">Time: 03.00 pm (Today)</span>
                                    </div>
                                    <div class="list-action right">
                                        <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <!--Todo List End-->

                            <!--Add Todo List Start-->
                            <form action="#" class="todo-list-add-new">
                                <label class="status"><input type="checkbox"><i class="icon zmdi zmdi-star-outline"></i></label>
                                <input class="content" type="text" placeholder="Type new Task">
                                <button class="submit"><i class="zmdi zmdi-plus-circle-o"></i></button>
                            </form>
                            <!--Add Todo List End-->

                        </div>
                        <!--Todo List Container End-->

                    </div>
                    <!--Todo List Wrapper End-->
                </div>
                <!--App Todo List End-->

            </div>

            <!-- Modal -->
            <div class="compose-mail-modal modal fade" id="modal-compose-mail">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">New Message</h5>
                            <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close"></i></button>
                        </div>

                        <div class="form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-12 mb-30">
                                        <input class="form-control" type="email" placeholder="To">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <input class="form-control" type="email" placeholder="Bcc">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <textarea class="summernote"></textarea>
                                    </div>
                                    <div class="buttons-group col-12">
                                        <button type="button" class="button button-outline button-round button-warning"><i class="zmdi zmdi-attachment-alt"></i> Attach File</button>
                                        <button type="button" class="button button-outline button-round button-info">Save to Draft</button>
                                        <button type="button" class="button button-round button-primary">Send Mail</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- Content Body End -->

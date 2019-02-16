            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/assets/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo isset($user_name)?$user_name:'Hi Guest' ?></p>
                        </div>
                    </div> 
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="/">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li> 
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-group"></i>
                                <span>Seller</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="/pages/new/added/sellers"><i class="fa fa-angle-double-right"></i> New Added                                    
                                        <small class="badge pull-right bg-yellow"><?php echo isset($sellernew)?$sellernew:0; ?></small>    
                                    </a>
                                </li>
                                <li>
                                    <a href="/pages/list/sellers"><i class="fa fa-angle-double-right"></i> List                                                    
                                        <small class="badge pull-right bg-yellow"><?php echo isset($seller)?$seller:0; ?></small>
                                    </a>            
                                </li> 
                            </ul>
                        </li> 
                        <li>
                            <a href="/pages/list/buyer">
                                <i class="fa fa-list"></i> <span>Buyer List</span>
                                <small class="badge pull-right bg-yellow"><?php echo isset($buyer)?$buyer:0; ?></small>
                            </a>
                        </li> 
                        <li>
                            <a href="/pages/list/messages">
                                <i class="fa fa-envelope"></i> <span>Messages</span>
                                <small class="badge pull-right bg-yellow">0</small>
                            </a>
                        </li> 
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

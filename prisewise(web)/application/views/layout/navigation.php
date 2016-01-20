      <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">The Price Today</a>
            </div>
            <!-- /.navbar-header -->

             <ul class="nav navbar-top-links navbar-right">
                <li>
                    <h4>Hi <?php echo $this->session->userdata('username'); ?>!</h4>
                </li>
                <li>
                    <a class="glyphicon glyphicon-log-out" href="<?php echo base_url('users/logout'); ?>"> Logout</a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <li>
                            <a href="<?php echo base_url('users/Dashboard');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('home/latestUpdates');?>"><i class="fa fa-dashboard fa-fw"></i> Lastest Updates</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('home/Component');?>"><i class="fa fa-table fa-fw"></i> Components</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Components/users');?>"><i class="fa fa-table fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('province/Updates');?>"><i class="fa fa-table fa-fw"></i> Province's Price Update</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

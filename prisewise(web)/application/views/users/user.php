<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Component</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
	                
			  <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New User
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                       	 <form role="form" id="create-new-user-form" method="post">
                            	<div class="form-group">
                                	<label>Username</label>
                                	<input type="hidden" name="userID" class="form-control" id="userID"  value="" />                                	 	
                                	<input type="text" name="userNAME" class="form-control" id="userNAME"  />
                                	<span class="alert-danger" id="err-userNAME"></span>
                            	</div>
                                <div class="form-group">
                                    <label>Password</label>                                                                    
                                    <input type="password" name="userPASSWORD" class="form-control" id="userPASSWORD"  />
                                    <span class="alert-danger" id="err-userPASSWORD"></span>
                                </div>
                                <div class="form-group">
                                    <label>Employee Complete Name</label>                                                                    
                                    <input type="text" name="employeeName" class="form-control" id="employeeName"  />
                                    <span class="alert-danger" id="err-employeeName"></span>
                                </div>

                            	<button type="button" class="btn btn-default" id="save-new-user-form">Save</button>
                            	<button type="reset" class="btn btn-default">Reset</button>
                            	 

                        	</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Table
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Employee Name</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                         <?php foreach ($userdata as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->userNAME; ?></td>
                                            <td><?php echo $data->employeeName; ?></td>
                                            <td>
                                                <a class="table-bnt" href="<?php echo base_url() . "components/deleteUser/" . $data->userID; ?>">
                                                <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                                </a>
                                                <a href="<?php echo base_url() . "components/editUser/" . $data->userID; ?>">
                                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Edit</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
			</div><!-- /.row -->

</div>
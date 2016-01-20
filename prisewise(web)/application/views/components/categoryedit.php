<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Component</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
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
                                            <th>Name</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                         <?php foreach ($category as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->categoryNAME; ?></td>
                                            <td>
                                            	<a class="table-bnt" href="<?php echo base_url() . "components/deleteCategory/" . $data->categoryID; ?>">
                                            	<button type="button" class="btn btn-danger btn-xs">Delete</button>
                                            	</a>
                                         		<a href="<?php echo base_url() . "components/editCategory/" . $data->categoryID; ?>">
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
			  <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                       	 <form role="form" id="create-new-category-form" method="post">
                            	<div class="form-group">
                                	<label>Edit Category Name</label>
                                	 <?php foreach ($categorydata as $datas => $data): ?>
                                	 	
                                	<input type="hidden" name="categoryid" value=" <?php echo $data->categoryID; ?>"  />
                                	<input type="text" name="category" class="form-control" id="category"  value=" <?php echo $data->categoryNAME; ?>" />
                                	<span class="alert-danger" id="err-category"></span>
                            	</div>
                            	<button type="button" class="btn btn-default" id="save-new-category-form">Save</button>
                            	<button type="reset" class="btn btn-default">Reset</button>
                            	 
                                <?php endforeach; ?>
                        	</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
			</div><!-- /.row -->

</div>
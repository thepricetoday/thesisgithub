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
                                            <th>City/Province</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                         <?php foreach ($place as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->placeNAME; ?></td>
                                            <td>
                                                <a class="table-bnt" href="<?php echo base_url() . "components/deletePlace/" . $data->ID; ?>">
                                                <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                                </a>
                                                <a href="<?php echo base_url() . "components/editPlace/" . $data->ID; ?>">
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
                            Add City/Province
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                       	 <form role="form" id="create-new-place-form" method="post">
                            	<div class="form-group">
                                	<label>Name of New City/Province</label>
                                     <?php foreach ($placedata as $datas => $data): ?>
                                	<input type="hidden" name="ID" class="form-control" id="ID"  value="<?php echo $data->ID; ?>" />                                	 	
                                	<input type="text" name="placeNAME" class="form-control" id="placeNAME" value="<?php echo $data->placeNAME; ?>" />
                                	<span class="alert-danger" id="err-placeNAME"></span>
                                     <?php endforeach; ?>
                            	</div>
                            	<button type="button" class="btn btn-default" id="save-new-place-form">Save</button>
                            	<button type="reset" class="btn btn-default">Reset</button>
                            	 

                        	</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
			</div><!-- /.row -->

</div>
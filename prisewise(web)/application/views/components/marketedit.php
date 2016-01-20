<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Market Component</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
	                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Market
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Full Address</th>
                                            <th>Longitude value</th>
                                            <th>Latitude value</th>
                                            <th>Province/City</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                         <?php foreach ($marketdata as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->marketNAME; ?></td>
                                            <td><?php echo $data->Address; ?></td>
                                            <td><?php echo $data->latitude; ?></td>
                                            <td><?php echo $data->longitude; ?></td>
                                            <td><?php echo $data->placeName; ?></td>
                                            <td>
                                            	<a class="table-bnt" href="<?php echo base_url() . "components/deleteMarket/" . $data->marketID; ?>">
                                            	<button type="button" class="btn btn-danger btn-xs">Delete</button>
                                            	</a>
                                         		<a href="<?php echo base_url() . "components/editMarket/" . $data->marketID; ?>">
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
			  <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Market Info 
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                       	 <form role="form" id="create-new-market-form" method="post">
                          <?php foreach ($marketdata as $datas => $data): ?>
                            	<div class="form-group">
                                	<label>Name of New Market</label>
                                	<input type="hidden" name="marketID" class="form-control" id="marketID"  value="<?php echo $data->marketID; ?>" />                                	 	
                                	<input type="text" name="marketNAME" class="form-control" id="marketNAME" value="<?php echo $data->marketNAME; ?>"  />
                                	<span class="alert-danger" id="err-marketNAME"></span>
                            	</div>
                                <div class="form-group">
                                    <label>Full Address</label>                         
                                    <input type="text" name="address" class="form-control" id="address"  value="<?php echo $data->Address; ?>" />
                                    <span class="alert-danger" id="err-address"></span>
                                </div>
                                <div class="form-group">
                                    <label>Longitude Value</label>                                      
                                    <input type="text" name="longitude" class="form-control" id="longitude" value="<?php echo $data->longitude; ?>" />
                                    <span class="alert-danger" id="err-longitude"></span>
                                </div>
                                <div class="form-group">
                                    <label>Latitude Value</label>                                       
                                    <input type="text" name="latitude" class="form-control" id="latitude" value="<?php echo $data->latitude; ?>" />
                                    <span class="alert-danger" id="err-latitude"></span>
                                </div>
                                <div class="form-group">
                                            <label>Provience/City</label>
                                            <select class="form-control" name="place"  id="place">
                                                <option value="<?php echo $data->ID; ?>"selected><?php echo $data->placeName; ?></option>
                                                <?php foreach ($placedata as $datas => $data): ?>  
                                                <option  value="<?php echo $data->ID; ?>"><?php echo $data->placeNAME; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-place"></span>
                                        </div>
                            	<button type="button" class="btn btn-default" id="save-new-market-form">Save</button>
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
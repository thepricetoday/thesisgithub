<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Province's SRP</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
 
<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Infomation
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="panel-body ">
                            <div class="table-responsive">
                                
                                  <table class="table">
                                    <tbody>
                                         <?php foreach ($province as $datas => $data): ?> 
                                        <tr>
                                            <td><strong>ID</strong></td>
                                            <td><?php echo $data->province_updateID; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date Updated</strong></td>
                                            <td><?php echo $data->date; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Province</strong></td>
                                            <td><?php echo $data->placeName; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>   
                               </div>
                               </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
</div>            
<div class="row">
	                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                            
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                         <?php foreach ($provincedata as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->name; ?></td>
                                            <td><?php echo $data->price; ?>/<?php echo $data->unitofmeasure; ?></td>
                                            <td>
                                            	<a class="table-bnt" href="<?php echo base_url() . "province/deleteProvincePriceUpdate/" . $data->province_price_updateID . "/". $data->province_updateID; ?>">
                                            	<button type="button" class="btn btn-danger btn-xs">Delete</button>
                                            	</a>
                                         		<a href="<?php echo base_url() . "province/editProvincePriceUpdate/" . $data->province_price_updateID . "/". $data->province_updateID; ?>">
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
                            Edit
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                         <form role="form" id="create-new-priceupdate-form" method="post">
                         <div class="form-group">
                                             <?php foreach ($province as $datas => $data): ?> 
                                                <input type="hidden" name="province_updateID" class="form-control" id="province_updateID" value="<?php echo $data->province_updateID; ?>"  />
                                                <?php endforeach; ?>
                                               <?php foreach ($province_price_update as $datas => $dta): ?> 
                                               <input type="hidden" name="province_price_updateID" class="form-control" id="province_price_updateID" value="<?php echo $dta->province_price_updateID; ?>"  />
                                                <?php endforeach; ?>
                                            <label>Selects Product</label>
                                            <select class="form-control" name="productID"  id="productID">
                                                 <?php foreach ($province_price_update as $datas => $dta): ?> 
                                                <option selected value="<?php echo $dta->productID; ?>"><?php echo $dta->name;?></option>
                                                <?php endforeach; ?>
                                                <?php foreach ($product as $datas => $data): ?>
                                                <option value="<?php echo $data->productID; ?>"><?php echo $data->name;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-productID"></span>
                                        </div>
                                        <div class="form-group ">
                                            <label>Price</label>
                                             <?php foreach ($province_price_update as $datas => $dta): ?> 
                                            <input type="text" name="price" class="form-control" id="price" value="<?php echo $dta->price; ?>" />
                                            <?php endforeach; ?>
                                            <span class="alert-danger" id="err-price"></span>
                                        </div>
                                        <div class="form-group ">
                                            <label>Unit of Measure</label>
                                            <select class="form-control" name="unitofmeasureID"  id="unitofmeasureID">
                                             <?php foreach ($province_price_update as $datas => $dta): ?> 
                                                <option selected value="<?php echo $dta->unitofmeasureID; ?>"><?php echo $dta->unitofmeasure;?></option>
                                                <?php endforeach; ?>
                                                <?php foreach ($unitofmeasure as $datas => $data): ?>
                                                <option value="<?php echo $data->unitofmeasureID; ?>"><?php echo $data->unitofmeasure;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-unitofmeasureID"></span>
                                        </div>                             
                                <button type="button" class="btn btn-default" id="save-new-priceupdate-form">Save</button>
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
<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Price Watch</h1>
                     <h1 class="page-header-date"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                    <form role="form"  method="post" action="<?php echo base_url('province/Upload');?>">
                        <div class="panel-heading">
                             <div class="form-group">
                             <label>Start Date</label>
                        <input type="date" name="date_start" class="form-control" id="date_start">
                        <span class="alert-danger" id="err-date_start"></span>
                        </div>
                        <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="date_end" class="form-control" id="date_end">
                        <span class="alert-danger" id="err-date_end"></span>
                        </div>
                        
                       
                        </div>
                        <div class="panel-body">
                             <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Date Updated</th>
                                            <th>Province</th>
                                            <th>View Detailed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($latest as $datas => $data): ?>      
                                        <tr>
                                            <td><div class="checkbox">
                                                <label>
                                                    <input name="province_updateID[]" id="province_updateID"  type="checkbox" value="<?php echo $data->province_updateID; ?>">
                                                </label>
                                            </div></td>
                                            <td><?php echo $data->province_updateID; ?></td>
                                            <td><?php echo $data->date; ?></td>
                                            <td><?php echo $data->placeName;?></td>
                                            <td>
                                                <a href="<?php echo base_url() . "province/viewCategory/" . $data->province_updateID; ?>">
                                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">View</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <div class="panel-footer">
                            <tr><button type="submit" value="submit" class="btn btn-success" >Upload</button></tr>
                        </div>
                        </form>
                    </div>
                </div>
			</div>

	<!-- /.row -->

</div>
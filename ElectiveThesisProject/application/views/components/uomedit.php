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
                                            <th>Unit of Measure</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach ($uomdata as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->unitofmeasure;?></td>
                                            <td>
                                                <a class="table-bnt" href="<?php echo base_url() . "components/deleteUOM/" . $data->unitofmeasureID; ?>">
                                                <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                                </a>
                                                <a href="<?php echo base_url() . "components/editUOM/" . $data->unitofmeasureID; ?>">
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
                            Add Category
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                         <form role="form" id="create-new-unitofmeasure-form" method="post">
                                <div class="form-group">
                                <?php foreach ($uom as $datas => $data): ?>
                                    <label>Name of New Category</label>
                                    <input type="hidden" name="unitofmeasureID" class="form-control" id="unitofmeasureID"  value="<?php echo $data->unitofmeasureID;  ?>" />                                        
                                    <input type="text" name="unitofmeasure" class="form-control" id="unitofmeasure" value="<?php echo $data->unitofmeasure; ?>"  />
                                    <span class="alert-danger" id="err-unitofmeasure"></span>
                                </div>
                                <button type="button" class="btn btn-default" id="save-new-unitofmeasure-form">Save</button>
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



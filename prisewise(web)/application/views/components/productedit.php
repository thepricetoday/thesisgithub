<div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Component</h1>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Delete/Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                         <?php foreach ($productdata as $datas => $data): ?>      
                                        <tr>
                                            <td class="product"><img class="img_product" src="<?php echo $data->imageURL; ?>" alt="<?php echo $data->name; ?>"></td>
                                            <td><?php echo $data->name; ?></td>
                                            <td><?php echo $data->description; ?></td>
                                            <td><?php echo $data->categoryNAME; ?></td>
                                            <td>
                                                <a class="table-bnt" href="<?php echo base_url() . "components/deleteProduct/" . $data->productID; ?>">
                                                <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                                </a>
                                                <a href="<?php echo base_url() . "components/editProduct/" . $data->productID; ?>">
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
                            Add Market
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                         <form role="form" id="create-new-product-form" method="post">
                                <div class="form-group">
                                <?php foreach ($product as $datas => $data): ?>
                                    <label>Name of New Product</label>
                                    <input type="hidden" name="productID" class="form-control" id="productID"  value="<?php echo $data->productID; ?>" />                                      
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $data->name; ?>" />
                                    <span class="alert-danger" id="err-name"></span>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>                         
                                    <input type="text" name="description" class="form-control" id="description" value="<?php echo $data->description; ?>" />
                                    <span class="alert-danger" id="err-description"></span>
                                </div>
                                <div class="form-group">
                                    <label>Image Url</label>                                      
                                    <input type="text" name="imageURL" class="form-control" id="imageURL" value="<?php echo $data->imageURL; ?>" />
                                    <span class="alert-danger" id="err-imageURL"></span>
                                </div>
                                <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="categoryID"  id="categoryID">
                                                <option value="<?php echo $data->productID; ?>" selected><?php echo $data->categoryNAME; ?></option>
                                                <?php foreach ($categorydata as $datas => $data): ?>  
                                                <option  value="<?php echo $data->categoryID; ?>"><?php echo $data->categoryNAME; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-categoryID"></span>
                                        </div>
                                <button type="button" class="btn btn-default" id="save-new-product-form">Save</button>
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
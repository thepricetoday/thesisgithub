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
                        <div class="panel-heading">
                            <strong>Place: Cagayan De Oro City</strong>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Unit of Measure</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($latest as $datas => $data): ?>      
                                        <tr>
                                            <td><?php echo $data->name; ?></td>
                                            <td><?php echo $data->price; ?></td>
                                            <td><?php echo $data->unitofmeasure;?></td>
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
                <!-- /.col-lg-6 -->
			</div>

	<!-- /.row -->

</div>
            <div class="row">
            <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <?php foreach ($province_update_view as $datas => $data): ?>
                           <p><strong>Province:</strong> <?php echo $data->placeName; ?></p>
                            <?php endforeach; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($province_price_update_view as $datas => $data): ?>
                                        <tr>
                                            <td><?php echo $data->name; ?></td>
                                            <td><?php echo $data->price; ?>/<?php echo $data->unitofmeasure; ?></td>
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
            
            
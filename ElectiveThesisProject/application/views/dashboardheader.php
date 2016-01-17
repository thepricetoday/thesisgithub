 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php foreach ($price_update as $datas => $data): ?>
            <h3><strong>Date:</strong><?php echo date("F j", strtotime( $data->date_start)); ?>-<?php echo date("j, Y", strtotime($data->date_end)); ?></h3>
            <?php endforeach; ?>
            </div>
            <!-- /.row -->
           
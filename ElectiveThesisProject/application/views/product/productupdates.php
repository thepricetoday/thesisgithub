<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Price Updates</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="form-group">
                            <a href="javascript:void(0);" class="add_btn" title="Add field">Add Field<i class="fa fa-plus-circle"></i></a>
                            </div>                                      
                        </div>
                        <div class="panel-body">
                         <form role="form" class="form_wrapper" id="create-new-update-form" method="post">
                         <div class="row">
                            <div class="form-group col-md-4">
                                        <label>Provice/City</label>
                                            <select class="form-control" name="place"  id="place">
                                                <option>Select</option>
                                          <?php foreach ($place as $datas => $data): ?>
                                                <option value="<?php echo $data->ID; ?>"><?php echo $data->placeNAME;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-place"></span>
                                </div>
                                </div>
                            <div class="row">
                                    
                                     <div>
                                        <div class="form-group col-md-4">
                                            <label>Selects Product</label>
                                            <select class="form-control" name="productID[]"  id="productID">
                                                <option>Select</option>
                                                <?php foreach ($product as $datas => $data): ?>
                                                <option value="<?php echo $data->productID; ?>"><?php echo $data->name;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-productID"></span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Price</label>
                                            <input type="text" name="price[]" class="form-control" id="price"  />
                                            <span class="alert-danger" id="err-price"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Unit of Measure</label>
                                            <select class="form-control" name="unitofmeasureID[]"  id="unitofmeasureID">
                                                <option>Select</option>
                                                <?php foreach ($uom as $datas => $data): ?>
                                                <option value="<?php echo $data->unitofmeasureID; ?>"><?php echo $data->unitofmeasure;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="alert-danger" id="err-unitofmeasureID"></span>
                                        </div>                                                        
                                    </div>    
                            </div> <!-- /.row (nested) -->
                            
                        </div> <!-- /.panel-body -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-default" id="save-new-update-form">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->                                  
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript" >
    $(document).ready(function(){
    var maxField = 100; //Input fields increment limitation
    var addButton = $('.add_btn'); //Add button selector
    var wrapper = $('.form_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row"><div class="form-group col-md-4"><select class="form-control" name="productID[]"  id="productID"><option>Select</option><?php foreach ($product as $datas => $data): ?><option value="<?php echo $data->productID; ?>"><?php echo $data->name;?></option><?php endforeach; ?></select></div><div class="form-group col-md-4"><input class="form-control" name="price[]" class="form-control" id="price"></div><div class="form-group col-md-3"><select class="form-control" name="unitofmeasureID[]"  id="unitofmeasureID"><option>Select</option><?php foreach ($uom as $datas => $data): ?><option value="<?php echo $data->unitofmeasureID; ?>"><?php echo $data->unitofmeasure;?></option><?php endforeach; ?></select></div><a href="javascript:void(0);" class="remove_btn col-md-1 btn btn-danger btn-circle" title="Remove field"><i class="fa fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_btn', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    
});
</script>
                           
                          
                          
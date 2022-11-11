</div<html>
<head>
</head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bid - View Apply Bid</title>
</head>
<body>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-industry text-orange"></i>
                    <h3 class="box-title">View Apply Bid</h3>
                    <div class="box-tools">
                    </div>
                </div>



                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <form id="form_apply_bid" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="">
                                        
                                        <?php foreach(  $bid_details as $bid_detail  ){ ?>
                                        
                                        
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Full Name *</label>
                                                    <input type="text" value="<?php echo $bid_detail['fullname'] ?>" name="name" id="name" class="form-control" readonly>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Email *</label>
                                                    <input type="email" value="<?php echo $bid_detail['email'] ?>" name="email" id="email" class="form-control"readonly>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Organization *</label>
                                                    <input type="text" value="<?php echo $bid_detail['organization'] ?>" name="organization" id="organization" class="form-control"readonly>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Bids applied for *</label>
                                                    
                                                    <select name="bid" id="bid" class="form-control" required disabled>
                                                        <option value="" >Select Bid </option>
                                                        <?php foreach ($bids as $bid){  ?>
                                                        <option value="<?php echo $bid['id']; ?>"  <?php if ( $bid_detail['bid'] == $bid['id'] ) { echo 'selected'; } ?> ><?php echo $bid['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Address Residentials *</label>
                                                    <input type="text"  value="<?php echo $bid_detail['residential_address'] ?>"  name="add1" id="add1" class="form-control"readonly>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Address Official *</label>
                                                    <input type="text" value="<?php echo $bid_detail['official_address'] ?>"  name="add2" id="add2" class="form-control"readonly>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea name="description"  id="description" class="form-control" readonly><?php echo $bid_detail['description'] ?></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label" for="customFile">Upload Document *</label>
                                        <input type="file" class="form-control" id="upload" name="upload[]"  multiple>
                                        <div data-toggle="tooltip" title="Allowed file types - pdf/txt/doc" ><i  class="fa fa-info-circle" aria-hidden="true"></i></div>
                                        <div class="help-]block with-errors"></div>

                                        </div>  
                                        </div>

                                        </div> -->
                                          <!-- <div class="row">

                                        <div class="col-sm-12">
                                        <div class="form-group  pull-rights">
                                        <label><input type="checkbox" name="policy" id="policy" value="1" required> Accept the terms and Conditions</label>
                                        </div>
                                        </div>
                                        </div> -->

                                        <?php } ?>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group  pull-right">
                                                <a href="<?php echo base_url().'procurement_management/applybidgrid'?>" class="btn btn-success">close</a>
                                                    <!-- <button type="submit" id="save_pr_viva_data" class="btn btn-success">Save</button>&nbsp;                                                     -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>



                </div>
        </div>
      </div>


</section>



</body>
</html>
</div>>
</div<html>
<head>
</head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
</head>
<body>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-industry text-orange"></i>
                    <h3 class="box-title"><?php echo $pagetitle; ?></h3>
                    <div class="box-tools">
                    </div>
                </div>



                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <form id="form_apply_bid" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="<?php echo base_url($formUrl) ?>">
                                        <div class="row">
                                        <input type="hidden" value="<?php if($edit_status != "" ){ echo $edit_status; } ?>" name="edit_status" id="edit_status" class="form-control"required>
                                        <input type="hidden" value="<?php if($one_event != "" ){ echo $one_event[0]['id']; } ?>" name="eid" id="eid" class="form-control"required>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Event Title *</label>
                                                    <input type="text" value="<?php if($one_event != "" ){ echo $one_event[0]['title']; } ?>" name="title" id="title" class="form-control"required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Event Date *</label>
                                                    <input type="text" value="<?php if($one_event != "" ){ echo $one_event[0]['date']; } ?>" name="event_date" id="event_date" class="form-control datepicker" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Event Time *</label>
                                                    <input type="text" name="event_time" value="<?php if($one_event != "" ){ echo $one_event[0]['time']; } ?>" id="event_time" class="form-control datepicker" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="">Event Venue *</label>
                                                    <input type="text" value="<?php if($one_event != "" ){ echo $one_event[0]['venue']; } ?>" name="event_venue" id="event_venue" class="form-control"required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                </div>
                                        </div>
                                      

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Description *</label>
                                                    <textarea name="event_description" id="event_description" class="form-control"><?php if($one_event != "" ){ echo $one_event[0]['description']; } ?></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="uploaddiv" class="row">

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label" for="customFile">Upload Banner</label>
                                        <input type="file" class="form-control" id="upload" name="upload"  multiple>
                                        <div data-toggle="tooltip" title="Allowed file types - JPG/JPEG" ><i  class="fa fa-info-circle" aria-hidden="true"></i></div>
                                        <div class="help-]block with-errors"></div>

                                        </div>  
                                        </div>

                                        </div>
                                        

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group  pull-right">
                                                <a href="<?php echo base_url().'event_management/'?>" class="btn btn-danger">cancel</a>
                                                    <button type="submit" id="save_pr_viva_data" class="btn btn-success">Save</button>&nbsp;                                                    
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
</div>
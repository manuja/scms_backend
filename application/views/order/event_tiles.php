<html>

<head>
    <style>

#eventcard{
  height: 250px;  
}



    </style>
</head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Management</title>
</head>

<body>


  <section class="content">
    <div class="row">
      <?php
      $success = $this->session->userdata('success');
      if ($success != "") {
      ?>

        <div class="alert alert-success " role="alert">
          <?php echo $success; ?>
          <button type="button" id="alertbtt" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      $failure = $this->session->userdata('failure');
      if ($failure != "") {
      ?>
        <div class="alert alert-warning " role="alert">
          <?php echo $failure; ?>
          <button type="button" id="alertbtt" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="fa fa-industry text-orange"></i>
            <h3 class="box-title">Manage Events</h3>
            <div class="box-tools">
             
            </div>
          </div>

          <!-- 
                applybids
                  documents -->



          <div class="box-body" style="overflow-x: scroll">


            <div class="row">
              <div class="col-xs-4" style="padding-bottom: 10px;">



              </div>
            </div>


                <?php

                $i = 1;

                ?>

                <?php if (!empty($events)) {
                  foreach ($events as $event) {  ?>

<div class="col-xs-4">
<div id="eventcard"  class="card" >
  <img class="card-img-top" src="img_avatar1.png" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
</div>
</div>

                    <?php $i++; ?>

                  <?php }
                } else { ?>

                  <tr>
                    <td colspan="6">Records not found</td>
                  </tr>


                <?php } ?>

                <?php ?>






          









          </div>



        </div>
      </div>
    </div>


  </section>



</body>

</html>
</div>


</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title" id="statustitle">Delete Event</h4>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div class="box box-primary">


      <div class="box-body"> -->
        <div class="row">
          <div class="col-sm-12">

            <div class="panel panel-default">

              <div class="panel-body">

                <form id="eventdelete" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="<?php echo base_url('index.php/event_management/delete_events') ?>">



                  <div style="display:none" class="form-group">
                    <input type="hidden" value="" name="d_id" id="d_id" class="form-control" readonly>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Event Title</label>
                      <input type="text" name="d_title" id="d_title" class="form-control" readonly>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Event Date</label>
                      <input type="text" name="d_date" id="d_date" class="form-control" readonly>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  </div>


                  <div>

                    <h4>Are you sure want to delete this Event! </h4>

                  </div>
                  <div>
                    <div class="form-group  pull-right">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <button type="submit" id="save_pr_delete_data" class="btn btn-danger">Yes</button>&nbsp;
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>





      <!-- </div>
      </div> -->
      <div class="modal-footer">

      </div>
      </form>
    </div>
  </div>
</div>


</div>




<script>
   $(document).ready(function() {


      //Initiate date
      $('#event_date').datetimepicker({
         format: 'YYYY-MM-DD',
         minDate: new Date,
      });
      $('.timepicker').datetimepicker({
         format: 'LT',
      });


      $('#event_time').datetimepicker({
         format: 'hh:mm A'
      });


      var editstaus = $('#edit_status').val();

      if( editstaus == true ){

         //uploaddiv save_pr_viva_data

$('#title').prop("readonly", false);
$('#event_date').prop("readonly", false);
$('#event_time').prop("readonly", false);
$('#event_venue').prop("readonly", false);
$('#event_description').prop("readonly", false);
$('#save_pr_viva_data').attr('style','display: true');
$('#uploaddiv').attr('style','display: true');


}else{

   $('#title').prop("readonly", true);
$('#event_date').prop("readonly", true);
$('#event_time').prop("readonly", true);
$('#event_venue').prop("readonly", true);
$('#event_description').prop("readonly", true);
$('#save_pr_viva_data').attr('style','display: none');
$('#uploaddiv').attr('style','display: none');


}



   });


   $('#upload').change(function(){

fileName = document.querySelector('#upload').value;
extension = fileName.split('.').pop();



// console.log(extension);
console.log(fileName);
if( extension == 'jpg' || extension == 'jpeg'){

   file_name_text =  fileName.split('\\').pop();
   uploadstatus = true;


}else{

   swal('File Upload', 'File Upload failed ! Plese check you file format ', 'error');
   $('#upload').val("");

}




  
});




</script>
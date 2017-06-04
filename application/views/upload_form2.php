<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title; ?></title>
  </head>
  <body>
<h1>Upload multiple files</h1>
    <?php echo form_open_multipart();?>
      <p>Upload file(s):</p>
      <?php echo form_error('uploadedimages[]'); ?>
      <?php echo form_upload('uploadedimages[]','','multiple'); ?>
      <br />
      <br />
      <?php echo form_submit('submit','Upload');?>
    <?php echo form_close();?>
    <input type = "submit" value = "upload" />


  
    <!-- <form action = "<?php echo base_url()."index.php/upload2" ?>" method = "POST">
    <h1>Upload multiple files</h1>
     
      <p>Upload file(s):</p>
     
     
      <br />
      <br />
      <input type="file" name="uploadedimages[]" multiple="multiple">
    
        <input type = "submit" value = "upload" /> 
    </form> -->
  </body>
</html>

<!-- <h1>Upload multiple files</h1>
    <?php echo form_open_multipart();?>
      <p>Upload file(s):</p>
      <?php echo form_error('uploadedimages[]'); ?>
      <?php echo form_upload('uploadedimages[]','','multiple'); ?>
      <br />
      <br />
      <?php echo form_submit('submit','Upload');?>
    <?php echo form_close();?>
    <input type = "submit" value = "upload" />  -->
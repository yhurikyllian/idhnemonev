<html>
 
   <head> 
      <title>Upload Form</title> 
   </head>
	
   <body> 
      <!-- <?php echo $error;?>  -->
      <!-- <?php echo form_open_multipart('upload/do_upload');?>  -->
		<?php echo form_open_multipart('upload/tes');?> 
      
         <input type = "file" name = "userfile[]" size = "20" multiple="multiple" />
         <!-- <input type = "file" name = "userfile" size = "20" /> -->
         <!-- <input type ="text" name="shit"/> -->
         
         <input type = "submit" value = "upload" /> 
      </form> 
		
   </body>
	
</html>
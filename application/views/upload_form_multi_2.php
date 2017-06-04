<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<HTML>
<head>
<title>Welcome to CodeIgniter 3.X | Multiple Upload File</title>
</head>
<body>

<?php echo form_open_multipart('upload3/do_upload');?>

<h2>For Multiple Upload Codeigniter 3.X</h2>
<div style="border: 1px dotted #000;margin:10px 0;padding:10px;">
<input type="file" name="images[]" multiple="multiple" />
<input type="file" name="images[]"/>
<input type="file" name="images[]"/>
<input type="file" name="images[]"/>
<input type="file" name="images[]"/>
<input type="file" name="images[]"/>
<input type="text" name="input"/>
<input type="text" name="input2"/>
</div>

<br /><br />

<input type="submit" value="upload" name="upload" />

</form>

</body>
</HTML>

<?php
$msg=""; 
if (isset($_POST['submit'])){

    $fileName= $_FILES['file']['name'];
    $fileNameArr= explode(".", $fileName);
    if($fileNameArr[count($fileNameArr)-1]=='zip'){

        $fineName=$fileNameArr[0];
        $zip=new zipArchive();
        if($zip->open($_FILES['file']['tmp_name'])===TRUE){
            $rand=rand(111111111,999999999);
            $zip->extractTo("upload/$rand/");
            $zip->close();
            $files=scandir("upload/$rand/");

            foreach($files as $list ){
                if(strlen($list)>3){
                    $msg.="<img  width='100px' src='upload/$rand/$list'/>";
                }
                
             
                    

                }
        }  else{
            $msg ="some Thing wrong";
        }
    }else{
        $msg ="please select Zip file";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplaod and extra a Zib file</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

</head>
<body>
    <br/><br/>
    <div class="container">
    <div class="row">
    <div class="col-log-12">
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" require/>
        <input type="submit" name="submit" />

</form>
           </div>
           <div class="col-log-12">
           <?php
           echo $msg;
           ?>
            </div>
              </div>
             </div>

<!-- <scribt src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></scribt> -->

</body>
</html>
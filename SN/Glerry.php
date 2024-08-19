<?php
include "incl/head.php";
include "incl/class.php";
$msg=$title=$desc=$date=$img_img_name="";
if(isset($_POST['submit'])){
  $title=$_POST['title'];
  $desc=$_POST['description'];
  $date=$_POST['date'];
  $allowType=array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
  $img_name=$_FILES['image']['tmp_name'];
$img_size=$_FILES['image']['size'];
$imgs_type=$_FILES['image']['type'];
// $error=$_FILES['profile_img']['error'];
$img_fileName=basename($_FILES['image']['name']);
$img_targetFilePath=$img_fileName;
$img_fileType=pathinfo($img_targetFilePath,PATHINFO_EXTENSION);
$img_img_name="Saro_Limited_Skardu_".rand(0,999)."_SN.".$img_fileType;
$img_distination="images/gallery/".$img_img_name;

if ($title!='') {
  $sql="INSERT INTO  `gallery` VALUES (Null,'{$img_img_name}','{$desc}','{$title}','{$date}');";
  
  if(!in_array($img_fileType,$allowType)){
    $msg= "<font color='red'> img has error(Unsaported type)</font> ";
  }else{
    if ($img_size>=3145728) {
      $msg= "<font color='red'>img has error(image size is geater than 3MB)</font>";
    }else{
      if (!move_uploaded_file($_FILES['image']['tmp_name'],$img_distination)  ){
          $msg= "<font color='red'>Faild to Upload image due to slow network</font>";
      }else{
        if (mysqli_query($con,$sql)===FALSE){
          $msg= "<font color='red'>Faild to submit </font>";
      }else{
        header("Location:Donners.php");
      }
      }

    }
  }
  }else{
    $msg="<font color='red'>Name is Required</font>";
  }
}
?>
  <main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <!-- <h2>Event Pics</h2> -->
    <!-- <a class="btn btn-info" href="add_donner.php">Add Pics</a> -->
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10">
        <form action="" enctype="multipart/form-data" method="post">
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">fill event detail</h5>

              <div class="row">
      <div class="col-12"><center><?php echo $msg; ?></center></div>
    </div>
              <!-- General Form Elements -->
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label"> Image</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="file" name="image">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="title">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <textarea name="description" id="" rows="4" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Date</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="date">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-4">
                    <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
                <input type="submit" name="submit" class="btn btn-block btn-success p-2" value="submit"/>
                  </div>
                </div>

              <!-- End General Form Elements -->
              
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->

<?php
include "incl/foot.php";
?>

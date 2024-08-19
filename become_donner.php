<?php
include "incl/head.php";
include "SN/incl/class.php";
$msg=$name=$fname=$contact=$occupation=$address=$type=$f=$i=$t=$img_img_name="";
$damount=0;
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $fname=$_POST['fname'];
  $contact=$_POST['contact'];
  $occupation=$_POST['occupation'];
  $address=$_POST['address'];
  $type=$_POST['type'];
  $damount=$_POST['damount'];
  $f=$_POST['f'];
  $t=$_POST['t'];
  $i=$_POST['i'];
  $allowType=array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
  $img_name=$_FILES['image']['tmp_name'];
$img_size=$_FILES['image']['size'];
$imgs_type=$_FILES['image']['type'];
// $error=$_FILES['profile_img']['error'];
$img_fileName=basename($_FILES['image']['name']);
$img_targetFilePath=$img_fileName;
$img_fileType=pathinfo($img_targetFilePath,PATHINFO_EXTENSION);
$img_img_name="Saro_Limited_Skardu_".rand(0,999)."_SN.".$img_fileType;
$img_distination="SN/images/donner/".$img_img_name;
if($damount==''){
  $damount=0;
}
if ($name!='') {
  $sql="INSERT INTO  `donner` (id,DonnerName,FatherName,Contact,Occupation,`Image`,Donation_Type,Donation_Ammount,Donation_Address,is_Active,facebook,instagram,x,is_request) VALUE (Null,'{$name}','{$fname}','{$contact}','{$occupation}','{$img_img_name}','{$type}',{$damount},'{$address}',1,'{$f}','{$i}','{$t}',1)";
  
  if(!in_array($img_fileType,$allowType)){
    $msg= "<font color='red'> img has error(Unsaported type)</font> ";
  }else{
    if ($img_size>=3145728) {
      $msg= "<font color='red'>img has error(image size is geater than 3MB)</font>";
    }else{
      if (!move_uploaded_file($_FILES['image']['tmp_name'],$img_distination)  ){
          $msg= "<font color='red'>Faild to Upload image due to slow network</font>";
      }else{
        try {
          mysqli_query($con,$sql);
          header("Location:Donners.php");
        } catch (\Throwable $th) {
          $msg= "<font color='red'>Faild to submit </font>";
        }
      //   if (mysqli_query($con,$sql)===FALSE){
      //     $msg= "<font color='red'>Faild to submit </font>";
      // }else{
      //   header("Location:Donners.php");
      // }

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

    <div class="d-flex justify-content-between align-items-center" style="margin-top:58px;">
      <h2>Become a Donners</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Become a Donners</li>
      </ol>
    </div>


  </div>
  </div>
</section>


<section class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10">
        <form action="" enctype="multipart/form-data" method="post">
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill the form</h5>

              <div class="row">
      <div class="col-12"><center><?php echo $msg; ?></center></div>
    </div>
              <!-- General Form Elements -->
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">Father Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="fname">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Contact</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="contact">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Occupation</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="occupation">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="address">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Donner Image</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="file" name="image">
                  </div>
                </div>
                
                
                
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Donation Type</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="monthly" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Monthly Donation
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="Annually">
                      <label class="form-check-label" for="gridRadios2">
                      Annually Donation
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="type" value="once">
                      <label class="form-check-label" for="gridRadios3">
                        One Time Donation
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Donation Amount</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="damount">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Facebook account</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="f">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Instagram  account</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="i">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Twitter  account</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="t">
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
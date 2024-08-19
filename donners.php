<?php
include "incl/head.php";
include "SN/incl/class.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center" style="margin-top:58px;">
      <h2>Donners</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Donners</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Donner</h2>
          <p> Our Donners</p>
        </div>

        <div class="row">
<?php
$sql="SELECT * FROM Donner WHERE is_active=1";
$resu=mysqli_query($con,$sql);
if(mysqli_num_rows($resu)>0){
  while($data=mysqli_fetch_assoc($resu)){
    ?>
    
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="SN\images\donner\<?php echo $data['Image']; ?>" class="img-fluid" alt="">
                <div class="social">
                  <a href="<?php echo $data['x'];?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?php echo $data['facebook'];?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?php echo $data['instagram'];?>"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $data['DonnerName'];?></h4>
                <span><?php echo $data['Occupation'];?></span>
                <a href="tel:<?php echo $data['Contact']; ?>" class="btn btn-small btn-primary d-md-none"> Call him</a>
              </div>
            </div>
          </div>
          <?php
  }
}else{
  ?>
  <font size="7" color="blue"><center>No Record Found Ju (SN)<center></font>
  <?php
}
?>

        </div>

      </div>
    </section><!-- End Team Section -->

  </div>
</section>

</main><!-- End #main -->
<?php
include "incl/foot.php";
?>
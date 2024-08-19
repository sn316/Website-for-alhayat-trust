<?php
include "incl/head.php";
include "SN/incl/class.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center" style="margin-top:58px;">
      <h2>gallery</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>gallery</li>
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
          <h2>Our Event</h2>
          <p> Our Gallery</p>
        </div>

        <div class="row">
<?php
$sql="SELECT * FROM gallery";
$resu=mysqli_query($con,$sql);
if(mysqli_num_rows($resu)>0){
  while($data=mysqli_fetch_assoc($resu)){
    ?>
    
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="SN\images\gallery\<?php echo $data['image']; ?>" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4><?php echo $data['title'];?></h4>
                <span>Date: <?php echo $data['dat']; ?></span>
                <b>Description: </b><p><?php echo $data['descriptio'];?></p>
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
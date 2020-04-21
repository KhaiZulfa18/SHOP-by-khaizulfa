<div class="slider-area">
    <div class="slider-active owl-carousel">
        <?php 
        $no=0;
        foreach ($dataslider as $data) { 

          $picture = $data->picture;
          $picture = explode('.', $picture);
          $picture1 = $picture[0].'_thumb';
          $picture2 = $picture[1];
          $picture = $picture1.'.'.$picture2;
          $number = $no++;    
        ?>
        <div class="single-slider slider-1">
            <div class="container">
                <div class="slider-content slider-animated-1">
                    <div class="slider-img text-center">
                        <img class="animated" src="<?php echo base_url('images/slider_thumb/'.$picture);?>" alt="slider images">
                    </div>
                    <div class="slider-text-img">
                        <h1 class="animated"><?php echo $data->text1; ?></h1>
                        <h3 class="animated"><?php echo $data->text2; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
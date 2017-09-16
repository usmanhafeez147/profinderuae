
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" width="1000">
<?php $i=0; ?>

  <ol class="carousel-indicators">
  @foreach($sliderPhotos as $Images)
    @if($i==0)
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="active"></li>
    @else
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>"></li>
    @endif
    <?php $i=$i+1; ?>
  @endforeach()
  </ol>

  <div class="carousel-inner" role="listbox">
  <?php $j=0; ?>
  @foreach($sliderPhotos as $Image)
    @if($j==0)
      <div class="carousel-item active">
        <img class="d-block img-fluid" src="{{$Image->image_path}}" width="100%" alt="First slide">
      </div>
    @else
      <div class="carousel-item">
        <img class="d-block img-fluid" src="{{$Image->image_path}}" width="100%" alt="First slide">
      </div>
    @endif
    <?php $j=$j+1; ?>
  @endforeach()
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
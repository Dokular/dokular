<template>
<div>
<div class="ftco-blocks-cover-1">
    <div class="site-section ftco-service-image-1 pb-5">
    <div class="container">
        <div class="row">
        <div class="col service text-center">
            <a href="#"><img :src="img1" alt="Image" class="img-fluid"></a>
            <div class="px-md-3">
            <h3><a href="#">Vehicle License</a></h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae distinctio laudantium nulla eos numquam incidunt!</p>
            </div>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>
        </div>
        <div class="col service text-center">
            <a href="#"><img :src="img2" alt="Image" class="img-fluid"></a>
            <div class="px-md-3">
            <h3><a href="#">Road Worthiness</a></h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae distinctio laudantium nulla eos numquam incidunt!</p>
            </div>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>
        </div>
        <div class="col service text-center">
            <a href="#"><img :src="img3" alt="Image" class="img-fluid"></a>
            <div class="px-md-3">
            <h3><a href="#">3rd Party Insurance</a></h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae distinctio laudantium nulla eos numquam incidunt!</p>
            </div>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>
</template>

<script>
import Img1 from '../assets/images/depot_img_1.jpg'
import Img2 from '../assets/images/depot_img_2.jpg'
import Img3 from '../assets/images/depot_img_3.jpg'
import BgImg from '../assets/images/depot_hero_1.jpg'
export default {
  data() {
    return{
      img1: Img1,
      img2: Img2,
      img3: Img3,
      bgimg: BgImg
    }
  },
  mounted() {
    console.log('Component mounted.')
  }
}
</script>

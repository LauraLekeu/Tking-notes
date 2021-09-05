<template>
  <swiper
    :slides-per-view="1"
    :space-between="0"
    @swiper="onSwiper"
    @slideChange="onSlideChange"
  >
    <swiper-slide  v-for="(item,index) in srcs" :key="index">
        <img class="" :src="require(`../assets/images/${ item }`)" :key="index" alt="">
    </swiper-slide>
    <swiper-slide>Slide 2</swiper-slide>
 
    ...
  </swiper>
</template>
<script>
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';

  

  // Import Swiper styles
     // import 'swiper/css';

  export default {
    name: 'Slider',
    components: {
      Swiper,
      SwiperSlide,
    },
    data() {
      return {
        srcs: {
            1: 'index.png',
            2: 'todo.png',
            3: 'cours.png',
            4: 'notes.png',
        },
        swiperOption: {
        //  notNextTick: true,
            loop: true,
            initialSlide: 0,
            autoplay: {
                delay: 1500,
                disableOnInteraction: true
            },
            speed: 800,
        }
      }
    },
    setup() {
      const onSwiper = (swiper) => {
        console.log(swiper);
      };
      const onSlideChange = () => {
        console.log('slide change');
      };
      return {
        onSwiper,
        onSlideChange,
      };
    },
  };
</script>
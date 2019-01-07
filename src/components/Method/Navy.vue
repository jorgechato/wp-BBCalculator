<template>
  <article class="blog-card">

    <div class="human-stat" :style="{ backgroundImage: `url('${image}')` }">
      <div class="article-details">
        <h3>
        Body Fat <br /> {{ human.bf | trim(2) | percent }}
        </h3>
        <h4>
        Fat Mass <br /> {{ human.fm | trim(2) | Kg }}
        </h4>
        <h4>
        Lean Mass <br /> {{ human.lm | trim(2) | Kg }}
        </h4>
      </div>
    </div>

    <div class="article-details">
      <h3 class="post-title">{{ name }}</h3>

      <h5>I am a</h5>
        <!-- <div class="radio-btn-group"> -->
          <!-- <div class="radio"> -->
            <!-- <input type="radio" name="radio" value="Women" v-model="checked" id="click_me"> -->
            <!-- <input type="radio" name="radio" value="Men" v-model="checked" clicked id="or-me"> -->
          <!-- </div> -->
        <!-- </div> -->
      <v-btn-toggle v-model="active" mandatory>
        <v-btn flat color="black">Women</v-btn>
        <v-btn flat color="black">Men</v-btn>
      </v-btn-toggle>

      <NavyForm :active="active" @navy-calc="updateStats"/>

      <p class="post-author">With love by {{ author }}</p>
    </div>

  </article>
</template>

<script>
import NavyForm from '../Form/NavyForm'

export default {
  name: 'Navy',
  components: {
    NavyForm,
  },
  data () {
    return {
      active: 1,
      human: {
        bf: 0,
        fm: 0,
        lm: 0,
      },
      name: 'US Navy Body Fat',
      image: 'https://source.unsplash.com/DnWYw0zLJBg',
      author: 'Jorge Chato',
    }
  },
  methods: {
    updateStats(human){
      this.human = human
    }
  },
}
</script>

<style lang="scss">
$bg: #eedfcc;
$text: #777;
$black: #121212;
$white: #fff;
$red: #e04f62;
$border: #ebebeb;
$shadow: rgba(0, 0, 0, 0.2);

@mixin transition($args...) {
  transition: $args;
}

.blog-card {
  display: flex;
  flex-direction: row;
  background: $white;
  box-shadow: 0 0.1875rem 1.5rem $shadow;
  border-radius: 0.375rem;
  overflow: hidden;
}

.card-link {
  position: relative;
  display: block;
  color: inherit;
  text-decoration: none;
  &:hover .post-title {
    @include transition(color 0.3s ease);
    color: $red;
  }
  &:hover .human-stat {
    @include transition(opacity 0.3s ease);
    opacity: 0.9;
  }
}

.human-stat {
  @include transition(opacity 0.3s ease);
  background-size: cover;
  color: $white;
  position: relative;

  &:before{
    content: '';
    background: rgba($black, .8);
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
  }

  .article-details {
    padding-bottom: 0;
  }
}

.article-details {
  text-align: center;
  padding: 1.5rem;
  z-index: 2;
  position: relative;
}

.post-category {
  display: inline-block;
  text-transform: uppercase;
  font-size: 0.75rem;
  font-weight: 700;
  line-height: 1;
  letter-spacing: 0.0625rem;
  margin: 0 0 0.75rem 0;
  padding: 0 0 0.25rem 0;
  border-bottom: 0.125rem solid $border;
}

.post-title {
  @include transition(color 0.3s ease);
  font-size: 1.125rem;
  line-height: 1.4;
  color: $black;
  font-weight: 700;
  margin: 0 0 0.5rem 0;
}

.post-author {
  font-size: 0.875rem;
  line-height: 1;
  margin: 1.125rem 0 0 0;
  padding: 1.125rem 0 0 0;
  border-top: 0.0625rem solid $border;
}

@media (max-width: 40rem) {
  .blog-card {
    flex-wrap: wrap;
  }
}

@supports (display: grid) {
  .human-stat {
    height: 100%;
  }

  .blog-card {
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-template-rows: 1fr;
  }

  @media (max-width: 40rem) {
    .blog-card {
      grid-template-columns: auto;
    }
  }
}
</style>

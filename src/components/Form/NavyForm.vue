<template>
  <BaseForm>

    <div slot="height">
      <input
        v-model="form.height"
        type="number"
        @click="form.height=''"
        @keyup="navyCalc()"
        placeholder="height">
    </div>
    <div slot="weight">
      <input
        v-model="form.weight"
        type="number"
        @click="form.weight=''"
        @keyup="navyCalc()"
        placeholder="weight">
    </div>
    <div slot="waist">
      <input
        v-model="form.waist"
        type="number"
        @click="form.waist=''"
        @keyup="navyCalc()"
        placeholder="waist">
    </div>
    <div slot="neck">
      <input
        v-model="form.neck"
        type="number"
        @click="form.neck=''"
        @keyup="navyCalc()"
        placeholder="neck">
    </div>
    <div v-if="active == 0" slot="hip">
      <input
        v-model="form.hip"
        type="number"
        @click="form.hip=''"
        @keyup="navyCalc()"
        placeholder="hip">
    </div>

  </BaseForm>
</template>

<script>
import BaseForm from '../Form/BaseForm'

export default {
  name: 'NavyForm',
  components: {
    BaseForm,
  },
  props: {
    active: {
      type: Number,
      required: true,
    },
  },
  data () {
    return {
      form: {
        height: '',
        weight: '',
        waist: '',
        neck: '',
        hip: '',
      },
      human: {
        bf: 0,
        fm: 0,
        lm: 0,
      },
    }
  },
  methods: {
    menBF (){
	    this.human.bf = 495 / (
        1.0324 - .19077 * this.log10(
          this.form.waist - this.form.neck
        ) + .15456 * this.log10(
          this.form.height
        )
      ) - 450 || 0
    },
    womenBF (){
	    this.human.bf = 495 / (
        1.26579 - .35004 * this.log10(
          this.form.waist + this.form.hip - this.form.neck
        ) + .22100 * this.log10(
          this.form.height
        )
      ) - 450 || 0
    },
    log10(val) {
      return Math.log(val) / Math.LN10;
    },
    navyCalc(){
      if (this.active == 1) {
        this.menBF()
        this.human.fm = this.FM(this.human)
        this.human.lm = this.LM(this.human)
      } else if (this.active == 0) {
        this.womenBF()
        this.human.fm = this.FM(this.human)
        this.human.lm = this.LM(this.human)
      }

      this.$emit('navy-calc', this.human)
    },
    FM(obj){
      return obj.bf * this.form.weight / 100
    },
    LM(obj){
      return this.form.weight - obj.fm
    },
  },
}
</script>

<style lang="scss">
input{
  text-align: center;
}
</style>

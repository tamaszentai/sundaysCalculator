<template>
<div>
  <h1>Get Sundays Calculator</h1>
  <Form @sendData="sendData"></Form>
  <h2>Number of Sundays were {{numberOfSundays}}</h2>
  </div>
</template>

<script>
import Form from "./components/Form.vue";
import axios from 'axios';
export default {
  components: {
    Form,
  },
  data() {
    return {
      numberOfSundays: ''
    }
  },
  methods: {
    sendData(value) {
      const date= {inputDate: value}
      axios.post("http://localhost:8000", JSON.stringify(date))
      .then(response => (
        this.numberOfSundays = response.data.numberOfSundays ? response.data.numberOfSundays : response.data))
    }
  }
};
</script>

<style>
body {
  background-color: aquamarine;
}
h1 {
  text-align: center;
  color: salmon;
}

h2 {
  text-align: center;
}
</style>

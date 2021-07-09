<template>
  <div class="wrapper">
    <h1>Sundays Calculator</h1>
    <Form @sendData="sendData"></Form>
    <p v-if="date">
      <span :class="checkSundays">{{ numberOfSundays }}</span
      ><br />Sundays were the first day of the month since
      <span class="date">{{ date }}</span
      >.
    </p>
  </div>
</template>

<script>
import Form from "./components/Form.vue";
import axios from "axios";
export default {
  components: {
    Form,
  },
  data() {
    return {
      numberOfSundays: "",
      date: "",
    };
  },
  methods: {
    sendData(value) {
      this.date = value;
      const date = { inputDate: value };
      axios
        .post("http://localhost:8000", JSON.stringify(date))
        .then(
          (response) =>
            (this.numberOfSundays = response.data.numberOfSundays
              ? response.data.numberOfSundays
              : response.data)
        );
    },
  },
  computed: {
    checkSundays: function () {
      return this.numberOfSundays === 0 ? "zero" : "sundays";
    },
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
body {
  background-color: aquamarine;
  font-family: "Roboto", sans-serif;
}

.wrapper {
  margin: 0 auto;
  width: auto;
  padding: 0;
}

h1 {
  text-align: center;
  color: salmon;
}

p {
  text-align: center;
}

.zero {
  color: red;
  font-size: 5rem;
}

.sundays {
  color: green;
  font-size: 5rem;
}

.date {
  color: darkorchid;
}
</style>

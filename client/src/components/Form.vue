<template>
<form @submit="submitFormHandler">
    <label>Calculating from date:</label>
    <input type="date" v-model="dateInput" required/>
    <input type="submit" />
</form>
</template>

<script>
export default {
    data () {
        return {
            dateInput: ''
        }
    },
    methods: {
        submitFormHandler(e) {
            e.preventDefault();
            this.$emit('sendData', this.dateInput);
            this.dateInput =  '';
        }
    }
}

</script>


<style scoped>
form {
    text-align: center;
    margin: 0 auto;
}
input {
    margin: 2% auto;
    display: block;
}
</style>

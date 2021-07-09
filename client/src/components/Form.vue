<template>
<form @submit="submitFormHandler">
    <label>Starting date:</label>
    <input type="date" v-model="dateInput" required/>
    <input type="submit" value="Calculate!"/>
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
    height: 2rem;
    font-family: 'Roboto', sans-serif;
    border-radius: 15px;
    outline: none;
}

input[type=submit] {
    cursor: pointer;
}
</style>

<template>
    <div class="form-container">
        <h1>Calculo de horas noturnas</h1>
        <form v-on:submit.prevent="submitForm">
            <label for="inicio">Hora do inicio da jornada de trabalho</label>
            <input type="time" name="inicio" id="inicio" v-model="form.inicio">
            <label for="fim">Hora do Término da jornada de trabalho</label>
            <input type="time" name="fim" id="fim" v-model="form.fim">
            <button>Calcular</button>
        </form>
    </div>

</template>

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    form {
        display: flex;
        flex-direction: column;
    }
    input {
        width: 30%;
        margin: 12px auto;

    }
    button {
        padding: 8px;
        background-color: rgb(80, 155, 6);
        color: rgb(255, 246, 246);
        transition: .5s;
    }
    button:hover {
        background-color: rgb(105, 175, 6);
    }
</style>

<script>
import axios from "axios";

export default {

    data() {
    return {
        form: {
            inicio: '',
            fim: ''
        },
    };
    },
    methods: {
        submitForm() {
        axios
        .post("http://localhost:8000/api/horas-noturnas", {
            inicio: this.form.inicio,
            fim: this.form.fim
        })
        .then((res) => {
            alert(`Voce trabalhou ${res.data.horasDiurnas} horas diurnas e ${res.data.horasNoturnas} horas noturnas`)
        })
        .catch((error) => {
            console.log(error);
        });
    },
    },
    };
</script>
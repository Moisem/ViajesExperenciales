<template>
  <div class="cards">
    <h2 class="header">Responsive Cards CSS</h2>
    <div class="services" v-for="domicilio in domicilios" :key="domicilio.id">
      <div class="content content-1" >
        <div class="fab fa-twitter"></div>
        <h2 v-text="domicilio.estado"></h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
          ullam aliquid non eligendi, nemo est neque reiciendis error?
        </p>
        <a href="#">Read More</a>
      </div>
    </div>
  </div>
</template>
<script>
    export default {
        data (){
            return{
                //show vuelos
                domicilios: [],

                }
            },
        mounted() {
            this.getDomicilio();
            console.log('se carga la API')
        },
        methods: {
            //función para obtener vuelos
            getDomicilio: function () {
                 axios.get('Domicilio').then(response=> {
                    this.domicilios = response.data.domicilios
                    console.log (this.domicilios);
                });
            },
            
    }
    }
</script>

<style >
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,800|Poppins&display=swap");
.cards {
  max-width: 1100px;
  margin: 0 auto;
  text-align: center;
  padding: 30px;
}
.cards h2.header {
  font-size: 40px;
  margin: 0 0 30px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.services {
  display: flex;
  align-items: center;
}
.content {
  display: flex;
  flex-wrap: wrap;
  flex: 1;
  margin: 20px;
  padding: 20px;
  border: 2px solid black;
  border-radius: 4px;
  transition: all 0.3s ease;
}
.content .fab {
  font-size: 70px;
  margin: 16px 0;
}
.content > * {
  flex: 1 1 100%;
}
.content:hover {
  color: white;
}
.content:hover a {
  border-color: white;
  background: white;
}
.content-1:hover {
  border-color: #1da1f2;
  background: #1da1f2;
}
.content-1:hover a {
  color: #1da1f2;
}
.content-2:hover {
  border-color: #e1306c;
  background: #e1306c;
}
.content-2:hover a {
  color: #e1306c;
}
.content-3:hover {
  border-color: #ff0000;
  background: #ff0000;
}
.content-3:hover a {
  color: #ff0000;
}
.content h2 {
  font-size: 30px;
  margin: 16px 0;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.content p {
  font-size: 17px;
  font-family: "Poppins", sans-serif;
}
.content a {
  margin: 22px 0;
  background: black;
  color: white;
  text-decoration: none;
  text-transform: uppercase;
  border: 1px solid black;
  padding: 15px 0;
  border-radius: 25px;
  transition: 0.3s ease;
}
.content a:hover {
  border-radius: 4px;
}
@media (max-width: 900px) {
  .services {
    display: flex;
    flex-direction: column;
  }
}
</style>
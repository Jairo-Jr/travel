const app= new Vue({
    el: '#app',
    data: {
        titulo: 'Hola mamá',
        
    },
    mounted(){
        console.log(this.titulo);
    },
    methods:{
        
    }
}).$mount('#app')
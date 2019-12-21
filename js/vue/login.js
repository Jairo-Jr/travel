const app= new Vue({
    
    el: '#app',
    data: {
        titulo: 'Hola mamá',
        user: '',
        pass: ''
    },
    mounted(){
        console.log(this.titulo);
    },
    methods:{
        login(){
            if(this.user && this.pass){
                this.$router.push('/index.html');
            }
        }
    }
}).$mount('#app')
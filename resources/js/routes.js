import Dashboard from "./components/Dashboard.vue"
import Camisetas from "./components/Camisetas.vue"
import Usuarios from "./components/Usuarios.vue"
import NovaCamiseta from "./components/NovaCamiseta.vue"
import VerCamiseta from "./components/VerCamiseta.vue"

export default {
    mode: 'history',

    routes:[
        {
            path:'/dashboard',
            component: Dashboard,
            name:'dashboard'
        },
        {
            path:'/camisetas',
            component: Camisetas,
            name:'camisetas',    
        },
        {
            path:'/usuarios',
            component: Usuarios,
            name:'usuarios'
        },
        {
            path:'/nova-camiseta',
            component: NovaCamiseta,
            name:'nova-camiseta'
        },
        {
            path:'/ver-camiseta',
            component: VerCamiseta,
            name:'ver-camiseta'
        }

        


    ]
}
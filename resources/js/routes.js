import Dashboard from "./components/Dashboard.vue"
import Camisetas from "./components/Camisetas.vue"
import Usuarios from "./components/Usuarios.vue"

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
            name:'camisetas'
        },
        {
            path:'/usuarios',
            component: Usuarios,
            name:'usuarios'
        }


    ]
}
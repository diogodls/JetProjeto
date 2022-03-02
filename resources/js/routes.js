import Login from "./components/Login.vue"
import Home from "./components/Home.vue";
import Dashboard from "./components/Dashboard.vue";
import Usuarios from "./components/usuarios/Usuarios.vue";
import EditarUsuario from "./components/usuarios/EditarUsuario.vue";
import Camisetas from "./components/camisetas/Camisetas.vue";
import NovaCamiseta from "./components/camisetas/NovaCamiseta.vue";
import VerCamiseta from "./components/camisetas/VerCamiseta.vue";
import EditarCamiseta from "./components/camisetas/EditarCamiseta.vue"

export default {
    mode: 'history',

    routes:[
        {
            path:'/login',
            component: Login,
            name: 'login'
        },
        {
            path:'/',
            component: Home,
            name: 'home',
            children:[
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
            ]
        },
        {
            path:'/nova_camiseta',
            component: NovaCamiseta,
            name:'nova_camiseta'
        },
        {
            path:'/ver_camiseta/:id',
            component: VerCamiseta,
            name:'ver_camiseta'
        },
        {
            path:'/editar_camiseta/:id',
            component: EditarCamiseta,
            name:'editar_camiseta'
        },
        {
            path:'/editar_usuario/:id',
            component: EditarUsuario,
            name:'editar_usuario'
        }
        
    ]
}
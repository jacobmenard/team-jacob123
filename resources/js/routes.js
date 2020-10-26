
import NotFound from './components/NotFound';
// import Register from './components/Register';
 import Dashboard from './components/Dashboard';


export default{
    mode: 'history',
    linkActiveClass: 'font-weight-bold',
    routes: [
        {
            path: '*',
            component: NotFound
        },
        // {
        //     path: '/',
        //     component: Home,
        //     name: "Home"
        // },
        // {
        //     path: '/about',
        //     component: About
        // },
        // {
        //     path: '/register',
        //     component: Register
        // },
        {
            path: '/home',
            component: Dashboard,
            name: "Dashboard"
        }
    ]
}
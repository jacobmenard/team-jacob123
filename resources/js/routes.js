
import NotFound from './components/NotFound';
// import Register from './components/Register';
import Dashboard from './components/Dashboard';
import LoadStation from './components/LoadStation';


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
            path: '/pages/dashboard',
            component: Dashboard,
            name: "Dashboard"
        },
        
        {
            path: '/pages/loadstation',
            component: LoadStation,
            name: "LoadStation"
        }
    ]
}
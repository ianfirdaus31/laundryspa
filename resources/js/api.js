import axios from 'axios';
import store from "./store";

const $axios = axios.create({
    baseURL: '/api',
    headers: {
        //Authorization: localStorage.getItem('token') !== 'null' ? `Bearer ${localStorage.getItem('token')}` : '',
        'Content-Type': 'application/json'
    }
});

//KONFIGURASINYA KITA PINDAHKAN MENGGUNAKAN INTERCEPTORS
$axios.interceptors.request.use(
     config => {
        const token = store.state.token
        if (token) config.headers.Authorization = `Bearer ${token}`
        return config
    },
    error => {
         return Promise.reject(error)
    }
)

export default $axios;

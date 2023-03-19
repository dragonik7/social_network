import axios from 'axios'

axios.defaults.baseURL = import.meta.env.APP_URL ?? 'http://localhost'
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('Bearer ')


import axios from 'axios';

const setTokenLocal = (token) => {
	if (token) {
		localStorage.setItem('Bearer ', token)
	} else {
		delete axios.defaults.headers.Authorization
	}
};
export default setTokenLocal;



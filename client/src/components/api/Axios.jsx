import axios  from 'axios';
import {API_URL} from '../config/constants';


const Axios = async (method, url, data = [], token = "") => {
    try {
        return await axios({
            headers: { 'Authorization': 'Bearer ' + token },
            method: method,
            url: url,
            baseURL: API_URL,
            data: data
        });
    } catch (error) {
        // console.log(error);
        return typeof error !== 'undefined' ? error : null;
    }
}

export default Axios;
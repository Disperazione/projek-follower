require('./bootstrap');
import axios from "axios";

let formData = new FormData();

formData.append('api_key', process.env.MIX_API_KEY_TOP_ONE_PANEL);
formData.append('secret_key', process.env.MIX_SECRET_KEY_TOP_ONE_PANEL);

let config = {
    headers: {
        'Content-Type': 'multipart/form-data',
        'Accept': 'application/json',
        'Access-Control-Allow-Origin': '*'
    }
}
axios.post(`${process.env.MIX_URL_TOP_ONE_PANEL}/api/services`, formData, config).then(
    res => {
        if (res.data) {
            console.log(res.data);
        }
    }
).catch(
    err => console.log(err)
)

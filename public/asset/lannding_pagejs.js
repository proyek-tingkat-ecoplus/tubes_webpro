import home from './Controller/home.js';
import {landing_lowongan,landing_training,landing_berita,landing_home} from './Model/Model.js';
import {getData} from './Helper/helper.js';
import client from './client.js';


getData('GET', client.backend_url+"/api/home", null, 'client', (data) => {
    console.log(data);
    landing_home(data);
},(err) => {console.log(err);if (err !== 422) {}console.log(err);}, () => {}, true);


getData('GET', client.backend_url+"/api/lowongan", null, 'client', (data) => {
    console.log(data);
    landing_lowongan(data.data);
},(err) => {console.log(err);if (err !== 422) {}console.log(err);}, () => {}, true);


getData('GET', client.backend_url+"/api/training", null, 'client', (data) => {
    console.log(data);
    landing_training(data.data);
},(err) => {console.log(err);if (err !== 422) {}console.log(err);}, () => {}, true);


getData('GET', client.backend_url+"/api/berita", null, 'client', (data) => {
    console.log(data);
    landing_berita(data.data);
},(err) => {console.log(err);if (err !== 422) {}console.log(err);}, () => {}, true);


$(document).on('click','.sugestions_a',function(){
    $('#cari').val(this.textContent);
    $('.sugestions_a').removeClass('active');
    $(this).addClass('active');
});


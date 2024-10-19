import {
    PostSuggestion
} from './Model/Search.js';
'';
import client from './client.js';
import {getData} from './Helper/helper.js';

$('#button-search').click(function () {
    var value = $('#kategori.button2').html();
    var search = $('#cari').val();
    if (value == "Pencari Kerja") {
        var tipe = "kandidat";
    } else if (value == "Lowongan") {
        var tipe = "lowongan";
    }
    $('#cari-tipe').val(tipe);
    PostSuggestion(search, tipe);
});
$('.tipe').click(function () {
    $('.tipe').removeClass('button2').addClass('button1');
    $(this).removeClass('button1').addClass('button2');
    var value = $('#kategori.button2').html();
    if (value == "Pencari Kerja") {
        var tipe = "kandidat";
    } else if (value == "Lowongan") {
        var tipe = "lowongan";
    }
    $('#cari-tipe').val(tipe);
});

var timeout;
$('[name="cari"]').typeahead({
    minLength: 1,
    highlight: true,
    limit: Infinity
}, {
    source: function (typeahead, process, result) { //suggestion, syncresult, asyncResult

        if (timeout) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            $.ajaxSetup({
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + client.token
                }
            });
            getData('GET', client.backend_url+"/api/suggestion",{'search':typeahead}, 'client', (data) => {
                return result(data);
            },(err) => {console.log(err);if (err !== 422) {}console.log(err);}, () => {}, true);
        }, 500)
    }
});

// var substringMatcher = function(strs) {
//   return function findMatches(q, cb) {
//     var matches, substringRegex;

//     // an array that will be populated with substring matches
//     matches = [];

//     // regex used to determine if a string contains the substring `q`
//     substrRegex = new RegExp(q, 'i');

//     // iterate through the pool of strings and for any string that
//     // contains the substring `q`, add it to the `matches` array
//     $.each(strs, function(i, str) {
//       if (substrRegex.test(str)) {
//         matches.push(str);
//       }
//     });

//     cb(matches);
//   };
// };

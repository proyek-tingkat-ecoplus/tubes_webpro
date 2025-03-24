import {
    isLogin,
    Logout,
    me,
} from "../../Authentication";
import { cekrole } from "../admin/sidebar/sidebar";
$(document).ready(async function  ()  {
    var authData = await me()

    if(!authData){
        $('.btn-post,.btn-action,.comment-form').addClass('d-none')
    }else{
        $('.btn-action').each((index,element) => {
            if(element.dataset.user != authData['id']){
                $(element).remove()
            }
        })
        $('.btn-post,.comment-form').removeClass('d-none')
    }
    document.querySelectorAll('.toggle-comments').forEach(button => {
        button.addEventListener('click', function () {
            if (authData) {
                let id = authData['id'];
                document.getElementById('user_id').value = id;
            }

            const commentSection = this.closest('.card-body').querySelector('.comment-section');
            commentSection.classList.toggle('d-none');

            // Update icon
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-comment');
            icon.classList.toggle('fa-comment-dots');
        });
    });

    if(window.location.pathname == '/forum/add'){
        console.log(authData)
        $('.tox-notifications-container').addClass('d-none')
        $('input[name="author"]').val(authData['username'])
        $('input[name="author"]').attr('readonly', true)
        $('input[name="user"]').val(authData['id'])

    }
})

import { isLogin, me } from "../../../Authentication";

$(Document).ready(async function (){
    var user = await me();
    var role = user['role']['name'];

    if(cekrole(["Admin"])){
        $(".menu-master").removeClass("d-none");
        $(".menu-user").removeClass("d-none");
        $(".menu-role").removeClass("d-none");
    }

    if(cekrole(["Petugas","Admin"])){
        $(".menu-master-forum").removeClass("d-none");
        $(".menu-forum").removeClass("d-none");
        $(".menu-comment").removeClass("d-none");
        $(".menu-inventaris").removeClass("d-none");
        $('.menu-pemetaan').removeClass("d-none");
    }

    if(cekrole(["Petugas","Admin","Kepala Desa"])){
        $(".menu-master-proposal").removeClass("d-none");
        $(".menu-proposal").removeClass("d-none");
        $(".menu-master-pemetaan").removeClass("d-none");
        $(".menu-maps").removeClass("d-none");
    }

});

export const cekrole = (requiredRole) => {
    var role = localStorage.getItem("authenticate") ? JSON.parse(localStorage.getItem("authenticate"))["user"]["role"]["name"] : null;
    if(Array.isArray(requiredRole)){
        if(requiredRole.includes(role)){
            return true;
        }else{
            return false;
        }
    }
}
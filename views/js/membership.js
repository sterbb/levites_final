$(document).ready(function() {

$(".viewChurchMembershipDetails").on('click', function(){
    // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
    var profileid = $(this).siblings('input').first().attr("church_id");
    var profilename = $(this).siblings('input').first().attr("church_name");
    console.log(profilename);
    document.cookie = "church_id=" + profileid + ";";
    document.cookie = "church_name=" + profilename + ";";

    
    window.location.href = "profile";
 

})

});
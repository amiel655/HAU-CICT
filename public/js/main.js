  function openNav() {
    document.getElementById("mySidenav").style.width = "35%";
    document.getElementById("openNav").style.display = 'none';
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("openNav").style.display = 'block';
}
$(function(){
    $(".orgs").hide();
    $(".orgss").hide();
    $("#orgs").click(function(){
        if ($(".orgs").is(":visible")) {
          $(".orgs").hide();
        } else {
          $(".orgs").show();
        }
    });
    $("#orgss").click(function(){
        if ($(".orgss").is(":visible")) {
          $(".orgss").hide();
        } else {
          $(".orgss").show();
        }
    });
});

$(function(){
// jQuery
$(document).ready(function() {
    
    const themeSwitcher = $('#theme-switcher');
    const root = $('html');
    const savedTheme = localStorage.getItem('theme');
  
    if (savedTheme) {
      root.attr('data-bs-theme', savedTheme);
    }
  
    themeSwitcher.on('click', function() {
      if (root.attr('data-bs-theme') === 'light') {
        root.attr('data-bs-theme', 'dark');
        localStorage.setItem('theme', 'dark');
      } else {
        root.attr('data-bs-theme', 'light');
        localStorage.setItem('theme', 'light');
      }

      $(".dark-mode span").text(function(i, v){
        return v === 'dark_mode' ? 'light_mode' : 'dark_mode'
     })

    });


    $(".btn-toggle-menu").click(function() {
      $("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($("body").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
        $("body").addClass("sidebar-hovered")
      }, function() {
        $("body").removeClass("sidebar-hovered")
      }))
    })


    // chart 8
    var options = {
      series: [44, , 13, 43, 22],
      chart: {
        foreColor: '#9ba7b2',
        height: 500,
        type: 'pie',
      },
      colors: ["#0d6efd", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
      labels: ['Free', 'Team B', 'Team C', 'Team D', 'Team E'],
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            height: 500
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
    };
    var chart = new ApexCharts(document.querySelector("#chart8"), options);
    chart.render(); 


    // marker map
    var myLatLng = {
      lat: 10.70230,
      lng: 122.97429, 
    };
    var map = new google.maps.Map(document.getElementById('marker-map'), {
      zoom: 17,
      center: myLatLng
    });
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Our Lady Of Lourdes Parish Church '
    });


  });


  $("#public_folder").click(function(){
    alert("hello po heheh");
    $("#upper-title").text("Folder > Public Folder");
    $(".folder-preview").empty();

    var html = [];
    html.push("<p> Hello</p>");

    // basi lng to sa file storage nga una2
    $(".folder-preview").html(html);

  });




  


 


})
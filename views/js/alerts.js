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






  });
  


 


})
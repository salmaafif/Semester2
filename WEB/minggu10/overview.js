function fnToggleMenu() {
    $('.sidebar').toggleClass('close');
  }
  
  function fnThemeSwitch() {
    $('body').toggleClass('dark');
    if($('body').hasClass('dark'))
      $('.mode .mode-text').text('Light Mode');
    else
      $('.mode .mode-text').text('Dark Mode');
  }
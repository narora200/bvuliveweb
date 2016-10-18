$(document).ready(function() {
 
  $("#upcoming-events").owlCarousel({
    items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
    autoPlay : 3000,
    stopOnHover : true,
    navigation:false,
    paginationSpeed : 1000,
    goToFirstSpeed : 2000,
    
    autoHeight : false,
    transitionStyle:"fade"
  });

  $("#past-events").owlCarousel({
    items : 3,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3],
    autoPlay : 3000,
    stopOnHover : true,
    navigation:false,
    paginationSpeed : 1000,
    goToFirstSpeed : 2000,
    
    autoHeight : false,
    transitionStyle:"fade"
  });
 
});
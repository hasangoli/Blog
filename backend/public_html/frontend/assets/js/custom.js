// //Owl Carousel
$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    autoplay: true,
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 6,
      },
      600: {
        items: 6,
      },
      1000: {
        items: 6,
      },
    },
  });
});

//Modal
$("#myModal").on("shown.bs.modal", function () {
  $("#myInput").trigger("focus");
});

//New accordion for instagram in index
closeMenue = () => {
  $("#toggler").trigger("click");
};

console.log("excuted");

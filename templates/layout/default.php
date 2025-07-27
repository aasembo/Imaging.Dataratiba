<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title; ?>
    </title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <?php echo $this->Html->meta('icon') ?>
    <?php echo $this->Html->css(['bootstrap.min','home']) ?>
    <?php echo $this->fetch('meta') ?>
    <?php echo $this->fetch('css') ?>
</head>
<style>
    .announcement_btn {
      background:#0f626a;
      color:#fff;
      /* margin:auto;
      display:block; */
    }
    .announcement_btn:focus{
      border:none;
      box-shadow:none;
      outline:none;
      cursor:default
    }
    .announcement_btn:hover{
      color:#fff;
    }
    .date_display{
      display: flex;
      align-items: flex-end;
      justify-content: end;
    }
    </style>
<body>
    <?php echo $this->element('header'); ?>
    
    <div class="container">
        <main class="main">
            <div class="">
              <div class="date_display">
                <button class="btn mb-3 announcement_btn">
                  <?php 
                    $date = new DateTime('now', new DateTimeZone('Etc/GMT+6')); // CST fixed (no DST)
                    echo "Today - ".$date->format('m/d/Y H:i:s A');
                  ?>
                </button>
              </div>
                <?php echo $this->fetch('content') ?>
            </div>
        </main>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <p class="">&copy; <?= date('Y') ?> DCMC IMAGING DEPARTMENT.</p>
        </div>
    </footer>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel Js and Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <?php echo $this->fetch('script') ?>

    <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 0,
                responsiveClass: true,
                dots: false,
                autoplay: true,
                autoplayHoverPause: true,
                autoplaySpeed: 3000,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
                    navText: [
                      '<i class="fa fa-chevron-left custom-nav-icon"></i>',
                      '<i class="fa fa-chevron-right custom-nav-icon"></i>'
                    ]
                  },
                  768: {
                    items: 2,
                    nav: true,
                    navText: [
                      '<i class="fa fa-chevron-left custom-nav-icon"></i>',
                      '<i class="fa fa-chevron-right custom-nav-icon"></i>'
                    ]
                  },
                  1024: {
                    items: 3,
                    nav: true,
                    loop: false,
                    navText: [
                      '<i class="fa fa-chevron-left custom-nav-icon"></i>',
                      '<i class="fa fa-chevron-right custom-nav-icon"></i>'
                    ]
                  },
                  1920: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 0,
                    navText: [
                      '<i class="fa fa-chevron-left custom-nav-icon"></i>',
                      '<i class="fa fa-chevron-right custom-nav-icon"></i>'
                    ]
                  },
                }
              })
            })
          </script>

<script>
  function equalizeOwlHeights() {
    let maxHeight = 0;
    $('.owl-carousel .owl-item .item').each(function () {
      const height = $(this).outerHeight();
      if (height > maxHeight) maxHeight = height;
    });

    $('.owl-carousel .owl-item .item').css('height', maxHeight + 'px');
  }

  // Call it after Owl is initialized
  $('.owl-carousel').on('initialized.owl.carousel', function () {
    equalizeOwlHeights();
  });

// $(document).ready(function () {
//   const carouselInner = $(".carousel-inner");
//   const cardWidth = $(".carousel-item").outerWidth(true);
//   let scrollPosition = 0;
  
//   const nextSlide = () => {
//     const maxScroll = carouselInner[0].scrollWidth - carouselInner.outerWidth();
//     if (scrollPosition < maxScroll) {
//       scrollPosition += cardWidth;
//     } else {
//       scrollPosition = 0; // loop back to start
//     }
//     carouselInner.animate({ scrollLeft: scrollPosition }, 600);
//   };

//   $(".carousel-control-next").on("click", nextSlide);
//   $(".carousel-control-prev").on("click", function () {
//     if (scrollPosition > 0) {
//       scrollPosition -= cardWidth;
//     } else {
//       scrollPosition = carouselInner[0].scrollWidth - carouselInner.outerWidth();
//     }
//     carouselInner.animate({ scrollLeft: scrollPosition }, 600);
//   });

//   // 🔁 Autoplay every 3 seconds
//   //const autoplayInterval = setInterval(nextSlide, 3000);
//   function isMobile() {
//     return $(window).width() < 767;
//   }
//     if(isMobile()) {
//       $("#testimonialCarousel .carousel-control-prev").on("click", function () {
//           console.log("Previous button clicked");
//           const currentSlide = $(this).parent().find(".carousel-item.active");
//           console.log("Previous button clicked",currentSlide);
//       })
//     }
// });
 
  // Optional: pause autoplay on hover
//   $(".carousel-inner, .carousel-control-next, .carousel-control-prev")
//     .on("mouseenter", () => clearInterval(autoplayInterval))
//     .on("mouseleave", () => setInterval(nextSlide, 5000));
// });
</script>

</body>
</html>

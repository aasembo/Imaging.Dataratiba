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
    
    <?php echo $this->fetch('script') ?>

<script>
$(document).ready(function () {
  const carouselInner = $(".carousel-inner");
  const cardWidth = $(".carousel-item").outerWidth(true);
  let scrollPosition = 0;
  
  const nextSlide = () => {
    const maxScroll = carouselInner[0].scrollWidth - carouselInner.outerWidth();
    if (scrollPosition < maxScroll) {
      scrollPosition += cardWidth;
    } else {
      scrollPosition = 0; // loop back to start
    }
    carouselInner.animate({ scrollLeft: scrollPosition }, 600);
  };

  $(".carousel-control-next").on("click", nextSlide);
  $(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
    } else {
      scrollPosition = carouselInner[0].scrollWidth - carouselInner.outerWidth();
    }
    carouselInner.animate({ scrollLeft: scrollPosition }, 600);
  });

  // 🔁 Autoplay every 3 seconds
  //const autoplayInterval = setInterval(nextSlide, 3000);
});

  // Optional: pause autoplay on hover
//   $(".carousel-inner, .carousel-control-next, .carousel-control-prev")
//     .on("mouseenter", () => clearInterval(autoplayInterval))
//     .on("mouseleave", () => setInterval(nextSlide, 5000));
// });
</script>

</body>
</html>

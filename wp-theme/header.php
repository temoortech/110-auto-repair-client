<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="110 Auto Repair Shop in London offers expert car repairs: engine repair, brake services, clutch repair, diagnostics, oil changes, full servicing, tyre fitting &amp; vehicle inspections. Call +44 1234 567890." />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ==============================
     NAVBAR
     ============================== -->
<nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation">
  <div class="nav-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="110 Auto Repair Shop – Home">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logo.svg" alt="110 Auto Repair Shop" width="180" height="42" />
    </a>

    <ul class="nav-links" role="list">
      <li><a href="#services-overview">Services</a></li>
      <li><a href="#why-us">Why Us</a></li>
      <li><a href="#testimonials">Reviews</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <a href="#contact" class="btn btn-primary nav-cta">
      <i class="fas fa-calendar-check" aria-hidden="true"></i> Book Appointment
    </a>

    <button class="hamburger" id="hamburger" aria-label="Open navigation menu" aria-expanded="false" aria-controls="navOverlay">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </button>
  </div>
</nav>

<!-- Mobile Nav Overlay -->
<div class="nav-overlay" id="navOverlay" role="dialog" aria-modal="true" aria-label="Mobile navigation">
  <button class="overlay-close" id="overlayClose" aria-label="Close navigation menu">
    <i class="fas fa-times" aria-hidden="true"></i>
  </button>
  <a href="#services-overview">Services</a>
  <a href="#why-us">Why Us</a>
  <a href="#testimonials">Reviews</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <a href="#contact" class="btn btn-primary" style="margin-top:1rem;">
    <i class="fas fa-calendar-check" aria-hidden="true"></i> Book Appointment
  </a>
</div>

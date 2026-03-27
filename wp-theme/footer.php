<!-- ==============================
     FOOTER
     ============================== -->
<footer class="footer" role="contentinfo" aria-label="Site footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Brand column -->
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="110 Auto Repair Shop – Back to top">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logo.svg" alt="110 Auto Repair Shop" width="160" height="38" />
        </a>
        <p>London's trusted auto repair and servicing specialists since 2011. Expert repairs, honest pricing, 5-star service.</p>
        <div class="social-links" aria-label="Social media links">
          <a href="#" class="social-link" aria-label="Follow us on Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
          <a href="#" class="social-link" aria-label="Follow us on Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
          <a href="#" class="social-link" aria-label="Follow us on X (Twitter)"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
          <a href="https://wa.me/441234567890" class="social-link" aria-label="Contact us on WhatsApp" target="_blank" rel="noopener"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul role="list">
          <li><a href="#hero"><i class="fas fa-chevron-right" aria-hidden="true"></i> Home</a></li>
          <li><a href="#services-overview"><i class="fas fa-chevron-right" aria-hidden="true"></i> Services</a></li>
          <li><a href="#why-us"><i class="fas fa-chevron-right" aria-hidden="true"></i> Why Choose Us</a></li>
          <li><a href="#testimonials"><i class="fas fa-chevron-right" aria-hidden="true"></i> Reviews</a></li>
          <li><a href="#about"><i class="fas fa-chevron-right" aria-hidden="true"></i> About Us</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Contact</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div class="footer-col">
        <h4>Services</h4>
        <ul role="list">
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Engine Repair</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Brake Services</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Clutch Repair</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Diagnostics</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Full Servicing</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right" aria-hidden="true"></i> Tyre Services</a></li>
        </ul>
      </div>

      <!-- Contact & Hours -->
      <div class="footer-col">
        <h4>Contact &amp; Hours</h4>
        <address>
          <div class="footer-contact-item">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
            <span>110 High Street, London, UK</span>
          </div>
          <div class="footer-contact-item">
            <i class="fas fa-phone" aria-hidden="true"></i>
            <a href="tel:+441234567890">+44 1234 567890</a>
          </div>
          <div class="footer-contact-item">
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <a href="mailto:info@110autorepair.co.uk">info@110autorepair.co.uk</a>
          </div>
        </address>
        <div class="footer-hours">
          <p><strong>Mon–Fri:</strong> 8am – 6pm</p>
          <p><strong>Saturday:</strong> 9am – 4pm</p>
          <p><strong>Sunday:</strong> Closed</p>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p class="footer-copyright">
        &copy; <?php echo esc_html( date( 'Y' ) ); ?> 110 Auto Repair Shop. All rights reserved. | 110 High Street, London, UK
      </p>
      <p class="footer-designer">
        Designed by <strong>Temoor Ahmed</strong>
        <a href="https://wa.me/923005013353" target="_blank" rel="noopener" class="designer-whatsapp">
          <i class="fab fa-whatsapp" aria-hidden="true"></i> 03005013353
        </a>
      </p>
    </div>
  </div>
</footer>

<!-- Back to Top -->
<button class="back-to-top" id="backToTop" aria-label="Back to top of page" title="Back to top">
  <i class="fas fa-chevron-up" aria-hidden="true"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>

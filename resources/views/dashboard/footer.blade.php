<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

</style>

    <title>footer</title>

</head>
<body>

<footer class="footer">
    <div class="footer-container">
        <!-- Left Section: Quarter Circle with Slideshow -->
        <div class="footer-left">
            <div class="quarter-circle">
                <div class="slideshow">
                    <img src="assets/images/vegetables.jpg" alt="Slide 1">
                    <img src="assets/images/fruits.png" alt="Slide 2">
                    <img src="assets/images/homegarden.jpeg" alt="Slide 3">
                </div>
            </div>
        </div>



        <!-- Right Section: Contact Information -->
        <div class="footer-right">
        <h4>Contact Us</h4>
            <ul class="contact-info">
                <li><i class="fas fa-phone"></i> +94 11 277 0986/+94 11 277 0998</li>
                <li><i class="fas fa-envelope"></i> Info@sarp.lk</li>
                <li><i class="fas fa-map-marker-alt"></i> 2/2/1, Kandawatta Road, Pelawatta,
                Battaramulla, Sri Lanka</li>
            </ul>
        </div>

        <!-- Center Section: Name and Title -->
        <div class="footer-center">
            <h4>Follow Us</h4>
            <div class="social-media">
                <a href="https://www.facebook.com/share/15oivQUWvM/?mibextid=wwXIfr" target="_blank">
                    <img src="assets/images/facebook.png" alt="Facebook">
                </a>
                <a href="https://x.com/sarpsrilanka?s=11&t=uRfFsnWBtDsu_0pEFQqfsw" target="_blank">
                    <img src="assets/images/x.png" alt="Twitter">
                </a>
                <a href="https://www.instagram.com/sarpsrilanka?igsh=MXYwemludWk2MHNwbQ==" target="_blank">
                    <img src="assets/images/instergram.png" alt="Instagram">
                </a>
                <a href="https://www.linkedin.com/in/sarp-media-57b8b730a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app target="_blank">
                    <img src="assets/images/linkedin.png" alt="LinkedIn">
                </a>
                <a href="https://www.youtube.com/@SARPSriLanka-dw9ge" target="_blank">
                    <img src="assets/images/youtube.png" alt="YouTube">
                </a>
            </div>
        </div>

    </div>

    <!-- Divider Line -->
    <div class="footer-divider"></div>

   <!-- Bottom Section: Logo and Description -->
    <div class="footer-bottom">
        <div class="logo-section">

        </div>


        <!-- Horizontal Images Section -->
        <div class="bottom-images">
            <img src="assets/images/name ministry png.png" alt="Image 1">
            <img src="assets/images/sarpwords.png" alt="Image 2">
            <img src="assets/images/ifad.png" alt="Image 3">
        </div>

        <p style="margin-left: 50px;">Copyright @ 2025 SARP - All Right Reserved. Concept, Design & Development by SARP Development Team</p>

    </div>

</footer>


<style>
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box; /* Ensure consistent box model across elements */
}

.footer {
    position: relative; /* Change from fixed to relative */
    bottom: 0; /* Optional: You can remove this if you don't need the bottom alignment */
    width: 100%;
    background-color: rgb(160, 186, 160);
    padding: 10px 20px;
    color: #333;
    font-family: Arial, sans-serif;
    height: auto; /* Adjust height dynamically based on content */
    z-index: 100;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}




/* When sidebar is hidden, expand footer to full width */
.left-column.hidden + .right-column .footer {
    width: 100%;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding-left: 320px;

}

.footer-left {
    position: absolute;
    top: 0;
    left: 0;
    width: 320px;
    height: 100%;
    overflow: hidden;
}

.quarter-circle {
    width: 640px;
    height: 640px;
    background: #000;
    border-radius: 0 640px 640px 0;
    position: absolute;
    top: -160px;
    left: -320px;
    overflow: hidden;
}

.slideshow {
    position: absolute;
    width: 100%;
    height: 100%;
}

.slideshow img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    animation: slide 6s infinite;
}

.footer-center {
    flex: 1;
    text-align: center;
    z-index: 1;
    margin-top: 5px;
}

.footer-right h4,
.footer-center h4 {
    font-size: 22px;
    font-weight: bold;
    margin: 0;
    color: #000;
}

.footer-center h4 {
    margin-bottom: 5px;
}

.footer-divider {
    width: 100%;
    height: 1px;
    background-color: #ddd;
    margin: 5px auto;
}

.footer-right {
    margin-right: 10px;
    color: #000;
    text-align: left;
}

.footer-right ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-right li {
    margin-bottom: 8px;
    font-size: 14px;
    display: flex;
    align-items: center;
    background-color: transparent;
    color: #000;
    padding: 0;
    border-radius: 4px;
}

.footer-right i {
    margin-right: 10px;
    color: #000;
}

.footer-bottom {
    text-align: center;
    padding-top: 5px;
    width: 100%;
}

.bottom-images {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.bottom-images img {
    width: auto;
    height: 50px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.bottom-images img:hover {
    transform: scale(1.1);
}

.social-media {
    margin-top: 5px;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.social-media a {
    display: inline-block;
    width: 30px;
    height: 30px;
}

.social-media img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.social-media img:hover {
    transform: scale(1.1);
}

/* Add margin to main content to prevent footer overlap */
.right-column {
    margin-bottom: 120px; /* Slightly larger than footer height */
}

/* Media query for small screens */
@media (max-width: 768px) {
    .footer {
        width: 100%;
        height: auto;
        min-height: 260px;
    }

    .footer-container {
        flex-direction: column;
        padding-left: 20px;
    }

    .footer-left {
        position: relative;
        width: 100%;
        height: 100px;
    }

    .quarter-circle {
        display: none;
    }
}




</style>




<script>
    const slides = document.querySelectorAll('.slideshow img');
    let currentIndex = 0;

    function showNextSlide() {
        slides.forEach((slide, index) => {
            slide.style.opacity = index === currentIndex ? '1' : '0';
        });
        currentIndex = (currentIndex + 1) % slides.length;
    }

    setInterval(showNextSlide, 3000); // Slide changes every 3 seconds
</script>






</body>
</html>

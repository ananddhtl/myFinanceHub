<footer>
    <div class="container">
        <div class="footer-top">
            <div class="fot-cont">
                <h2>Sitemap</h2>
                <ul>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i> Home Page</a></li>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i> Help And Support</a> </li>
                </ul>
            </div>
            <div class="fot-cont">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i> Login</a></li>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i> Register</a></li>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i> Private Policy</a></li>
                    <li><a href=""><i class="fa-solid fa-arrow-right"></i> Serurity Policy</a> </li>
                </ul>
            </div>
            <div class="fot-cont">
                <h2>Social Links</h2>
                <ul class="social-links">
                    <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="fot-cont">
                <h2>About Us</h2>
                <p>Our client portal serves as your gateway to complete financial control. Take charge of your financial data, update your profile, and securely upload documents with unparalleled ease.</p>
            </div>
        </div>

    </div>
    <div class="footer-bottom">
        <div class="container bottom-footer-container">
            <div class="mobile-app-pictures">
                <img src="/resources/images/play-store.png" alt="">
                <img src="./resources/images/apple-store.png" alt="">
            </div>
            <div class="design-develop-by">
                <p>© 2023 myFinanceHub. All rights reserved | Designed & Developed by <a href="">Ananda Dhital</a></p>
            </div>
        </div>
    </div>

</footer>
<!--Footer Ends Here-->


</body>
<script>
document.getElementById("loginBtn").addEventListener("click", function() {
    document.getElementById("loginModal").style.display = "block";
    document.getElementById("loginForm").style.display = "block";
});

document.getElementById("registerBtn").addEventListener("click", function() {
    document.getElementById("registerModal").style.display = "block";
    document.getElementById("registerForm").style.display = "block";
});

document.getElementsByClassName("close")[0].addEventListener("click", function() {
    document.getElementById("loginModal").style.display = "none";
    document.getElementById("loginForm").style.display = "none";
});

document.getElementsByClassName("close")[1].addEventListener("click", function() {
    document.getElementById("registerModal").style.display = "none";
    document.getElementById("registerForm").style.display = "none";
});
</script>

<!---Aos Javascript---->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init();
</script>
<!---Aos Javascript-->

</html>
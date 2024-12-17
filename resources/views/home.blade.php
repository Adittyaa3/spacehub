<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub - Find Your Perfect Workspace in Surabaya</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        /* Header styles */
        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3498db;
        }
        .nav-links {
            display: none;
        }
        .nav-links a {
            color: #333;
            text-decoration: none;
            margin-left: 1rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        /* Hero section styles */
        .hero {
            background: linear-gradient(to right, #3498db, #2c3e50);
            color: #fff;
            text-align: center;
            padding: 6rem 0 4rem;
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        /* Features section styles */
        .features {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        .features h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .feature-item {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .feature-item i {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 1rem;
        }
        /* Spaces section styles */
        .spaces {
            padding: 4rem 0;
        }
        .spaces h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        .space-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .space-item {
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .space-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .space-content {
            padding: 1.5rem;
        }
        /* Testimonials section styles */
        .testimonials {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        .testimonials h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .testimonial-item {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .testimonial-content {
            margin-bottom: 1rem;
        }
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        .testimonial-author img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 1rem;
        }
        /* Contact section styles */
        .contact {
            padding: 4rem 0;
        }
        .contact h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        /* Footer styles */
        footer {
            background-color: #2c3e50;
            color: #fff;
            padding: 2rem 0;
        }
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .footer-section {
            flex: 1;
            margin-bottom: 1rem;
            min-width: 200px;
        }
        .footer-section h3 {
            margin-bottom: 1rem;
        }
        .footer-section ul {
            list-style: none;
        }
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        /* Responsive styles */
        @media (min-width: 768px) {
            .nav-links {
                display: flex;
            }
            .hero h1 {
                font-size: 3.5rem;
            }
            .hero p {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo">SpaceHub</div>
            <div class="nav-links">
                <a href="#features">Features</a>
                <a href="#spaces">Spaces</a>
                <a href="#testimonials">Testimonials</a>
                <a href="#contact">Contact</a>
            </div>
            <a href="#" class="btn">Book Now</a>
        </nav>
    </header>

    <header>
        <nav class="container">
            <div class="logo">SpaceHub</div>
            <div class="nav-links">
                <a href="#features">Features</a>
                <a href="#spaces">Spaces</a>
                <a href="#testimonials">Testimonials</a>
                <a href="#contact">Contact</a>
                <a href="/login" class="btn">Login</a>
                <a href="/register" class="btn" style="background-color: #2ecc71;">Register</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Find Your Perfect Workspace</h1>
                <p>Book coworking spaces and study areas in Surabaya</p>
                <a href="#" class="btn">Get Started</a>
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <h2>Why Choose SpaceHub?</h2>
                <div class="feature-grid">
                    <div class="feature-item">
                        <i class="fas fa-wifi"></i>
                        <h3>High-Speed Wi-Fi</h3>
                        <p>Stay connected with our lightning-fast internet</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-coffee"></i>
                        <h3>Free Beverages</h3>
                        <p>Enjoy complimentary coffee and tea while you work</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-clock"></i>
                        <h3>24/7 Access</h3>
                        <p>Work on your schedule with round-the-clock availability</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h3>Community Events</h3>
                        <p>Network and learn at our regular community gatherings</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="spaces" class="spaces">
            <div class="container">
                <h2>Our Spaces</h2>
                <div class="space-grid">
                    <div class="space-item">
                        <img src="https://via.placeholder.com/300x200" alt="Open Workspace">
                        <div class="space-content">
                            <h3>Open Workspace</h3>
                            <p>Starting from Rp 50k/hour</p>
                            <a href="#" class="btn">Book Now</a>
                        </div>
                    </div>
                    <div class="space-item">
                        <img src="https://via.placeholder.com/300x200" alt="Private Office">
                        <div class="space-content">
                            <h3>Private Office</h3>
                            <p>Starting from Rp 100k/hour</p>
                            <a href="#" class="btn">Book Now</a>
                        </div>
                    </div>
                    <div class="space-item">
                        <img src="https://via.placeholder.com/300x200" alt="Meeting Room">
                        <div class="space-content">
                            <h3>Meeting Room</h3>
                            <p>Starting from Rp 75k/hour</p>
                            <a href="#" class="btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container">
                <h2>What Our Members Say</h2>
                <div class="testimonial-grid">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"SpaceHub has been a game-changer for my productivity. The facilities are top-notch and the community is amazing!"</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://via.placeholder.com/50x50" alt="John Doe">
                            <div>
                                <h4>John Doe</h4>
                                <p>Freelancer</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"I love the flexibility SpaceHub offers. It's the perfect environment for my growing team."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://via.placeholder.com/50x50" alt="Jane Smith">
                            <div>
                                <h4>Jane Smith</h4>
                                <p>Startup Founder</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"The study areas at SpaceHub are perfect for focused work. It's my go-to place for exam preparation."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://via.placeholder.com/50x50" alt="Alex Johnson">
                            <div>
                                <h4>Alex Johnson</h4>
                                <p>Student</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <h2>Get in Touch</h2>
                <form class="contact-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>SpaceHub</h3>
                    <p>Find your perfect workspace in Surabaya</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#spaces">Spaces</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115</p>
                    <p>Email: info@spacehub.com</p>
                    <p>Phone: +62 123 456 7890</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 SpaceHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        // JavaScript for mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelector('.nav-links');
            const menuToggle = document.createElement('button');
            menuToggle.classList.add('menu-toggle');
            menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            document.querySelector('nav').appendChild(menuToggle);

            menuToggle.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>

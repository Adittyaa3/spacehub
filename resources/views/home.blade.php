<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub - Find Your Perfect Workspace in Surabaya</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        }
    </style>

    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #ff6b6b;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        /* Header styles */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6b6b;
            text-decoration: none;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-links a {
            color: #4a4a4a;
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: #ff6b6b;
        }
        .btn {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: 600;
        }
        .btn:hover {
            background-color: #ff8787;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background-color: #4ecdc4;
        }
        .btn-secondary:hover {
            background-color: #45b7aa;
        }
        /* Hero section styles */
        .hero {
            background: url('https://www.officelovin.com/wp-content/uploads/2016/09/ccs-office-6.jpg') no-repeat center/cover;
            color: #fff;
            text-align: center;
            padding: 12rem 0 6rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        /* Features section styles */
        .features {
            padding: 6rem 0;
            background-color: #ffffff;
        }
        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            color: #ff6b6b;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .feature-item {
            background-color: #f7f7f7;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .feature-item:hover {
            transform: translateY(-5px);
        }
        .feature-item i {
            font-size: 2.5rem;
            color: #ff6b6b;
            margin-bottom: 1rem;
        }
        .feature-item h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: #ff6b6b;
        }
        /* Spaces section styles */
        .spaces {
            padding: 6rem 0;
            background-color: #f0f7ff;
        }
        .spaces h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            color: #ff6b6b;
        }
        .space-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }
        .space-item {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 300px;
        }
        .space-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }
        .space-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .space-content {
            padding: 1.5rem;
        }
        .space-content h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: #ff6b6b;
        }
        .space-content p {
            color: #4a4a4a;
            margin-bottom: 1rem;
        }
        .space-content .btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 0.75rem;
        }
        /* Testimonials section styles */
        .testimonials {
            padding: 6rem 0;
            background-color: #ffffff;
        }
        .testimonials h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            color: #ff6b6b;
        }
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .testimonial-item {
            background-color: #f7f7f7;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .testimonial-content {
            margin-bottom: 1rem;
            font-style: italic;
            color: #4a4a4a;
        }
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        .testimonial-author img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }
        .testimonial-author h4 {
            color: #ff6b6b;
            font-size: 1.1rem;
        }
        /* Contact section styles */
        .contact {
            padding: 6rem 0;
            background-color: #f0f7ff;
        }
        .contact h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            color: #ff6b6b;
        }
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #ff6b6b;
            font-weight: 600;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4ecdc4;
        }
        /* Footer styles */
        footer {
            background-color: #ff6b6b;
            color: #fff;
            padding: 4rem 0 2rem;
        }
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .footer-section {
            flex: 1;
            margin-bottom: 2rem;
            min-width: 200px;
        }
        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.4rem;
            color: #feca57;
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
            transition: color 0.3s;
        }
        .footer-section ul li a:hover {
            color: #feca57;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            opacity: 0.8;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 2rem;
            border-radius: 10px;
            max-width: 500px;
            position: relative;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .close {
            position: absolute;
            right: 1rem;
            top: 0.5rem;
            font-size: 2rem;
            cursor: pointer;
            color: #4a4a4a;
            transition: color 0.3s;
        }
        .close:hover {
            color: #ff6b6b;
        }
        .booking-form {
            display: flex;
            flex-direction: column;
        }
        .booking-form label {
            margin-bottom: 0.5rem;
            color: #ff6b6b;
            font-weight: 600;
        }
        .booking-form input,
        .booking-form select {
            margin-bottom: 1rem;
            padding: 0.75rem;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            font-size: 1rem;
        }
        .booking-form button {
            padding: 0.75rem;
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1rem;
            font-weight: 600;
        }
        .booking-form button:hover {
            background-color: #ff8787;
        }
        /* Responsive styles */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #ffffff;
                padding: 1rem;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .nav-links.active {
                display: flex;
            }
            .nav-links a {
                margin: 0.5rem 0;
            }
            .menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 1.5rem;
                color: #ff6b6b;
                cursor: pointer;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero p {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <a href="#" class="logo">SpaceHub</a>
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links">
                <a href="#features">Features</a>
                <a href="#spaces">Spaces</a>
                <a href="#testimonials">Testimonials</a>
                <a href="#contact">Contact</a>
                <a href="/login" class="btn btn-warning">Login</a>
                <a href="/register" class="btn btn-warning">Register</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Find Your Perfect Workspace</h1>
                <p>Book coworking spaces and study areas in Surabaya</p>
                <a href="#spaces" class="btn btn-secondary">Explore Spaces</a>
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
                        <img src="https://nugaspace.com/wp-content/uploads/gal-list-2.jpg" alt="Open Workspace">
                        <div class="space-content">
                            <h3>Open Workspace</h3>
                            <p>Starting from Rp 50k/hour</p>
                            <a href="#" class="btn book-btn" data-space="Open Workspace">Book Now</a>
                        </div>
                    </div>
                    <div class="space-item">
                        <img src="https://cms.disway.id/uploads/d95256df1ec1f97d6345d6bdfbd87fce.jpeg" alt="Private Office">
                        <div class="space-content">
                            <h3>Private Office</h3>
                            <p>Starting from Rp 100k/hour</p>
                            <a href="#" class="btn book-btn" data-space="Private Office">Book Now</a>
                        </div>
                    </div>
                    <div class="space-item">
                        <img src="https://nugaspace.com/wp-content/uploads/nugas-meeting-2.jpg" alt="Meeting Room">
                        <div class="space-content">
                            <h3>Meeting Room</h3>
                            <p>Starting from Rp 75k/hour</p>
                            <a href="#" class="btn book-btn" data-space="Meeting Room">Book Now</a>
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
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
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
                            <img src="https://i.pravatar.cc/150?img=2" alt="Jane Smith">
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
                            <img src="https://i.pravatar.cc/150?img=3" alt="Alex Johnson">
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

    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Book Your Space</h2>
            <form id="bookingForm" class="booking-form">
                <label for="spaceName">Space:</label>
                <input type="text" id="spaceName" readonly>
                <label for="date">Date:</label>
                <input type="date" id="date" required>
                <label for="time">Time:</label>
                <input type="time" id="time" required>
                <label for="duration">Duration (hours):</label>
                <select id="duration" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <button type="submit">Confirm Booking</button>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        // JavaScript for mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelector('.nav-links');
            const menuToggle = document.querySelector('.menu-toggle');

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

        // Booking modal functionality
        const modal = document.getElementById('bookingModal');
        const bookBtns = document.querySelectorAll('.book-btn');
        const closeBtn = document.querySelector('.close');
        const bookingForm = document.getElementById('bookingForm');
        const spaceNameInput = document.getElementById('spaceName');

        bookBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                modal.style.display = 'block';
                spaceNameInput.value = btn.getAttribute('data-space');
            });
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const space = spaceNameInput.value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const duration = document.getElementById('duration').value;

            alert(`Booking confirmed for ${space} on ${date} at ${time} for ${duration} hour(s).`);
            modal.style.display = 'none';
            bookingForm.reset();
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SpaceHub</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .header {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #ff6b6b;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1rem;
            font-weight: 300;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .container {
            display: flex;
            width: 95%;
            max-width: 900px;
            height: 500px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            z-index: 2;
        }

        /* Form Section */
        .form-section {
            flex: 0.7;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .form-header h1 {
            color: #ff6b6b;
            font-size: 1.8rem;
        }

        .form-header p {
            color: #777;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 0.8rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            color: #555;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .btn {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 0.7rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #ff8787;
        }

        .form-footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.8rem;
        }

        .form-footer a {
            text-decoration: none;
            color: #4ecdc4;
        }

        /* Image Slider Section */
        .image-slider {
            flex: 1.3;
            position: relative;
            overflow: hidden;
        }

        .image-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            transition: opacity 1s ease-in-out;
            opacity: 0;
        }

        .image-slider img.active {
            opacity: 1;
        }

        /* Navigation Buttons */
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.6);
            border: none;
            font-size: 1.2rem;
            color: #333;
            cursor: pointer;
            border-radius: 50%;
            padding: 0.5rem;
            z-index: 2;
            transition: background 0.3s;
        }

        .nav-btn:hover {
            background: white;
        }

        .prev-btn {
            left: 0.5rem;
        }

        .next-btn {
            right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SpaceHub</h1>
        <p>Explore the Universe, One Click at a Time</p>
    </div>
    <div class="container">
        <!-- Form Section -->
        <div class="form-section">
            <div class="form-header">
                <h1>Create Account</h1>
                <p>Join SpaceHub today!</p>
            </div>
            <form id="registerForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
            <div class="form-footer">
                <p>Already have an account? <a href="/login">Log In</a></p>
            </div>
        </div>

        <!-- Image Slider -->
        <div class="image-slider">
            <img src="https://nugaspace.com/wp-content/uploads/nugas-hero-img.jpg" class="active" alt="Slide 1">
            <img src="https://nugaspace.com/wp-content/uploads/nugas-contact-cta.jpg" alt="Slide 2">
            <img src="https://t-2.tstatic.net/jogja/foto/bank/images/SWALCO-salah-satu-coffee-shop-yang-cozy-buat-nugas.jpg" alt="Slide 3">
            <img src="https://nugaspace.com/wp-content/uploads/gal-slide-1-1-1024x512.jpg" alt="Slide 4">
            <img src="https://nugaspace.com/wp-content/uploads/nugas-meeting-2.jpg" alt="Slide 5">
            <button class="nav-btn prev-btn">&lt;</button>
            <button class="nav-btn next-btn">&gt;</button>
        </div>
    </div>

    <script>
        const images = document.querySelectorAll('.image-slider img');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentImageIndex = 0;

        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.toggle('active', i === index);
            });
        }

        nextBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showImage(currentImageIndex);
        });

        prevBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            showImage(currentImageIndex);
        });

        setInterval(() => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showImage(currentImageIndex);
        }, 3000); // Auto-slide every 3 seconds
    </script>
</body>
</html>

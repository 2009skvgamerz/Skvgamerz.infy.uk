<?php
// PHP Proxy for Blogger RSS Feed
// This section will only execute if the URL contains "?get_feed=true"
if (isset($_GET['get_feed']) && $_GET['get_feed'] === 'true') {
    $rss_feed_url = 'https://skvgamerzyt.blogspot.com/feeds/posts/default';

    // Attempt to fetch the RSS feed
    // Use file_get_contents for simplicity. For more robust needs, cURL would be better.
    $feed_content = @file_get_contents($rss_feed_url); // @ suppresses warnings

    if ($feed_content === FALSE) {
        // Handle error if feed could not be fetched
        http_response_code(500); // Internal Server Error
        header('Content-Type: text/plain');
        echo "Error: Could not fetch RSS feed from Blogger.";
        exit;
    }

    // Set content type header to XML so the browser/JS can parse it
    header('Content-Type: application/xml');
    echo $feed_content;
    exit; // Stop execution after sending the feed content
}
// End of PHP Proxy block
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SKVGamerz - Your ultimate source for gaming content. Find new games, Android games, PC games, and the best emulators. Level up your gaming experience!">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-278SF6XMZZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-278SF6XMZZ');
</script>
    <title>SKVGamerz - Level Up Your Gaming Experience</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
        /* General Styling */
        :root {
            --primary-accent: #007bff; /* A vibrant blue for main accents */
            --secondary-color: #343a40; /* Dark grey for secondary elements */
            --dark-background: #1a1a1a; /* Very dark background */
            --light-text: #e0e0e0; /* Light grey for text on dark backgrounds */
            --card-bg: #282828; /* Slightly lighter dark for cards */
            --section-bg-light: #f8f9fa; /* Light background for sections */
            --border-color: #444; /* Subtle border for dark elements */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: var(--dark-text);
            background-color: var(--section-bg-light);
            scroll-behavior: smooth;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 0.8em;
            color: var(--secondary-color);
        }

        a {
            text-decoration: none;
            color: var(--primary-accent);
            transition: color 0.3s ease, transform 0.2s ease;
        }

        a:hover {
            color: #0056b3; /* Darker blue on hover */
            transform: translateY(-2px);
        }

        ul {
            list-style: none;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 14px 30px;
            border-radius: 50px; /* Pill shape */
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            border: none;
            cursor: pointer;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 1em;
        }

        .btn-primary {
            background-color: var(--primary-accent);
            color: #fff;
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.2);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(0, 123, 255, 0.3);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--light-text);
            border: 2px solid var(--primary-accent);
            padding: 12px 30px; /* Adjust for border */
        }

        .btn-secondary:hover {
            background-color: var(--primary-accent);
            color: #fff;
            transform: translateY(-3px);
        }


        /* Header */
        .main-header {
            background-color: rgba(26, 26, 26, 0.95); /* Semi-transparent dark */
            color: var(--light-text);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo a {
            font-size: 2em;
            font-weight: 700;
            color: var(--light-text);
            letter-spacing: -1px;
            transition: color 0.3s ease;
        }
        .logo a:hover {
            color: var(--primary-accent);
        }

        .main-nav ul {
            display: flex;
        }

        .main-nav ul li {
            margin-left: 40px;
        }

        .main-nav ul li a {
            color: var(--light-text);
            font-weight: 400;
            position: relative;
            padding-bottom: 5px;
            font-size: 1.05em;
            transition: color 0.3s ease;
        }

        .main-nav ul li a:hover,
        .main-nav ul li a.active {
            color: var(--primary-accent);
        }

        .nav-toggle {
            display: none; /* Hidden on desktop */
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 10px;
            position: relative;
            z-index: 1001; /* Ensure it's above the menu when active */
        }

        .nav-toggle .hamburger {
            display: block;
            width: 28px;
            height: 3px;
            background: var(--light-text);
            position: relative;
            transition: all 0.3s ease-in-out;
            border-radius: 2px;
        }

        .nav-toggle .hamburger::before,
        .nav-toggle .hamburger::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            background: var(--light-text);
            transition: all 0.3s ease-in-out;
            border-radius: 2px;
        }

        .nav-toggle .hamburger::before {
            transform: translateY(-10px);
        }

        .nav-toggle .hamburger::after {
            transform: translateY(10px);
        }

        /* Hero Section */
        .hero-section {
            /* *** FIX: Replaced 404 Unsplash image with a new working one *** */
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1550745165-9ff06868494b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1MDcxMzJ8MHwxfHNlYXJjaHw1MHx8Z2FtaW5nfGVufDB8fHx8MTcwNDM3ODcxN3ww&ixlib=rb-4.0.3&q=80&w=1920') no-repeat center center/cover;
            color: var(--light-text);
            text-align: center;
            padding: 180px 20px 100px; /* More padding at top */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 700px; /* Taller hero */
            flex-direction: column;
            position: relative;
            overflow: hidden;
            border-bottom: 5px solid var(--primary-accent); /* Subtle border */
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 70%);
            pointer-events: none;
        }

        .hero-section h2 {
            font-size: 4.8em; /* Larger heading */
            margin-bottom: 25px;
            color: #fff;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
            line-height: 1.1;
            word-wrap: break-word;
            max-width: 900px;
        }

        .hero-section p {
            font-size: 1.5em;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
            font-weight: 300;
        }

        .hero-section .tagline {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.6em;
            font-weight: 600;
            color: var(--primary-accent);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* Sections General */
        section {
            padding: 100px 0; /* More padding */
            text-align: center;
        }

        section h3 {
            font-size: 3.2em; /* Larger section titles */
            margin-bottom: 60px;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
            color: var(--secondary-color);
        }

        section h3::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            width: 100px; /* Wider underline */
            height: 5px; /* Thicker underline */
            background-color: var(--primary-accent);
            border-radius: 3px;
        }

        /* Features Section */
        .features-section {
            background-color: var(--section-bg-light);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .feature-item {
            background-color: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border: 1px solid #eee;
            position: relative;
            overflow: hidden;
        }

        .feature-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: var(--primary-accent);
            transform: translateX(-100%);
            transition: transform 0.4s ease-out;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        .feature-item:hover::before {
            transform: translateX(0);
        }

        .feature-item .icon {
            font-size: 4em; /* Larger icons */
            color: var(--primary-accent);
            margin-bottom: 25px;
            transition: color 0.3s ease;
        }
        .feature-item:hover .icon {
            color: #0056b3; /* Darker blue on hover */
        }

        .feature-item h4 {
            font-size: 1.8em; /* Larger feature titles */
            margin-bottom: 15px;
            color: var(--secondary-color);
        }

        .feature-item p {
            color: var(--dark-text); /* Ensure good contrast */
            font-size: 1.05em;
            line-height: 1.7;
        }


        /* Latest Posts Section */
        .latest-posts-section {
            background-color: var(--dark-background);
            color: var(--light-text);
        }

        .latest-posts-section h3 {
            color: var(--light-text);
        }
        .latest-posts-section h3::after {
            background-color: var(--primary-accent);
        }

        .post-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .post-item {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            text-align: left;
            border: 1px solid var(--border-color);
        }

        .post-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.4);
            background-color: #333333; /* Slightly lighter on hover */
        }

        .post-item a {
            display: block;
            padding: 25px;
            color: var(--light-text);
        }

        .post-item a:hover {
            color: var(--primary-accent);
        }

        .post-item h4 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: var(--light-text); /* Post title color */
            transition: color 0.3s ease;
        }
        .post-item a:hover h4 {
            color: var(--primary-accent);
        }

        .post-item p.post-date {
            font-size: 0.9em;
            color: #a0a0a0;
            margin-bottom: 15px;
        }

        .post-item p { /* For summary text */
            color: #b0b0b0;
            font-size: 1em;
            line-height: 1.6;
        }

        .loading-message {
            font-size: 1.2em;
            color: #a0a0a0;
            text-align: center;
            grid-column: 1 / -1; /* Span across all columns */
            padding: 50px 0;
        }

        .view-all-btn {
            margin-top: 30px;
        }

        /* Styling for blog post images */
        .post-image-container {
            width: calc(100% + 50px); /* Fill entire width of the card, accounting for padding */
            height: 200px; /* Fixed height for consistency */
            overflow: hidden;
            margin: -25px -25px 20px -25px; /* Adjust margins to extend to card edges */
            border-bottom: 1px solid var(--border-color); /* Separator below image */
        }

        .post-image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the container without distortion */
            transition: transform 0.3s ease;
        }

        .post-item:hover .post-image {
            transform: scale(1.05); /* Slight zoom on hover */
        }


        /* Footer */
        .main-footer {
            background-color: var(--dark-background);
            color: var(--light-text);
            padding: 40px 0;
            text-align: center;
            font-size: 0.95em;
            border-top: 1px solid var(--border-color);
        }

        .main-footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .main-footer p {
            margin: 0;
            color: #a0a0a0;
        }

        .social-links {
            margin-top: 10px; /* Adjust for mobile if needed */
        }

        .social-links a {
            color: var(--light-text);
            font-size: 2em; /* Larger icons */
            margin-left: 20px;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .social-links a:hover {
            color: var(--primary-accent);
            transform: translateY(-3px);
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .main-nav {
                display: none; /* Hide navigation by default on smaller screens */
                flex-direction: column;
                width: 100%;
                background-color: rgba(26, 26, 26, 0.98);
                position: absolute;
                top: 65px; /* Adjust based on header height */
                left: 0;
                box-shadow: 0 5px 15px rgba(0,0,0,0.5);
                padding-bottom: 20px;
                animation: slideDown 0.3s ease-out forwards;
            }

            .main-nav.active {
                display: flex;
            }
            @keyframes slideDown {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .main-nav ul {
                flex-direction: column;
                width: 100%;
                text-align: center;
            }

            .main-nav ul li {
                margin: 15px 0;
            }
            .main-nav ul li a {
                padding: 10px 0;
                display: block;
            }


            .nav-toggle {
                display: block; /* Show hamburger icon */
            }

            /* Hamburger Icon Animation */
            .nav-toggle.active .hamburger {
                background: transparent;
            }
            .nav-toggle.active .hamburger::before {
                transform: translateY(0) rotate(45deg);
            }
            .nav-toggle.active .hamburger::after {
                transform: translateY(0) rotate(-45deg);
            }

            .hero-section {
                padding: 120px 20px 80px;
                min-height: 500px;
            }
            .hero-section h2 {
                font-size: 3em; /* Adjusted for mobile */
            }

            .hero-section p {
                font-size: 1.2em; /* Adjusted for mobile */
            }

            section {
                padding: 60px 0;
            }

            section h3 {
                font-size: 2.5em;
                margin-bottom: 40px;
            }

            .feature-item, .post-item {
                padding: 25px;
            }
            .post-image-container {
                width: calc(100% + 50px); /* Keep for mobile */
                margin: -25px -25px 20px -25px; /* Keep for mobile */
            }


            .main-footer .container {
                flex-direction: column;
            }

            .main-footer p {
                margin-bottom: 15px;
            }

            .social-links {
                margin-left: 0;
            }
        }

        @media (max-width: 480px) {
            .hero-section h2 {
                font-size: 2.2em;
            }
            .hero-section p {
                font-size: 1em;
            }
            .hero-section .tagline {
                font-size: 1.2em;
            }
            .btn {
                padding: 10px 20px;
                font-size: 0.9em;
            }
            .feature-item .icon {
                font-size: 3em;
            }
            .feature-item h4 {
                font-size: 1.5em;
            }
            .social-links a {
                font-size: 1.6em;
                margin: 0 10px;
            }
        }
    </style>

</head>
<body>

    <header class="main-header">
        <div class="container">
            <h1 class="logo"><a href="https://skvgamerzyt.blogspot.com/?m=1" target="_blank">SKVGamerz</a></h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="https://skvgamerzyt.blogspot.com/search/label/Emulators" target="_blank">Emulators</a></li>
                    <li><a href="https://skvgamerzyt.blogspot.com/search/label/Android%20Games" target="_blank">Android Games</a></li>
                    <li><a href="https://skvgamerzyt.blogspot.com/search/label/PC%20Games" target="_blank">PC Games</a></li>
                    <li><a href="https://skvgamerzyt.blogspot.com/?m=1#contact-footer" target="_blank">Contact</a></li>
                </ul>
            </nav>
            <button class="nav-toggle" aria-label="toggle navigation">
                <span class="hamburger"></span>
            </button>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="container">
                <p class="tagline">Level Up Your Gaming Experience</p>
                <h2>Your Ultimate Source for Gaming Content!</h2>
                <p>Dive into the world of emulators, new games, PC games, Android games, and much more.</p>
                <a href="https://skvgamerzyt.blogspot.com/?m=1" target="_blank" class="btn btn-primary">Visit Our Blog <i class="fas fa-arrow-right"></i></a>
            </div>
        </section>

        <section class="features-section">
            <div class="container">
                <h3>What We Offer</h3>
                <div class="feature-grid">
                    <div class="feature-item">
                        <i class="fas fa-gamepad icon"></i>
                        <h4>New Games</h4>
                        <p>Stay updated with the latest releases and popular titles.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-mobile-alt icon"></i>
                        <h4>Android Games</h4>
                        <p>Explore exciting mobile games and modded versions.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-desktop icon"></i>
                        <h4>PC Games</h4>
                        <p>Discover tips, tricks, and reviews for your favorite PC titles.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-cogs icon"></i>
                        <h4>Emulators</h4>
                        <p>Learn about and download the best emulators for all platforms.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="blog-posts" class="latest-posts-section">
            <div class="container">
                <h3>Latest From Our Blog</h3>
                <div id="post-list" class="post-grid">
                    <p class="loading-message">Loading blog posts...</p>
                </div>
                <a href="https://skvgamerzyt.blogspot.com/?m=1" target="_blank" class="btn btn-secondary view-all-btn">View All Posts <i class="fas fa-external-link-alt"></i></a>
            </div>
        </section>

    </main>

    <footer class="main-footer" id="contact-footer">

 <a href='http://www.freevisitorcounters.com'>http://freevisitorcounters.com</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=6f46a41fabfb00957ffd607ed0e0cd6839c12066'></script>
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1355118/t/0"></script>

<a href="https://www.sigmatraffic.com/blog/that-s-why-the-bounce-rate-on-your-site-is-over-80?ref=301617">website average

        <div class="container">
            <p>© 2025 SKVGamerz. All rights reserved.</p>
            <div class="social-links">
                <a href="https://www.twitch.tv/skvgamerz" target="_blank" aria-label="Twitch"><i class="fab fa-twitch"></i></a>
                <a href="https://youtube.com/8" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rssFeedProxyUrl = 'index.php?get_feed=true'; 
            const postList = document.getElementById('post-list');
            const loadingMessage = document.querySelector('.loading-message');

            // Mobile Navigation Toggle
            const navToggle = document.querySelector('.nav-toggle');
            const mainNav = document.querySelector('.main-nav');

            if (navToggle && mainNav) {
                navToggle.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                    navToggle.classList.toggle('active'); // For hamburger animation
                });
            }

            // Function to fetch and display blog posts
            function fetchBlogPosts() {
                if (loadingMessage) {
                    loadingMessage.style.display = 'block'; // Ensure loading message is visible initially
                    loadingMessage.textContent = 'Loading blog posts...'; // Reset text
                }
                
                // console.log("Attempting to fetch blog posts from PHP proxy."); // DEBUG

                fetch(rssFeedProxyUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok, status: ' + response.status + ' ' + response.statusText);
                        }
                        return response.text();
                    })
                    .then(str => {
                        // console.log("Received response text. Attempting to parse XML."); // DEBUG
                        
                        // Check if the response is valid XML (and not an error message from PHP proxy)
                        if (str.startsWith('Error:') || !str.includes('<feed')) { 
                             throw new Error('Server returned an error or invalid feed for RSS: ' + str.substring(0, 100) + '...'); // Truncate error for console
                        }
                        
                        return new window.DOMParser().parseFromString(str, "text/xml");
                    })
                    .then(data => {
                        // console.log("XML parsed successfully. Looking for posts."); // DEBUG
                        
                        const posts = data.querySelectorAll('entry');
                        
                        // Hide loading message and clear previous content
                        if (loadingMessage) {
                            loadingMessage.style.display = 'none'; 
                        }
                        
                        // *** FIX: Added robust check for postList ***
                        if (postList) { 
                           postList.innerHTML = ''; 
                        } else {
                           console.error("Critical Error: postList element is missing, cannot display blog posts.");
                           // Display a fallback error message to the user if postList is missing
                           const errorMessageDiv = document.createElement('div');
                           errorMessageDiv.classList.add('loading-message'); // Re-use styling
                           errorMessageDiv.style.display = 'block';
                           errorMessageDiv.textContent = 'Error: Failed to find element to display blog posts.';
                           document.querySelector('.latest-posts-section .container').appendChild(errorMessageDiv);
                           return; // Stop execution if postList is not found
                        }

                        if (posts.length === 0) {
                            postList.innerHTML = '<p class="loading-message" style="display: block;">No posts found on the blog.</p>'; 
                            // console.log("No posts found in the XML feed."); // DEBUG
                            return;
                        }
                        
                        // console.log(`Found ${posts.length} posts. Displaying first 6.`); // DEBUG

                        // Limit to top 6 posts for cleaner homepage display
                        const postsToShow = Array.from(posts).slice(0, 6); 

                        postsToShow.forEach((post, index) => {
                            try { // Added try-catch for individual post processing
                                const title = post.querySelector('title').textContent;
                                const linkElement = post.querySelector('link[rel="alternate"]');
                                const link = linkElement ? linkElement.getAttribute('href') : '#'; 
                                
                                let published = post.querySelector('published') ? new Date(post.querySelector('published').textContent).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : 'No date';
                                
                                let imageUrl = '';
                                const thumbnailNode = post.querySelector('media\\:thumbnail'); 
                                if (thumbnailNode && thumbnailNode.hasAttribute('url')) {
                                    imageUrl = thumbnailNode.getAttribute('url');
                                } else {
                                    const contentNode = post.querySelector('content') || post.querySelector('summary');
                                    if (contentNode) {
                                        const tempDivForImages = document.createElement('div');
                                        tempDivForImages.innerHTML = contentNode.textContent;
                                        const imgElement = tempDivForImages.querySelector('img');
                                        if (imgElement && imgElement.src) {
                                            imageUrl = imgElement.src;
                                            // Blogger often provides small thumbnails, we can try to get a larger version
                                            imageUrl = imageUrl.replace(/\/s\d+-c\//, '/s720/'); // Try to get a larger image
                                        }
                                    }
                                }

                                let summary = '';
                                const summaryNode = post.querySelector('summary') || post.querySelector('content');
                                if (summaryNode) {
                                    const tempDivForSummary = document.createElement('div');
                                    tempDivForSummary.innerHTML = summaryNode.textContent; 
                                    summary = tempDivForSummary.textContent || tempDivForSummary.innerText || ''; 

                                    summary = summary.replace(/\s+/g, ' ').trim(); 
                                    summary = summary.substring(0, 150); 
                                    if (summary.length >= 150) { 
                                        summary += '...'; 
                                    }
                                }

                                let imageHtml = imageUrl ? `<div class="post-image-container"><img src="${imageUrl}" alt="${title}" class="post-image"></div>` : '';

                                const postItem = document.createElement('div');
                                postItem.classList.add('post-item');
                                postItem.innerHTML = `
                                    <a href="${link}" target="_blank">
                                        ${imageHtml}
                                        <h4>${title}</h4>
                                        <p class="post-date">Published: ${published}</p>
                                        <p>${summary}</p>
                                    </a>
                                `;
                                postList.appendChild(postItem);
                            } catch (e) {
                                console.error(`Error processing post ${index + 1}:`, e); 
                            }
                        });
                        // console.log("Finished displaying posts."); // DEBUG
                    })
                    .catch(error => {
                        const errorMessage = 'Failed to load posts. (Error: ' + error.message + ')';
                        if (postList) { 
                            postList.innerHTML = `<p class="loading-message" style="display: block;">${errorMessage}</p>`;
                        } else {
                           console.error("Critical Error: postList element is missing, cannot display error message.");
                        }
                        console.error('Error fetching blog posts:', error); 
                    });
            }

            // Initial fetch of blog posts
            fetchBlogPosts();
        });
    </script>
</body>
</html>

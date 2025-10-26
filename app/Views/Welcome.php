<?php
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Christ the King College</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/phone-style.css" />
    <link rel="stylesheet" href="css/tablet-style.css" />
    <link rel="stylesheet" href="css/laptop-style.css" />
    <link rel="stylesheet" href="css/animation-style.css" />
    <link rel="stylesheet" href="css/posts.css" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Christ the King College</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section 1 -->
    <section id="video-section">
        <div class="video-wrapper">
            <video id="background-video" muted autoplay loop playsinline>
                <source src="videos/background.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <div id="video-overlay"></div>
            <div id="center-picture"></div>
        </div>
    </section>

    <section id="awardees-map-video" class="container-fluid px-5 my-0">
        <h1></h1>
        <h2 class="mb-4 text-center h0h0">CONGRATULATIONS 🎓</h2>

        <div
            id="awardee-showcase"
            class="text-center position-relative mx-auto mb-4"
            style="width: 220px; height: 220px">
            <img src="img/pic4.jpg" alt="Awardee 4" class="showcase-img" />
            <img src="img/pic5.jpg" alt="Awardee 5" class="showcase-img" />
            <img src="img/pic6.jpg" alt="Awardee 6" class="showcase-img" />
            <img src="img/pic7.jpg" alt="Awardee 7" class="showcase-img" />
            <img src="img/pic8.jpg" alt="Awardee 8" class="showcase-img" />
            <img src="img/pic10.jpg" alt="Awardee 10" class="showcase-img" />
            <img src="img/pic11.jpg" alt="Awardee 11" class="showcase-img" />
            <img src="img/pic12.jpg" alt="Awardee 12" class="showcase-img" />
            <img src="img/pic13.jpg" alt="Awardee 13" class="showcase-img" />
            <img src="img/pic14.jpg" alt="Awardee 14" class="showcase-img" />
            <img src="img/pic15.jpg" alt="Awardee 15" class="showcase-img" />
            <img src="img/pic16.jpg" alt="Awardee 16" class="showcase-img" />
            <img src="img/pic17.jpg" alt="Awardee 17" class="showcase-img" />
            <img src="img/pic18.jpg" alt="Awardee 18" class="showcase-img" />
            <img src="img/pic19.jpg" alt="Awardee 19" class="showcase-img" />
            <img src="img/pic20.jpg" alt="Awardee 20" class="showcase-img" />
            <img src="img/pic21.jpg" alt="Awardee 21" class="showcase-img" />
            <img src="img/pic22.jpg" alt="Awardee 22" class="showcase-img" />
            <img src="img/pic23.jpg" alt="Awardee 23" class="showcase-img" />
            <img src="img/pic24.jpg" alt="Awardee 24" class="showcase-img" />
            <img src="img/pic25.jpg" alt="Awardee 25" class="showcase-img" />
            <img src="img/pic26.jpg" alt="Awardee 26" class="showcase-img" />
            <img src="img/pic27.jpg" alt="Awardee 27" class="showcase-img" />
            <img src="img/pic28.jpg" alt="Awardee 28" class="showcase-img" />
            <img src="img/pic29.jpg" alt="Awardee 29" class="showcase-img" />
            <img src="img/pic30.jpg" alt="Awardee 30" class="showcase-img" />
            <img src="img/pic31.jpg" alt="Awardee 31" class="showcase-img" />
            <img src="img/pic32.jpg" alt="Awardee 32" class="showcase-img" />
            <img src="img/pic33.jpg" alt="Awardee 33" class="showcase-img" />
            <img src="img/pic34.jpg" alt="Awardee 34" class="showcase-img" />
            <img src="img/pic35.jpg" alt="Awardee 35" class="showcase-img" />
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <h2 class="h1h1">Why choose CKC?</h2>
                <div class="ratio ratio-16x9">
                    <iframe
                        id="yt-video-1"
                        src="https://www.youtube.com/embed/LU9l8wFSU4g?enablejsapi=1"
                        title="School Intro 1"
                        allow="autoplay"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="h1h1">President's corner</h2>
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.youtube.com/embed/VuGEYlO5etU"
                        title="School Intro 2"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- Google Map -->
        <div class="map-container text-center">
            <h2 class="h1h1">📍 Location</h2>
        </div>

        <div
            class="map-container rounded shadow mb-4"
            style="height: 450px; overflow: hidden; border: 4px solid #007bff">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5235.174778070008!2d125.10207536383683!3d8.823751674037393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33002eeddbf145c1%3A0xfad5a15f4306db12!2sChrist%20the%20King%20College!5e0!3m2!1sen!2sph!4v1758985080794!5m2!1sen!2sph"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Section 2 -->
    <section id="gallery" class="container-fluid">
        <div class="center-heading">
            <h2 class="h3h3">
                Facilities
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 500 150"
                    preserveAspectRatio="none">
                    <path
                        d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
                </svg>
            </h2>
        </div>
        <div class="gallery-grid">
            <img
                src="img/facility1.jpg"
                alt="Grade School Library"
                class="wide block1" />
            <img
                src="img/facility2.jpg"
                alt="Grade School Library"
                class="tall block1" />
            <img
                src="img/facility3.jpg"
                alt="Grade School Library"
                class="big block2" />
            <img
                src="img/facility4.jpg"
                alt="Grade School Library"
                class="block2" />
            <img
                src="img/facility5.jpg"
                alt="Grade School Library"
                class="wide block1" />
            <img
                src="img/facility6.jpg"
                alt="Grade School Library"
                class="block2" />
            <img
                src="img/facility7.jpg"
                alt="Grade School Library"
                class="tall block1" />
            <img
                src="img/facility8.jpg"
                alt="Grade School Library"
                class="block1" />
            <img
                src="img/facility9.jpg"
                alt="Grade School Library"
                class="big block1" />
            <img
                src="img/facility10.jpg"
                alt="Grade School Library"
                class="block2" />
            <img
                src="img/facility11.jpg"
                alt="Grade School Library"
                class="wide block2" />
            <img
                src="img/facility12.jpg"
                alt="Grade School Library"
                class="block2" />
            <img
                src="img/facility13.jpg"
                alt="Grade School Library"
                class="tall block1" />
            <img
                src="img/facility14.jpg"
                alt="Grade School Library"
                class="block1" />
            <img
                src="img/facility15.jpg"
                alt="College Library"
                class="big block2" />
            <img
                src="img/facility16.jpg"
                alt="College Library"
                class="block2" />
            <img
                src="img/facility17.jpg"
                alt="College Library"
                class="wide block1" />
            <img
                src="img/facility18.jpg"
                alt="College Library"
                class="block2" />
            <img
                src="img/facility19.jpg"
                alt="College Library"
                class="tall block2" />
            <img
                src="img/facility20.jpg"
                alt="Old Nursing Labaratory"
                class="block2" />
            <img
                src="img/facility21.jpg"
                alt="Old Nursing Labaratory"
                class="big block1" />
            <img
                src="img/facility22.jpg"
                alt="Old Nursing Labaratory"
                class="block1" />
            <img
                src="img/facility23.jpg"
                alt="Old Nursing Labaratory"
                class="wide block2" />
            <img
                src="img/facility24.jpg"
                alt="Old Nursing Labaratory"
                class="block1" />
            <img
                src="img/facility25.jpg"
                alt="Old Nursing Labaratory"
                class="tall block2" />
            <img
                src="img/facility26.jpg"
                alt="Old Nursing Labaratory"
                class="block2" />
            <img
                src="img/facility27.jpg"
                alt="Old Nursing Labaratory"
                class="big block1" />
            <img
                src="img/facility28.jpg"
                alt="Old Nursing Labaratory"
                class="block1" />
            <img
                src="img/facility29.jpg"
                alt="Old Nursing Labaratory"
                class="wide block1" />
            <img
                src="img/facility30.jpg"
                alt="Old Nursing Labaratory"
                class="block2" />
            <img
                src="img/facility31.jpg"
                alt="Old Nursing Labaratory"
                class="tall block1" />
            <img
                src="img/facility32.jpg"
                alt="Old Nursing Labaratory"
                class="block2" />
            <img
                src="img/facility33.jpg"
                alt="Old Nursing Labaratory"
                class="bigs block2" />
            <img
                src="img/facility34.jpg"
                alt="Computer Labaratory"
                class="block1" />
            <img
                src="img/facility35.jpg"
                alt="Computer Labaratory"
                class="wide block1" />
            <img
                src="img/facility36.jpg"
                alt="Computer Labaratory"
                class="block1" />
            <img
                src="img/facility37.jpg"
                alt="Computer Labaratory"
                class="tall block2" />
            <img
                src="img/facility38.jpg"
                alt="Computer Labaratory"
                class="block2" />
        </div>

        <div id="lightbox">
            <span class="close-btn">&times;</span>
            <span class="nav-arrow prev">&#10094;</span>
            <img id="lightbox-img" src="" alt="Expanded Photo" />
            <span class="nav-arrow next">&#10095;</span>
            <p id="lightbox-caption"></p>
        </div>
    </section>

    <!--
    <section id="facebook-posts" class="container-fluid my-5">
        <h2 class="mb-4 text-center">Latest Posts</h2>
        <div class="row g-4">
            <article class="col-md-3 post-card border rounded bg-white shadow-sm">
                <div class="position-relative">
                    <img src="public/img/post1.PNG" alt="Intramurals 2025" class="img-fluid rounded-top" />
                    <div
                        class="post-label bg-warning text-dark fw-semibold position-absolute top-0 end-0 mt-2 me-2 rounded-pill px-2 text-nowrap">
                        JUNIOR HIGHSCHOOL PROGRAM</div>
                </div>
                <div class="p-3">
                    <h5 class="post-title fw-bold fst-italic">
                        <em>Intramurals 2025: Igniting the Torch of Valor and Synergy</em>
                    </h5>
                    <p class="post-subtitle fst-italic text-secondary">
                        <em>Intramurals 2025: Igniting the Torch of Valor and Synergy</em> The new week began with the
                        most anticipated battle of skill,
                    </p>
                    <a href="https://www.facebook.com/share/v/1CKrzVKoyA/"
                        class="text-warning fw-semibold text-decoration-none">READ MORE &raquo;</a>
                </div>
                <footer class="post-footer text-muted small border-top px-3 py-2">
                    <span class="me-3">September 17, 2025</span> &bull; <span>No Comments</span>
                </footer>
            </article>

            <article class="col-md-3 post-card border rounded bg-white shadow-sm">
                <div class="position-relative">
                    <img src="public/img/post2.PNG" alt="Flex Fest Cup" class="img-fluid rounded-top" />
                    <div
                        class="post-label bg-warning text-dark fw-semibold position-absolute top-0 end-0 mt-2 me-2 rounded-pill px-2 text-nowrap">
                        KING SCROLL</div>
                </div>
                <div class="p-3">
                    <h5 class="post-title fw-bold fst-italic">
                        Christ the King College Opens Flex Fest Cup 2025
                    </h5>
                    <p class="post-subtitle fst-italic text-secondary">
                        Christ the King College Opens Flex Fest Cup 2025 BE READY! Christ the King College (CKC) opens
                        annual Intramurals week with
                    </p>
                    <a href="#" class="text-warning fw-semibold text-decoration-none">READ MORE &raquo;</a>
                </div>
                <footer class="post-footer text-muted small border-top px-3 py-2">
                    <span class="me-3">September 16, 2025</span> &bull; <span>No Comments</span>
                </footer>
            </article>

            <article class="col-md-3 post-card border rounded bg-white shadow-sm">
                <div class="position-relative">
                    <img src="post3.jpg" alt="Learning and Inspiration" class="img-fluid rounded-top" />
                    <div
                        class="post-label bg-warning text-dark fw-semibold position-absolute top-0 end-0 mt-2 me-2 rounded-pill px-2 text-nowrap">
                        STUDENTS</div>
                </div>
                <div class="p-3">
                    <h5 class="post-title fw-bold fst-italic">
                        A Day of Learning and Inspiration
                    </h5>
                    <p class="post-subtitle fst-italic text-secondary">
                        A Day of Learning and Inspiration Look, CKC-HED’s Sports Club held a meaningful and successful
                        seminar last September 6, 2025,
                    </p>
                    <a href="#" class="text-warning fw-semibold text-decoration-none">READ MORE &raquo;</a>
                </div>
                <footer class="post-footer text-muted small border-top px-3 py-2">
                    <span class="me-3">September 9, 2025</span> &bull; <span>No Comments</span>
                </footer>
            </article>

            <article class="col-md-3 post-card border rounded bg-white shadow-sm">
                <div class="position-relative">
                    <img src="post4.jpg" alt="ASEAN Celebration" class="img-fluid rounded-top" />
                    <div
                        class="post-label bg-warning text-dark fw-semibold position-absolute top-0 end-0 mt-2 me-2 rounded-pill px-2 text-nowrap">
                        SERVICES</div>
                </div>
                <div class="p-3">
                    <h5 class="post-title fw-bold fst-italic">
                        CHED’s 58th ASEAN Celebration and Regional Quality Awards held on August 19, 2025
                    </h5>
                    <p class="post-subtitle fst-italic text-secondary">
                        CHED’s 58th ASEAN Celebration and Regional Quality Awards held on August 19, 2025 The Dean of
                        Student Affairs, G. Paul
                    </p>
                    <a href="#" class="text-warning fw-semibold text-decoration-none">READ MORE &raquo;</a>
                </div>
                <footer class="post-footer text-muted small border-top px-3 py-2">
                    <span class="me-3">September 1, 2025</span> &bull; <span>No Comments</span>
                </footer>
            </article>
        </div>
    </section>
-->
    <div class="center-heading">
        <h2 class="h2h2">
            Latest Posts
            <svg viewBox="0 0 500 180" preserveAspectRatio="none">
                <path
                    d="M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6"></path>
                <path
                    d="M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4"></path>
            </svg>
        </h2>
    </div>

    <section id="section3" class="container my-5 text-center">
        <!-- New 1.1 Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/post1.1.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/p/16qVuZcaUz/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Post-Quake Safety and Care</div>
                    <div class="text_s">CKC DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">35</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/13/25</span>
                </div>
            </div>
        </div>

        <!-- New 1.2 Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/post1.2.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/p/17h8j1DWpp/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Passing Civil Service Exam</div>
                    <div class="text_s">CKC DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">200</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/13/25</span>
                </div>
            </div>
        </div>

        <!-- New 1st Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/new\ post\ 1.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/p/16uG2qnUgR/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Happy Birthday Sister Maria</div>
                    <div class="text_s">CKC DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">81</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/13/25</span>
                </div>
            </div>
        </div>

        <!-- New 2nd Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/new\ post\ 2.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/p/1HFBVDYwEg/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Earthquake Inspection</div>
                    <div class="text_s">CKC DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">191</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/10/25</span>
                </div>
            </div>
        </div>

        <!-- New 3rd Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/new\ post\ 3.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/p/1CSXHMqcVK/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">CHED Visitation</div>
                    <div class="text_s">CKC DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">53</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/8/25</span>
                </div>
            </div>
        </div>

        <!-- New 1.3 Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/post1.3.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/p/17dT5Pu9at/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - BSBA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Business Week 2025</div>
                    <div class="text_s">BSBA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">52</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/8/25</span>
                </div>
            </div>
        </div>

        <!-- 1st Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post1.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/CKCSSC/posts/pfbid032VhU6zwAFrkYn3tV6oerJ18BvXHzJNRPN7fNBRvMJcm4APADa9aUWfe5N6c3CRQtl"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - CKCSSC.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Happy World Teachers' Day</div>
                    <div class="text_s">CKCSCC</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">32</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/5/25</span>
                </div>
            </div>
        </div>

        <!-- 2nd Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post2.PNG')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/v/17EKEiCWbN/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - BSBA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Entrepreneurial Bootcamp 2025</div>
                    <div class="text_s">BSBA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">38</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/4/25</span>
                </div>
            </div>
        </div>

        <!-- 3rd Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post3.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/PAGMGingoog/posts/pfbid02ferMqfmp8gv5QU6fBaVf8pBmp6gJeqohtDY8XYV3aP93dAtejWKt7SU2QtRQfLbgl"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - CKCSSC.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Project Ambagan</div>
                    <div class="text_s">CKCSCC</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">107</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/4/25</span>
                </div>
            </div>
        </div>

        <!-- 4th Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post4.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/thekingsscrollpublication/posts/pfbid0285wkZBHHriSfEeAzfca2CiopP3LW2PbH6nr65MxtVUsrJHHkrg5siGU6aoqpS49Ql"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - KING'S SCROLL.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">BSHM Event</div>
                    <div class="text_s">King's Scroll</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">59</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/4/25</span>
                </div>
            </div>
        </div>

        <!-- 5th Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post5.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/CKCSSC/posts/pfbid0Zy9Y4GmUf1wuGX7pK8k7Sns9ynsdNbEwqHBWriK6Wn9eaXgVAWP47XGiXsLjD8xPl"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - CKCSSC.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Youth Orientation</div>
                    <div class="text_s">CKCSCC</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">21</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/4/25</span>
                </div>
            </div>
        </div>

        <!-- 6th Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post6.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/thekingsscrollpublication/posts/pfbid0dHo3Kn7vJLsvzapfeHuPq8h6QZbHVnKSapRvkJdR4Y6JJjG67rm398KkArzBZyMFl"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - KING'S SCROLL.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">First Friday Mass of October</div>
                    <div class="text_s">King's Scroll</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">47</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/3/25</span>
                </div>
            </div>
        </div>

        <!-- 7th Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post7.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/ckcdsa/posts/pfbid02jF2WaKYEkqn6R32NnP2cQTALRfrCzhv11puuEH8BpFjirMt3zLW3siJah56TjbWl"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Scripture Meets Your Story</div>
                    <div class="text_s">CKC DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">25</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/3/25</span>
                </div>
            </div>
        </div>

        <!-- 8th Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post8.PNG')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/permalink.php?story_fbid=pfbid0ZWPdqPDbNBQgji1sU12AsHX1dQhJBn8HwNqjrkCwhFqLzDMNejQKTYdZaAQvpN4hl&id=61551116121013"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - BSHM.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Seminar on Social Graces 101</div>
                    <div class="text_s">BSHM</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">22</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/2/25</span>
                </div>
            </div>
        </div>

        <!-- 9th Post -->
        <div class="main block3">
            <div class="card" style="background-image: url('img/post9.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/ckcguidancecenter/posts/pfbid02WTUDf5HdpMezZPAKwA1CMuCENyNgQSn5vbhmyn5pKHyxVQHf4MxLXgAgMXC5tgewl"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - GUIDANCE.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Seminar on Mental Health</div>
                    <div class="text_s">Guidance</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">16</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">10/1/25</span>
                </div>
            </div>
        </div>

        <!-- 10th Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/post10.jpg')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/CKCITProgram/posts/2117090278701411"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - BSIT.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Cover Photo Changed</div>
                    <div class="text_s">BSIT</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">18</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">9/30/25</span>
                </div>
            </div>
        </div>

        <!-- 11th Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/post11.PNG')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/v/16EtsTfHAX/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - DSA.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Flex Fest Cup 2025 Vlog</div>
                    <div class="text_s">CKC - DSA</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">343</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">9/25/25</span>
                </div>
            </div>
        </div>

        <!-- 12th Post -->
        <div class="main block3">
            <div
                class="card"
                style="background-image: url('img/post12.PNG')">
                <div class="fl">
                    <div class="fullscreen">
                        <a
                            href="https://www.facebook.com/share/v/17V7Ffinxx/"
                            target="_blank">
                            <i class="fab fa-facebook-f fullscreen_icon"></i>
                        </a>
                    </div>
                </div>
                <div class="card_content"></div>
                <div class="card_back"></div>
            </div>

            <div class="data">
                <div class="img">
                    <img src="img/LOGO - CKCSSC.jpg" alt="Admin Image" />
                </div>
                <div class="text">
                    <div class="text_m">Flex Fest Cup 2025 Video Winner</div>
                    <div class="text_s">CKCSSC</div>
                </div>
            </div>

            <div class="btns">
                <div class="likes">
                    <svg viewBox="-2 0 105 92" class="likes_svg">
                        <path
                            d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71Z"></path>
                    </svg>
                    <span class="likes_text">164</span>
                </div>
                <div class="views">
                    <svg
                        title="Views"
                        viewBox="0 0 24 24"
                        class="views_svg"
                        width="24"
                        height="24"
                        fill="currentColor">
                        <path
                            d="M12 1.75C6.072 1.75 1.25 6.572 1.25 12.5S6.072 23.25 12 23.25 22.75 18.428 22.75 12.5 17.928 1.75 12 1.75zm0 20.5c-5.108 0-9.25-4.142-9.25-9.25S6.892 3.75 12 3.75 21.25 7.892 21.25 12.5 17.108 22.25 12 22.25z" />
                        <path d="M12.75 7.25h-1.5v6l5.25 3.15.75-1.23-4.5-2.67V7.25z" />
                    </svg>
                    <span class="views_text">9/24/25</span>
                </div>
            </div>
        </div>
    </section>

    <footer class="custom-footer">
        <div class="footer-top">
            <div class="footer-links"></div>
        </div>
        <div class="footer-bottom">
            <div class="footer-content">
                <!-- Crest column -->
                <div class="footer-col footer-crest-col">
                    <img
                        src="img/LOGO - REPUBLIKA NG PILIPINAS.png"
                        alt="Philippine Crest"
                        class="footer-crest" />
                    <h2>REPUBLIC OF<br />THE PHILIPPINES</h2>
                    <p>All content is in the public domain unless otherwise stated.</p>
                    <a href="https://ckcgingoog.edu.ph/privacy-policy">Privacy Policy</a>
                </div>
                <!-- About column -->
                <div class="footer-col">
                    <h3>About EDU.PH</h3>
                    <p>
                        Learn more about the Philippine education system, its
                        institutions, programs, and initiatives dedicated to providing
                        quality and accessible learning for all.
                    </p>
                </div>
                <!-- Government links column -->
                <div class="footer-col">
                    <h3>Government Links</h3>
                    <ul>
                        <li>
                            <a href="https://op-proper.gov.ph">Office of the President</a>
                        </li>
                        <li>
                            <a href="https://www.ovp.gov.ph">Office of the Vice President</a>
                        </li>
                        <li>
                            <a href="https://web.senate.gov.ph">Senate of the Philippines</a>
                        </li>
                        <li>
                            <a href="https://web.senate.gov.ph">House of Representatives</a>
                        </li>
                        <li><a href="https://sc.judiciary.gov.ph">Supreme Court</a></li>
                        <li>
                            <a href="https://ca.judiciary.gov.ph">Court of Appeals</a>
                        </li>
                        <li><a href="https://sb.judiciary.gov.ph">Sandiganbayan</a></li>
                    </ul>
                </div>
                <!-- Logos column -->
                <div class="footer-col footer-logos-col">
                    <div class="footer-logos">
                        <img
                            src="img/LOGO - REPUBLIKA NG PILIPINAS 1.png"
                            alt="PH Crest" />
                        <img
                            src="img/LOGO - TRANSPARENCY SEAL.png"
                            alt="PH Seal" />
                        <img src="img/LOGO - EDUKASYON.webp" alt="DEPED" />
                        <img src="img/LOGO - CHED.png" alt="CHED" />
                    </div>
                </div>
            </div>
            <div class="footer-bottom-bar">
                <span class="contact-item">
                    📞 <a href="tel:0888610149">088 861 0149</a>
                </span>

                <span class="copyright">
                    Copyright © 2025 Christ the King College | Powered by Christ the
                    King College
                </span>

                <span class="contact-item">
                    ✉️
                    <a href="mailto:ckcrvm@ckcgingoog.edu.ph">ckcrvm@ckcgingoog.edu.ph</a>
                </span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>


<?php $this->stop(); ?>
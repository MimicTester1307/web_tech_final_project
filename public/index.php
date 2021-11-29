<?php
$title = "Welcome to StarLab";
include "../templates/_header.php";
?>

<main>
    <!-- Carousel -->
    <section id="carousel-section">
        <div id="carousel_div">
            <div id="carouselExampleCaptions" class="carousel slide h-50" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/drone.jpeg" class="d-block w-100 carousel-image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Star Lab - A Wind River Company</h5>
                            <p>
                                Star Lab is Wind River's Cyber Security and Technology Protection Group, protecting mission-critical embedded systems from the most advanced threats.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/helicopter.jpeg" class="d-block w-100 carousel-image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Secure Embedded Virtualization</h5>
                            <p>
                                Armed with decades of experience protecting important U.S. defense assets and commercial devices,
                                Star Lab is delivering the most secure embedded virtualization products on the market today.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/superior_results.jpg" class="d-block w-100 carousel-image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Military Grade Linux</h5>
                            <p>
                                Star Lab protects the most mission-critical systems in the world.
                                With proven expertise and a seamless approach to customer collaboration, we consistently deliver products that lead in security, reliability and value.
                            </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonial-section">
        <!-- Header -->
        <div class="superior-results-div">
            <h3 class="superior-results-header">
                Superior Results
            </h3>
        </div>

        <!-- Customer Success Stories -->
        <div class="row container ms-5">
            <div class="col">
                <p class="success-story">
                    “The Star Lab team integrated seamlessly with ours, they were always accessible and responsive and were an extension of our team and not just a vendor.”

                    <span class="customer-name">Todd B.</span>
                </p>
            </div>

            <div class="col">
                <p class="success-story">
                    “Star Lab’s hypervisor is a secure, performant virtualization solution for customers looking to move toward modern computing architectures. Their products are compatible across multiple processing platforms, making security easy and affordable.”

                    <span class="customer-name">Scott O.</span>
                </p>
            </div>

            <div class="col">
                <p class="success-story">
                    “Our contract had complex security requirements that had to be solved quickly, Star Lab had not only the products that fit the bill but also a great integration support approach. We look forward to working with them again.”

                    <span class="customer-name">Chris C.</span>
                </p>
            </div>
        </div>


    </section>
</main>
<?php
include "../templates/_footer.php";

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seekers - Find Your Dream Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-blue-600">Job Seekers</a>
            <nav class="space-x-6">
                
                <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-500 to-indigo-700 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold mb-4">Find Your Dream Job Today</h1>
            <p class="text-xl mb-8">Connecting job seekers with top companies.</p>
            <a href="/register" class="bg-white text-blue-700 font-semibold px-8 py-3 rounded hover:bg-gray-200">
                Get Started
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-gray-100 p-8 rounded shadow-md">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Personalized Job Matches</h3>
                    <p>We recommend jobs that suit your skills and experience.</p>
                </div>
                <div class="bg-gray-100 p-8 rounded shadow-md">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Easy Application Process</h3>
                    <p>Apply to jobs with a single click and track your status.</p>
                </div>
                <div class="bg-gray-100 p-8 rounded shadow-md">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Trusted Employers</h3>
                    <p>Get hired by reputable companies in various industries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Listings -->
    <section id="jobs" class="py-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12">Featured Job Listings</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Job Card Example -->
                <? $limitedJobs = array_slice($jobs,0,5);
                foreach($limitedJobs as $job): ?> 
                <div class="bg-white p-6 rounded shadow-md">
                    <h3 class="text-xl font-bold text-blue-600">
                        <?= htmlspecialchars(ucwords(strtolower($job['title'])))?>
                    </h3>
                    <p class="text-gray-700">Location: <?= htmlspecialchars($job['location'])?></p>
                    <p class="text-gray-500">Salary: Rp.<?= number_format($job['salary'], 0, ',', '.')?></p>
                    <a href="/login" class="inline-block mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Apply Now
                    </a>
                </div>
                <?endforeach;?>
                <!-- Add more job cards as needed -->
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12">What Our Users Say</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="bg-gray-100 p-8 rounded shadow-md">
                    <p class="italic">"Thanks to Job Seekers, I landed my dream job in just two weeks!"</p>
                    <h4 class="text-blue-600 font-bold mt-4">- Alex Smith</h4>
                </div>
                <div class="bg-gray-100 p-8 rounded shadow-md">
                    <p class="italic">"The job recommendations were spot on!"</p>
                    <h4 class="text-blue-600 font-bold mt-4">- Sarah Johnson</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section id="contact" class="bg-gradient-to-br from-blue-500 to-indigo-700 text-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to Start Your Job Search?</h2>
            <p class="mb-8">Join thousands of job seekers finding their dream job today.</p>
            <a href="/register" class="bg-white text-blue-700 font-semibold px-8 py-3 rounded hover:bg-gray-200">
                Join Now
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Job Seekers. All rights reserved.</p>
            <nav class="flex justify-center space-x-6 mt-4">
                <a href="#" class="hover:text-white">Privacy Policy</a>
                <a href="#" class="hover:text-white">Terms of Service</a>
                <a href="#" class="hover:text-white">Contact Us</a>
            </nav>
        </div>
    </footer>

</body>
</html>

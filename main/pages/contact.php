<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Inventrix</title>
    <?php include '../../library/library.php' ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-black via-purple-900 to-black text-white font-sans">

    <?php include '../layouts/header.php' ?>

    <!-- Hero Section -->
    <main class="mt-20">
        <section class="relative text-center py-20">
            <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('images/galaxy-theme.jpg');"></div>
            <div class="relative z-10">
                <h1 class="text-6xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-blue-400 animate-pulse">
                    Contact Us
                </h1>
                <p class="mt-4 text-2xl text-gray-300 animate-fade-in">We'd love to hear from you!</p>
            </div>
        </section>

        <!-- Contact Details Section -->
        <section class="py-20 px-6 bg-gradient-to-r from-purple-800 via-black to-purple-800">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white">Reach Out to Us</h2>
                <p class="mt-6 text-lg text-gray-300 text-center">
                    Whether you have a question, feedback, or need support, our team is here to help. Contact us through the details below or fill out the contact form.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
                    <!-- Contact Info -->
                    <div class="flex flex-col items-center">
                        <h3 class="text-2xl font-bold text-purple-400 mb-4">Contact Details</h3>
                        <p class="text-lg text-gray-300"><strong>Email:</strong> inventrix@college.edu</p>
                        <p class="text-lg text-gray-300"><strong>Phone:</strong> +91 98765 43210</p>
                        <p class="text-lg text-gray-300"><strong>Address:</strong> Tech Institute, Main Campus, City, Country</p>
                        <p class="text-lg text-gray-300"><strong>Hours:</strong> 9:00 AM - 5:00 PM, Mon to Fri</p>
                    </div>

                    <!-- Map -->
                    <div class="flex items-center justify-center">
                        <iframe class="rounded-lg shadow-lg w-full h-64"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.3721893448245!2d-122.08383908468159!3d37.42206597982186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5a6d54916ff%3A0x9f36f67213b3d307!2sGoogleplex!5e0!3m2!1sen!2sin!4v1684857426303!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="py-20 px-6 bg-black">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white">Send Us a Message</h2>
                <form action="submit_contact.php" method="POST" class="mt-10 max-w-3xl mx-auto bg-gradient-to-b from-purple-700 to-black p-8 rounded-lg shadow-lg">
                    <div class="mb-6">
                        <label for="name" class="block text-lg text-gray-300 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required class="w-full p-4 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-lg text-gray-300 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required class="w-full p-4 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-lg text-gray-300 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required class="w-full p-4 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 w-full text-lg font-bold">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <?php include '../layouts/footer.php' ?>

    <!-- Tailwind Custom Animations -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fade-in 1.5s ease-in-out;
        }
    </style>

</body>

</html>
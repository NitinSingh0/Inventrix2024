<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Inventrix</title>
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
                    Gallery
                </h1>
                <p class="mt-4 text-2xl text-gray-300 animate-fade-in">Explore the Moments of Inventrix</p>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="py-20 px-6 bg-gradient-to-r from-purple-800 via-black to-purple-800">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white">Event Highlights</h2>
                <p class="mt-6 text-lg text-gray-300 text-center">
                    Relive the best moments of Inventrix through our gallery. From fun games to inspiring presentations, check out the excitement and creativity.
                </p>

                <!-- Gallery Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-10">
                    <!-- Image 1 -->
                    <div class="relative group">
                        <img src="images/event1.jpg" alt="Event Image 1" class="rounded-lg shadow-lg w-full h-auto object-cover transform group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-xl font-bold">Game Night Highlights</span>
                        </div>
                    </div>
                    <!-- Image 2 -->
                    <div class="relative group">
                        <img src="images/event2.jpg" alt="Event Image 2" class="rounded-lg shadow-lg w-full h-auto object-cover transform group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-xl font-bold">Treasure Hunt Fun</span>
                        </div>
                    </div>
                    <!-- Image 3 -->
                    <div class="relative group">
                        <img src="images/event3.jpg" alt="Event Image 3" class="rounded-lg shadow-lg w-full h-auto object-cover transform group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-xl font-bold">Traditional Day Celebration</span>
                        </div>
                    </div>
                    <!-- Image 4 -->
                    <div class="relative group">
                        <img src="images/event4.jpg" alt="Event Image 4" class="rounded-lg shadow-lg w-full h-auto object-cover transform group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-xl font-bold">Team Presentations</span>
                        </div>
                    </div>
                    <!-- Add more images as needed -->
                </div>
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
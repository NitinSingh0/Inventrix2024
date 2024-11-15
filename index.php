<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventrix - Innov-Astra</title>
    <?php include 'library/library.php' ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-black via-purple-900 to-black text-white font-sans">

    <?php include 'main/layouts/header.php' ?>

    <!-- Hero Section -->
    <main class="mt-20">
        <section class="relative text-center py-32">
            <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('images/galaxy-theme.jpg');"></div>
            <div class="relative z-10">
                <h1 class="text-6xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-blue-400 animate-pulse">
                    Welcome to Inventrix
                </h1>
                <p class="mt-4 text-2xl text-gray-300 animate-fade-in">Make it happen</p>
                <div class="mt-8">
                    <img src="images/innov-astra.jpg" alt="Innov-Astra Theme" class="mx-auto rounded-lg shadow-lg w-3/4 md:w-1/2 lg:w-1/3 animate-fade-in-down">
                </div>
            </div>
        </section>

        <!-- Event Schedule Section -->
        <section class="py-20 bg-gradient-to-r from-purple-800 via-black to-purple-800">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold text-white">Event Schedule</h2>
                <p class="mt-4 text-lg text-gray-300">Join us for three days of fun, innovation, and tradition.</p>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Day 1 -->
                    <div class="bg-gradient-to-b from-purple-600 to-blue-500 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold">Day 1: Games</h3>
                        <p class="mt-2 text-gray-200">🎮 Exciting games to kickstart the event and energize participants.</p>
                    </div>
                    <!-- Day 2 -->
                    <div class="bg-gradient-to-b from-blue-500 to-pink-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold">Day 2: Games & Treasure Hunt</h3>
                        <p class="mt-2 text-gray-200">🕵️‍♂️ Unleash your inner detective and compete in thrilling games.</p>
                    </div>
                    <!-- Day 3 -->
                    <div class="bg-gradient-to-b from-pink-600 to-purple-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold">Day 3: Poster and Presentation Making</h3>
                        <p class="mt-2 text-gray-200">Show your creativity in poster and presentation making.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Countdown Timer Section -->
        <section class="py-20 bg-black">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold text-white">Countdown to Innov-Astra</h2>
                <p class="mt-4 text-lg text-gray-300">Get ready for the most awaited event of the year!</p>
                <div id="countdown" class="mt-10 text-4xl font-bold text-purple-400"></div>
            </div>
        </section>

        <!-- Call-to-Action Section -->
        <section class="py-20 bg-gradient-to-r from-purple-900 to-black text-center">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-white">Join the Celebration</h2>
                <p class="mt-4 text-lg text-gray-300">Register now and be a part of Inventrix's Innov-Astra 2024.</p>
                <a href="register.php" class="mt-6 inline-block px-8 py-4 bg-purple-600 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 transition duration-300">
                    Register Now
                </a>
            </div>
        </section>
    </main>

    <?php include 'main/layouts/footer.php' ?>

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

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 1.5s ease-in-out;
        }

        .animate-fade-in-down {
            animation: fade-in-down 1.5s ease-in-out;
        }
    </style>

    <!-- Countdown Timer Script -->
    <script>
        const countdownElement = document.getElementById("countdown");
        const eventDate = new Date("2024-12-02T00:00:00").getTime();

        const updateCountdown = () => {
            const now = new Date().getTime();
            const distance = eventDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerText = `${days}d ${hours}h ${minutes}m ${seconds}s`;

            if (distance < 0) {
                clearInterval(interval);
                countdownElement.innerText = "The event has started!";
            }
        };

        const interval = setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Inventrix</title>
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
                    About Inventrix
                </h1>
                <p class="mt-4 text-2xl text-gray-300 animate-fade-in">Where Innovation Meets Creativity</p>
            </div>
        </section>

        <!-- About Inventrix -->
        <section class="py-20 px-6 bg-gradient-to-r from-purple-800 via-black to-purple-800">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white">What is Inventrix?</h2>
                <p class="mt-6 text-lg text-gray-300 text-center">
                    Inventrix is the flagship annual event of the IT Department, blending creativity and technology to inspire innovation.
                    It's a platform for students to showcase their talents, participate in exciting events, and collaborate on groundbreaking ideas.
                </p>
            </div>
        </section>

        <!-- About IT Department -->
        <section class="py-20 px-6 bg-black">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white">About the IT Department</h2>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <img src="../assets/it.jpeg" alt="IT Department" class="rounded-lg shadow-lg animate-fade-in">
                    <div class="flex flex-col justify-center">
                        <p class="text-lg text-gray-300">
                            The IT Department is the backbone of our institution, empowering students with the latest technological skills and insights.
                            With a curriculum that blends theory and practice, we produce tech leaders ready to tackle tomorrow's challenges.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- IT Faculty Section -->
        <section class="py-20 px-6 bg-gradient-to-r from-purple-900 via-black to-purple-900">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold text-white">Meet Our Faculty</h2>
                <p class="mt-4 text-lg text-gray-300">
                    Our dedicated IT Faculty members are the driving force behind the department's success, fostering an environment of learning and innovation.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
                    <div class="bg-gradient-to-b from-purple-600 to-blue-500 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white">Pournima Bhagale</h3>
                        <p class="mt-2 text-gray-200">HOD of IT</p>
                    </div>
                    <div class="bg-gradient-to-b from-blue-500 to-pink-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white">Rakhi Rane</h3>
                        <p class="mt-2 text-gray-200">Assistant Professor</p>
                    </div>
                    <div class="bg-gradient-to-b from-pink-600 to-purple-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white">Vandana Ma'am</h3>
                        <p class="mt-2 text-gray-200">Assistant Professor</p>
                    </div>
                    <div class="bg-gradient-to-b from-purple-600 to-blue-500 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white">Mohini Ma'am</h3>
                        <p class="mt-2 text-gray-200">Assistant Professor</p>
                    </div>
                    <div class="bg-gradient-to-b from-blue-500 to-pink-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white">Nanda Ma'am</h3>
                        <p class="mt-2 text-gray-200">Assistant Professor</p>
                    </div>
                    <div class="bg-gradient-to-b from-pink-600 to-purple-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold text-white">Pranali Ma'am</h3>
                        <p class="mt-2 text-gray-200">Assistant Professor</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Head of Inventrix -->
        <section class="py-20 px-6 bg-black">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white">Head of Inventrix</h2>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <img src="images/nanda-rapnaur.jpg" alt="Nanda Rapnaur" class="rounded-lg shadow-lg animate-fade-in">
                    <div class="flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-purple-400">Nanda Rapnaur</h3>
                        <p class="mt-4 text-lg text-gray-300">
                            As the Head of Inventrix, Nanda Rapnaur is the visionary behind this transformative event.
                            With years of experience in technology and leadership, she brings a unique perspective to inspire creativity and collaboration.
                        </p>
                    </div>
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
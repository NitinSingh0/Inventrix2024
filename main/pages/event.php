<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventrix Events</title>
    <?php include '../../library/library.php' ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Show modal with event details
        function showDetails(eventId) {
            const modal = document.getElementById(eventId);
            modal.classList.remove('hidden');
        }

        // Close the modal
        function closeModal(eventId) {
            const modal = document.getElementById(eventId);
            modal.classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gradient-to-b from-black via-purple-900 to-black text-white font-sans">

    <?php include '../layouts/header.php' ?>

    <!-- Hero Section -->
    <main class="mt-20">
        <section class="relative text-center py-20">
            <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('images/galaxy-theme.jpg');"></div>
            <div class="relative z-10">
                <h1 class="text-6xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-blue-400 animate-pulse">
                    Inventrix Events
                </h1>
                <p class="mt-4 text-2xl text-gray-300 animate-fade-in">Unleash your creativity and skills in our three-day fest!</p>
            </div>
        </section>

        <!-- Events Section -->
        <section class="py-20 px-6 bg-gradient-to-r from-purple-800 via-black to-purple-800">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center text-white mb-10">Event Schedule</h2>

                <!-- Days -->
                <?php
                $events = [
                    "Day 1: Galaxy Games" => [
                        ['id' => 'scribble', 'name' => 'Scribble', 'short' => 'Test your drawing and guessing skills!', 'details' => 'Detailed rules and info about Scribble.', 'register' => 'scribble_registration.php'],
                        ['id' => 'blackbox', 'name' => 'Blackbox', 'short' => 'Show off your coding skill!', 'details' => 'Detailed rules and info about Blackbox.', 'register' => 'blackbox_registration.php'],
                        ['id' => 'click', 'name' => 'Click-Click', 'short' => 'Show your searching skills!', 'details' => 'Detailed rules and info about Click Click.', 'register' => 'click_registration.php'],
                        ['id' => 'fifa', 'name' => 'FIFA Tournament', 'short' => 'Show your football skills!', 'details' => 'Detailed rules and info about FIFA.', 'register' => 'fifa_registration.php'],
                        ['id' => 'bgmi', 'name' => 'BGMI', 'short' => 'Battle Royale Fun!', 'details' => 'Detailed rules and info about BGMI.', 'register' => 'bgmi_registration.php']
                    ],
                    "Day 2: Adventurous Spirit" => [
                        ['id' => 'stumble', 'name' => 'Stumble Guys', 'short' => 'A fun obstacle course!', 'details' => 'Detailed rules and info about Stumble Guys.', 'register' => 'stumble_registration.php'],
                        ['id' => 'tresurehunt', 'name' => 'Tresurehunt', 'short' => 'Hunting Tresure!', 'details' => 'Detailed rules and info about Tresure hunt.', 'register' => 'tresurehunt_registration.php']
                    ],
                    "Day 3: Creative Finale" => [
                        ['id' => 'poster', 'name' => 'Poster Making', 'short' => 'Show your creativity!', 'details' => 'Detailed rules and info about Poster Making.', 'register' => 'poster_registration.php'],
                        ['id' => 'presentation', 'name' => 'Presentation Making', 'short' => 'Impress with your ideas!', 'details' => 'Detailed rules and info about Presentation Making.', 'register' => 'presentation_registration.php']
                    ]
                ];

                foreach ($events as $day => $dayEvents) : ?>
                    <div class="mb-16">
                        <h3 class="text-3xl font-bold text-purple-400 mb-6"><?= $day ?></h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <?php foreach ($dayEvents as $event) : ?>
                                <div class="bg-gradient-to-b from-purple-600 to-blue-500 p-6 rounded-lg shadow-lg hover:scale-105 transform transition duration-300">
                                    <h4 class="text-2xl font-bold text-white"><?= $event['name'] ?></h4>
                                    <p class="mt-2 text-gray-200"><?= $event['short'] ?></p>
                                    <div class="mt-4 flex justify-between items-center">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="showDetails('details-<?= $event['id'] ?>')">
                                            Details
                                        </button>
                                        <a href="<?= $event['register'] ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                            Register
                                        </a>
                                    </div>
                                </div>

                                <!-- Modal for Event Details -->
                                <div id="details-<?= $event['id'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div class="bg-gradient-to-b from-purple-900 to-black p-8 rounded-lg shadow-lg max-w-lg w-full">
                                        <h3 class="text-3xl font-bold text-white"><?= $event['name'] ?> Details</h3>
                                        <p class="mt-4 text-gray-300"><?= $event['details'] ?></p>
                                        <button class="mt-6 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="closeModal('details-<?= $event['id'] ?>')">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
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
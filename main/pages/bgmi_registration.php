<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BGMI Registration</title>
    <?php include('../../library/library.php') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Function to dynamically create player fields on page load
        window.onload = function() {
            const numPlayers = 4; // Total players (leader + 3 more)
            const playerFields = document.getElementById('player_fields');
            playerFields.innerHTML = ''; // Clear any existing fields

            // Loop through to add player 2 to 4 fields
            for (let i = 2; i <= numPlayers; i++) {
                playerFields.innerHTML += `
                    <label class="block mt-4 font-medium">Player ${i} Name</label>
                    <input type="text" name="player${i}_name" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter Player ${i} Name">
                `;
            }
        };
    </script>
</head>

<body class="bg-gradient-to-b from-black via-purple-900 to-black text-white font-sans">

    <!-- Header -->
    <?php include '../layouts/header.php' ?>

    <!-- Registration Form -->
    <main class="flex justify-center items-center mt-20 mb-5">
        <form action="submit.php" method="POST" class="bg-gradient-to-br from-purple-800 via-indigo-900 to-black p-10 rounded-xl shadow-xl w-4/5 max-w-lg border border-gray-700">
            <input type="hidden" name="event" value="BGMI">
            <h2 class="text-3xl font-semibold text-center mb-6">Join BGMI Now!</h2>
            <div class="bg-gradient-to-r from-yellow-500 to-red-400 text-black text-sm font-semibold p-4 rounded-lg mb-6 shadow-md">
                Enter your email correctly. Confirmation and payment details will be shared via email. Registration is first-come, first-serve.
            </div>
            <!-- Email Input -->
            <label class="block mb-2 font-medium">Email Address</label>
            <input type="email" name="email" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your email">

            <!-- Team Leader Name -->
            <label class="block mb-2 font-medium">Team Leader Name</label>
            <input type="text" name="leader_name" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter Leader's Name">

            <label class="block mb-2 font-medium">Roll Number</label>
            <input type="text" name="roll_no" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your roll number eg : 4045A043">

            <label class="block mb-2 font-medium">Class</label>
            <input type="text" name="class" required class="w-full p-3 rounded-lg text-black mb-6 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your class eg : Ty-BScIT">

            <!-- Number of Players -->
            <label class="block mb-2 font-medium">Number of Players</label>
            <select id="num_players" name="num_players" onchange="updatePlayerFields()" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none">
                <option value="" disabled selected>Select number of players</option>
                <option value="4" selected >4</option>
            </select>

            <!-- Dynamic Player Fields -->
            <div id="player_fields"></div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 rounded-lg font-bold text-white shadow-md transform hover:scale-105 transition-all">Register Now</button>
        </form>
    </main>
    <?php include '../layouts/footer.php' ?>
</body>

</html>
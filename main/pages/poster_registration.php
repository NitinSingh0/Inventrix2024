<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poster Making Registration</title>
    <?php include('../../library/library.php') ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-black via-purple-900 to-black text-white font-sans">

    <!-- Header -->
    <?php include '../layouts/header.php' ?>

    <!-- Registration Form -->
    <main class="flex justify-center items-center mt-20 mb-5  ">

        <form action="submit_scribbl.php" method="POST" class="bg-gradient-to-br from-purple-800 via-indigo-900 to-black p-10 rounded-xl shadow-xl w-4/5 max-w-lg border border-gray-700">
            <input type="hidden" name="event" value="Poster Making">
            <h2 class="text-3xl font-semibold text-center mb-6">Join Poster Making Now!</h2>

            <!-- Highlighted Note -->
            <div class="bg-gradient-to-r from-yellow-500 to-red-400 text-black text-sm font-semibold p-4 rounded-lg mb-6 shadow-md">
                Enter your email correctly. Confirmation and payment details will be shared via email. Registration is first-come, first-serve.
            </div>

            <!-- Email Input -->
            <label class="block mb-2 font-medium">Email Address</label>
            <input type="email" name="email" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your email eg : itinventrix@gmail.com">

            <!-- Other Input Fields -->
            <label class="block mb-2 font-medium">Name</label>
            <input type="text" name="name" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your full name">

            <label class="block mb-2 font-medium">Roll Number</label>
            <input type="text" name="roll_no" required class="w-full p-3 rounded-lg text-black mb-4 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your roll number eg : 4045A043">

            <label class="block mb-2 font-medium">Class</label>
            <input type="text" name="class" required class="w-full p-3 rounded-lg text-black mb-6 border border-gray-500 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Enter your class eg : Ty-BScIT">

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 rounded-lg font-bold text-white shadow-md transform hover:scale-105 transition-all">Register Now</button>
        </form>
    </main>
    <?php include '../layouts/footer.php' ?>
</body>

</html>
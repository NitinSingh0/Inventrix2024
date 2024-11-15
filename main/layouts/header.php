 <!-- Header Section -->
 <header class="bg-gradient-to-r from-purple-800 via-black to-purple-800 shadow-lg fixed top-0 left-0 w-full z-50">
     <div class="container mx-auto flex items-center justify-between px-6 py-4">
         <!-- Logo -->
         <div class="text-2xl font-bold tracking-wider text-white hover:text-purple-400 transition duration-300">
             <a href="#">Inventrix</a>
         </div>

         <!-- Navbar (Hidden on small screens) -->
         <nav class="hidden md:flex space-x-8">
             <a href="../../index.php" class="nav-link">Home</a>
             <a href="/Inventrix2024/main/pages/about.php" class="nav-link">About</a>
             <a href="/Inventrix2024/main/pages/event.php" class="nav-link">Events</a>
             <a href="/Inventrix2024/main/pages/gallery.php" class="nav-link">Gallery</a>
             <a href="/Inventrix2024/main/pages/contact.php" class="nav-link">Contact Us</a>
         </nav>

         <!-- Mobile Menu Button -->
         <div class="md:hidden">
             <button id="menu-btn" class="focus:outline-none">
                 <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                 </svg>
             </button>
         </div>
     </div>

     <!-- Mobile Dropdown Menu -->
     <div id="menu" class="hidden md:hidden bg-gradient-to-r from-purple-900 to-black space-y-2 py-4 px-6 text-center">
         <a href="../../index.php" class="nav-link block">Home</a>
         <a href="/Inventrix2024/main/pages/about.php" class="nav-link block">About</a>
         <a href="/Inventrix2024/main/pages/event.php" class="nav-link block">Events</a>
         <a href="/Inventrix2024/main/pages/gallery.php" class="nav-link block">Gallery</a>
         <a href="/Inventrix2024/main/pages/contact.php" class="nav-link block">Contact Us</a>
     </div>
 </header>
 <!-- Script -->
 <script>
     const menuBtn = document.getElementById('menu-btn');
     const menu = document.getElementById('menu');

     menuBtn.addEventListener('click', () => {
         menu.classList.toggle('hidden');
     });
 </script>
 <!-- Tailwind Custom Styles -->
 <style>
     .nav-link {
         @apply text-white font-medium hover:text-purple-400 transition duration-300;
     }
 </style>
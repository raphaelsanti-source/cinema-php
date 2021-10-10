<header>
    <nav class="bg-blue-700 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-4 md:py-0">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div class="flex items-center">
                        <a href="/kino" class="flex">
                            <span class="font-semibold text-white text-xl">Kino</span>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<div class="hidden md:flex items-center">
                    <a href="/kino/profile.php" class="py-5 px-3 font-semibold text-white hover:text-black hover:bg-white transition duration-300">Profil</a>
                    <a href="/kino/movies.php" class="py-5 px-3 font-semibold text-white hover:text-black hover:bg-white transition duration-300">Seanse</a>
                    <a href="/kino/logout.php" class="py-5 px-3 font-semibold text-white hover:text-black hover:bg-white transition duration-300">Wyloguj</a>
                    </div>';
                } else {
                    echo '<div class="hidden md:flex items-center">
                    <a href="/kino/register.php" class="py-5 px-3 font-semibold text-white hover:text-black hover:bg-white transition duration-300">Rejestracja</a>
                    <a href="/kino/login.php" class="py-5 px-3 font-semibold text-white hover:text-black hover:bg-white transition duration-300">Logowanie</a>
                </div>';
                }
                ?>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class=" w-6 h-6 text-gray-500 hover:bg-orango" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="dropdown" class="hidden mobile-menu">
            <ul class="menuUl">
                <li>
                    <a href="/home" class="block text-sm px-4 py-3 hover:bg-orango hover:text-white transition duration-300">Home</a>
                </li>
                <li>
                    <a href="/doctors" class="block text-sm px-4 py-3 hover:bg-orango hover:text-white transition duration-300">Strona 2</a>
                </li>
                <li>
                    <a href="/contact" class="block text-sm px-4 py-3 hover:bg-orango hover:text-white transition duration-300">Strona 3</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
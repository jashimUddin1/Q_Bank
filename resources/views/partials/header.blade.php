     <header
        class="bg-custom-purple-700 dark:bg-gray-900 shadow-xl sticky top-0 z-40 py-3 px-4 sm:px-6 flex items-center justify-between no-print transition-colors duration-300">
        <!-- Header Content -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('assets/icon.png') }}" alt="EduRLab Icon" class="w-10 h-10">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-green-400">EduRLab</h1>
        </div>

        <h1 class="hidden md:block text-xl lg:text-2xl font-extrabold text-white"> প্রশ্ন তৈরি হবে এখন <span
                class="text-green-400">"এক ক্লিকে"</span></h1>

        <div class="flex items-center space-x-2 sm:space-x-3">
            <button id="theme-toggle-btn"
                class="p-2 rounded-full text-white hover:bg-white/10 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-5 h-5" id="sun-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h1M3 12H2m15.325-4.275l.707-.707M3.987 3.987l.707.707m0 12.026l-.707.707m12.026 0l.707-.707M6.343 6.343l-.707-.707m1.625 16.276a2 2 0 001.077 0c1.803-.385 3.597-.385 5.399 0 .444.094.9-.02 1.25-.333l1.832-1.654a2 2 0 00.373-2.189l-.275-1.015a9.75 9.75 0 00-1.248-3.523l-.105-.125c-.217-.248-.445-.494-.679-.728-.593-.593-1.22-.97-1.921-1.127a9.75 9.75 0 00-4.041 0c-.701.157-1.328.534-1.921 1.127-.234.234-.462.479-.679-.728l-.105-.125A9.75 9.75 0 003.356 12.35l-.275 1.015a2 2 0 00.373 2.189l1.832 1.654c.35.313.806.427 1.25.333z">
                    </path>
                </svg>
                <svg class="w-5 h-5 hidden" id="moon-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
            </button>

            <button id="mobile-preview-button-header"
                class="lg:hidden flex items-center space-x-1 p-2 rounded-full text-white hover:bg-white/10 transition-colors focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
                <span class="text-sm font-bold" id="mobile-preview-count">0</span>
            </button>

            <button id="profile-button"
                class="flex items-center p-2 rounded-full text-white hover:bg-white/10 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </button>
        </div>
    </header>
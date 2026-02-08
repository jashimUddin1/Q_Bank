<div class="lg:col-span-1 p-4 hidden lg:block border-l border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-xl">

    <div class=" mb-2 lg:sticky top-[64px] z-[999]">
        <div class="z-999  relative w-full overflow-hidden rounded-lg bg-gray-800 shadow-xl border border-indigo-500 h-48">
            <div id="quiz-carousel" class="flex transition-transform duration-300 ease-in-out h-full"
                style="transform: translateX(0%);">

                <div class="min-w-full h-full p-2 flex items-center justify-center">
                    <img src="{{ asset('assets/slide1.png') }}"
                        alt="Slide 1: Bangla Quiz" class="w-full h-full object-cover rounded-md" />
                </div>

                <div class="min-w-full h-full p-2 flex items-center justify-center">
                    <img src="{{ asset('assets/slide2.png') }}"
                        alt="Slide 2: Science Questions" class="w-full h-full object-cover rounded-md" />
                </div>

                <div class="min-w-full h-full p-2 flex items-center justify-center">
                    <img src="{{ asset('assets/slide3.png') }}"
                        alt="Slide 3: Math Practice" class="w-full h-full object-cover rounded-md" />
                </div>

                <div class="min-w-full h-full p-2 flex items-center justify-center">
                    <img src="{{ asset('assets/slide4.png') }}"
                        alt="Slide 4: English Grammar" class="w-full h-full object-cover rounded-md" />
                </div>

                <div class="min-w-full h-full p-2 flex items-center justify-center">
                    <img src="{{ asset('assets/slide5.png') }}"
                        alt="Slide 5: Rajshahi Board Exams" class="w-full h-full object-cover rounded-md" />
                </div>

            </div>

            <div class="flex justify-center p-2 space-x-2 border-t border-gray-700">
                <button class="dot w-2 h-2 bg-indigo-500 rounded-full" data-slide="0"></button>
                <button class="dot w-2 h-2 bg-gray-600 rounded-full hover:bg-gray-500"
                    data-slide="1"></button>
                <button class="dot w-2 h-2 bg-gray-600 rounded-full hover:bg-gray-500"
                    data-slide="2"></button>
                <button class="dot w-2 h-2 bg-gray-600 rounded-full hover:bg-gray-500"
                    data-slide="3"></button>
                <button class="dot w-2 h-2 bg-gray-600 rounded-full hover:bg-gray-500"
                    data-slide="4"></button>
            </div>

            <button id="prev-slide"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 m-2 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-70 transition duration-150">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>
            <button id="next-slide"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 m-2 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-70 transition duration-150">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    <div id="a4-preview-wrapper">

        <!-- <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white mb-4 no-print">লাইভ প্রিভিউ</h2> -->


        <div id="a4-preview"
            class="a4-print-area bg-white border border-gray-300 dark:border-gray-600 shadow-inner p-6 sm:p-8 mb-4 text-black text-custom-xs print:shadow-none print:border-0 rounded-lg">
            <div class="text-center mb-6 border-b-2 border-custom-purple-200 pb-2">
                <h3 class="text-base sm:text-lg font-bold text-gray-900" id="header-school-name">ঢাকা মডেল হাই
                    স্কুল</h3>
                <p class="text-xs sm:text-sm">বিষয়: <span id="preview-subject">বাংলা</span> | পূর্ণমান: <span
                        id="preview-marks-header">0</span> | সময়: ২ ঘণ্টা | <span id="page-display">Page
                        1/1</span></p>
            </div>
            <ol id="preview-question-list" class="preview-list list-decimal pl-5 space-y-2"></ol>
        </div>


        <div class="space-y-2 no-print">
            <button id="page-toggle-btn"
                class="w-full py-2 text-sm bg-custom-purple-600 text-white font-semibold rounded-lg hover:bg-custom-purple-700 transition-colors hidden shadow-md">Page
                2/2 দেখান ➡️</button>
            <button id="print-button"
                class="w-full py-2 text-sm bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2v5H5v-5h2m0-5h10v5H7v-5zM7 3h10v2H7V3zM7 7h10v2H7V7z"></path>
                </svg>
                Download PDF / Print
            </button>
            <button id="edit-header-button"
                class="w-full py-2 text-xs bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors">Edit
                Header/Logo</button>
            <label class="flex items-center space-x-2 text-xs text-gray-700 dark:text-gray-300">
                <input type="checkbox" id="include-answer-key"
                    class="w-3 h-3 text-custom-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-custom-purple-500 dark:bg-gray-700 dark:border-gray-600">
                <span>উত্তরপত্র যোগ করুন</span>
            </label>
        </div>
    </div>
</div>
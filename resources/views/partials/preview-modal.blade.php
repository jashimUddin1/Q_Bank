<div id="a4-preview-modal" class="no-print">
    <div id="a4-preview-modal-content" class="bg-white dark:bg-gray-800 p-4 relative">
        <button id="close-preview-modal-button"
            class="absolute top-3 right-3 p-2 rounded-full text-gray-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-900/50 transition-colors z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white mb-4 pt-4">প্রিভিউ</h2>
        <div id="a4-preview-mobile"
            class="a4-print-area bg-white border border-gray-300 dark:border-gray-600 shadow-inner p-6 sm:p-8 mb-4 text-black text-custom-xs print:shadow-none print:border-0 rounded-lg">
            <div class="text-center mb-6 border-b-2 border-custom-purple-200 pb-2">
                <h3 class="text-base sm:text-lg font-bold text-gray-900" id="header-school-name-mobile">ঢাকা
                    মডেল হাই স্কুল</h3>
                <p class="text-xs sm:text-sm">বিষয়: <span id="preview-subject-mobile">বাংলা</span> | পূর্ণমান:
                    <span id="preview-marks-header-mobile">0</span> | সময়: ২ ঘণ্টা | <span
                        id="page-display-mobile">Page 1/1</span>
                </p>
            </div>
            <ol id="preview-question-list-mobile" class="preview-list list-decimal pl-5 space-y-2"></ol>
        </div>
        <div class="space-y-2 mt-4">
            <button id="page-toggle-btn-mobile"
                class="w-full py-2 text-sm bg-custom-purple-600 text-white font-semibold rounded-lg hover:bg-custom-purple-700 transition-colors hidden shadow-md">Page
                2/2 দেখান ➡️</button>
            <button id="print-button-mobile"
                class="w-full py-2 text-sm bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2v5H5v-5h2m0-5h10v5H7v-5zM7 3h10v2H7V3zM7 7h10v2H7V7z"></path>
                </svg>
                Download PDF / Print
            </button>
            <button id="edit-header-button-mobile"
                class="w-full py-2 text-xs bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors">Edit
                Header/Logo</button>
            <label class="flex items-center space-x-2 text-xs text-gray-700 dark:text-gray-300">
                <input type="checkbox" id="include-answer-key-mobile"
                    class="w-3 h-3 text-custom-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-custom-purple-500 dark:bg-gray-700 dark:border-gray-600">
                <span>উত্তরপত্র যোগ করুন</span>
            </label>
        </div>
    </div>
</div>
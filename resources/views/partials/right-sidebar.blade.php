<div id="filter-modal-overlay" class="no-print">
    <div id="filter-sidebar" class="bg-white dark:bg-gray-800 p-6 no-print">
        <div
            class="flex justify-between items-center mb-6 pb-3 border-b border-custom-purple-200 dark:border-custom-purple-900">
            <h3
                class="text-xl font-extrabold text-custom-purple-700 dark:text-custom-purple-400 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707v5.828a1 1 0 01-1.447.894l-4.243-2.122A1 1 0 013 15.586V4z">
                    </path>
                </svg>
                বিস্তারিত ফিল্টার
            </h3>
            <button id="close-filter-sidebar-button"
                class="p-2 rounded-full text-gray-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-900/50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="space-y-6">
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                <label for="class-select-mobile"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">ক্লাস (Class)</label>
                <select id="class-select-mobile" class="custom-select">
                    <option value="">ক্লাস নির্বাচন করুন</option>
                    <option value="6">৬ষ্ঠ শ্রেণী</option>
                    <option value="7">৭ম শ্রেণী</option>
                    <option value="8">৮ম শ্রেণী</option>
                    <option value="9">৯ম শ্রেণী</option>
                    <option value="10">১০ম শ্রেণী</option>
                </select>
                <div id="group-filter-mobile" class="mt-4 hidden">
                    <label for="group-select-mobile"
                        class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">শাখা
                        (Group)</label>
                    <select id="group-select-mobile" class="custom-select">
                        <option value="">শাখা নির্বাচন করুন</option>
                        <option value="science">বিজ্ঞান (Science)</option>
                        <option value="arts">মানবিক (Arts)</option>
                        <option value="commerce">ব্যবসায় শিক্ষা (Commerce)</option>
                    </select>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                <label for="subject-select-mobile"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">বিষয়
                    (Subject)</label>
                <select id="subject-select-mobile" class="custom-select">
                    <option value="">বিষয় নির্বাচন করুন</option>
                </select>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                <label for="chapter-select-mobile"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">অধ্যায়
                    (Chapter)</label>
                <select id="chapter-select-mobile" class="custom-select">
                    <option value="">অধ্যায় নির্বাচন করুন</option>
                </select>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                <label for="source-select-mobile"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">প্রশ্নের উৎস
                    (Source)</label>
                <select id="source-select-mobile" class="custom-select mb-2">
                    <option value="">বোর্ড নির্বাচন করুন</option>
                    <option value="dhaka">ঢাকা বোর্ড</option>
                    <option value="rajshahi">রাজশাহী বোর্ড</option>
                </select>
                <select id="year-select-mobile" class="custom-select">
                    <option value="">সাল নির্বাচন করুন</option>
                    <option value="2024">২০২৪</option>
                    <option value="2023">২০২৩</option>
                    <option value="2022">২০২২</option>
                </select>
            </div>
            <div
                class="z-999 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 mt-6">
                <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3 border-b pb-2">কঠিনতার
                    স্তর (Difficulty)</label>
                <div class="space-y-2">
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                        <input type="checkbox" id="difficulty-mobile-easy"
                            class="level-filter-checkbox difficulty-filter mobile-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500"
                            checked> সহজ (Easy)
                    </label>
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                        <input type="checkbox" id="difficulty-mobile-medium"
                            class="level-filter-checkbox difficulty-filter mobile-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500"
                            checked> মধ্যম (Medium)
                    </label>
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                        <input type="checkbox" id="difficulty-mobile-hard"
                            class="level-filter-checkbox difficulty-filter mobile-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500">
                        কঠিন (Hard)
                    </label>
                </div>
            </div>
            <div
                class="z-999 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 mt-4">
                <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3 border-b pb-2">জ্ঞানমূলক
                    স্তর (Cognitive Level)</label>
                <div class="space-y-2">
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-green-600 dark:hover:text-green-400">
                        <input type="checkbox" id="cognitive-mobile-knowledge"
                            class="level-filter-checkbox cognitive-filter mobile-level-filter mr-3 w-4 h-4 rounded text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:bg-gray-600 dark:border-gray-500"
                            checked> জ্ঞান (Knowledge)
                    </label>
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-yellow-600 dark:hover:text-yellow-400">
                        <input type="checkbox" id="cognitive-mobile-understanding"
                            class="level-filter-checkbox cognitive-filter mobile-level-filter mr-3 w-4 h-4 rounded text-yellow-600 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:bg-gray-600 dark:border-gray-500"
                            checked> অনুধাবন (Understanding)
                    </label>
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-orange-600 dark:hover:text-orange-400">
                        <input type="checkbox" id="cognitive-mobile-application"
                            class="level-filter-checkbox cognitive-filter mobile-level-filter mr-3 w-4 h-4 rounded text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:bg-gray-600 dark:border-gray-500">
                        প্রয়োগ (Application)
                    </label>
                    <label
                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                        <input type="checkbox" id="cognitive-mobile-hots"
                            class="level-filter-checkbox cognitive-filter mobile-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500">
                        উচ্চতর দক্ষতা (Hots)
                    </label>
                </div>
            </div>
            <div class="mt-8 text-center">
                <button id="apply-filters-mobile-button"
                    class="w-full py-3 bg-custom-purple-600 text-white font-bold rounded-lg hover:bg-custom-purple-700 transition-colors shadow-md">ফিল্টার
                    প্রয়োগ করুন</button>
            </div>
        </div>
    </div>
</div>
<aside id="left-nav-sidebar" class=" bg-white dark:bg-gray-800 p-2 shadow-2xl border-r border-gray-200 dark:border-gray-700 no-print hidden lg:block lg:overflow-y-auto lg:max-h-[calc(100vh-64px)] z-30">
    <h2 class="text-xl font-bold text-custom-purple-700 dark:text-custom-purple-400 mb-2 border-b pb-1">ফিল্টার অপশন</h2>
    <div id="pc-selection-area" class="space-y-4">
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
            <label for="class-select-pc"
                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">ক্লাস (Class)</label>
            <select id="class-select-pc" class="custom-select">
                <option value="">ক্লাস নির্বাচন করুন</option>
                <option value="6">৬ষ্ঠ শ্রেণী</option>
                <option value="7">৭ম শ্রেণী</option>
                <option value="8">৮ম শ্রেণী</option>
                <option value="9">৯ম শ্রেণী</option>
                <option value="10">১০ম শ্রেণী</option>
            </select>
            <div id="group-filter-pc" class="mt-4">
                <label for="group-select-pc"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">শাখা (Group)</label>
                <select id="group-select-pc" class="custom-select">
                    <option value="">শাখা নির্বাচন করুন</option>
                    <option value="science">বিজ্ঞান (Science)</option>
                    <option value="arts">মানবিক (Arts)</option>
                    <option value="commerce">ব্যবসায় শিক্ষা (Commerce)</option>
                </select>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
            <label for="subject-select-pc"
                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">বিষয় (Subject)</label>
            <select id="subject-select-pc" class="custom-select">
                <option value="">বিষয় নির্বাচন করুন</option>
            </select>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
            <label for="chapter-select-pc"
                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">অধ্যায় (Chapter)</label>
            <select id="chapter-select-pc" class="custom-select">
                <option value="">অধ্যায় নির্বাচন করুন</option>
            </select>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
            <label for="lesson-select-pc"
                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">পাঠ (Lesson)</label>
            <select id="lesson-select-pc" class="custom-select">
                <option value="">পাঠ নির্বাচন করুন</option>
            </select>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
            <label for="source-select-pc"
                class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">প্রশ্নের উৎস
                (Source)</label>
            <select id="source-select-pc" class="custom-select mb-2">
                <option value="">বোর্ড নির্বাচন করুন</option>
                <option value="dhaka">ঢাকা বোর্ড</option>
                <option value="rajshahi">রাজশাহী বোর্ড</option>
            </select>
            <select id="year-select-pc" class="custom-select">
                <option value="">সাল নির্বাচন করুন</option>
                <option value="2024">২০২৪</option>
                <option value="2023">২০২৩</option>
                <option value="2022">২০২২</option>
            </select>
        </div>

        <div class=" pt-2 border-t border-gray-200 dark:border-gray-700">
            <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2 uppercase tracking-wider">
                স্পন্সরড কন্টেন্ট</p>
            <div
                class="bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center h-40 border border-dashed border-gray-400 dark:border-gray-600">
                <img src="{{ asset('assets/sponser.png') }}" class="h-full w-full object-cover rounded-lg"
                    alt="Sponsor Content">
            </div>
        </div>
    </div>
</aside>
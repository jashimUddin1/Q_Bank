 <div class="lg:col-span-1 w-full max-w-[100vw]">

     <div class="lg:sticky top-[64px] z-[999] bg-gray-50 dark:bg-gray-900 mb-3 no-print transition-colors duration-300 border-b border-gray-200 dark:border-gray-700 shadow-md">

         <div class="flex flex-wrap justify-between items-center gap-2 sm:gap-4  w-full max-w-7xl mx-auto  p-1 md:p-2">

             <div class="flex items-center space-x-2 flex-wrap order-1 flex-shrink-0">
                 <!-- <button id="mobile-filter-button" data-type="all" title="সকল প্রশ্ন" -->
                 <button id="filter-all" data-type="all" title="সকল প্রশ্ন"
                     class="filter-btn active py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-colors flex items-center justify-center"
                     aria-label="সকল প্রশ্ন">
                     <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 6h16M4 12h16M4 18h7">
                         </path>
                     </svg>
                     <span class="hidden sm:inline">সকল</span>
                 </button>
                 <button id="filter-cq" data-type="cq" title="Creative Questions (CQ)"
                     class="filter-btn py-2 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors flex items-center justify-center"
                     aria-label="সৃজনশীল প্রশ্ন">

                     <span class=" hidden sm:inline">CQ</span>
                 </button>
                 <button id="filter-mcq" data-type="mcq" title="Multiple Choice Questions (MCQ)"
                     class="filter-btn py-2 px-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors flex items-center justify-center"
                     aria-label="বহুনির্বাচনি প্রশ্ন">

                     <span class="ml-1 hidden sm:inline">MCQ</span>
                 </button>
             </div>

             <div
                 class="search-bar-wrapper relative flex-grow min-w-[200px] max-w-lg order-3 w-full sm:order-2 sm:w-auto">
                 <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                     <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                         </path>
                     </svg>
                 </div>
                 <input type="text" id="topic-search-input" placeholder="টপিক/ধারণা সার্চ করুন"
                     class="w-full py-2 px-4 pl-10 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg text-gray-900 dark:text-white text-base focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-inner"
                     aria-label="টপিক বা ধারণা সার্চ">
             </div>

             <div class="flex items-center order-2 sm:order-3 flex-shrink-0 space-x-3 relative">
                 <button id="level-filter-button" title="কঠিনতার স্তর এবং জ্ঞানমূলক স্তর ফিল্টার"
                     class="py-3 px-5 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center shadow-lg">
                     <i class="fa-solid fa-cloud-showers-heavy "></i>
                 </button>
                 <button id="mobile-filter-button" title="Filter Options"
                     class="py-2 px-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center shadow-lg lg:hidden">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707v5.828a1 1 0 01-1.447.894l-4.243-2.122A1 1 0 013 15.586V4z">
                         </path>
                     </svg>
                 </button>
             </div>

         </div>

         <div id="level-filter-dropdown" class="no-print">
             <div class="mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                 <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">কঠিনতার স্তর
                     (Difficulty)</label>
                 <div class="space-y-2">
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                         <input type="checkbox" id="difficulty-pc-easy"
                             class="level-filter-checkbox difficulty-filter pc-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500"
                             checked> সহজ (Easy)
                     </label>
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                         <input type="checkbox" id="difficulty-pc-medium"
                             class="level-filter-checkbox difficulty-filter pc-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500"
                             checked> মধ্যম (Medium)
                     </label>
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                         <input type="checkbox" id="difficulty-pc-hard"
                             class="level-filter-checkbox difficulty-filter pc-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500">
                         কঠিন (Hard)
                     </label>
                 </div>
             </div>
             <div>
                 <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">জ্ঞানমূলক স্তর
                     (Cognitive Level)</label>
                 <div class="space-y-2">
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-green-600 dark:hover:text-green-400">
                         <input type="checkbox" id="cognitive-pc-knowledge"
                             class="level-filter-checkbox cognitive-filter pc-level-filter mr-3 w-4 h-4 rounded text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:bg-gray-600 dark:border-gray-500"
                             checked> জ্ঞান (Knowledge)
                     </label>
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-yellow-600 dark:hover:text-yellow-400">
                         <input type="checkbox" id="cognitive-pc-understanding"
                             class="level-filter-checkbox cognitive-filter pc-level-filter mr-3 w-4 h-4 rounded text-yellow-600 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:bg-gray-600 dark:border-gray-500"
                             checked> অনুধাবন (Understanding)
                     </label>
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-orange-600 dark:hover:text-orange-400">
                         <input type="checkbox" id="cognitive-pc-application"
                             class="level-filter-checkbox cognitive-filter pc-level-filter mr-3 w-4 h-4 rounded text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:bg-gray-600 dark:border-gray-500">
                         প্রয়োগ (Application)
                     </label>
                     <label
                         class="flex items-center text-sm text-gray-700 dark:text-gray-300 cursor-pointer hover:text-custom-purple-600 dark:hover:text-custom-purple-400">
                         <input type="checkbox" id="cognitive-pc-hots"
                             class="level-filter-checkbox cognitive-filter pc-level-filter mr-3 w-4 h-4 rounded text-custom-purple-600 bg-gray-100 border-gray-300 focus:ring-custom-purple-500 dark:bg-gray-600 dark:border-gray-500">
                         উচ্চতর দক্ষতা (Hots)
                     </label>
                 </div>

             </div>

         </div>
     </div>

     <section id="qbank-section" class="content-section px-4 sm:px-8 pb-20">
         <div id="left-panel">
             <div id="question-list-scroll-wrapper">
                 <div id="question-list" class="space-y-4">
                 </div>
             </div>
         </div>
     </section>

 </div>
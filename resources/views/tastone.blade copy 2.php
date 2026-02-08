<!DOCTYPE html>
<html lang="bn" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রশ্ন ব্যাংক ও মডেল টেস্ট সিস্টেম</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        // Custom Tailwind Configuration (Added Inter font family)
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'custom-purple': {
                            DEFAULT: '#9112BC',
                            '50': '#FAF3FC',
                            '100': '#F3E3F8',
                            '200': '#E4C9F1',
                            '300': '#D4AEE9',
                            '400': '#C088E0',
                            '500': '#A85DD4',
                            '600': '#9112BC',
                            '700': '#7D0A9F',
                            '800': '#690786',
                            '900': '#44015E',
                            '950': '#29003C', // Dark mode selected card background
                        },
                    },
                    fontSize: {
                        'custom-xxs': ['0.68rem', { lineHeight: '1.1' }],
                        'custom-xs': ['0.78rem', { lineHeight: '1.2' }],
                    }
                },
            },
        };
    </script>

    <style>
        /* ========================================================================= */
        /* 1. Global & Layout Fixes */
        /* ========================================================================= */
        .z-35 {
            z-index: 35;
        }

        .z-40 {
            z-index: 40;
        }

        .z-55 {
            z-index: 55;
        }

        .z-60 {
            z-index: 60;
        }

        .z-70 {
            z-index: 70;
        }

        body {
            overflow-x: hidden;
        }

        .no-scroll {
            overflow: hidden !important;
            position: fixed;
            width: 100%;
            height: 100%;
        }

        html.no-scroll {
            overflow-y: hidden !important;
        }

        .sticky-sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            padding-top: 1rem;
            padding-bottom: 1rem;
            /* margin-right: -10px; */
            padding-right: 10px;
            z-index: 30;
        }

        #question-list-scroll-wrapper {
            height: auto;
            overflow-y: visible;
        }

        @media (min-width: 1024px) {
            #question-list-scroll-wrapper {
                height: calc(100vh - 143px);
                overflow-y: auto;
            }
        }

        /* FIX: Filter Sidebar Styling (Modal/Overlay for Mobile) */
        #filter-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
            display: none;
            justify-content: end;
            align-items: center;
        }

        #filter-modal-overlay.open {
            display: flex;
        }

        #filter-sidebar {
            width: 95%;
            max-width: 400px;
            max-height: 100%;
            overflow-y: auto;
            border-radius: 0.75rem;
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.9s ease-in-out;
        }

        #filter-modal-overlay.open #filter-sidebar {
            transform: scale(1);
            opacity: 1;
        }

        /* NEW: Quick Level Filter Dropdown Styling */
        #level-filter-dropdown {
            position: absolute;
            right: 0;
            top: 100%;
            width: 280px;
            padding: 1rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            z-index: 55;
            display: none;
            transform-origin: top right;
            animation: fadeInScale 0.2s ease-out;
            margin-top: 0.5rem;
        }

        .dark #level-filter-dropdown {
            background-color: #1f2937;
            /* gray-800 */
        }

        #level-filter-dropdown.open {
            display: block;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* A4 Preview Styling (Desktop Sticky) */
        #a4-preview-wrapper {
            position: sticky;
            top: 73px;
            max-height: calc(100vh - 80px);
            overflow-y: auto;
            padding-bottom: 2rem;
        }

        #a4-preview {
            aspect-ratio: 210 / 297;
            min-height: 400px;
            overflow: hidden;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* Mobile Modal Styling (A4 Preview) */
        #a4-preview-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999;
            display: none;
            justify-content: center;
            align-items: center;
        }

        #a4-preview-modal.open {
            display: flex;
        }

        #a4-preview-modal-content {
            width: 95%;
            max-width: 500px;
            max-height: 90%;
            overflow-y: auto;
            border-radius: 0.5rem;
        }

        /* 2. Active/Selected States */
        .filter-btn.active {
            background-color: #9112BC !important;
            color: white !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* IMPROVED: Selected Question Card Style */
        .question-card.selected {
            background-color: #FAF3FC;
            /* custom-purple-50 */
            border-color: #C088E0 !important;
            /* custom-purple-400 */
            border-left-width: 4px;
            border-left-color: #9112BC !important;
            /* custom-purple-600 */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(145, 18, 188, 0.15);
        }

        .dark .question-card.selected {
            background-color: #29003C;
            /* custom-purple-950 */
            border-color: #690786 !important;
            /* custom-purple-800 */
            border-left-color: #A85DD4 !important;
            /* custom-purple-500 */
        }

        .search-bar-wrapper {
            flex-grow: 1.5;
            min-width: 150px;
        }

        /* NEW: Star button styling */
        .star-btn .star-solid {
            display: none;
        }

        .star-btn.starred .star-solid {
            display: block;
        }

        .star-btn.starred .star-outline {
            display: none;
        }

        .star-btn.starred .star-solid {
            color: #FBBF24;
        }

        /* text-amber-400 */


        /* 3. Print/Column Layout (Unchanged) */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background-color: white !important;
                margin: 0;
                padding: 0;
            }

            #app {
                display: block;
                grid-template-columns: none !important;
                min-height: auto;
            }

            #qbank-section {
                padding: 0 !important;
                margin: 0 !important;
            }

            .a4-print-area {
                width: 210mm;
                min-height: 297mm;
                max-width: none;
                margin: 0 auto;
                padding: 10mm;
                box-shadow: none;
                border: none;
                font-size: 11pt !important;
            }

            .preview-list {
                list-style-type: decimal;
            }

            .two-column-layout-print {
                column-count: 2;
                column-gap: 20mm;
            }

            .preview-list li {
                page-break-inside: avoid;
                break-inside: avoid-column;
                list-style-position: inside;
            }

            .hidden-page-2 {
                display: none !important;
            }

            .cq-preview-content {
                break-after: avoid-page;
            }

            .mcq-options-wrapper.mcq-print-layout div {
                display: inline-block !important;
                margin-right: 1.5rem !important;
                width: auto !important;
            }
        }

        .two-column-layout-live {
            column-count: 2;
            column-gap: 2rem;
            margin-bottom: 2rem;
        }

        .two-column-layout-live li {
            break-inside: avoid-column;
        }

        /* IMPROVED: MCQ Options Layout for Card vs Preview */
        .mcq-options-wrapper.card-layout .mcq-option {
            display: block;
            width: 100%;
        }

        .mcq-options-wrapper.preview-layout {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem 1.5rem;
            /* row and column gap */
        }

        .mcq-options-wrapper.preview-layout .mcq-option {
            display: inline-flex;
        }

        /* For Selects and Inputs (Better styling) */
        .custom-select {
            width: 100%;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            background-color: #ffffff;
            color: #1f2937;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .dark .custom-select {
            border: 1px solid #374151;
            background-color: #1f2937;
            color: #f3f4f6;
        }

        .custom-select:focus {
            outline: none;
            border-color: #9112BC;
            box-shadow: 0 0 0 1px #9112BC;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300 overflow-x-hidden lg:overflow-y-hidden">

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

    <div id="app" class="grid lg:grid-cols-[1fr_2fr_2fr] min-h-screen">

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

        <div class="lg:col-span-1 p-4 hidden lg:block border-l border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-xl">
            
                <div class=" mb-2 lg:sticky top-[64px] z-[999]">
                    <div  class="z-999  relative w-full overflow-hidden rounded-lg bg-gray-800 shadow-xl border border-indigo-500 h-48">
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
    </div>

    <script>
        // Global State variables
        let totalMarks = 0;

        // Theme Toggle Logic
        const themeToggleBtn = document.getElementById('theme-toggle-btn');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');
        const htmlElement = document.documentElement;

        function initializeTheme() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                htmlElement.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                htmlElement.classList.remove('dark');
                localStorage.theme = 'light';
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        }

        themeToggleBtn.addEventListener('click', () => {
            htmlElement.classList.toggle('dark');
            if (htmlElement.classList.contains('dark')) {
                localStorage.theme = 'dark';
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                localStorage.theme = 'light';
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        });

        // Filter Sidebar Toggle (Modal/Overlay - For Mobile)
        const filterModalOverlay = document.getElementById('filter-modal-overlay');
        function toggleFilterSidebar() {
            syncLevelCheckboxes('pc', 'mobile');
            filterModalOverlay.classList.toggle('open');
            document.body.classList.toggle('no-scroll');
            document.documentElement.classList.toggle('no-scroll');
        }
        function closeFilterSidebar(event) {
            if (event && (event.target !== filterModalOverlay && event.target.id !== 'apply-filters-mobile-button' && event.target.id !== 'close-filter-sidebar-button' && !event.target.closest('#close-filter-sidebar-button'))) return;
            filterModalOverlay.classList.remove('open');
            document.body.classList.remove('no-scroll');
            document.documentElement.classList.remove('no-scroll');
            applyAllFilters();
        }


    document.addEventListener('DOMContentLoaded', () => {
            initializeTheme();
    });

      




// --- QUIZ CAROUSEL LOGIC (OPTIMIZED) ---
const carousel = document.getElementById('quiz-carousel');
const prevBtn = document.getElementById('prev-slide');
const nextBtn = document.getElementById('next-slide');
const dots = document.querySelectorAll('.dot');

let currentSlide = 0;
const totalSlides = dots.length;
let autoSlideInterval; // টাইমার ভেরিয়েবল

// স্লাইডার আপডেট করার ফাংশন
function updateCarousel() {
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
    
    dots.forEach((dot, index) => {
        if (index === currentSlide) {
            dot.classList.add('bg-indigo-500');
            dot.classList.remove('bg-gray-600');
        } else {
            dot.classList.remove('bg-indigo-500');
            dot.classList.add('bg-gray-600');
        }
    });
}

// অটো স্লাইড শুরু করার ফাংশন (৩ সেকেন্ড পর পর)
function startAutoSlide() {
    stopAutoSlide(); // আগের টাইমার থাকলে বন্ধ করে নতুন শুরু করবে
    autoSlideInterval = setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }, 3000); // ৩০০০ মিলি-সেকেন্ড = ৩ সেকেন্ড
}

// অটো স্লাইড বন্ধ করার ফাংশন
function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

// পরবর্তী স্লাইড
nextBtn.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateCarousel();
    startAutoSlide(); // বাটন ক্লিক করলে টাইমার রিসেট হবে
});

// পূর্ববর্তী স্লাইড
prevBtn.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateCarousel();
    startAutoSlide(); // বাটন ক্লিক করলে টাইমার রিসেট হবে
});

// ডট নেভিগেশন
dots.forEach(dot => {
    dot.addEventListener('click', (e) => {
        currentSlide = parseInt(e.target.dataset.slide);
        updateCarousel();
        startAutoSlide(); // ডট ক্লিক করলে টাইমার রিসেট হবে
    });
});

// স্লাইডারের ওপর মাউস আনলে অটো স্লাইড বন্ধ হবে, সরিয়ে নিলে আবার শুরু হবে
const carouselContainer = carousel.parentElement;
carouselContainer.addEventListener('mouseenter', stopAutoSlide);
carouselContainer.addEventListener('mouseleave', startAutoSlide);

// পেজ লোড হওয়ার পর অটো স্লাইড শুরু
startAutoSlide();
    </script>
</body>

</html>
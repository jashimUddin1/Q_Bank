<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduRLab-Prosno Bank</title>
    <meta name="description"
        content="প্রশ্ন ব্যাংক - এসএসসি, এইচএসসি ও ভর্তি পরীক্ষার বিশাল MCQ ও CQ সংগ্রহ। মক টেস্ট, নোট তৈরি, লিডারবোর্ড এবং এআই সহায়তায় পরীক্ষায় সেরা হন।">
    <meta name="google-site-verification" content="vWQoIm5XXiMksrlQnECCJme92kaWKOGshOTIsI8iyXQ" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
   
    <style>
        :root {
            --neon-blue: #29f400;
            --dark-bg: #121212;
            --dark-card: #1e1e1e;
            --dark-border: #2d2d2d;
            --light-bg: #f5f5f5;
            --light-card: #ffffff;
            --light-border: #e0e0e0;
        }

        .glow-on-hover {
            transition: all 0.3s ease-in-out;
        }

        .group:hover .glow-on-hover {
            box-shadow: 0 0 20px rgba(0, 210, 255, 0.6);
        }

        .dark .group:hover .glow-on-hover {
            box-shadow: 0 0 30px rgba(0, 210, 255, 0.8);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        /* Neon blue spotlight effect - mouse interactive */

        .neon-spotlight {
            position: fixed;
            top: 0;
            left: 0;
            width: 450px;
            height: 450px;
            pointer-events: none;
            z-index: 0;
            opacity: 35%;
            background: radial-gradient(circle at 50% 50%, var(--neon-blue) 0%, transparent 70%);
            filter: blur(32px);
            transition: opacity 0.4s, transform 0.3s cubic-bezier(.4, 0, .2, 1);
            will-change: transform, opacity;
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'neon-blue': 'var(--neon-blue)',
                        'dark-bg': 'var(--dark-bg)',
                        'dark-card': 'var(--dark-card)',
                        'dark-border': 'var(--dark-border)',
                        'light-bg': 'var(--light-bg)',
                        'light-card': 'var(--light-card)',
                        'light-border': 'var(--light-border)',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-light-bg dark:bg-dark-bg text-gray-800 dark:text-gray-200" style="overflow-x: hidden;">
    <!-- Neon spotlight background -->
    <div class="neon-spotlight"></div>

    <!-- Animated particle dots -->
    <canvas id="particle-canvas"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0;"></canvas>

    <div class="min-h-screen flex flex-col items-center justify-center p-0 relative">
        <header class="fixed top-0 left-0 right-0 p-4 sm:p-6 z-10">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="flex items-center space-x-2 animate-fade-in-up" style="animation-delay: 0s;">
                    <div class="p-0 bg-[rgb(25,25,25)] rounded-md">
                        <img src="{{ asset('assets/logo1.png') }}" alt="Logo" width="150" class="sm:w-40 md:w-30 lg:w-48" />
                    </div>
                    <span class="text-2xl font-bold text-gray-800 dark:text-white"></span>
                </a>

                <div class="flex items-center space-x-4 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <!-- <button id="theme-toggle"
                        class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors"
                        aria-label="Toggle theme">
                        <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 block dark:hidden">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-5 h-5 hidden dark:block">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </button> -->

                    <button
                        class="relative flex items-center justify-center gap-2 px-2 py-2 md:px-4 md:py-2 lg:text-sm font-bold text-white transition-all duration-300 group rounded-xl bg-gradient-to-br from-[#ffc32b] via-[#ff8c00] to-[#ff4e00] shadow-lg hover:shadow-orange-500/50 active:scale-95 overflow-hidden">

                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent translate-y-[-100%] group-hover:translate-y-[100%] transition-transform duration-700">
                        </div>

                        <div
                            class="absolute inset-0 opacity-20 bg-gradient-to-b from-white via-transparent to-black/20">
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 relative z-10" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>

                        <span class="text-sm md:text-sm lg:text-sm sm:text-xs tracking-widest uppercase relative z-10">
                            Shop Now
                        </span>
                    </button>


                </div>
            </div>
        </header>
        <br><br><br><br>

        <main class="text-center p-4">



            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">

                <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-300 via-neon-blue to-neon-blue">
                    Prosno Bank
                </span>
            </h1>
            <p class="text-lg md:text-2xl font-extrabold mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">

                <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-300 via-neon-blue to-neon-blue">
                    শিক্ষকদের জন্য ১ ক্লিকে-ই প্রশ্ন, শীট, সাজেশন তৈরির সফটওয়্যার
                </span>
            </p>
            <p class="text-xl md:text-2xl mb-10 text-gray-600 dark:text-gray-400 animate-fade-in-up"
                style="animation-delay: 0.3s;">
                Question Everything. Master Anything.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto animate-fade-in-up"
                style="animation-delay: 0.4s;">
                <a href="/question-bank/" class="block group">
                    <!-- Replaced custom background color classes with direct rgba values for 50% opacity -->
                    <div
                        class="h-full p-8 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-300 group-hover:border-neon-blue group-hover:scale-105 glow-on-hover">
                        <h2 class="text-3xl font-bold mb-2 text-gray-800 dark:text-white">Class 6-10</h2>
                        <p class="text-gray-600 dark:text-gray-400">Concept-based study with regular assessments.
                        </p>
                    </div>
                </a>
                <a href="/question-bank/ssc" class="block group">
                    <!-- Replaced custom background color classes with direct rgba values for 50% opacity -->
                    <div
                        class="h-full p-8 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-300 group-hover:border-neon-blue group-hover:scale-105 glow-on-hover">
                        <h2 class="text-3xl font-bold mb-2 text-gray-800 dark:text-white">SSC</h2>
                        <p class="text-gray-600 dark:text-gray-400">Master your Secondary School Certificate exams.</p>
                    </div>
                </a>
                <a href="/question-bank/hsc" class="block group">
                    <!-- Replaced custom background color classes with direct rgba values for 50% opacity -->
                    <div
                        class="h-full p-8 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-300 group-hover:border-neon-blue group-hover:scale-105 glow-on-hover">
                        <h2 class="text-3xl font-bold mb-2 text-gray-800 dark:text-white">HSC</h2>
                        <p class="text-gray-600 dark:text-gray-400">Excel in your Higher Secondary Certificate exams.
                        </p>
                    </div>
                </a>

            </div>


            <!--  -->
            <section class="mt-20 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div
                    class="max-w-6xl mx-0 rounded-3xl bg-gradient-to-br from-[#0b0b0b] to-[#020202] border border-gray-800 shadow-[0_0_80px_rgba(0,255,150,0.15)] p-10 font-bold relative overflow-hidden">

                    <!-- Heading -->
                    <h2
                        class="text-center text-2xl sm:text-3xl lg:text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-lime-200">
                        আনলিমিটেড প্রশ্ন তৈরি করুন প্রশ্ন ব্যাংক থেকে
                    </h2>
                    <p class="text-center text-gray-400 mt-3">
                        ক্লাস ৬–১২, SSC, HSC ও ভর্তি প্রস্তুতির জন্য স্মার্ট প্রশ্ন প্র্যাকটিস সিস্টেম
                    </p>

                    <!-- Cards -->
                    <div class="grid md:grid-cols-3 gap-6 mt-12">

                        <!-- Card 1 -->
                        <div
                            class="group flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-gray-700 hover:border-green-400 transition-all">
                            <img src="assets/logo3.png" class="w-12 h-12 rounded-md" />
                            <div class="flex-1">
                                <h3 class="text-white font-semibold">ইংরেজি গ্রামার প্রশ্ন ব্যাংক</h3>
                                <p class="text-gray-400 text-sm">MCQ, CQ ও মডেল টেস্ট</p>
                            </div>
                            <span class="text-green-400 text-xl group-hover:translate-x-1 transition">→</span>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="group flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-gray-700 hover:border-green-400 transition-all">
                            <img src="assets/logo3.png" class="w-12 h-12 rounded-md" />
                            <div class="flex-1">
                                <h3 class="text-white font-semibold">গণিত প্রশ্ন ব্যাংক</h3>
                                <p class="text-gray-400 text-sm">অধ্যায়ভিত্তিক অনুশীলন</p>
                            </div>
                            <span class="text-green-400 text-xl group-hover:translate-x-1 transition">→</span>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="group flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-gray-700 hover:border-green-400 transition-all">
                            <img src="assets/logo3.png" class="w-12 h-12 rounded-md" />
                            <div class="flex-1">
                                <h3 class="text-white font-semibold">আইসিটি ও সাধারণ জ্ঞান</h3>
                                <p class="text-gray-400 text-sm">পরীক্ষাভিত্তিক প্রস্তুতি প্রশ্ন</p>
                            </div>
                            <span class="text-green-400 text-xl group-hover:translate-x-1 transition">→</span>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="flex justify-center mt-12">
                        <a href="{{ route('testone') }}">
                        <button
                            class="px-8 py-3 rounded-full bg-green-500 hover:bg-green-400 text-black font-semibold shadow-lg shadow-green-500/30 transition">
                            এখনই প্রশ্ন তৈরি করুন →
                        </button>
                        </a>
                    </div>

                    <!-- Glow dots -->
                    <div class="absolute bottom-6 right-6 w-2 h-2 bg-green-400 rounded-full shadow-[0_0_20px_#22c55e]">
                    </div>
                    <div class="absolute bottom-14 right-14 w-1.5 h-1.5 bg-green-400 rounded-full opacity-60"></div>

                </div>
            </section>


            <!-- Feature Highlights Section -->
            <div class="mt-20 max-w-6xl mx-auto animate-fade-in-up" style="animation-delay: 0.5s;">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-neon-blue to-purple-400">
                            কেন প্রশ্ন App?
                        </span>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Everything you need to excel in your exams</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Feature 1: Smart Practice -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-neon-blue">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-neon-blue/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-neon-blue to-blue-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Smart Practice</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">AI-powered question recommendations
                                tailored to your learning style</p>
                        </div>
                    </div>

                    <!-- Feature 2: Comprehensive Coverage -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-purple-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">10,000+ Questions</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Extensive question bank covering all
                                subjects and exam patterns</p>
                        </div>
                    </div>

                    <!-- Feature 3: Real-time Analytics -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-green-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Track Progress</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Detailed analytics and insights to
                                monitor your improvement</p>
                        </div>
                    </div>

                    <!-- Feature 4: Competitive Edge -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-yellow-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Leaderboards</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Compete with peers and climb the
                                rankings nationwide</p>
                        </div>
                    </div>

                    <!-- Feature 5: Timed Exams -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-red-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-red-500 to-rose-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Mock Tests</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Practice with realistic timed exams that
                                simulate real test conditions</p>
                        </div>
                    </div>

                    <!-- Feature 6: Doubt Clearing -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-indigo-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Ask Doubts</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Get your questions answered by experts
                                and fellow students</p>
                        </div>
                    </div>

                    <!-- Feature 7: Study Notes -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-teal-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Smart Notes</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Create and organize notes for quick
                                revision before exams</p>
                        </div>
                    </div>

                    <!-- Feature 8: 24/7 Access -->
                    <div
                        class="feature-card group relative overflow-hidden p-4 bg-[rgba(245,245,245,0.5)] dark:bg-[rgba(28,28,28,0.5)] rounded-xl border border-light-border dark:border-dark-border transition-all duration-500 hover:scale-105 hover:border-pink-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-pink-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">Anytime, Anywhere</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Study on any device with 24/7 cloud
                                access to your materials</p>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                @keyframes float {

                    0%,
                    100% {
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-10px);
                    }
                }

                .feature-card {
                    animation: float 3s ease-in-out infinite;
                }

                .feature-card:nth-child(1) {
                    animation-delay: 0s;
                }

                .feature-card:nth-child(2) {
                    animation-delay: 0.2s;
                }

                .feature-card:nth-child(3) {
                    animation-delay: 0.4s;
                }

                .feature-card:nth-child(4) {
                    animation-delay: 0.6s;
                }

                .feature-card:nth-child(5) {
                    animation-delay: 0.8s;
                }

                .feature-card:nth-child(6) {
                    animation-delay: 1s;
                }

                .feature-card:nth-child(7) {
                    animation-delay: 1.2s;
                }

                .feature-card:nth-child(8) {
                    animation-delay: 1.4s;
                }

                .feature-card:hover {
                    animation-play-state: paused;
                }
            </style>


        </main>





        <footer class="mt-auto w-full max-w-6xl text-center text-sm text-gray-500 dark:text-gray-400 pt-16 pb-4">
            <div class="footer-links mb-2">
                <ul class="flex justify-center space-x-4">
                    <li><a href="/about" class="hover:text-neon-blue">About</a></li>
                    <li><a href="/contact" class="hover:text-neon-blue">Contact</a></li>
                    <li><a href="/privacy" class="hover:text-neon-blue">Privacy</a></li>
                    <li><a href="/terms-and-conditions" class="hover:text-neon-blue">Terms & Conditions</a></li>
                    <li><a href="/faq" class="hover:text-neon-blue">FAQ</a></li>
                </ul>
            </div>

            <div class="footer-social-links mb-2">
                <ul class="flex justify-center space-x-4">
                    <!-- <li><a href="/" class="hover:text-neon-blue" aria-label="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-2 -4 24 24" fill="currentColor" class="w-6 h-6"><path d='M20 1.907a8.292 8.292 0 0 1-2.356.637A4.07 4.07 0 0 0 19.448.31a8.349 8.349 0 0 1-2.607.98A4.12 4.12 0 0 0 13.846.015c-2.266 0-4.103 1.81-4.103 4.04 0 .316.036.625.106.92A11.708 11.708 0 0 1 1.393.754a3.964 3.964 0 0 0-.554 2.03c0 1.403.724 2.64 1.824 3.363A4.151 4.151 0 0 1 .805 5.64v.05c0 1.958 1.415 3.591 3.29 3.963a4.216 4.216 0 0 1-1.08.141c-.265 0-.522-.025-.773-.075a4.098 4.098 0 0 0 3.832 2.807 8.312 8.312 0 0 1-5.095 1.727c-.332 0-.658-.02-.979-.056a11.727 11.727 0 0 0 6.289 1.818c7.547 0 11.673-6.157 11.673-11.496l-.014-.523A8.126 8.126 0 0 0 20 1.907z' /></svg>
            </a></li> -->
                    <li><a href="https://www.facebook.com/profile.php?id=61579022926339" class="hover:text-neon-blue"
                            aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-7 -2 24 24"
                                fill="currentColor" class="w-6 h-6">
                                <path
                                    d='M2.046 3.865v2.748H.032v3.36h2.014v9.986H6.18V9.974h2.775s.26-1.611.386-3.373H6.197V4.303c0-.343.45-.805.896-.805h2.254V0H6.283c-4.34 0-4.237 3.363-4.237 3.865z' />
                            </svg>
                        </a></li>
                    <!-- <li><a href="" class="hover:text-neon-blue" aria-label="Insta">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256" fill="currentColor" class="w-6 h-6"><path d="M128,82a46,46,0,1,0,46,46A46.05239,46.05239,0,0,0,128,82Zm0,68a22,22,0,1,1,22-22A22.02489,22.02489,0,0,1,128,150ZM176,20H80A60.06812,60.06812,0,0,0,20,80v96a60.06812,60.06812,0,0,0,60,60h96a60.06812,60.06812,0,0,0,60-60V80A60.06812,60.06812,0,0,0,176,20Zm36,156a36.04061,36.04061,0,0,1-36,36H80a36.04061,36.04061,0,0,1-36-36V80A36.04061,36.04061,0,0,1,80,44h96a36.04061,36.04061,0,0,1,36,36ZM196,76a16,16,0,1,1-16-16A16.01833,16.01833,0,0,1,196,76Z"/></svg>
            </a></li>
            <li><a href="mailto:mail@prosno.net" class="hover:text-neon-blue" aria-label="Email">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 22 22" fill="currentColor" class="w-6 h-6"><path d="M1 5H2V4H20V5H21V18H20V19H2V18H1V5M3 17H19V9H18V10H16V11H14V12H12V13H10V12H8V11H6V10H4V9H3V17M19 6H3V7H5V8H7V9H9V10H13V9H15V8H17V7H19V6Z" /></svg>
            </a></li>
            <li><a href="/" class="hover:text-neon-blue" aria-label="Telegram">
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="24" viewBox="0 0 48 48" fill="currentColor" class="w-6 h-6"><path d="M41.4193 7.30899C41.4193 7.30899 45.3046 5.79399 44.9808 9.47328C44.8729 10.9883 43.9016 16.2908 43.1461 22.0262L40.5559 39.0159C40.5559 39.0159 40.3401 41.5048 38.3974 41.9377C36.4547 42.3705 33.5408 40.4227 33.0011 39.9898C32.5694 39.6652 24.9068 34.7955 22.2086 32.4148C21.4531 31.7655 20.5897 30.4669 22.3165 28.9519L33.6487 18.1305C34.9438 16.8319 36.2389 13.8019 30.8426 17.4812L15.7331 27.7616C15.7331 27.7616 14.0063 28.8437 10.7686 27.8698L3.75342 25.7055C3.75342 25.7055 1.16321 24.0823 5.58815 22.459C16.3807 17.3729 29.6555 12.1786 41.4193 7.30899Z"/></svg>
            </a></li>
            <li><a href="/" class="hover:text-neon-blue" aria-label="Playstor">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" fill="currentColor" class="w-6 h-6"><path d="M48,59.49v393a4.33,4.33,0,0,0,7.37,3.07L260,256,55.37,56.42A4.33,4.33,0,0,0,48,59.49Z"/><path d="M345.8,174,89.22,32.64l-.16-.09c-4.42-2.4-8.62,3.58-5,7.06L285.19,231.93Z"/><path d="M84.08,472.39c-3.64,3.48.56,9.46,5,7.06l.16-.09L345.8,338l-60.61-57.95Z"/><path d="M449.38,231l-71.65-39.46L310.36,256l67.37,64.43L449.38,281C468.87,270.23,468.87,241.77,449.38,231Z"/></svg>
            </a></li> -->
                </ul>
            </div>

            &copy; <span id="footer-year"></span> EduRLab-Prosno-Bank. All rights reserved.
        </footer>

    </div>

    <script>
            (() => {
                const docElement = document.documentElement;
                const footerYear = document.getElementById('footer-year');

                const applyTheme = (theme) => {
                    localStorage.setItem('theme', theme);
                    if (theme === 'dark') {
                        docElement.classList.add('dark');
                        document.getElementById('moon-icon').classList.add('hidden');
                        document.getElementById('sun-icon').classList.remove('hidden');
                    } else {
                        docElement.classList.remove('dark');
                        document.getElementById('moon-icon').classList.remove('hidden');
                        document.getElementById('sun-icon').classList.add('hidden');
                    }
                };

                const initialTheme = localStorage.getItem('theme') || 'dark';
                applyTheme(initialTheme);

                const themeToggle = document.getElementById('theme-toggle');
                if (themeToggle) {
                    themeToggle.addEventListener('click', () => {
                        const isDark = docElement.classList.contains('dark');
                        applyTheme(isDark ? 'light' : 'dark');
                    });
                }

                if (footerYear) {
                    footerYear.textContent = new Date().getFullYear();
                }

                // Neon spotlight mouse interaction
                const spotlight = document.querySelector('.neon-spotlight');

                // Set the initial position a bit down from the top center
                let targetX = window.innerWidth / 2;
                let targetY = 100; // You can adjust this value to your liking, or use a percentage of the viewport height: window.innerHeight * 0.25

                let currentX = targetX;
                let currentY = targetY;

                // The lerp function to interpolate values
                function lerp(start, end, alpha) {
                    return start * (1 - alpha) + end * alpha;
                }

                function updateSpotlight() {
                    // Lerp the current coordinates towards the target coordinates
                    currentX = lerp(currentX, targetX, 0.1);
                    currentY = lerp(currentY, targetY, 0.1);

                    // Apply the interpolated position to the spotlight
                    spotlight.style.transform = `translate(${currentX - 175}px, ${currentY - 175}px)`;

                    // Request the next animation frame
                    requestAnimationFrame(updateSpotlight);
                }

                document.addEventListener('mousemove', (e) => {
                    // Update the target coordinates
                    targetX = e.clientX;
                    targetY = e.clientY;
                    spotlight.style.opacity = '0.35';
                });

                document.addEventListener('mouseleave', () => {
                    spotlight.style.opacity = '0.35';
                });

                document.addEventListener('mouseenter', () => {
                    spotlight.style.opacity = '0.35';
                });

                // Start the animation loop
                updateSpotlight();

                // // Initial position (center)
                // moveSpotlight(mouseX, mouseY);
            })();

        // Particle system with mouse interaction
        (() => {
            const canvas = document.getElementById('particle-canvas');
            const ctx = canvas.getContext('2d');

            // Set canvas size
            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            resizeCanvas();
            window.addEventListener('resize', resizeCanvas);

            // Mouse position
            let mouseX = canvas.width / 2;
            let mouseY = canvas.height / 2;
            let mouseRadius = 150; // Radius of mouse influence

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            // Color palette - neon blue shades, red, green, etc.
            const colors = [
                '#00d2ff', // neon blue
                '#00a8cc', // darker neon blue
                '#00ffff', // cyan
                '#0088ff', // light blue
                '#ff0055', // neon red
                '#ff3366', // red-pink
                '#00ff88', // neon green
                '#44ff44', // lime green
                '#ff0099', // magenta
                '#9933ff', // purple
                '#00ddff', // sky blue
                '#0099ff', // ocean blue
            ];

            // Particle class
            class Particle {
                constructor() {
                    this.reset();
                    this.y = Math.random() * canvas.height; // Start at random y position
                    this.baseX = this.x;
                    this.baseY = this.y;
                }

                reset() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.baseX = this.x;
                    this.baseY = this.y;
                    this.size = Math.random() * 3 + 1; // 1-4px
                    this.speedX = (Math.random() - 0.5) * 0.5; // Slow random horizontal movement
                    this.speedY = (Math.random() - 0.5) * 0.5; // Slow random vertical movement
                    this.color = colors[Math.floor(Math.random() * colors.length)];
                    this.opacity = Math.random() * 0.5 + 0.3; // 0.3-0.8 opacity
                    this.pulseSpeed = Math.random() * 0.02 + 0.01; // Pulsing effect
                    this.pulsePhase = Math.random() * Math.PI * 2;
                }

                update() {
                    // Calculate distance from mouse
                    const dx = mouseX - this.x;
                    const dy = mouseY - this.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    // Mouse repulsion/attraction effect
                    if (distance < mouseRadius) {
                        const force = (mouseRadius - distance) / mouseRadius;
                        const angle = Math.atan2(dy, dx);
                        // Repel particles away from mouse
                        this.x -= Math.cos(angle) * force * 3;
                        this.y -= Math.sin(angle) * force * 3;
                    } else {
                        // Slowly drift back to base position when far from mouse
                        this.x += (this.baseX - this.x) * 0.01;
                        this.y += (this.baseY - this.y) * 0.01;
                    }

                    // Random drift movement
                    this.baseX += this.speedX;
                    this.baseY += this.speedY;

                    // Wrap around screen edges
                    if (this.baseX < 0) this.baseX = canvas.width;
                    if (this.baseX > canvas.width) this.baseX = 0;
                    if (this.baseY < 0) this.baseY = canvas.height;
                    if (this.baseY > canvas.height) this.baseY = 0;

                    // Pulsing effect
                    this.pulsePhase += this.pulseSpeed;
                }

                draw() {
                    const pulse = Math.sin(this.pulsePhase) * 0.1 + 0.3; // 0.4-1.0
                    const currentSize = this.size * pulse;
                    const currentOpacity = this.opacity * pulse;

                    ctx.fillStyle = this.color;
                    ctx.globalAlpha = currentOpacity;

                    // Draw glow effect
                    const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, currentSize * 2);
                    gradient.addColorStop(0, this.color);
                    gradient.addColorStop(1, 'transparent');
                    ctx.fillStyle = gradient;

                    ctx.beginPath();
                    ctx.arc(this.x, this.y, currentSize * 2, 0, Math.PI * 2);
                    ctx.fill();

                    // Draw core dot
                    ctx.globalAlpha = currentOpacity + 0.3;
                    ctx.fillStyle = this.color;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, currentSize, 0, Math.PI * 2);
                    ctx.fill();

                    ctx.globalAlpha = 1;
                }
            }

            // Create particles
            const particleCount = 80; // Adjust for performance
            const particles = [];
            for (let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }

            // Animation loop
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                particles.forEach(particle => {
                    particle.update();
                    particle.draw();
                });

                requestAnimationFrame(animate);
            }

            animate();
        })();
    </script>
    <script src="{{ asset('js/anti_debug.js') }}"></script>
</body>

</html>
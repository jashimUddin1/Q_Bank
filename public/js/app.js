//app.js
// Global State variables
let totalMarks = 0;

// Theme Toggle Logic
const themeToggleBtn = document.getElementById("theme-toggle-btn");
const sunIcon = document.getElementById("sun-icon");
const moonIcon = document.getElementById("moon-icon");
const htmlElement = document.documentElement;

function initializeTheme() {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        htmlElement.classList.add("dark");
        sunIcon.classList.add("hidden");
        moonIcon.classList.remove("hidden");
    } else {
        htmlElement.classList.remove("dark");
        localStorage.theme = "light";
        sunIcon.classList.remove("hidden");
        moonIcon.classList.add("hidden");
    }
}

themeToggleBtn.addEventListener("click", () => {
    htmlElement.classList.toggle("dark");
    if (htmlElement.classList.contains("dark")) {
        localStorage.theme = "dark";
        sunIcon.classList.add("hidden");
        moonIcon.classList.remove("hidden");
    } else {
        localStorage.theme = "light";
        sunIcon.classList.remove("hidden");
        moonIcon.classList.add("hidden");
    }
});

// Filter Sidebar Toggle (Modal/Overlay - For Mobile)
const filterModalOverlay = document.getElementById("filter-modal-overlay");

function toggleFilterSidebar() {
    syncLevelCheckboxes("pc", "mobile");
    filterModalOverlay.classList.toggle("open");
    document.body.classList.toggle("no-scroll");
    document.documentElement.classList.toggle("no-scroll");
}

function closeFilterSidebar(event) {
    if (
        event &&
        event.target !== filterModalOverlay &&
        event.target.id !== "apply-filters-mobile-button" &&
        event.target.id !== "close-filter-sidebar-button" &&
        !event.target.closest("#close-filter-sidebar-button")
    )
        return;
    filterModalOverlay.classList.remove("open");
    document.body.classList.remove("no-scroll");
    document.documentElement.classList.remove("no-scroll");
    applyAllFilters();
}

// ===============================
// DOM Ready
// ===============================
document.addEventListener("DOMContentLoaded", () => {
    initializeTheme();

    // ---------------------------
    // Helpers
    // ---------------------------
    const $ = (id) => document.getElementById(id);

    function resetSelect(selectEl, placeholder) {
        if (!selectEl) return;
        selectEl.innerHTML = "";
        const opt = document.createElement("option");
        opt.value = "";
        opt.textContent = placeholder;
        selectEl.appendChild(opt);
    }

    async function fetchJson(url) {
        const res = await fetch(url, {
            headers: { Accept: "application/json" },
        });
        if (!res.ok) throw new Error("Request failed");
        return res.json();
    }

    function fillOptions(selectEl, items, textKey) {
        if (!selectEl || !Array.isArray(items)) return;

        items.forEach((item) => {
            const opt = document.createElement("option");
            opt.value = item.id;
            opt.textContent = item[textKey] ?? "";
            selectEl.appendChild(opt);
        });
    }

    // ---------------------------
    // Chain Loaders
    // ---------------------------
    async function loadSubjects(scope) {
        resetSelect(scope.subjectEl, "বিষয় নির্বাচন করুন");
        resetSelect(scope.chapterEl, "অধ্যায় নির্বাচন করুন");
        resetSelect(scope.lessonEl, "পাঠ নির্বাচন করুন");

        const classId = scope.classEl?.value;
        if (!classId) return;

        try {
            const url = `${window.QBANK.subjectsUrl}?class_id=${classId}`;
            const data = await fetchJson(url);
            fillOptions(scope.subjectEl, data, "sub_name");
        } catch (e) {
            console.error("Subjects load error:", e);
        }
    }

    async function loadChapters(scope) {
        resetSelect(scope.chapterEl, "অধ্যায় নির্বাচন করুন");
        resetSelect(scope.lessonEl, "পাঠ নির্বাচন করুন");

        const subjectId = scope.subjectEl?.value;
        if (!subjectId) return;

        try {
            const url = `${window.QBANK.chaptersUrl}?subject_id=${subjectId}`;
            const data = await fetchJson(url);
            fillOptions(scope.chapterEl, data, "chapter_name");
        } catch (e) {
            console.error("Chapters load error:", e);
        }
    }

    async function loadLessons(scope) {
        resetSelect(scope.lessonEl, "পাঠ নির্বাচন করুন");

        const chapterId = scope.chapterEl?.value;
        if (!chapterId) return;

        try {
            const url = `${window.QBANK.lessonsUrl}?chapter_id=${chapterId}`;
            const data = await fetchJson(url);
            fillOptions(scope.lessonEl, data, "lesson_name");
        } catch (e) {
            console.error("Lessons load error:", e);
        }
    }

    // ---------------------------
    // Scopes
    // ---------------------------
    const pc = {
        classEl: $("class-select-pc"),
        subjectEl: $("subject-select-pc"),
        chapterEl: $("chapter-select-pc"),
        lessonEl: $("lesson-select-pc"),
    };

    const mobile = {
        classEl: $("class-select-mobile"),
        subjectEl: $("subject-select-mobile"),
        chapterEl: $("chapter-select-mobile"),
        lessonEl: $("lesson-select-mobile"), // ⚠️ HTML এ এটা যোগ করা strongly recommended
    };

    function bind(scope) {
        if (!scope.classEl || !scope.subjectEl || !scope.chapterEl) return;

        scope.classEl.addEventListener("change", () => loadSubjects(scope));
        scope.subjectEl.addEventListener("change", () => loadChapters(scope));
        scope.chapterEl.addEventListener("change", () => loadLessons(scope));
    }

    bind(pc);
    bind(mobile);


    // for type/source question
    const sourceType = document.getElementById("source-select-pc");
    const boardSelect = document.getElementById("board-select-pc");
    const yearSelect = document.getElementById("year-select-pc");

    if (!sourceType || !boardSelect || !yearSelect) return;

    sourceType.addEventListener("change", () => {
        const value = sourceType.value;

        if (value === "board_question") {
            boardSelect.classList.remove("hidden");
        } else {
            // অন্য সব ক্ষেত্রে লুকাবে + reset করবে
            boardSelect.classList.add("hidden");
            boardSelect.value = "";
        }
    });
});

// --- QUIZ CAROUSEL LOGIC (OPTIMIZED) ---
const carousel = document.getElementById("quiz-carousel");
const prevBtn = document.getElementById("prev-slide");
const nextBtn = document.getElementById("next-slide");
const dots = document.querySelectorAll(".dot");

let currentSlide = 0;
const totalSlides = dots.length;
let autoSlideInterval; // টাইমার ভেরিয়েবল

// স্লাইডার আপডেট করার ফাংশন
function updateCarousel() {
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;

    dots.forEach((dot, index) => {
        if (index === currentSlide) {
            dot.classList.add("bg-indigo-500");
            dot.classList.remove("bg-gray-600");
        } else {
            dot.classList.remove("bg-indigo-500");
            dot.classList.add("bg-gray-600");
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
nextBtn.addEventListener("click", () => {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateCarousel();
    startAutoSlide(); // বাটন ক্লিক করলে টাইমার রিসেট হবে
});

// পূর্ববর্তী স্লাইড
prevBtn.addEventListener("click", () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateCarousel();
    startAutoSlide(); // বাটন ক্লিক করলে টাইমার রিসেট হবে
});

// ডট নেভিগেশন
dots.forEach((dot) => {
    dot.addEventListener("click", (e) => {
        currentSlide = parseInt(e.target.dataset.slide);
        updateCarousel();
        startAutoSlide(); // ডট ক্লিক করলে টাইমার রিসেট হবে
    });
});

// স্লাইডারের ওপর মাউস আনলে অটো স্লাইড বন্ধ হবে, সরিয়ে নিলে আবার শুরু হবে
const carouselContainer = carousel.parentElement;
carouselContainer.addEventListener("mouseenter", stopAutoSlide);
carouselContainer.addEventListener("mouseleave", startAutoSlide);

// পেজ লোড হওয়ার পর অটো স্লাইড শুরু
startAutoSlide();

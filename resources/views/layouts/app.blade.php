<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'প্রশ্ন ব্যাংক ও মডেল টেস্ট সিস্টেম' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        // Custom Tailwind Configuration (Added Inter font family)
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                    },
                    colors: {
                        "custom-purple": {
                            DEFAULT: "#9112BC",
                            50: "#FAF3FC",
                            100: "#F3E3F8",
                            200: "#E4C9F1",
                            300: "#D4AEE9",
                            400: "#C088E0",
                            500: "#A85DD4",
                            600: "#9112BC",
                            700: "#7D0A9F",
                            800: "#690786",
                            900: "#44015E",
                            950: "#29003C", // Dark mode selected card background
                        },
                    },
                    fontSize: {
                        "custom-xxs": ["0.68rem", {
                            lineHeight: "1.1"
                        }],
                        "custom-xs": ["0.78rem", {
                            lineHeight: "1.2"
                        }],
                    },
                },
            },
        };
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300 overflow-x-hidden lg:overflow-y-hidden">

    @yield('content')

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
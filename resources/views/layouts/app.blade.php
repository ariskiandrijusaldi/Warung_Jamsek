<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title ?? 'Warung Jamsek - Cita Rasa Hangat Rumahan' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    
    <!-- Tailwind CSS (CDN Configured for Stitch Theme) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#9d3e1a",
                        "primary-container": "#bd5630",
                        "primary-fixed": "#ffdbcf",
                        "primary-fixed-dim": "#ffb59c",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#fffbff",
                        "on-primary-fixed": "#390c00",
                        "on-primary-fixed-variant": "#802a05",
                        "inverse-primary": "#ffb59c",
                        
                        "secondary": "#426748",
                        "secondary-container": "#c0eac3",
                        "secondary-fixed": "#c3edc6",
                        "secondary-fixed-dim": "#a8d1ab",
                        "on-secondary": "#ffffff",
                        "on-secondary-container": "#466b4c",
                        "on-secondary-fixed": "#00210b",
                        "on-secondary-fixed-variant": "#2a4e32",
                        
                        "tertiary": "#7e5300",
                        "tertiary-container": "#9b6b1a",
                        "tertiary-fixed": "#ffddb2",
                        "tertiary-fixed-dim": "#f7bc65",
                        "on-tertiary": "#ffffff",
                        "on-tertiary-container": "#fffbff",
                        "on-tertiary-fixed": "#291800",
                        "on-tertiary-fixed-variant": "#624000",
                        
                        "surface": "#fff8f6",
                        "surface-bright": "#fff8f6",
                        "surface-dim": "#e2d8d6",
                        "surface-variant": "#eae0de",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#fcf1ef",
                        "surface-container": "#f6ecea",
                        "surface-container-high": "#f0e6e4",
                        "surface-container-highest": "#eae0de",
                        "surface-tint": "#a0401c",
                        
                        "on-surface": "#1f1b1a",
                        "on-surface-variant": "#56423c",
                        "background": "#fff8f6",
                        "on-background": "#1f1b1a",
                        
                        "outline": "#8a726a",
                        "outline-variant": "#ddc0b7",
                        
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "on-error": "#ffffff",
                        "on-error-container": "#93000a",
                        
                        "inverse-surface": "#352f2e",
                        "inverse-on-surface": "#f9eeec"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        "2xl": "1rem",
                        full: "9999px"
                    },
                    spacing: {
                        "gutter-desktop": "1.5rem",
                        "space-lg": "1.5rem",
                        "gutter": "1rem",
                        "space-xs": "0.25rem",
                        "space-xl": "2.25rem",
                        "space-md": "1rem",
                        "margin-desktop": "2.5rem",
                        "space-sm": "0.5rem",
                        "margin-tablet": "1.75rem",
                        "margin": "1rem"
                    },
                    fontFamily: {
                        sans: ["Plus Jakarta Sans", "sans-serif"],
                        body: ["Plus Jakarta Sans", "sans-serif"]
                    }
                }
            }
        };
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fff8f6;
            color: #1f1b1a;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
            line-height: 1;
        }
        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-surface font-sans text-on-surface min-h-screen flex flex-col antialiased">
    @yield('content')

    @stack('scripts')
</body>
</html>

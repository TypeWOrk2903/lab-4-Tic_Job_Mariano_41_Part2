<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="<?= url_asset("css/register.css") ?>">
</head>

<body class="flex items-center justify-center min-h-screen p-6 relative">

    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="bg-shape w-64 h-64 top-10 left-10" style="animation-delay: 0s;"></div>
        <div class="bg-shape w-40 h-40 top-40 right-20" style="animation-delay: 4s;"></div>
        <div class="bg-shape w-72 h-72 bottom-20 left-1/4" style="animation-delay: 9s;"></div>
        <div class="bg-shape w-52 h-52 bottom-40 right-1/3" style="animation-delay: 14s;"></div>
    </div>

    <!-- PRELOADER -->
    <div id="preloader" class="fixed inset-0 bg-[var(--bg)] flex items-center justify-center z-[9999]">
        <div class="text-center">
            <div class="text-4xl font-bold mb-6 tracking-tighter">CAR<span class="text-[var(--accent)]">POOL</span></div>
            <div class="w-52 h-1 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden mx-auto">
                <div class="h-full bg-[var(--accent)] w-0 animate-[loading_1.4s_linear_forwards]"></div>
            </div>
        </div>
    </div>

    <!-- Theme Toggle Button - Posicionado no canto superior direito -->
    <button onclick="toggleTheme()"
        id="theme-toggle"
        class="fixed top-6 right-6 z-50 w-11 h-11 neumorph rounded-2xl flex items-center justify-center text-xl hover:scale-110 transition-all shadow-lg">
        <i id="theme-icon" class="fa-solid fa-moon"></i>
    </button>

    <div class="w-full max-w-md relative z-10">
        <div class="neumorph p-9 register-card">

            <div class="text-center mb-8">
                <div class="flex justify-center mb-5">
                    <div class="w-14 h-14 bg-gradient-to-br from-[var(--blue)] to-[var(--accent)] text-white rounded-3xl flex items-center justify-center shadow-xl">
                        <i class="fa-solid fa-car-side text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold mb-1" data-i18n="register-title">Entrar a Conta</h1>
                <p class="text-[var(--muted)]" data-i18n="register-subtitle">Junte-se à comunidade CARPOOL</p>
            </div>

            <form id="registerForm" method="post" action="<?= url("login/") ?>" class="space-y-5">
                <input type="email" name="email" id="email" placeholder="Email" required class="neu-input">
                <input type="password" id="password" name="password" placeholder="Palavra-passe" required class="neu-input">
                    <a href="<?= url("/forget") ?>"
                        class="text-xs hover:underline"
                        style="color:var(--color-cyan)" data-i18n="login.forgot">
                        <i class="fa-solid fa-key fa-xs"></i> Esqueci a senha
                    </a>
                <button type="submit" name="register-button" class="btn-primary w-full text-base">
                    <span data-i18n="register-button">Entra Minha Conta</span>
                </button>
            </form>

            <div class="text-center mt-6 text-sm">
                <span class="text-[var(--muted)]">Já não tem conta?</span>
                <a href="<?= url("/register") ?>" class="ml-1 font-semibold text-[var(--accent)]">Criar a Conta</a>
            </div>
        </div>
    </div>

    <script>
        let currentLang = 'pt';

        const translations = {
            pt: {
                "register-title": "Entrar na Conta",
                "register-subtitle": "Junte-se à comunidade CARPOOL",
                "role-passenger": "Passageiro",
                "role-driver": "Condutor",
                "register-button": "Entra"
            },
            en: {
                "register-title": "Login Account",
                "register-subtitle": "Join the CARPOOL community",
                "role-passenger": "Passenger",
                "role-driver": "Driver",
                "register-button": "Login"
            }
        };

        function toggleLanguage() {
            currentLang = currentLang === 'pt' ? 'en' : 'pt';
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[currentLang][key]) el.textContent = translations[currentLang][key];
            });
        }



        // ==================== FUNÇÃO DE TEMA (DARK / LIGHT) ====================
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            const icon = document.getElementById('theme-icon');

            if (isDark) {
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
            }

            localStorage.theme = isDark ? 'dark' : 'light';
        }

        // ==================== INICIALIZAÇÃO AUTOMÁTICA ====================
        function initTheme() {
            if (localStorage.theme === 'dark' ||
                (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
                document.getElementById('theme-icon').classList.replace('fa-moon', 'fa-sun');
            }
        }

        // Inicializar
        $(document).ready(() => {
            initTheme();
            $('#preloader').fadeOut(900);
        });
    </script>
</body>

</html>
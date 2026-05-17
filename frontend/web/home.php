<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARPOOL - Viagens Partilhadas</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap');

        :root {
            --primary: #1e3a8a;
            --accent: #ff6b00;
        }

        .dark {
            --primary: #3b82f6;
            --accent: #ff8a3d;
        }

        .tail-container {
            font-family: 'Inter', system-ui, sans-serif;
        }
        .logo-font {
            font-family: 'Space Grotesk', sans-serif;
        }

        .neumorph {
            background: #f8fafc;
            box-shadow: -8px -8px 16px #e2e8f0,
                        8px 8px 16px #f8fafc;
        }
        .dark .neumorph {
            background: #1a2333;
            box-shadow: -8px -8px 16px #242e4d,
                        8px 8px 16px #111827;
        }

        .hero-bg {
            background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.85)),
                        url('<?= asset("images", "hero-carpool.jpg") ?>') center/cover no-repeat fixed;
            transition: background-position 0.1s linear;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 
                       0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .input-neumorph {
            background: #f8fafc;
            box-shadow: inset 4px 4px 8px #e2e8f0,
                        inset -4px -4px 8px #ffffff;
        }
        .dark .input-neumorph {
            background: #1a2333;
            box-shadow: inset 4px 4px 8px #111827,
                        inset -4px -4px 8px #2a374f;
        }
    </style>
</head>
<body class="tail-container bg-[#f8fafc] dark:bg-[#0b0f19] text-[#0f172a] dark:text-[#f8fafc] transition-colors duration-500">

    <!-- PRELOADER -->
    <div id="preloader" class="fixed inset-0 bg-white/95 dark:bg-[#0b0f19]/95 backdrop-blur-xl flex items-center justify-center z-[9999]">
        <div class="text-center">
            <div class="w-20 h-20 mx-auto mb-6 neumorph rounded-3xl flex items-center justify-center">
                <i class="fa-solid fa-car-side text-5xl text-[#ff6b00] dark:text-[#ff8a3d]"></i>
            </div>
            <div class="w-10 h-10 border-4 border-gray-200 dark:border-gray-700 border-t-[#ff6b00] dark:border-t-[#ff8a3d] rounded-full animate-spin mx-auto"></div>
            <p class="mt-6 text-sm font-medium tracking-widest text-gray-500 dark:text-gray-400">CARPOOL</p>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 bg-white/80 dark:bg-[#0b0f19]/80 backdrop-blur-xl border-b border-gray-200 dark:border-gray-800 z-50">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-x-3">
                <div class="w-11 h-11 bg-[#1e3a8a] dark:bg-[#3b82f6] text-white rounded-2xl flex items-center justify-center neumorph">
                    <i class="fa-solid fa-car-side text-3xl"></i>
                </div>
                <span class="logo-font text-4xl font-bold tracking-tighter">CARPOOL</span>
            </div>

            <div class="hidden md:flex items-center gap-x-8 text-sm font-medium">
                <a href="#how" class="hover:text-[#ff6b00] dark:hover:text-[#ff8a3d] transition-colors nav-link" data-i18n="nav-how">Como Funciona</a>
                <a href="#features" class="hover:text-[#ff6b00] dark:hover:text-[#ff8a3d] transition-colors nav-link" data-i18n="nav-features">Vantagens</a>
                <a href="#testimonials" class="hover:text-[#ff6b00] dark:hover:text-[#ff8a3d] transition-colors nav-link" data-i18n="nav-testimonials">Depoimentos</a>
            </div>

            <div class="flex items-center gap-x-4">
                <!-- Language -->
                <button onclick="toggleLanguage()" 
                        class="px-5 py-2.5 text-sm font-semibold rounded-3xl neumorph flex items-center gap-x-2 hover:scale-105 transition">
                    <i class="fa-solid fa-globe"></i>
                    <span id="lang-text" class="font-mono">PT</span>
                </button>

                <!-- Theme -->
                <button onclick="toggleTheme()" id="theme-btn"
                        class="w-11 h-11 neumorph rounded-3xl flex items-center justify-center text-xl hover:scale-110 transition">
                    <i id="theme-icon" class="fa-solid fa-moon"></i>
                </button>

                <!-- Sign In -->
                <button onclick="showLoginModal()" 
                        class="px-7 py-3 bg-[#1e3a8a] dark:bg-[#3b82f6] hover:bg-[#1e40af] text-white font-semibold rounded-3xl transition-all flex items-center gap-x-2">
                    <i class="fa-solid fa-user"></i>
                    <span data-i18n="nav-signin">Entrar</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <header id="hero" class="hero-bg h-screen flex items-center relative pt-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-3xl text-white text-sm">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span data-i18n="hero-live">+12.450 viagens hoje</span>
                </div>
                
                <h1 id="hero-title" class="text-6xl md:text-7xl font-bold leading-none tracking-tighter" data-i18n="hero-title">
                    Viagens partilhadas.<br>Economia real.
                </h1>
                
                <p id="hero-subtitle" class="text-xl text-white/90 max-w-lg" data-i18n="hero-subtitle">
                    Encontre boleia ou partilhe o seu carro com pessoas verificadas.
                </p>

                <button onclick="document.getElementById('booking-form').scrollIntoView({behavior:'smooth'})" 
                        class="px-10 py-5 bg-[#ff6b00] hover:bg-[#ff8a3d] text-white font-semibold text-lg rounded-3xl transition-all flex items-center gap-x-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span data-i18n="hero-cta">Procurar Viagem</span>
                </button>
            </div>

            <!-- BOOKING FORM -->
            <div id="booking-form" class="neumorph rounded-3xl p-8 md:p-10 shadow-2xl">
                <h3 class="text-2xl font-semibold mb-8 text-center" data-i18n="form-title">Para onde vamos?</h3>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-medium mb-2 text-gray-500 dark:text-gray-400" data-i18n="form-from">DE</label>
                        <div class="relative">
                            <i class="fa-solid fa-location-dot absolute left-5 top-1/2 -translate-y-1/2 text-[#ff6b00]"></i>
                            <input type="text" id="origin" value="Lisboa" 
                                   class="input-neumorph w-full pl-12 pr-6 py-5 rounded-3xl focus:outline-none text-base">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-2 text-gray-500 dark:text-gray-400" data-i18n="form-to">PARA</label>
                        <div class="relative">
                            <i class="fa-solid fa-location-arrow absolute left-5 top-1/2 -translate-y-1/2 text-[#ff6b00]"></i>
                            <input type="text" id="destination" value="Porto" 
                                   class="input-neumorph w-full pl-12 pr-6 py-5 rounded-3xl focus:outline-none text-base">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-medium mb-2 text-gray-500 dark:text-gray-400" data-i18n="form-date">DATA</label>
                            <input type="date" id="date" class="input-neumorph w-full px-6 py-5 rounded-3xl">
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-2 text-gray-500 dark:text-gray-400" data-i18n="form-seats">LUGARES</label>
                            <select id="seats" class="input-neumorph w-full px-6 py-5 rounded-3xl">
                                <option value="2">2 lugares</option>
                                <option value="3">3 lugares</option>
                                <option value="4" selected>4 lugares</option>
                            </select>
                        </div>
                    </div>
                    <button onclick="performSearch()" 
                            class="w-full py-6 bg-[#ff6b00] hover:bg-[#ff8a3d] text-white font-bold text-lg rounded-3xl transition-all">
                        <span data-i18n="form-button">Encontrar Boleias</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- FEATURES -->
    <section id="features" class="py-24 bg-white dark:bg-[#0b0f19]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="px-6 py-2 bg-orange-100 dark:bg-orange-900/30 text-[#ff6b00] rounded-3xl text-sm font-semibold" data-i18n="features-badge">PORQUÊ ESCOLHER-NOS</span>
                <h2 class="text-5xl font-bold mt-4" data-i18n="features-title">Viagens mais inteligentes</h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="neumorph rounded-3xl p-10 card-hover">
                    <i class="fa-solid fa-piggy-bank text-5xl text-[#ff6b00] mb-6"></i>
                    <h3 class="text-2xl font-semibold mb-3" data-i18n="feature1-title">Economia</h3>
                    <p class="text-gray-600 dark:text-gray-400" data-i18n="feature1-desc">Poupe até 70% comparado com viagens individuais.</p>
                </div>
                <div class="neumorph rounded-3xl p-10 card-hover">
                    <i class="fa-solid fa-shield-halved text-5xl text-[#1e3a8a] mb-6"></i>
                    <h3 class="text-2xl font-semibold mb-3" data-i18n="feature2-title">Segurança</h3>
                    <p class="text-gray-600 dark:text-gray-400" data-i18n="feature2-desc">Perfis verificados, avaliações e suporte 24/7.</p>
                </div>
                <div class="neumorph rounded-3xl p-10 card-hover">
                    <i class="fa-solid fa-users text-5xl text-[#3b82f6] mb-6"></i>
                    <h3 class="text-2xl font-semibold mb-3" data-i18n="feature3-title">Comunidade</h3>
                    <p class="text-gray-600 dark:text-gray-400" data-i18n="feature3-desc">Conheça novas pessoas em cada viagem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how" class="py-24 bg-[#f8fafc] dark:bg-[#111827]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-bold text-center mb-16" data-i18n="how-title">Em 3 passos simples</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto neumorph rounded-3xl flex items-center justify-center text-4xl mb-6">1</div>
                    <h4 class="font-semibold text-2xl mb-2" data-i18n="step1">Pesquise</h4>
                    <p class="text-gray-600 dark:text-gray-400" data-i18n="step1-desc">Encontre a viagem perfeita para o seu destino.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto neumorph rounded-3xl flex items-center justify-center text-4xl mb-6">2</div>
                    <h4 class="font-semibold text-2xl mb-2" data-i18n="step2">Reserve</h4>
                    <p class="text-gray-600 dark:text-gray-400" data-i18n="step2-desc">Confirme e pague de forma segura.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto neumorph rounded-3xl flex items-center justify-center text-4xl mb-6">3</div>
                    <h4 class="font-semibold text-2xl mb-2" data-i18n="step3">Viaje</h4>
                    <p class="text-gray-600 dark:text-gray-400" data-i18n="step3-desc">Encontre o condutor e parta para a aventura.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section id="testimonials" class="py-24 bg-white dark:bg-[#0b0f19]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-bold text-center mb-12" data-i18n="testimonials-title">O que dizem os nossos utilizadores</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="neumorph p-8 rounded-3xl">
                    <div class="flex gap-1 mb-4">★★★★★</div>
                    <p class="italic mb-6" data-i18n="testimonial1">"Melhor decisão que tomei este ano. Economizei muito e conheci gente incrível!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-2xl"></div>
                        <div>
                            <div class="font-semibold">Maria Santos</div>
                            <div class="text-sm text-gray-500">Lisboa → Porto</div>
                        </div>
                    </div>
                </div>
                <!-- Repetir mais 2 cards similares -->
            </div>
        </div>
    </section>

    <!-- APP PREVIEW -->
    <section class="py-24 bg-gradient-to-br from-[#0b0f19] to-[#1e3a8a] text-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-16 items-center">
            <div class="md:col-span-5">
                <h2 class="text-5xl font-bold leading-tight mb-6" data-i18n="app-title">A viagem começa no seu bolso</h2>
                <p class="text-xl text-white/80 mb-10" data-i18n="app-desc">Descarregue a app CARPOOL e viaje com mais liberdade.</p>
                <div class="flex gap-4">
                    <button class="flex-1 bg-black py-5 rounded-3xl flex items-center justify-center gap-3">
                        <i class="fa-brands fa-apple text-4xl"></i>
                        <div class="text-left">
                            <div class="text-xs">Download on the</div>
                            <div class="font-semibold">App Store</div>
                        </div>
                    </button>
                    <button class="flex-1 bg-black py-5 rounded-3xl flex items-center justify-center gap-3">
                        <i class="fa-brands fa-google-play text-4xl"></i>
                        <div class="text-left">
                            <div class="text-xs">GET IT ON</div>
                            <div class="font-semibold">Google Play</div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="md:col-span-7">
                <img src="<?= asset('images', 'phone-mockup.png') ?>" alt="App Mockup" class="mx-auto max-w-sm shadow-2xl rounded-[3rem]">
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#0b0f19] text-white/80 py-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-5 gap-y-12">
            <!-- Logo + Social + Copyright -->
            <div class="col-span-2">
                <div class="flex items-center gap-x-3 mb-6">
                    <div class="w-10 h-10 bg-[#ff6b00] rounded-2xl flex items-center justify-center">
                        <i class="fa-solid fa-car-side"></i>
                    </div>
                    <span class="logo-font text-4xl font-bold">CARPOOL</span>
                </div>
                <p class="max-w-xs" data-i18n="footer-desc">Partilhar viagens. Conectar pessoas.</p>
            </div>
            <!-- Outras colunas de links -->
            <div>
                <h4 class="font-semibold mb-5 text-white" data-i18n="footer-company">Empresa</h4>
                <div class="space-y-3 text-sm">
                    <a href="#" class="block hover:text-white">Sobre nós</a>
                    <a href="#" class="block hover:text-white">Carreiras</a>
                </div>
            </div>
            <div>
                <h4 class="font-semibold mb-5 text-white" data-i18n="footer-product">Produto</h4>
                <div class="space-y-3 text-sm">
                    <a href="#" class="block hover:text-white">Tornar-se Condutor</a>
                    <a href="#" class="block hover:text-white">Preços</a>
                </div>
            </div>
            <div>
                <h4 class="font-semibold mb-5 text-white" data-i18n="footer-support">Suporte</h4>
                <div class="space-y-3 text-sm">
                    <a href="#" class="block hover:text-white">Centro de Ajuda</a>
                    <a href="#" class="block hover:text-white">Segurança</a>
                </div>
            </div>
        </div>
        <div class="text-center text-xs mt-20 border-t border-white/10 pt-8">
            © 2026 CARPOOL. Todos os direitos reservados.
        </div>
    </footer>

    <!-- LOGIN MODAL -->
    <div id="login-modal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-[99999]">
        <div class="neumorph max-w-md w-full mx-4 rounded-3xl p-10">
            <h3 class="text-2xl font-semibold mb-8" data-i18n="modal-title">Bem-vindo de volta</h3>
            <button onclick="hideLoginModal()" class="absolute top-6 right-6 text-3xl">&times;</button>
            <!-- Formulário simplificado -->
            <button onclick="fakeLogin()" class="w-full py-6 bg-[#ff6b00] text-white font-bold rounded-3xl">Entrar</button>
        </div>
    </div>

    <script>
        // ==================== I18N DICTIONARY ====================
        const translations = {
            pt: {
                "nav-how": "Como Funciona",
                "nav-features": "Vantagens",
                "nav-testimonials": "Depoimentos",
                "nav-signin": "Entrar",
                "hero-title": "Viagens partilhadas.<br>Economia real.",
                "hero-subtitle": "Encontre boleia ou partilhe o seu carro com pessoas verificadas.",
                "hero-live": "+12.450 viagens hoje",
                "hero-cta": "Procurar Viagem",
                "form-title": "Para onde vamos?",
                "form-from": "DE",
                "form-to": "PARA",
                "form-date": "DATA",
                "form-seats": "LUGARES",
                "form-button": "Encontrar Boleias",
                "features-badge": "PORQUÊ ESCOLHER-NOS",
                "features-title": "Viagens mais inteligentes",
                "feature1-title": "Economia",
                "feature1-desc": "Poupe até 70% comparado com viagens individuais.",
                "feature2-title": "Segurança",
                "feature2-desc": "Perfis verificados, avaliações e suporte 24/7.",
                "feature3-title": "Comunidade",
                "feature3-desc": "Conheça novas pessoas em cada viagem.",
                "how-title": "Em 3 passos simples",
                "step1": "Pesquise",
                "step2": "Reserve",
                "step3": "Viaje",
                "testimonials-title": "O que dizem os nossos utilizadores",
                "app-title": "A viagem começa no seu bolso",
                "app-desc": "Descarregue a app CARPOOL e viaje com mais liberdade.",
                "footer-desc": "Partilhar viagens. Conectar pessoas.",
                "modal-title": "Bem-vindo de volta"
            },
            en: {
                "nav-how": "How it Works",
                "nav-features": "Features",
                "nav-testimonials": "Testimonials",
                "nav-signin": "Sign In",
                "hero-title": "Shared rides.<br>Real savings.",
                "hero-subtitle": "Find a ride or share your car with verified people.",
                "hero-live": "+12,450 trips today",
                "hero-cta": "Search Ride",
                "form-title": "Where are we going?",
                "form-from": "FROM",
                "form-to": "TO",
                "form-date": "DATE",
                "form-seats": "SEATS",
                "form-button": "Find Rides",
                "features-badge": "WHY CHOOSE US",
                "features-title": "Smarter Journeys",
                "feature1-title": "Savings",
                "feature1-desc": "Save up to 70% compared to solo trips.",
                "feature2-title": "Safety",
                "feature2-desc": "Verified profiles, ratings & 24/7 support.",
                "feature3-title": "Community",
                "feature3-desc": "Meet amazing people on every trip.",
                "how-title": "In 3 Simple Steps",
                "step1": "Search",
                "step2": "Book",
                "step3": "Travel",
                "testimonials-title": "What our users say",
                "app-title": "The journey starts in your pocket",
                "app-desc": "Download the CARPOOL app and travel with freedom.",
                "footer-desc": "Share rides. Connect people.",
                "modal-title": "Welcome back"
            }
        };

        let currentLang = 'pt';

        function toggleLanguage() {
            currentLang = currentLang === 'pt' ? 'en' : 'pt';
            document.getElementById('lang-text').textContent = currentLang.toUpperCase();
            
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[currentLang][key]) {
                    el.innerHTML = translations[currentLang][key];
                }
            });
        }

        // ==================== THEME TOGGLE ====================
        function toggleTheme() {
            const html = document.documentElement;
            html.classList.toggle('dark');
            
            const icon = document.getElementById('theme-icon');
            if (html.classList.contains('dark')) {
                icon.classList.replace('fa-moon', 'fa-sun');
                localStorage.theme = 'dark';
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
                localStorage.theme = 'light';
            }
        }

        function initTheme() {
            if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
                document.getElementById('theme-icon').classList.replace('fa-moon', 'fa-sun');
            }
        }

        // Fake functions
        function performSearch() {
            alert(currentLang === 'pt' ? 'Procurando viagens...' : 'Searching rides...');
        }
        function showLoginModal() {
            document.getElementById('login-modal').classList.remove('hidden');
            document.getElementById('login-modal').classList.add('flex');
        }
        function hideLoginModal() {
            document.getElementById('login-modal').classList.add('hidden');
            document.getElementById('login-modal').classList.remove('flex');
        }
        function fakeLogin() {
            hideLoginModal();
            setTimeout(() => alert(currentLang === 'pt' ? 'Login simulado com sucesso!' : 'Login successful!'), 300);
        }

        // Parallax Hero
        window.addEventListener('scroll', () => {
            const hero = document.getElementById('hero');
            if (hero) {
                const scroll = window.scrollY;
                hero.style.backgroundPositionY = `${scroll * 0.4}px`;
            }
        });

        // Initialize
        $(document).ready(() => {
            initTheme();
            $('#preloader').fadeOut(900);
            
            console.log('%cCARPOOL Landing Page carregada com sucesso ✨', 'color:#ff6b00; font-family:monospace; font-size:13px');
        });
    </script>
</body>
</html>
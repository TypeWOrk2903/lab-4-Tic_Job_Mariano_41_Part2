<!DOCTYPE html>
<html lang="pt" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $pageTitle ?></title>

  <!-- CDNs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            'cp-bg': '#f0f2f5',
            'cp-blue': '#1e3a8a',
            'cp-accent': '#ffaa44',
            'cp-dark-bg': '#0b0f19',
            'cp-dark-bl': '#3b82f6',
            'cp-dark-ac': '#ff8a3d',
          },
          fontFamily: {
            display: ['"Oswald"', 'sans-serif'],
            sans: ['"Outfit"', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="<?= url_asset("css/style.css"); ?>">
</head>

<body>

  <!-- ─── PRELOADER ──────────────────────────────────────────────── -->
  <div id="preloader">
    <div class="preloader-logo">CAR<span>POOL</span></div>
    <div class="preloader-bar"></div>
  </div>

  <!-- ─── NAVBAR ────────────────────────────────────────────────── -->
  <nav class="navbar">
    <a href="<?= url("/") ?>" class="nav-brand">CAR<span>POOL</span></a>
    <ul class="nav-links">
      <li><a href="#features" data-i18n="nav.features">Funcionalidades</a></li>
      <li><a href="#how" data-i18n="nav.how">Como Funciona</a></li>
      <li><a href="#testimonials" data-i18n="nav.testimonials">Testemunhos</a></li>
    </ul>
    <div class="nav-controls">
      <button id="lang-toggle" class="neu-btn" title="Trocar idioma">
        <i class="fa-solid fa-globe"></i>
        <span id="lang-label">EN</span>
      </button>
      <button id="theme-toggle" class="neu-btn" title="Alternar tema">
        <i class="fa-solid fa-moon" id="theme-icon"></i>
      </button>
    </div>
  </nav>

  <!-- ─── PAGE GRID ─────────────────────────────────────────────── -->
  <div class="page-grid">

    <!-- ════ MAIN COL ════════════════════════════════════════════ -->
    <main class="main-col">

      <!-- HERO -->
      <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
          <div class="hero-badge">
            <span class="dot"></span>
            <span data-i18n="hero.badge">Plataforma de Mobilidade #1 em Angola</span>
          </div>
          <h1 data-i18n="hero.title_html">Partilhe a viagem.<br><em>Partilhe o futuro.</em></h1>
          <p data-i18n="hero.subtitle">Conecte-se com colegas em Luanda, Huambo ou Benguela, poupe combustível e reduza emissões de CO₂ com a plataforma de carpooling mais inteligente de Angola.</p>
          <div class="hero-ctas">
            <a href="#sidebar-search" class="btn-primary">
              <i class="fa-solid fa-magnifying-glass"></i>
              <span data-i18n="hero.cta1">Encontrar Boleia</span>
            </a>
            <a href="<?= url("register") ?>" class="btn-secondary">
              <i class="fa-solid fa-car-side"></i>
              <span data-i18n="hero.cta2">Oferecer Boleia</span>
            </a>
          </div>
        </div>
      </section>

      <!-- STATS -->
      <div class="stats-strip fade-in">
        <div class="stat-item">
          <span class="stat-num">32K+</span>
          <span class="stat-label" data-i18n="stats.users">Utilizadores Ativos</span>
        </div>
        <div class="stat-item">
          <span class="stat-num">890K</span>
          <span class="stat-label" data-i18n="stats.rides">Viagens Realizadas</span>
        </div>
        <div class="stat-item">
          <span class="stat-num">210T</span>
          <span class="stat-label" data-i18n="stats.co2">CO₂ Poupado</span>
        </div>
        <div class="stat-item">
          <span class="stat-num">850M Kz</span>
          <span class="stat-label" data-i18n="stats.saved">Poupanças Totais</span>
        </div>
      </div>

      <!-- FEATURES -->
      <section class="section" id="features">
        <h2 class="section-title fade-in" data-i18n="feat.title">Tudo o que precisa numa só plataforma</h2>
        <p class="section-subtitle fade-in" data-i18n="feat.subtitle">Desenhado para tornar a mobilidade urbana mais simples, segura e sustentável.</p>
        <div class="features-grid">
          <div class="feature-card fade-in">
            <div class="feature-icon"><i class="fa-solid fa-route"></i></div>
            <h3 data-i18n="feat.f1.title">Correspondência Inteligente</h3>
            <p data-i18n="feat.f1.desc">O nosso algoritmo encontra as melhores boleias com base na sua rota, horário e preferências pessoais.</p>
          </div>
          <div class="feature-card fade-in" style="transition-delay:.1s">
            <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <h3 data-i18n="feat.f2.title">Perfis Verificados</h3>
            <p data-i18n="feat.f2.desc">Todos os condutores são verificados com documentação válida, carta de condução e avaliações da comunidade.</p>
          </div>
          <div class="feature-card fade-in" style="transition-delay:.2s">
            <div class="feature-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
            <h3 data-i18n="feat.f3.title">Pagamento Fácil</h3>
            <p data-i18n="feat.f3.desc">Divida os custos automaticamente via Multicaixa Express, Unitel Money ou saldo CARPOOL. Sem dinheiro vivo, sem complicações.</p>
          </div>
          <div class="feature-card fade-in" style="transition-delay:.05s">
            <div class="feature-icon"><i class="fa-solid fa-location-crosshairs"></i></div>
            <h3 data-i18n="feat.f4.title">Rastreio em Tempo Real</h3>
            <p data-i18n="feat.f4.desc">Acompanhe a viagem ao vivo e partilhe a sua localização com amigos ou familiares para maior segurança.</p>
          </div>
          <div class="feature-card fade-in" style="transition-delay:.15s">
            <div class="feature-icon"><i class="fa-solid fa-leaf"></i></div>
            <h3 data-i18n="feat.f5.title">Pegada de Carbono</h3>
            <p data-i18n="feat.f5.desc">Veja o impacto ambiental positivo de cada viagem partilhada com métricas de CO₂ personalizadas.</p>
          </div>
          <div class="feature-card fade-in" style="transition-delay:.25s">
            <div class="feature-icon"><i class="fa-solid fa-bell"></i></div>
            <h3 data-i18n="feat.f6.title">Alertas Inteligentes</h3>
            <p data-i18n="feat.f6.desc">Receba notificações quando uma boleia compatível com o seu trajeto habitual ficar disponível.</p>
          </div>
        </div>
      </section>

      </section>

      <!-- IMAGE GALLERY -->
      <section class="img-section fade-in" id="gallery">
        <h2 class="section-title" data-i18n="gallery.title">Caronas em Angola</h2>
        <p class="section-subtitle" data-i18n="gallery.subtitle">Veja como o CARPOOL transforma a mobilidade urbana nas cidades angolanas.</p>
        <div class="img-gallery">

          <!-- Card 1 — Large: city road scene -->
          <div class="img-card span-col">
            <svg viewBox="0 0 480 460" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
              <defs>
                <linearGradient id="skyAO" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#f97316" />
                  <stop offset="55%" stop-color="#fcd34d" />
                  <stop offset="100%" stop-color="#fed7aa" />
                </linearGradient>
                <linearGradient id="rdAO" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#374151" />
                  <stop offset="100%" stop-color="#1f2937" />
                </linearGradient>
              </defs>
              <!-- Sky / sunset -->
              <rect width="480" height="460" fill="url(#skyAO)" />
              <!-- Sun disc -->
              <circle cx="380" cy="130" r="55" fill="#fbbf24" opacity=".85" />
              <circle cx="380" cy="130" r="70" fill="#fcd34d" opacity=".25" />
              <!-- Buildings Luanda skyline -->
              <rect x="0" y="170" width="55" height="180" fill="#1e3a8a" opacity=".8" rx="3" />
              <rect x="8" y="185" width="10" height="12" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="22" y="185" width="10" height="12" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="36" y="185" width="10" height="12" fill="#fcd34d" opacity=".3" rx="1" />
              <rect x="8" y="205" width="10" height="12" fill="#fcd34d" opacity=".4" rx="1" />
              <rect x="22" y="205" width="10" height="12" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="36" y="205" width="10" height="12" fill="#fcd34d" opacity=".5" rx="1" />
              <rect x="60" y="140" width="70" height="210" fill="#1e40af" opacity=".85" rx="3" />
              <rect x="70" y="155" width="12" height="14" fill="#fcd34d" opacity=".7" rx="1" />
              <rect x="88" y="155" width="12" height="14" fill="#fcd34d" opacity=".5" rx="1" />
              <rect x="106" y="155" width="12" height="14" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="70" y="178" width="12" height="14" fill="#fcd34d" opacity=".4" rx="1" />
              <rect x="88" y="178" width="12" height="14" fill="#fcd34d" opacity=".7" rx="1" />
              <rect x="106" y="178" width="12" height="14" fill="#fcd34d" opacity=".3" rx="1" />
              <rect x="70" y="201" width="12" height="14" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="88" y="201" width="12" height="14" fill="#fcd34d" opacity=".5" rx="1" />
              <rect x="140" y="200" width="45" height="150" fill="#2563eb" opacity=".7" rx="3" />
              <rect x="148" y="212" width="9" height="11" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="162" y="212" width="9" height="11" fill="#fcd34d" opacity=".4" rx="1" />
              <rect x="148" y="230" width="9" height="11" fill="#fcd34d" opacity=".5" rx="1" />
              <rect x="162" y="230" width="9" height="11" fill="#fcd34d" opacity=".7" rx="1" />
              <rect x="195" y="220" width="35" height="130" fill="#1e3a8a" opacity=".75" rx="2" />
              <rect x="240" y="185" width="55" height="165" fill="#1d4ed8" opacity=".8" rx="3" />
              <rect x="249" y="198" width="10" height="12" fill="#fcd34d" opacity=".6" rx="1" />
              <rect x="265" y="198" width="10" height="12" fill="#fcd34d" opacity=".4" rx="1" />
              <rect x="281" y="198" width="10" height="12" fill="#fcd34d" opacity=".5" rx="1" />
              <rect x="300" y="210" width="40" height="140" fill="#1e40af" opacity=".7" rx="2" />
              <rect x="350" y="170" width="55" height="180" fill="#1e3a8a" opacity=".8" rx="3" />
              <rect x="410" y="200" width="70" height="150" fill="#2563eb" opacity=".65" rx="2" />
              <!-- Road -->
              <rect x="0" y="340" width="480" height="120" fill="url(#rdAO)" rx="0" />
              <!-- Lane markings -->
              <rect x="0" y="390" width="60" height="6" fill="#fcd34d" opacity=".6" rx="3" />
              <rect x="80" y="390" width="60" height="6" fill="#fcd34d" opacity=".6" rx="3" />
              <rect x="160" y="390" width="60" height="6" fill="#fcd34d" opacity=".6" rx="3" />
              <rect x="240" y="390" width="60" height="6" fill="#fcd34d" opacity=".6" rx="3" />
              <rect x="320" y="390" width="60" height="6" fill="#fcd34d" opacity=".6" rx="3" />
              <rect x="400" y="390" width="60" height="6" fill="#fcd34d" opacity=".6" rx="3" />
              <!-- Road divider -->
              <rect x="0" y="368" width="480" height="3" fill="#fff" opacity=".15" />
              <!-- Car 1 (blue, main) -->
              <g transform="translate(80,308)">
                <rect x="0" y="20" width="120" height="52" fill="#1e3a8a" rx="8" />
                <rect x="15" y="5" width="90" height="36" fill="#2563eb" rx="6" />
                <rect x="20" y="8" width="38" height="26" fill="#bfdbfe" rx="3" opacity=".85" />
                <rect x="62" y="8" width="38" height="26" fill="#bfdbfe" rx="3" opacity=".85" />
                <circle cx="22" cy="72" r="14" fill="#111827" />
                <circle cx="22" cy="72" r="8" fill="#374151" />
                <circle cx="98" cy="72" r="14" fill="#111827" />
                <circle cx="98" cy="72" r="8" fill="#374151" />
                <!-- Headlights -->
                <rect x="105" y="26" width="14" height="8" fill="#fcd34d" rx="2" />
                <rect x="1" y="26" width="10" height="8" fill="#f87171" rx="2" />
                <!-- People silhouettes -->
                <circle cx="42" cy="17" r="7" fill="#fbbf24" opacity=".9" />
                <circle cx="62" cy="17" r="7" fill="#f97316" opacity=".9" />
                <circle cx="82" cy="17" r="7" fill="#fbbf24" opacity=".7" />
              </g>
              <!-- Car 2 (orange accent, far) -->
              <g transform="translate(280,316)" opacity=".75">
                <rect x="0" y="16" width="90" height="40" fill="#f97316" rx="6" />
                <rect x="10" y="4" width="70" height="28" fill="#fed7aa" rx="5" />
                <rect x="14" y="7" width="28" height="18" fill="#bfdbfe" rx="2" opacity=".8" />
                <rect x="46" y="7" width="28" height="18" fill="#bfdbfe" rx="2" opacity=".8" />
                <circle cx="18" cy="56" r="11" fill="#111827" />
                <circle cx="18" cy="56" r="6" fill="#374151" />
                <circle cx="72" cy="56" r="11" fill="#111827" />
                <circle cx="72" cy="56" r="6" fill="#374151" />
                <rect x="79" y="20" width="10" height="6" fill="#fcd34d" rx="2" />
              </g>
              <!-- Palm trees -->
              <g transform="translate(435,230)">
                <rect x="5" y="40" width="6" height="70" fill="#713f12" rx="2" />
                <ellipse cx="8" cy="38" rx="18" ry="10" fill="#15803d" opacity=".9" transform="rotate(-20,8,38)" />
                <ellipse cx="8" cy="35" rx="18" ry="8" fill="#16a34a" opacity=".85" transform="rotate(15,8,35)" />
                <ellipse cx="8" cy="32" rx="14" ry="7" fill="#22c55e" opacity=".8" transform="rotate(-10,8,32)" />
              </g>
              <g transform="translate(5,255)" opacity=".7">
                <rect x="5" y="40" width="5" height="55" fill="#713f12" rx="2" />
                <ellipse cx="7" cy="38" rx="14" ry="8" fill="#15803d" opacity=".9" transform="rotate(-15,7,38)" />
                <ellipse cx="7" cy="34" rx="14" ry="7" fill="#16a34a" opacity=".85" transform="rotate(10,7,34)" />
              </g>
            </svg>
            <div class="img-label" data-i18n="gallery.img1">Avenida de Luanda — Boleias diárias</div>
          </div>

          <!-- Card 2 — Passengers sharing car -->
          <div class="img-card">
            <svg viewBox="0 0 300 220" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
              <defs>
                <linearGradient id="carInt" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="#1e3a8a" />
                  <stop offset="100%" stop-color="#0f172a" />
                </linearGradient>
              </defs>
              <rect width="300" height="220" fill="url(#carInt)" />
              <!-- Car interior background -->
              <rect x="20" y="30" width="260" height="160" fill="#1e293b" rx="20" />
              <!-- Dashboard -->
              <rect x="30" y="120" width="240" height="50" fill="#0f172a" rx="10" />
              <circle cx="90" cy="145" r="20" fill="#1e3a8a" stroke="#3b82f6" stroke-width="2" />
              <circle cx="90" cy="145" r="12" fill="#0f172a" />
              <line x1="90" y1="133" x2="90" y2="142" stroke="#3b82f6" stroke-width="2" />
              <rect x="120" y="132" width="80" height="26" fill="#0f172a" rx="6" />
              <rect x="125" y="136" width="50" height="6" fill="#3b82f6" rx="3" opacity=".8" />
              <rect x="125" y="146" width="35" height="5" fill="#f97316" rx="3" opacity=".6" />
              <circle cx="230" cy="145" r="18" fill="#1e3a8a" stroke="#f97316" stroke-width="2" />
              <rect x="226" y="141" width="8" height="8" fill="#f97316" rx="1" />
              <!-- Windscreen -->
              <rect x="45" y="38" width="210" height="72" fill="#bfdbfe" rx="14" opacity=".18" />
              <!-- Seats & people -->
              <!-- Driver seat -->
              <rect x="35" y="70" width="55" height="55" fill="#1e40af" rx="8" />
              <circle cx="62" cy="62" r="18" fill="#f97316" />
              <rect x="50" y="78" width="24" height="28" fill="#fbbf24" rx="4" />
              <!-- Passenger 1 -->
              <rect x="100" y="70" width="50" height="55" fill="#1d4ed8" rx="8" />
              <circle cx="125" cy="62" r="18" fill="#fb923c" />
              <rect x="113" y="78" width="24" height="28" fill="#fed7aa" rx="4" />
              <!-- Passenger 2 -->
              <rect x="160" y="70" width="50" height="55" fill="#1e40af" rx="8" />
              <circle cx="185" cy="62" r="18" fill="#fbbf24" />
              <rect x="173" y="78" width="24" height="28" fill="#f97316" rx="4" />
              <!-- Passenger 3 -->
              <rect x="220" y="70" width="50" height="55" fill="#1d4ed8" rx="8" />
              <circle cx="245" cy="62" r="18" fill="#fde68a" />
              <rect x="233" y="78" width="24" height="28" fill="#fbbf24" rx="4" />
              <!-- Smiles -->
              <path d="M54 67 Q62 72 70 67" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" />
              <path d="M117 67 Q125 72 133 67" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" />
              <path d="M177 67 Q185 72 193 67" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" />
              <path d="M237 67 Q245 72 253 67" fill="none" stroke="#1e3a8a" stroke-width="2" stroke-linecap="round" />
              <!-- CARPOOL brand on dashboard -->
              <text x="150" y="173" text-anchor="middle" font-size="9" fill="#f97316" font-family="Oswald,sans-serif" font-weight="700" letter-spacing="2">CARPOOL AO</text>
            </svg>
            <div class="img-label" data-i18n="gallery.img2">Partilha de boleia — 4 passageiros</div>
          </div>

          <!-- Card 3 — App / phone mockup -->
          <div class="img-card">
            <svg viewBox="0 0 300 220" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
              <defs>
                <linearGradient id="appBg" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="#f0f2f5" />
                  <stop offset="100%" stop-color="#dbeafe" />
                </linearGradient>
              </defs>
              <rect width="300" height="220" fill="url(#appBg)" />
              <!-- Phone frame -->
              <rect x="90" y="10" width="120" height="200" fill="#1e3a8a" rx="18" />
              <rect x="96" y="22" width="108" height="176" fill="#f0f9ff" rx="12" />
              <!-- Status bar -->
              <rect x="96" y="22" width="108" height="18" fill="#1e3a8a" rx="12" />
              <rect x="96" y="34" width="108" height="6" fill="#1e3a8a" />
              <!-- App header -->
              <rect x="96" y="40" width="108" height="30" fill="#1e3a8a" />
              <text x="150" y="60" text-anchor="middle" font-size="10" fill="#fff" font-family="Oswald,sans-serif" font-weight="700" letter-spacing="1">CARPOOL AO</text>
              <!-- Map area -->
              <rect x="100" y="72" width="100" height="68" fill="#dbeafe" rx="6" />
              <!-- Map roads -->
              <line x1="100" y1="106" x2="200" y2="106" stroke="#93c5fd" stroke-width="3" />
              <line x1="150" y1="72" x2="150" y2="140" stroke="#93c5fd" stroke-width="3" />
              <line x1="100" y1="90" x2="130" y2="90" stroke="#bfdbfe" stroke-width="2" />
              <line x1="170" y1="120" x2="200" y2="120" stroke="#bfdbfe" stroke-width="2" />
              <!-- Map pins -->
              <circle cx="125" cy="95" r="7" fill="#f97316" />
              <circle cx="125" cy="95" r="4" fill="#fff" />
              <circle cx="175" cy="115" r="7" fill="#1e3a8a" />
              <circle cx="175" cy="115" r="4" fill="#fff" />
              <!-- Route line -->
              <path d="M125 95 Q155 80 175 115" fill="none" stroke="#f97316" stroke-width="2.5" stroke-dasharray="4,3" />
              <!-- Car icon on route -->
              <rect x="148" y="80" width="14" height="8" fill="#1e3a8a" rx="2" />
              <rect x="150" y="77" width="10" height="5" fill="#2563eb" rx="1" />
              <circle cx="151" cy="88" r="2.5" fill="#111" />
              <circle cx="160" cy="88" r="2.5" fill="#111" />
              <!-- Ride cards -->
              <rect x="100" y="144" width="100" height="28" fill="#fff" rx="6" style="filter:drop-shadow(0 2px 4px rgba(0,0,0,.1))" />
              <circle cx="114" cy="158" r="8" fill="#f97316" />
              <rect x="126" y="151" width="45" height="5" fill="#1e3a8a" rx="2" />
              <rect x="126" y="160" width="30" height="4" fill="#93c5fd" rx="2" />
              <rect x="176" y="154" width="20" height="8" fill="#f97316" rx="4" />
              <text x="186" y="160" text-anchor="middle" font-size="6" fill="#fff" font-family="Oswald,sans-serif" font-weight="700">1200Kz</text>
              <!-- Bottom nav -->
              <rect x="96" y="176" width="108" height="22" fill="#fff" rx="0" />
              <rect x="96" y="190" width="108" height="8" fill="#fff" rx="12" />
              <circle cx="120" cy="185" r="5" fill="#1e3a8a" />
              <circle cx="150" cy="185" r="5" fill="#e2e8f0" />
              <circle cx="180" cy="185" r="5" fill="#e2e8f0" />
              <!-- Home indicator -->
              <rect x="135" y="194" width="30" height="3" fill="#1e3a8a" rx="2" />
            </svg>
            <div class="img-label" data-i18n="gallery.img3">App CARPOOL — Mapa de rotas</div>
          </div>

          <!-- Card 4 — Road/highway Angola -->
          <div class="img-card">
            <svg viewBox="0 0 300 180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
              <defs>
                <linearGradient id="skyRoad" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#fb923c" />
                  <stop offset="60%" stop-color="#fde68a" />
                  <stop offset="100%" stop-color="#ffedd5" />
                </linearGradient>
                <linearGradient id="grassAO" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#166534" />
                  <stop offset="100%" stop-color="#14532d" />
                </linearGradient>
              </defs>
              <rect width="300" height="180" fill="url(#skyRoad)" />
              <!-- Horizon grass -->
              <rect x="0" y="90" width="300" height="90" fill="url(#grassAO)" />
              <!-- Road -->
              <polygon points="90,90 210,90 300,180 0,180" fill="#374151" />
              <!-- Road markings perspective -->
              <line x1="150" y1="92" x2="145" y2="110" stroke="#fcd34d" stroke-width="3" opacity=".8" />
              <line x1="150" y1="116" x2="142" y2="136" stroke="#fcd34d" stroke-width="3" opacity=".7" />
              <line x1="150" y1="142" x2="138" y2="165" stroke="#fcd34d" stroke-width="3" opacity=".6" />
              <!-- Car (perspective) -->
              <g transform="translate(108,100)">
                <rect x="0" y="12" width="80" height="45" fill="#1e3a8a" rx="6" />
                <rect x="10" y="3" width="60" height="28" fill="#2563eb" rx="5" />
                <rect x="13" y="6" width="25" height="18" fill="#bfdbfe" rx="2" opacity=".8" />
                <rect x="42" y="6" width="25" height="18" fill="#bfdbfe" rx="2" opacity=".8" />
                <circle cx="14" cy="57" r="12" fill="#111827" />
                <circle cx="14" cy="57" r="7" fill="#374151" />
                <circle cx="66" cy="57" r="12" fill="#111827" />
                <circle cx="66" cy="57" r="7" fill="#374151" />
                <rect x="69" y="17" width="10" height="6" fill="#fcd34d" rx="2" />
                <!-- CARPOOL label on car -->
                <text x="40" y="40" text-anchor="middle" font-size="6" fill="#fff" font-family="Oswald,sans-serif" font-weight="700" opacity=".8">CARPOOL</text>
              </g>
              <!-- Baobab tree silhouette -->
              <g transform="translate(10,40)">
                <rect x="10" y="28" width="12" height="50" fill="#713f12" rx="3" />
                <ellipse cx="16" cy="26" rx="22" ry="16" fill="#15803d" opacity=".9" />
                <ellipse cx="6" cy="30" rx="16" ry="10" fill="#166534" opacity=".8" />
                <ellipse cx="28" cy="30" rx="14" ry="10" fill="#16a34a" opacity=".8" />
              </g>
              <!-- Sun -->
              <circle cx="260" cy="40" r="30" fill="#fbbf24" opacity=".7" />
              <circle cx="260" cy="40" r="40" fill="#fde68a" opacity=".25" />
              <!-- Birds -->
              <path d="M200 25 Q205 20 210 25" fill="none" stroke="#1e3a8a" stroke-width="1.5" />
              <path d="M218 18 Q223 13 228 18" fill="none" stroke="#1e3a8a" stroke-width="1.5" />
            </svg>
            <div class="img-label" data-i18n="gallery.img4">Estrada nacional — Viagem entre cidades</div>
          </div>

          <!-- Card 5 — Multicaixa / payment -->
          <div class="img-card">
            <svg viewBox="0 0 300 180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
              <defs>
                <linearGradient id="payBg" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="#0f172a" />
                  <stop offset="100%" stop-color="#1e3a8a" />
                </linearGradient>
              </defs>
              <rect width="300" height="180" fill="url(#payBg)" />
              <!-- Card 1 (back) -->
              <rect x="40" y="50" width="170" height="105" fill="#1e40af" rx="14" transform="rotate(-6,125,102)" />
              <!-- Card 2 (front) -->
              <rect x="55" y="45" width="185" height="110" fill="#1d4ed8" rx="14" transform="rotate(3,147,100)" />
              <!-- Chip -->
              <rect x="80" y="70" width="30" height="22" fill="#fbbf24" rx="4" />
              <line x1="86" y1="70" x2="86" y2="92" stroke="#f59e0b" stroke-width="1" />
              <line x1="92" y1="70" x2="92" y2="92" stroke="#f59e0b" stroke-width="1" />
              <line x1="98" y1="70" x2="98" y2="92" stroke="#f59e0b" stroke-width="1" />
              <line x1="80" y1="81" x2="110" y2="81" stroke="#f59e0b" stroke-width="1" />
              <!-- Contactless -->
              <path d="M118 76 Q126 81 118 86" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" />
              <path d="M122 71 Q134 81 122 91" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
              <!-- Card number dots -->
              <circle cx="80" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="88" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="96" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="104" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="116" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="124" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="132" cy="108" r="3" fill="#fff" opacity=".6" />
              <circle cx="140" cy="108" r="3" fill="#fff" opacity=".6" />
              <rect x="150" y="104" width="40" height="8" fill="#fff" rx="2" opacity=".8" />
              <!-- MULTICAIXA EXPRESS label -->
              <text x="155" y="90" font-size="8" fill="#fff" font-family="Oswald,sans-serif" font-weight="700" letter-spacing="1" opacity=".9">MULTICAIXA</text>
              <text x="155" y="101" font-size="7" fill="#f97316" font-family="Oswald,sans-serif" font-weight="600" letter-spacing="1">EXPRESS</text>
              <!-- Right side: price info -->
              <rect x="248" y="40" width="42" height="100" fill="#1e3a8a" rx="10" opacity=".5" />
              <text x="269" y="62" text-anchor="middle" font-size="7" fill="#93c5fd" font-family="Oswald,sans-serif">CUSTO</text>
              <text x="269" y="75" text-anchor="middle" font-size="11" fill="#fff" font-family="Oswald,sans-serif" font-weight="700">1200</text>
              <text x="269" y="85" text-anchor="middle" font-size="7" fill="#f97316" font-family="Oswald,sans-serif" font-weight="700">Kz</text>
              <rect x="255" y="92" width="28" height="2" fill="#3b82f6" rx="1" opacity=".5" />
              <text x="269" y="108" text-anchor="middle" font-size="7" fill="#93c5fd" font-family="Oswald,sans-serif">POR LUGAR</text>
              <!-- CARPOOL -->
              <text x="150" y="168" text-anchor="middle" font-size="9" fill="#f97316" font-family="Oswald,sans-serif" font-weight="700" letter-spacing="2">CARPOOL AO</text>
            </svg>
            <div class="img-label" data-i18n="gallery.img5">Pagamento via Multicaixa Express</div>
          </div>

        </div>
      </section>

      <!-- HOW IT WORKS -->
      <section class="timeline" id="how">
        <h2 class="section-title fade-in" data-i18n="how.title">Como funciona</h2>
        <p class="section-subtitle fade-in" data-i18n="how.subtitle">Em apenas quatro passos simples está pronto a partilhar.</p>
        <div class="timeline-steps">
          <div class="timeline-step fade-in">
            <div class="step-bubble">1</div>
            <span class="step-title" data-i18n="how.s1.title">Registe-se</span>
            <span class="step-desc" data-i18n="how.s1.desc">Crie a sua conta gratuita em menos de 2 minutos com email ou conta social.</span>
          </div>
          <div class="timeline-step fade-in" style="transition-delay:.1s">
            <div class="step-bubble">2</div>
            <span class="step-title" data-i18n="how.s2.title">Defina a Rota</span>
            <span class="step-desc" data-i18n="how.s2.desc">Indique o ponto de partida, destino e horário preferido para a sua viagem.</span>
          </div>
          <div class="timeline-step fade-in" style="transition-delay:.2s">
            <div class="step-bubble">3</div>
            <span class="step-title" data-i18n="how.s3.title">Combine</span>
            <span class="step-desc" data-i18n="how.s3.desc">O sistema encontra as melhores correspondências e envia-lhe sugestões personalizadas.</span>
          </div>
          <div class="timeline-step fade-in" style="transition-delay:.3s">
            <div class="step-bubble">4</div>
            <span class="step-title" data-i18n="how.s4.title">Viaje e Avalie</span>
            <span class="step-desc" data-i18n="how.s4.desc">Confirme a viagem, avalie o seu parceiro e contribua para uma comunidade de confiança.</span>
          </div>
        </div>
      </section>

      <!-- TESTIMONIALS -->
      <section class="testimonials" id="testimonials">
        <h2 class="section-title fade-in" data-i18n="test.title">O que dizem os nossos utilizadores</h2>
        <p class="section-subtitle fade-in" data-i18n="test.subtitle">Mais de 48.000 pessoas já confiam no CARPOOL diariamente.</p>
        <div class="testimonials-grid">
          <div class="testimonial-card fade-in">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text" data-i18n="test.t1.text">"O CARPOOL transformou completamente a minha deslocação diária para o trabalho em Luanda. Poupa-me cerca de 25.000 Kz por mês em combustível e conheci pessoas incríveis no trajeto."</p>
            <div class="testimonial-author">
              <div class="author-avatar">AF</div>
              <div>
                <div class="author-name" data-i18n="test.t1.name">Amara Fernandes</div>
                <div class="author-role" data-i18n="test.t1.role">Engenheira de Software, Luanda</div>
              </div>
            </div>
          </div>
          <div class="testimonial-card fade-in" style="transition-delay:.1s">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text" data-i18n="test.t2.text">"Como condutor, rentabilizo as minhas viagens entre o Talatona e o Kilamba. A plataforma é extremamente intuitiva e o pagamento via Multicaixa Express é impecável."</p>
            <div class="testimonial-author">
              <div class="author-avatar">DC</div>
              <div>
                <div class="author-name" data-i18n="test.t2.name">Domingos Carvalho</div>
                <div class="author-role" data-i18n="test.t2.role">Gestor de Projetos, Luanda</div>
              </div>
            </div>
          </div>
          <div class="testimonial-card fade-in" style="transition-delay:.05s">
            <div class="stars">★★★★☆</div>
            <p class="testimonial-text" data-i18n="test.t3.text">"Uso o CARPOOL há 6 meses em Huambo e a fiabilidade é impressionante. Os perfis verificados dão-me confiança total, especialmente como mulher a viajar sozinha."</p>
            <div class="testimonial-author">
              <div class="author-avatar">ML</div>
              <div>
                <div class="author-name" data-i18n="test.t3.name">Maria Lopes</div>
                <div class="author-role" data-i18n="test.t3.role">Médica, Huambo</div>
              </div>
            </div>
          </div>
          <div class="testimonial-card fade-in" style="transition-delay:.15s">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text" data-i18n="test.t4.text">"A funcionalidade de rastreio em tempo real é o que me vendeu. A minha família pode sempre saber onde estou nas viagens entre Benguela e Lobito. Segurança total."</p>
            <div class="testimonial-author">
              <div class="author-avatar">JN</div>
              <div>
                <div class="author-name" data-i18n="test.t4.name">João Nguyen</div>
                <div class="author-role" data-i18n="test.t4.role">Estudante Universitário, Benguela</div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <!-- ════ SIDEBAR COL ══════════════════════════════════════════ -->
    <aside class="sidebar-col" id="sidebar-top">

      <!-- SEARCH WIDGET -->
      <div class="sidebar-widget" id="sidebar-search">
        <div class="widget-title">
          <i class="fa-solid fa-magnifying-glass"></i>
          <span data-i18n="sb.search.title">Pesquisar Boleia</span>
        </div>
        <form action="<?= url("/pesquisar-viagens") ?>" method="post">
          <label class="form-label"   data-i18n="sb.search.origin">Origem</label>
          <input type="text" name="origin"  class="neu-input" data-i18n-placeholder="sb.search.origin_ph" placeholder="De onde parte?"  required/>
          <label class="form-label" data-i18n="sb.search.dest">Destino</label>
          <input type="text" name="destination" class="neu-input" data-i18n-placeholder="sb.search.dest_ph" placeholder="Para onde vai?"  required  />
          <label class="form-label" data-i18n="sb.search.date">Data</label>
          <input type="date" name="date"  class="neu-input"  required />
          <label class="form-label" data-i18n="sb.search.seats">Lugares</label>
          <select class="neu-input" name="seats"  required>
            <option value="">Selecione...</option>
            <?php
            $lugares = getOpcoesLugaresCarona(6); // ou 8, 10, etc
            foreach ($lugares as $lugar):
            ?>
              <option value="<?= $lugar['value'] ?>"><?= $lugar['label'] ?></option>
            <?php endforeach; ?>
          </select>
          <button class="btn-full" id="btn-search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span data-i18n="sb.search.btn">Pesquisar</span>
          </button>
        </form>

      </div>
    </aside>
    <!-- ════ END SIDEBAR ══════════════════════════════════════════ -->

  </div>
  <!-- ─── END PAGE GRID ──────────────────────────────────────────── -->

  <!-- ─── FOOTER ────────────────────────────────────────────────── -->
  <footer>
    <div class="footer-grid">
      <div>
        <div class="footer-brand">CAR<span>POOL</span></div>
        <p class="footer-desc" data-i18n="footer.desc">A plataforma de mobilidade partilhada que liga pessoas, poupa dinheiro e protege o planeta. Junte-se a mais de 48.000 utilizadores ativos.</p>
      </div>
      <div>
        <div class="footer-col-title" data-i18n="footer.col1">Plataforma</div>
        <ul class="footer-links">
          <li><a href="#" data-i18n="footer.f1">Como Funciona</a></li>
          <li><a href="#" data-i18n="footer.f2">Preços</a></li>
          <li><a href="#" data-i18n="footer.f3">Segurança</a></li>
          <li><a href="#" data-i18n="footer.f4">App Móvel</a></li>
        </ul>
      </div>
      <div>
        <div class="footer-col-title" data-i18n="footer.col2">Empresa</div>
        <ul class="footer-links">
          <li><a href="#" data-i18n="footer.c1">Sobre Nós</a></li>
          <li><a href="#" data-i18n="footer.c2">Blog</a></li>
          <li><a href="#" data-i18n="footer.c3">Imprensa</a></li>
          <li><a href="#" data-i18n="footer.c4">Carreiras</a></li>
        </ul>
      </div>
      <div>
        <div class="footer-col-title" data-i18n="footer.col3">Suporte</div>
        <ul class="footer-links">
          <li><a href="#" data-i18n="footer.s1">Centro de Ajuda</a></li>
          <li><a href="#" data-i18n="footer.s2">Contacto</a></li>
          <li><a href="#" data-i18n="footer.s3">Privacidade</a></li>
          <li><a href="#" data-i18n="footer.s4">Termos</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span class="footer-copy" data-i18n="footer.copy">© 2025 CARPOOL Angola Lda. Todos os direitos reservados.</span>
      <div class="footer-socials">
        <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
        <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
      </div>
    </div>
  </footer>

  <!-- ─── JAVASCRIPT ─────────────────────────────────────────────── -->
  <script src="<?= url_asset("js/home.js") ?>">
  </script>

</body>

</html>
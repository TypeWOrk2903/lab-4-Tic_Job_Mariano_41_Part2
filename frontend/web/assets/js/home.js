  $(function () {

    /* ── i18n DICTIONARY ─────────────────────────────────────── */
    const i18n = {
      pt: {
        'nav.features':           'Funcionalidades',
        'nav.how':                'Como Funciona',
        'nav.testimonials':       'Testemunhos',
        'hero.badge':             'Plataforma de Mobilidade #1 em Angola',
        'hero.title_html':        'Partilhe a viagem.<br><em>Partilhe o futuro.</em>',
        'hero.subtitle':          'Conecte-se com colegas em Luanda, Huambo ou Benguela, poupe combustível e reduza emissões de CO₂ com a plataforma de carpooling mais inteligente de Angola.',
        'hero.cta1':              'Encontrar Boleia',
        'hero.cta2':              'Oferecer Boleia',
        'stats.users':            'Utilizadores Ativos',
        'stats.rides':            'Viagens Realizadas',
        'stats.co2':              'CO₂ Poupado',
        'stats.saved':            'Poupanças Totais',
        'feat.title':             'Tudo o que precisa numa só plataforma',
        'feat.subtitle':          'Desenhado para tornar a mobilidade urbana angolana mais simples, segura e sustentável.',
        'feat.f1.title':          'Correspondência Inteligente',
        'feat.f1.desc':           'O nosso algoritmo encontra as melhores boleias com base na sua rota em Luanda, horário e preferências pessoais.',
        'feat.f2.title':          'Perfis Verificados',
        'feat.f2.desc':           'Todos os condutores são verificados com BI angolano, carta de condução válida e avaliações da comunidade.',
        'feat.f3.title':          'Pagamento Fácil',
        'feat.f3.desc':           'Divida os custos automaticamente via Multicaixa Express, Unitel Money ou saldo CARPOOL. Sem dinheiro vivo, sem complicações.',
        'feat.f4.title':          'Rastreio em Tempo Real',
        'feat.f4.desc':           'Acompanhe a viagem ao vivo e partilhe a sua localização com amigos ou familiares para maior segurança em Luanda.',
        'feat.f5.title':          'Pegada de Carbono',
        'feat.f5.desc':           'Veja o impacto ambiental positivo de cada viagem partilhada com métricas de CO₂ personalizadas.',
        'feat.f6.title':          'Alertas Inteligentes',
        'feat.f6.desc':           'Receba notificações quando uma boleia compatível com o seu trajeto habitual em Angola ficar disponível.',
        'gallery.title':          'Caronas em Angola',
        'gallery.subtitle':       'Veja como o CARPOOL transforma a mobilidade urbana nas cidades angolanas.',
        'gallery.img1':           'Avenida de Luanda — Boleias diárias',
        'gallery.img2':           'Partilha de boleia — 4 passageiros',
        'gallery.img3':           'App CARPOOL — Mapa de rotas',
        'gallery.img4':           'Estrada nacional — Viagem entre cidades',
        'gallery.img5':           'Pagamento via Multicaixa Express',
        'how.title':              'Como funciona',
        'how.subtitle':           'Em apenas quatro passos simples está pronto a partilhar em Angola.',
        'how.s1.title':           'Registe-se',
        'how.s1.desc':            'Crie a sua conta gratuita em menos de 2 minutos com email ou número de telemóvel angolano.',
        'how.s2.title':           'Defina a Rota',
        'how.s2.desc':            'Indique o ponto de partida (ex.: Talatona), destino (ex.: Maianga) e horário preferido.',
        'how.s3.title':           'Combine',
        'how.s3.desc':            'O sistema encontra as melhores correspondências e envia-lhe sugestões personalizadas.',
        'how.s4.title':           'Viaje e Avalie',
        'how.s4.desc':            'Confirme a viagem, pague via Multicaixa e avalie o seu parceiro de boleia.',
        'test.title':             'O que dizem os nossos utilizadores',
        'test.subtitle':          'Mais de 32.000 angolanos já confiam no CARPOOL diariamente.',
        'test.t1.text':           '"O CARPOOL transformou completamente a minha deslocação diária para o trabalho em Luanda. Poupa-me cerca de 25.000 Kz por mês em combustível e conheci pessoas incríveis no trajeto."',
        'test.t1.name':           'Amara Fernandes',
        'test.t1.role':           'Engenheira de Software, Luanda',
        'test.t2.text':           '"Como condutor, rentabilizo as minhas viagens entre o Talatona e o Kilamba. A plataforma é extremamente intuitiva e o pagamento via Multicaixa Express é impecável."',
        'test.t2.name':           'Domingos Carvalho',
        'test.t2.role':           'Gestor de Projetos, Luanda',
        'test.t3.text':           '"Uso o CARPOOL há 6 meses em Huambo e a fiabilidade é impressionante. Os perfis verificados dão-me confiança total, especialmente como mulher a viajar sozinha."',
        'test.t3.name':           'Maria Lopes',
        'test.t3.role':           'Médica, Huambo',
        'test.t4.text':           '"A funcionalidade de rastreio em tempo real é o que me vendeu. A minha família pode sempre saber onde estou nas viagens entre Benguela e Lobito. Segurança total."',
        'test.t4.name':           'João Nguyen',
        'test.t4.role':           'Estudante Universitário, Benguela',
        'sb.search.title':        'Pesquisar Boleia',
        'sb.search.origin':       'Origem',
        'sb.search.origin_ph':    'Ex.: Talatona, Viana…',
        'sb.search.dest':         'Destino',
        'sb.search.dest_ph':      'Ex.: Maianga, Kilamba…',
        'sb.search.date':         'Data',
        'sb.search.seats':        'Lugares',
        'sb.search.btn':          'Pesquisar',
        'sb.search.success':      '✓ A pesquisar boleias disponíveis em Angola…',
        'sb.login.title':         'Entrar na Conta',
        'sb.login.email':         'Email',
        'sb.login.email_ph':      'o.seu@email.com',
        'sb.login.pass':          'Password',
        'sb.login.pass_ph':       '••••••••',
        'sb.login.btn':           'Entrar',
        'sb.login.forgot':        'Esqueceu a password?',
        'sb.login.google':        'Entrar com Google',
        'sb.login.fb':            'Entrar com Facebook',
        'sb.login.success':       '✓ Credenciais validadas. Redirecionando…',
        'sb.login.error':         '✗ Preencha email e password.',
        'sb.reg.title':           'Criar Conta Gratuita',
        'sb.reg.fname':           'Nome',
        'sb.reg.fname_ph':        'Ex.: Domingos',
        'sb.reg.lname':           'Apelido',
        'sb.reg.lname_ph':        'Ex.: Carvalho',
        'sb.reg.email':           'Email',
        'sb.reg.email_ph':        'o.seu@email.com',
        'sb.reg.phone':           'Telemóvel',
        'sb.reg.phone_ph':        '+244 9xx xxx xxx',
        'sb.reg.pass':            'Password',
        'sb.reg.pass_ph':         'Mín. 8 caracteres',
        'sb.reg.role':            'Perfil',
        'sb.reg.role_driver':     'Condutor',
        'sb.reg.role_passenger':  'Passageiro',
        'sb.reg.role_both':       'Ambos',
        'sb.reg.btn':             'Registar Gratuitamente',
        'sb.reg.success':         '✓ Conta criada! Verifique o seu email.',
        'sb.reg.error':           '✗ Preencha todos os campos obrigatórios.',
        'sb.reg.terms1':          'Ao registar aceita os nossos ',
        'sb.reg.terms2':          'Termos',
        'sb.reg.terms3':          'e ',
        'sb.reg.terms4':          'Política de Privacidade',
        'footer.desc':            'A plataforma de mobilidade partilhada que liga angolanos, poupa kwanzas e protege o ambiente. Junte-se a mais de 32.000 utilizadores ativos em Angola.',
        'footer.col1':            'Plataforma',
        'footer.f1':              'Como Funciona',
        'footer.f2':              'Preços em Kz',
        'footer.f3':              'Segurança',
        'footer.f4':              'App Móvel',
        'footer.col2':            'Empresa',
        'footer.c1':              'Sobre Nós',
        'footer.c2':              'Blog',
        'footer.c3':              'Imprensa',
        'footer.c4':              'Carreiras',
        'footer.col3':            'Suporte',
        'footer.s1':              'Centro de Ajuda',
        'footer.s2':              'Contacto',
        'footer.s3':              'Privacidade',
        'footer.s4':              'Termos',
        'footer.copy':            '© 2025 CARPOOL Angola Lda. Todos os direitos reservados.',
      },
      en: {
        'nav.features':           'Features',
        'nav.how':                'How It Works',
        'nav.testimonials':       'Testimonials',
        'hero.badge':             'Portugal\'s #1 Mobility Platform',
        'hero.title_html':        'Share the ride.<br><em>Share the future.</em>',
        'hero.subtitle':          'Connect with colleagues, save on fuel and reduce CO₂ emissions with the country\'s smartest carpooling platform.',
        'hero.cta1':              'Find a Ride',
        'hero.cta2':              'Offer a Ride',
        'stats.users':            'Active Users',
        'stats.rides':            'Completed Rides',
        'stats.co2':              'CO₂ Saved',
        'stats.saved':            'Total Savings',
        'feat.title':             'Everything you need in one platform',
        'feat.subtitle':          'Designed to make urban mobility simpler, safer and more sustainable.',
        'feat.f1.title':          'Smart Matching',
        'feat.f1.desc':           'Our algorithm finds the best rides based on your route, schedule and personal preferences.',
        'feat.f2.title':          'Verified Profiles',
        'feat.f2.desc':           'All drivers are verified with valid documentation, driving licence and community ratings.',
        'feat.f3.title':          'Easy Payment',
        'feat.f3.desc':           'Automatically split costs via MB Way, card or CARPOOL balance. No cash, no hassle.',
        'feat.f4.title':          'Real-Time Tracking',
        'feat.f4.desc':           'Follow the journey live and share your location with friends or family for added safety.',
        'feat.f5.title':          'Carbon Footprint',
        'feat.f5.desc':           'See the positive environmental impact of each shared trip with personalised CO₂ metrics.',
        'feat.f6.title':          'Smart Alerts',
        'feat.f6.desc':           'Receive notifications when a ride matching your regular route becomes available.',
        'how.title':              'How it works',
        'how.subtitle':           'In just four simple steps you are ready to share.',
        'how.s1.title':           'Sign Up',
        'how.s1.desc':            'Create your free account in under 2 minutes with email or a social account.',
        'how.s2.title':           'Set Your Route',
        'how.s2.desc':            'Enter your departure point, destination and preferred schedule for your journey.',
        'how.s3.title':           'Match',
        'how.s3.desc':            'The system finds the best matches and sends you personalised suggestions.',
        'how.s4.title':           'Ride & Rate',
        'how.s4.desc':            'Confirm the trip, rate your partner and contribute to a trustworthy community.',
        'test.title':             'What our users say',
        'test.subtitle':          'Over 48,000 people already trust CARPOOL every day.',
        'test.t1.text':           '"CARPOOL completely transformed my daily commute to work. It saves me around €80 per month on fuel and I\'ve met incredible people along the way."',
        'test.t1.name':           'Mariana Fonseca',
        'test.t1.role':           'Software Engineer, Lisbon',
        'test.t2.text':           '"As a driver, I make my daily trips profitable and still help the environment. The platform is extremely intuitive and the payment process is impeccable."',
        'test.t2.name':           'Rui Carvalho',
        'test.t2.role':           'Project Manager, Porto',
        'test.t3.text':           '"I\'ve been using CARPOOL for 8 months and the reliability is impressive. Verified profiles give me complete confidence, especially as a woman travelling alone."',
        'test.t3.name':           'Ana Sofia',
        'test.t3.role':           'Doctor, Coimbra',
        'test.t4.text':           '"The real-time tracking feature is what sold me. My family can always know where I am during long journeys. Total sense of security."',
        'test.t4.name':           'João Pinto',
        'test.t4.role':           'University Student, Braga',
        'sb.search.title':        'Search for a Ride',
        'sb.search.origin':       'Origin',
        'sb.search.origin_ph':    'Where are you departing from?',
        'sb.search.dest':         'Destination',
        'sb.search.dest_ph':      'Where are you going?',
        'sb.search.date':         'Date',
        'sb.search.seats':        'Seats',
        'sb.search.btn':          'Search',
        'sb.search.success':      '✓ Searching available rides…',
        'sb.login.title':         'Sign In',
        'sb.login.email':         'Email',
        'sb.login.email_ph':      'your@email.com',
        'sb.login.pass':          'Password',
        'sb.login.pass_ph':       '••••••••',
        'sb.login.btn':           'Sign In',
        'sb.login.forgot':        'Forgot your password?',
        'sb.login.google':        'Sign in with Google',
        'sb.login.fb':            'Sign in with Facebook',
        'sb.login.success':       '✓ Credentials validated. Redirecting…',
        'sb.login.error':         '✗ Please fill in email and password.',
        'sb.reg.title':           'Create Free Account',
        'sb.reg.fname':           'First Name',
        'sb.reg.fname_ph':        'John',
        'sb.reg.lname':           'Last Name',
        'sb.reg.lname_ph':        'Smith',
        'sb.reg.email':           'Email',
        'sb.reg.email_ph':        'your@email.com',
        'sb.reg.phone':           'Phone',
        'sb.reg.phone_ph':        '+351 9xx xxx xxx',
        'sb.reg.pass':            'Password',
        'sb.reg.pass_ph':         'Min. 8 characters',
        'sb.reg.role':            'Role',
        'sb.reg.role_driver':     'Driver',
        'sb.reg.role_passenger':  'Passenger',
        'sb.reg.role_both':       'Both',
        'sb.reg.btn':             'Register for Free',
        'sb.reg.success':         '✓ Account created! Check your email.',
        'sb.reg.error':           '✗ Please fill in all required fields.',
        'sb.reg.terms1':          'By registering you agree to our ',
        'sb.reg.terms2':          'Terms',
        'sb.reg.terms3':          'and ',
        'sb.reg.terms4':          'Privacy Policy',
        'footer.desc':            'The shared mobility platform that connects people, saves money and protects the planet. Join over 48,000 active users.',
        'footer.col1':            'Platform',
        'footer.f1':              'How It Works',
        'footer.f2':              'Pricing',
        'footer.f3':              'Safety',
        'footer.f4':              'Mobile App',
        'footer.col2':            'Company',
        'footer.c1':              'About Us',
        'footer.c2':              'Blog',
        'footer.c3':              'Press',
        'footer.c4':              'Careers',
        'footer.col3':            'Support',
        'footer.s1':              'Help Centre',
        'footer.s2':              'Contact',
        'footer.s3':              'Privacy',
        'footer.s4':              'Terms',
        'footer.copy':            '© 2025 CARPOOL Ltd. All rights reserved.',
      }
    };

    let currentLang = localStorage.getItem('carpool_lang') || 'pt';

    /* ── APPLY TRANSLATIONS ──────────────────────────────────── */
    function applyLang (lang) {
      const dict = i18n[lang];
      $('[data-i18n]').each(function () {
        const key = $(this).data('i18n');
        if (dict[key] !== undefined) {
          $(this).html(dict[key]);
        }
      });
      $('[data-i18n-placeholder]').each(function () {
        const key = $(this).data('i18n-placeholder');
        if (dict[key] !== undefined) {
          $(this).attr('placeholder', dict[key]);
        }
      });
      $('html').attr('lang', lang);
      $('#lang-label').text(lang === 'pt' ? 'EN' : 'PT');
      currentLang = lang;
      localStorage.setItem('carpool_lang', lang);
    }

    applyLang(currentLang);

    /* ── LANGUAGE TOGGLE ─────────────────────────────────────── */
    $('#lang-toggle').on('click', function () {
      applyLang(currentLang === 'pt' ? 'en' : 'pt');
    });

    /* ── THEME TOGGLE ────────────────────────────────────────── */
    const savedTheme = localStorage.getItem('carpool_theme') || 'light';
    function setTheme (theme) {
      if (theme === 'dark') {
        $('body').addClass('dark');
        $('#theme-icon').removeClass('fa-moon').addClass('fa-sun');
      } else {
        $('body').removeClass('dark');
        $('#theme-icon').removeClass('fa-sun').addClass('fa-moon');
      }
      localStorage.setItem('carpool_theme', theme);
    }
    setTheme(savedTheme);
    $('#theme-toggle').on('click', function () {
      const next = $('body').hasClass('dark') ? 'light' : 'dark';
      setTheme(next);
    });

    /* ── PRELOADER ───────────────────────────────────────────── */
    $(window).on('load', function () {
      setTimeout(function () {
        $('#preloader').fadeOut(500);
      }, 800);
    });

    /* ── SCROLL FADE-IN ──────────────────────────────────────── */
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          $(e.target).addClass('visible');
        }
      });
    }, { threshold: 0.12 });

    $('.fade-in').each(function () {
      observer.observe(this);
    });

    /* ── SEARCH FORM ─────────────────────────────────────────── */
    $('#btn-search').on('click', function () {
      const dict = i18n[currentLang];
      $('#search-result').css('color', 'var(--blue)').text(dict['sb.search.success']);
      setTimeout(function () { $('#search-result').text(''); }, 3000);
    });

    /* ── LOGIN FORM ──────────────────────────────────────────── */
    $('#btn-login').on('click', function () {
      const dict = i18n[currentLang];
      const $widget = $('#sidebar-login');
      const email = $widget.find('input[type="email"]').val().trim();
      const pass  = $widget.find('input[type="password"]').val().trim();
      if (!email || !pass) {
        $('#login-result').css('color', 'var(--accent)').text(dict['sb.login.error']);
      } else {
        $('#login-result').css('color', 'var(--blue)').text(dict['sb.login.success']);
      }
      setTimeout(function () { $('#login-result').text(''); }, 3000);
    });

    /* ── REGISTER FORM ───────────────────────────────────────── */
    $('#btn-register').on('click', function () {
      const dict = i18n[currentLang];
      const $widget = $('#sidebar-register');
      const allFilled = $widget.find('input').toArray().every(function (el) {
        return $(el).val().trim() !== '';
      });
      if (!allFilled) {
        $('#register-result').css('color', 'var(--accent)').text(dict['sb.reg.error']);
      } else {
        $('#register-result').css('color', 'var(--blue)').text(dict['sb.reg.success']);
      }
      setTimeout(function () { $('#register-result').text(''); }, 3500);
    });

    /* ── PARALLAX on HERO BG ─────────────────────────────────── */
    $(window).on('scroll', function () {
      const scrolled = $(this).scrollTop();
      const rate     = scrolled * 0.35;
      $('.hero-bg').css('transform', 'translateY(' + rate + 'px)');
    });

  }); /* END $(function) */
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>CARPOOL Angola — Painel Administrativo</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<script>tailwind.config={darkMode:'class',theme:{extend:{fontFamily:{display:['"Oswald"','sans-serif'],sans:['"Outfit"','sans-serif']}}}}</script>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sb-brand">
    <div class="sb-logo">ADM</div>
    <div>
      <div class="sb-name">CAR<span>POOL</span></div>
      <div class="sb-admin-tag">Painel Administrativo</div>
    </div>
  </div>

  <nav class="sb-nav">
    <div class="sb-section">Gestão</div>
    <a href="#" class="sb-item active">
      <i class="fa-solid fa-chart-line"></i><span>Dashboard</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-users"></i><span>Utilizadores</span>
      <span class="sb-badge">2.1k</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-car-side"></i><span>Motoristas</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-route"></i><span>Viagens ao Vivo</span>
      <span class="sb-badge">47</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-map-location-dot"></i><span>Mapa Global</span>
    </a>

    <div class="sb-section" style="margin-top:.75rem">Financeiro</div>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-chart-pie"></i><span>Receitas</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-money-bill-transfer"></i><span>Pagamentos</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-file-invoice"></i><span>Relatórios</span>
    </a>

    <div class="sb-section" style="margin-top:.75rem">Operações</div>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-triangle-exclamation"></i><span>Incidentes</span>
      <span class="sb-badge">5</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-shield-halved"></i><span>Verificações</span>
      <span class="sb-badge">12</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-star"></i><span>Avaliações</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-gear"></i><span>Sistema</span>
    </a>
  </nav>

  <div class="sb-footer">
    <div class="admin-card">
      <div class="admin-avatar">AS</div>
      <div>
        <div class="admin-name">Admin Sistema</div>
        <div class="admin-tag">Super-administrador</div>
      </div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="main">

  <!-- TOPBAR -->
  <header class="topbar">
    <div class="topbar-left">
      <button class="neu-btn" id="sidebar-toggle" title="Menu">
        <i class="fa-solid fa-bars"></i>
      </button>
      <span class="page-title">Painel Administrativo</span>
    </div>
    <div class="topbar-right">
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Pesquisar utilizadores…">
      </div>
      <button class="neu-btn notif-dot" title="Alertas">
        <i class="fa-solid fa-bell"></i>
      </button>
      <button class="neu-btn" id="theme-toggle" title="Tema">
        <i class="fa-solid fa-moon" id="theme-icon"></i>
      </button>
      <button class="neu-btn" style="background:var(--danger);color:#fff;box-shadow:none">
        <i class="fa-solid fa-shield-halved"></i>
        <span>Admin</span>
      </button>
    </div>
  </header>

  <!-- CONTENT -->
  <div class="content">

    <!-- ALERT -->
    <div class="alert-strip" id="alert-strip">
      <i class="fa-solid fa-circle-exclamation"></i>
      <div>
        <strong>Atenção:</strong> 5 motoristas aguardam verificação de documentos &nbsp;•&nbsp;
        2 incidentes críticos por resolver.
      </div>
      <span class="alert-dismiss" onclick="$('#alert-strip').slideUp()">
        <i class="fa-solid fa-xmark"></i>
      </span>
    </div>

    <!-- LIVE STRIP -->
    <div class="live-strip">
      <div class="live-dot"></div>
      <div>
        <div class="live-num">47</div>
        <div class="live-label">Viagens em curso agora</div>
      </div>
      <div class="live-divider"></div>
      <div>
        <div class="live-num">312</div>
        <div class="live-label">Motoristas online</div>
      </div>
      <div class="live-divider"></div>
      <div>
        <div class="live-num">1.847</div>
        <div class="live-label">Utilizadores activos hoje</div>
      </div>
      <div class="live-divider"></div>
      <div>
        <div class="live-num">4.2M Kz</div>
        <div class="live-label">Volume transaccionado hoje</div>
      </div>
    </div>

    <!-- KPI STATS -->
    <div class="stats-row">
      <div class="stat-card accent">
        <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        <div class="stat-val">32.410</div>
        <div class="stat-label">Utilizadores registados</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-arrow-trend-up"></i> +340 este mês</div>
      </div>
      <div class="stat-card green">
        <div class="stat-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
        <div class="stat-val">128M Kz</div>
        <div class="stat-label">Receita total 2025</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-arrow-trend-up"></i> +22% vs 2024</div>
      </div>
      <div class="stat-card info">
        <div class="stat-icon"><i class="fa-solid fa-route"></i></div>
        <div class="stat-val">89.204</div>
        <div class="stat-label">Viagens realizadas</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-arrow-trend-up"></i> +1.2K esta semana</div>
      </div>
      <div class="stat-card red">
        <div class="stat-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
        <div class="stat-val">5</div>
        <div class="stat-label">Incidentes pendentes</div>
        <div class="stat-delta delta-down"><i class="fa-solid fa-circle-exclamation"></i> 2 críticos</div>
      </div>
    </div>

    <!-- PLATFORM METRICS -->
    <div class="card" style="margin-bottom:1.25rem">
      <div class="card-header">
        <span class="card-title">Métricas da Plataforma — Julho 2025</span>
        <div style="display:flex;gap:.5rem">
          <button class="btn-sm btn-blue">Exportar PDF</button>
          <button class="btn-sm btn-orange">Ver Relatório</button>
        </div>
      </div>
      <div class="metric-row">
        <div class="metric-card">
          <div class="metric-val">4.72 <span style="font-size:.9rem;color:var(--accent)">★</span></div>
          <div class="metric-label">Avaliação média da plataforma</div>
          <div class="metric-bar-wrap"><div class="metric-bar accent" style="width:94%"></div></div>
        </div>
        <div class="metric-card">
          <div class="metric-val">91.3%</div>
          <div class="metric-label">Taxa de viagens concluídas</div>
          <div class="metric-bar-wrap"><div class="metric-bar success" style="width:91%"></div></div>
        </div>
        <div class="metric-card">
          <div class="metric-val">3.8 min</div>
          <div class="metric-label">Tempo médio de espera</div>
          <div class="metric-bar-wrap"><div class="metric-bar" style="width:38%"></div></div>
        </div>
        <div class="metric-card">
          <div class="metric-val">98.1%</div>
          <div class="metric-label">Uptime da plataforma</div>
          <div class="metric-bar-wrap"><div class="metric-bar success" style="width:98%"></div></div>
        </div>
        <div class="metric-card">
          <div class="metric-val">78%</div>
          <div class="metric-label">Taxa de retenção (mensal)</div>
          <div class="metric-bar-wrap"><div class="metric-bar accent" style="width:78%"></div></div>
        </div>
        <div class="metric-card">
          <div class="metric-val">3.2%</div>
          <div class="metric-label">Taxa de cancelamentos</div>
          <div class="metric-bar-wrap"><div class="metric-bar danger" style="width:32%"></div></div>
        </div>
      </div>
    </div>

    <!-- RECEITA CHART + CIDADES -->
    <div class="grid-3">
      <div class="card">
        <div class="card-header">
          <span class="card-title">Receita Mensal 2025 (Milhões Kz)</span>
          <span class="card-action">Ver detalhe →</span>
        </div>
        <div class="rev-chart" id="rev-chart"></div>
        <div style="display:flex;justify-content:space-between;margin-top:.5rem">
          <span style="font-size:.6rem;color:var(--muted)">Jan</span>
          <span style="font-size:.6rem;color:var(--muted)">Fev</span>
          <span style="font-size:.6rem;color:var(--muted)">Mar</span>
          <span style="font-size:.6rem;color:var(--muted)">Abr</span>
          <span style="font-size:.6rem;color:var(--muted)">Mai</span>
          <span style="font-size:.6rem;color:var(--muted)">Jun</span>
          <span style="font-size:.6rem;color:var(--accent);font-weight:700">Jul</span>
          <span style="font-size:.6rem;color:var(--muted)">Ago</span>
          <span style="font-size:.6rem;color:var(--muted)">Set</span>
          <span style="font-size:.6rem;color:var(--muted)">Out</span>
          <span style="font-size:.6rem;color:var(--muted)">Nov</span>
          <span style="font-size:.6rem;color:var(--muted)">Dez</span>
        </div>
        <div style="display:flex;gap:1rem;margin-top:1rem;font-size:.75rem">
          <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:var(--blue);margin-right:.35rem;vertical-align:middle"></span>Realizado</span>
          <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:var(--accent);margin-right:.35rem;vertical-align:middle"></span>Mês actual</span>
          <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:var(--border);margin-right:.35rem;vertical-align:middle"></span>Projecção</span>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <span class="card-title">Cidades Activas</span>
          <span class="card-action">Gerir →</span>
        </div>
        <div class="city-map">
          <div class="city-item">
            <div class="city-name">🏙 Luanda</div>
            <div class="city-rides">64.200 viagens</div>
            <div class="city-bar-wrap"><div class="city-bar" style="width:100%;background:linear-gradient(90deg,var(--blue),var(--blue-light))"></div></div>
          </div>
          <div class="city-item">
            <div class="city-name">🏘 Huambo</div>
            <div class="city-rides">12.400 viagens</div>
            <div class="city-bar-wrap"><div class="city-bar" style="width:55%;background:linear-gradient(90deg,var(--accent),#ffcc66)"></div></div>
          </div>
          <div class="city-item">
            <div class="city-name">⛵ Benguela</div>
            <div class="city-rides">8.900 viagens</div>
            <div class="city-bar-wrap"><div class="city-bar" style="width:40%;background:linear-gradient(90deg,var(--success),#4ade80)"></div></div>
          </div>
          <div class="city-item">
            <div class="city-name">🌴 Lubango</div>
            <div class="city-rides">3.700 viagens</div>
            <div class="city-bar-wrap"><div class="city-bar" style="width:22%;background:linear-gradient(90deg,var(--info),#67e8f9)"></div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- MOTORISTAS + INCIDENTES -->
    <div class="grid-2">

      <!-- TOP MOTORISTAS -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Top Motoristas — Julho</span>
          <span class="card-action">Ver todos →</span>
        </div>
        <div class="driver-list">
          <div class="driver-row">
            <div style="font-family:var(--font-head);font-size:.9rem;font-weight:700;color:var(--accent);width:18px;flex-shrink:0">#1</div>
            <div class="drv-avatar">DC</div>
            <div>
              <div class="drv-name">Domingos Carvalho</div>
              <div class="drv-sub">Luanda &nbsp;•&nbsp; <span class="stars">★</span> 4.92 &nbsp;•&nbsp; <span class="badge badge-green" style="padding:.1rem .45rem">Verificado</span></div>
            </div>
            <div class="drv-stat">
              <div class="drv-earn">48.200 Kz</div>
              <div class="drv-trips">127 viagens</div>
            </div>
          </div>
          <div class="driver-row">
            <div style="font-family:var(--font-head);font-size:.9rem;font-weight:700;color:var(--muted);width:18px;flex-shrink:0">#2</div>
            <div class="drv-avatar">MA</div>
            <div>
              <div class="drv-name">Manuel António</div>
              <div class="drv-sub">Luanda &nbsp;•&nbsp; <span class="stars">★</span> 4.88 &nbsp;•&nbsp; <span class="badge badge-green" style="padding:.1rem .45rem">Verificado</span></div>
            </div>
            <div class="drv-stat">
              <div class="drv-earn">42.800 Kz</div>
              <div class="drv-trips">114 viagens</div>
            </div>
          </div>
          <div class="driver-row">
            <div style="font-family:var(--font-head);font-size:.9rem;font-weight:700;color:var(--muted);width:18px;flex-shrink:0">#3</div>
            <div class="drv-avatar">RF</div>
            <div>
              <div class="drv-name">Rosa Figueiredo</div>
              <div class="drv-sub">Huambo &nbsp;•&nbsp; <span class="stars">★</span> 4.85 &nbsp;•&nbsp; <span class="badge badge-green" style="padding:.1rem .45rem">Verificado</span></div>
            </div>
            <div class="drv-stat">
              <div class="drv-earn">38.500 Kz</div>
              <div class="drv-trips">98 viagens</div>
            </div>
          </div>
          <div class="driver-row">
            <div style="font-family:var(--font-head);font-size:.9rem;font-weight:700;color:var(--muted);width:18px;flex-shrink:0">#4</div>
            <div class="drv-avatar" style="background:linear-gradient(135deg,#d97706,#f59e0b)">PL</div>
            <div>
              <div class="drv-name">Pedro Lopes</div>
              <div class="drv-sub">Benguela &nbsp;•&nbsp; <span class="stars">★</span> 4.79 &nbsp;•&nbsp; <span class="badge badge-orange" style="padding:.1rem .45rem">Pendente</span></div>
            </div>
            <div class="drv-stat">
              <div class="drv-earn">31.200 Kz</div>
              <div class="drv-trips">82 viagens</div>
            </div>
          </div>
        </div>
      </div>

      <!-- INCIDENTES -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Incidentes Recentes</span>
          <div style="display:flex;gap:.5rem">
            <span class="badge badge-red">2 críticos</span>
            <span class="card-action">Ver todos →</span>
          </div>
        </div>
        <div class="incident-list">
          <div class="incident-item critical">
            <div class="inc-icon red"><i class="fa-solid fa-car-burst"></i></div>
            <div style="flex:1;min-width:0">
              <div class="inc-title">Reclamação: comportamento do motorista</div>
              <div class="inc-sub">Passageiro #4821 &nbsp;•&nbsp; Luanda &nbsp;•&nbsp; Há 12 min</div>
            </div>
            <div class="inc-actions">
              <button class="btn-sm btn-red"><i class="fa-solid fa-eye"></i></button>
              <button class="btn-sm btn-blue"><i class="fa-solid fa-check"></i></button>
            </div>
          </div>
          <div class="incident-item critical">
            <div class="inc-icon red"><i class="fa-solid fa-shield-xmark"></i></div>
            <div style="flex:1;min-width:0">
              <div class="inc-title">Pagamento falhado — possível fraude</div>
              <div class="inc-sub">Trans #TXN-9912 &nbsp;•&nbsp; 45.000 Kz &nbsp;•&nbsp; Há 34 min</div>
            </div>
            <div class="inc-actions">
              <button class="btn-sm btn-red"><i class="fa-solid fa-ban"></i></button>
              <button class="btn-sm btn-orange"><i class="fa-solid fa-eye"></i></button>
            </div>
          </div>
          <div class="incident-item medium">
            <div class="inc-icon orange"><i class="fa-solid fa-clock"></i></div>
            <div style="flex:1;min-width:0">
              <div class="inc-title">Motorista fora da rota acordada</div>
              <div class="inc-sub">Motorista #D-0812 &nbsp;•&nbsp; Viana &nbsp;•&nbsp; Há 1h</div>
            </div>
            <div class="inc-actions">
              <button class="btn-sm btn-orange"><i class="fa-solid fa-map-location-dot"></i></button>
              <button class="btn-sm btn-blue"><i class="fa-solid fa-check"></i></button>
            </div>
          </div>
          <div class="incident-item low">
            <div class="inc-icon info"><i class="fa-solid fa-star-half-stroke"></i></div>
            <div style="flex:1;min-width:0">
              <div class="inc-title">Avaliação baixa — 2 estrelas</div>
              <div class="inc-sub">Motorista #D-0231 &nbsp;•&nbsp; Kilamba &nbsp;•&nbsp; Há 2h</div>
            </div>
            <div class="inc-actions">
              <button class="btn-sm btn-blue"><i class="fa-solid fa-eye"></i></button>
            </div>
          </div>
          <div class="incident-item low">
            <div class="inc-icon info"><i class="fa-solid fa-file-circle-question"></i></div>
            <div style="flex:1;min-width:0">
              <div class="inc-title">Documentos expirados — BD válida</div>
              <div class="inc-sub">Motorista #D-0547 &nbsp;•&nbsp; Huambo &nbsp;•&nbsp; Há 3h</div>
            </div>
            <div class="inc-actions">
              <button class="btn-sm btn-orange"><i class="fa-solid fa-envelope"></i></button>
              <button class="btn-sm btn-red"><i class="fa-solid fa-user-slash"></i></button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- VERIFICAÇÕES PENDENTES TABLE -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Motoristas Aguardando Verificação</span>
        <div style="display:flex;gap:.5rem;align-items:center">
          <span class="badge badge-orange">12 pendentes</span>
          <button class="btn-sm btn-blue"><i class="fa-solid fa-check-double" style="margin-right:.25rem"></i>Aprovar Todos Válidos</button>
        </div>
      </div>
      <table class="mini-table">
        <thead>
          <tr>
            <th>Motorista</th><th>Cidade</th><th>Submetido</th><th>Carta Cond.</th><th>BI</th><th>Seguro</th><th>Estado</th><th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div style="display:flex;align-items:center;gap:.5rem"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--accent));display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;color:#fff">JS</div>José Silva</div></td>
            <td>Luanda</td><td>Hoje, 08:12</td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-orange">Em Revisão</span></td>
            <td style="display:flex;gap:.35rem;padding-top:.4rem">
              <button class="btn-sm btn-green"><i class="fa-solid fa-check"></i> Aprovar</button>
              <button class="btn-sm btn-red"><i class="fa-solid fa-xmark"></i></button>
            </td>
          </tr>
          <tr>
            <td><div style="display:flex;align-items:center;gap:.5rem"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#d97706,#f59e0b);display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;color:#fff">LM</div>Luísa Martins</div></td>
            <td>Benguela</td><td>Hoje, 09:45</td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-red">✗ Expirado</span></td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-red">Rejeitado</span></td>
            <td style="display:flex;gap:.35rem;padding-top:.4rem">
              <button class="btn-sm btn-orange"><i class="fa-solid fa-envelope"></i> Notificar</button>
              <button class="btn-sm btn-red"><i class="fa-solid fa-xmark"></i></button>
            </td>
          </tr>
          <tr>
            <td><div style="display:flex;align-items:center;gap:.5rem"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,var(--success),#4ade80);display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;color:#fff">CA</div>Carlos Alves</div></td>
            <td>Huambo</td><td>Ontem, 16:30</td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-green">✓ OK</span></td>
            <td><span class="badge badge-orange">Pendente</span></td>
            <td><span class="badge badge-orange">Em Revisão</span></td>
            <td style="display:flex;gap:.35rem;padding-top:.4rem">
              <button class="btn-sm btn-green"><i class="fa-solid fa-check"></i> Aprovar</button>
              <button class="btn-sm btn-red"><i class="fa-solid fa-xmark"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<script>
$(function(){
  /* theme */
  const saved=localStorage.getItem('cp_theme_adm')||'light';
  if(saved==='dark'){$('body').addClass('dark');$('#theme-icon').removeClass('fa-moon').addClass('fa-sun')}
  $('#theme-toggle').on('click',function(){
    const dark=$('body').hasClass('dark');
    $('body').toggleClass('dark',!dark);
    $('#theme-icon').toggleClass('fa-moon',dark).toggleClass('fa-sun',!dark);
    localStorage.setItem('cp_theme_adm',dark?'light':'dark');
  });
  /* sidebar */
  $('#sidebar-toggle').on('click',function(){$('#sidebar').toggleClass('collapsed')});
  /* revenue chart */
  const revData=[6.2,7.1,8.4,9.0,10.2,11.8,null,null,null,null,null,null];
  const projected=[null,null,null,null,null,null,null,13.5,14.2,15.0,16.2,18.0];
  const max=18;
  revData.forEach((v,i)=>{
    let cls='rev-bar',pct=4;
    if(v!==null){pct=Math.round((v/max)*100);cls=i===6?'rev-bar accent':'rev-bar'}
    else if(projected[i]!==null){pct=Math.round((projected[i]/max)*100);cls='rev-bar';$('#rev-chart').append(`<div class="${cls}" style="height:${pct}%;opacity:.25"></div>`);return}
    $('#rev-chart').append(`<div class="${cls}" style="height:${pct}%"></div>`);
  });
  /* animate metric bars */
  setTimeout(()=>{
    $('.metric-bar').each(function(){
      const w=$(this).css('width');$(this).css('width','0').animate({width:w},800);
    });
  },300);
});
</script>
</body>
</html>

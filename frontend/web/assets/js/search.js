$(function(){

  /* ── i18n ──────────────────────────────────────────────────── */
  const i18n={
    pt:{
      'search.origin':'De onde parte?','search.dest':'Para onde vai?',
      'search.pax':'1 passageiro','search.btn':'Procurar',
      'filter.type':'Tipo de Viagem','filter.clear':'Limpar',
      'filter.all':'Tudo','filter.carpool':'Carona','filter.bus':'Autocarro',
      'filter.price':'Preço Máximo','filter.time':'Horário de Partida',
      'filter.morning':'Manhã (06h–12h)','filter.afternoon':'Tarde (12h–18h)','filter.night':'Noite (18h–00h)',
      'filter.amenities':'Comodidades','filter.ac':'Ar condicionado',
      'filter.luggage':'Bagagem extra','filter.animals':'Animais permitidos',
      'filter.instant2':'Reserva Imediata','filter.rating':'Avaliação Mínima',
      'filter.any':'Qualquer',
      'filter.carona':'Carona','filter.instant':'Reserva Imediata',
      'results.title':'viagens disponíveis','results.meta':'Hoje · Talatona → Maianga, Luanda',
      'tab.all':'Tudo','tab.carona':'Carona','tab.bus':'Autocarro',
      'sort.label':'Ordenar por:','sort.dep':'Hora de partida',
      'sort.price':'Preço','sort.duration':'Duração','sort.rating':'Avaliação',
      'card.instant':'Reserva Imediata','card.trips':'viagens',
      'tag.instant':'Imediato','tag.luggage':'Bagagem','tag.music':'Música',
      'map.title':'Rota no Mapa',
      'info.distance':'Distância estimada','info.duration':'Duração média',
      'info.co2':'CO₂ poupado por lugar','info.fuel':'Poupança vs. carro solo',
      'offer.title':'Tem carro? Ofereça uma boleia!',
      'offer.sub':'Cubra os custos de combustível e contribua para uma Luanda mais sustentável.',
      'offer.btn':'Publicar Viagem',
      'book.title':'Reservar Boleia','book.trip':'Viagem',
      'book.seats':'Nº de Lugares','book.passenger':'Dados do Passageiro',
      'book.name':'Nome completo','book.name_ph':'Ex.: Amara Fernandes',
      'book.phone':'Telemóvel','book.note':'Nota para o motorista',
      'book.payment':'Método de Pagamento',
      'pay.instant':'Pagamento instantâneo','pay.mobile':'Pagamento por telemóvel',
      'pay.balance':'Saldo CARPOOL','pay.available':'disponíveis',
      'book.summary':'Resumo de Preço','book.base':'Preço base (1 lugar)',
      'book.fee':'Taxa de serviço (5%)','book.total':'Total',
      'book.confirm':'Confirmar Reserva',
      'book.terms1':'Ao reservar aceita os ','book.terms2':'Termos',
      'book.terms3':' e ','book.terms4':'Política de Privacidade',
      'empty.title':'Sem viagens disponíveis',
      'empty.sub':'Tente ajustar os filtros ou escolha uma data diferente para encontrar boleias disponíveis.',
    },
    en:{
      'search.origin':'Where are you departing from?','search.dest':'Where are you going?',
      'search.pax':'1 passenger','search.btn':'Search',
      'filter.type':'Trip Type','filter.clear':'Clear',
      'filter.all':'All','filter.carpool':'Carpool','filter.bus':'Bus',
      'filter.price':'Maximum Price','filter.time':'Departure Time',
      'filter.morning':'Morning (06h–12h)','filter.afternoon':'Afternoon (12h–18h)','filter.night':'Night (18h–00h)',
      'filter.amenities':'Amenities','filter.ac':'Air conditioning',
      'filter.luggage':'Extra luggage','filter.animals':'Pets allowed',
      'filter.instant2':'Instant Booking','filter.rating':'Minimum Rating',
      'filter.any':'Any',
      'filter.carona':'Carpool','filter.instant':'Instant Booking',
      'results.title':'rides available','results.meta':'Today · Talatona → Maianga, Luanda',
      'tab.all':'All','tab.carona':'Carpool','tab.bus':'Bus',
      'sort.label':'Sort by:','sort.dep':'Departure time',
      'sort.price':'Price','sort.duration':'Duration','sort.rating':'Rating',
      'card.instant':'Instant Booking','card.trips':'rides',
      'tag.instant':'Instant','tag.luggage':'Luggage','tag.music':'Music',
      'map.title':'Route on Map',
      'info.distance':'Estimated distance','info.duration':'Average duration',
      'info.co2':'CO₂ saved per seat','info.fuel':'Saving vs. solo car',
      'offer.title':'Have a car? Offer a ride!',
      'offer.sub':'Cover your fuel costs and contribute to a more sustainable Luanda.',
      'offer.btn':'Post a Trip',
      'book.title':'Book a Ride','book.trip':'Trip',
      'book.seats':'Number of Seats','book.passenger':'Passenger Details',
      'book.name':'Full name','book.name_ph':'E.g.: Amara Fernandes',
      'book.phone':'Phone','book.note':'Note to driver',
      'book.payment':'Payment Method',
      'pay.instant':'Instant payment','pay.mobile':'Mobile payment',
      'pay.balance':'CARPOOL Balance','pay.available':'available',
      'book.summary':'Price Summary','book.base':'Base price (1 seat)',
      'book.fee':'Service fee (5%)','book.total':'Total',
      'book.confirm':'Confirm Booking',
      'book.terms1':'By booking you agree to our ','book.terms2':'Terms',
      'book.terms3':' and ','book.terms4':'Privacy Policy',
      'empty.title':'No rides available',
      'empty.sub':'Try adjusting the filters or choose a different date to find available rides.',
    }
  };

  let lang=localStorage.getItem('cp_lang')||'pt';

  function applyLang(l){
    const d=i18n[l];
    $('[data-i18n]').each(function(){
      const k=$(this).data('i18n');
      if(d[k]!==undefined)$(this).text(d[k]);
    });
    $('[data-i18n-placeholder]').each(function(){
      const k=$(this).data('i18n-placeholder');
      if(d[k]!==undefined)$(this).attr('placeholder',d[k]);
    });
    $('html').attr('lang',l);
    $('#lang-label').text(l==='pt'?'EN':'PT');
    lang=l;
    localStorage.setItem('cp_lang',l);
  }
  applyLang(lang);
  $('#lang-toggle').on('click',function(){applyLang(lang==='pt'?'en':'pt')});

  /* ── THEME ─────────────────────────────────────────────────── */
  const savedTheme=localStorage.getItem('cp_theme_trips')||'light';
  function setTheme(t){
    $('body').toggleClass('dark',t==='dark');
    $('#theme-icon').toggleClass('fa-moon',t==='light').toggleClass('fa-sun',t==='dark');
    localStorage.setItem('cp_theme_trips',t);
  }
  setTheme(savedTheme);
  $('#theme-toggle').on('click',function(){
    setTheme($('body').hasClass('dark')?'light':'dark');
  });

  /* ── PRICE RANGE ────────────────────────────────────────────── */
  window.updatePrice=function(v){
    const formatted=parseInt(v).toLocaleString('pt-AO');
    $('#price-label').text(formatted+' Kz');
    const pct=((v-500)/(8000-500))*100;
    $('#price-range').css('background',`linear-gradient(90deg,var(--blue) ${pct}%,var(--border) ${pct}%)`);
  };

  /* ── SWAP CITIES ────────────────────────────────────────────── */
  window.swapCities=function(){
    const o=$('#origin-input').val();
    const d=$('#dest-input').val();
    $('#origin-input').val(d);
    $('#dest-input').val(o);
  };

  /* ── SORT ───────────────────────────────────────────────────── */
  window.setSort=function(el){
    $('.sort-pill').removeClass('active');
    $(el).addClass('active');
  };

  /* ── TABS ───────────────────────────────────────────────────── */
  window.switchTab=function(tab,el){
    $('.tab-btn').removeClass('active');
    $(el).addClass('active');
  };

  /* ── REMOVE CHIP ────────────────────────────────────────────── */
  window.removeChip=function(el){$(el).closest('.chip').remove()};

  /* ── BOOKING SHEET ──────────────────────────────────────────── */
  const prices=[1400,1600,1800,2300];
  const times=['07:30 → 08:00','09:00 → 09:35','12:40 → 13:20','16:00 → 17:00'];
  let currentSeats=1;
  let currentBase=1400;

  window.openBooking=function(id){
    currentBase=prices[id-1];
    $('#book-time').text(times[id-1]);
    $('#book-price').text(currentBase.toLocaleString('pt-AO')+' Kz');
    updatePriceBreak(1,currentBase);
    $('.seat-btn').removeClass('active');
    $('.seat-btn').first().addClass('active');
    currentSeats=1;
    $('#booking-sheet').addClass('open');
    $('body').css('overflow','hidden');
  };

  window.closeBooking=function(){
    $('#booking-sheet').removeClass('open');
    $('body').css('overflow','');
  };

  window.selectSeat=function(n,el){
    currentSeats=n;
    $('.seat-btn').removeClass('active');
    $(el).addClass('active');
    updatePriceBreak(n,currentBase);
  };

  function updatePriceBreak(seats,base){
    const total=base*seats;
    const fee=Math.round(total*0.05);
    $('#pb-base').text((base*seats).toLocaleString('pt-AO')+' Kz');
    $('#pb-fee').text(fee.toLocaleString('pt-AO')+' Kz');
    $('#pb-total').text((total+fee).toLocaleString('pt-AO')+' Kz');
  }

  window.selectPay=function(el){
    $('.pay-method').removeClass('active');
    $(el).addClass('active');
    $(el).find('input[type=radio]').prop('checked',true);
  };

  window.confirmBooking=function(){
    const name=$('.booking-panel input[type=text]').val().trim();
    if(!name){
      $('.booking-panel input[type=text]').css('border-color','var(--danger)').focus();
      return;
    }
    $('.booking-panel input[type=text]').css('border-color','transparent');
    const btn=$('.btn-confirm');
    btn.html('<i class="fa-solid fa-check-circle" style="margin-right:.5rem"></i> Reserva Confirmada!').css('background','linear-gradient(135deg,var(--success),#4ade80)').css('color','#fff');
    setTimeout(()=>{
      closeBooking();
      btn.html('<i class="fa-solid fa-check" style="margin-right:.5rem"></i> <span data-i18n="book.confirm">Confirmar Reserva</span>').css('background','').css('color','');
      applyLang(lang);
    },2000);
  };

  window.doSearch=function(){
    $('.sort-pill').first().addClass('active');
  };

  /* Escape closes booking */
  $(document).on('keydown',function(e){if(e.key==='Escape')closeBooking()});

});
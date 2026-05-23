$(function(){
  /* theme */
  const saved = localStorage.getItem('cp_theme')||'light';
  if(saved==='dark'){$('body').addClass('dark');$('#theme-icon').removeClass('fa-moon').addClass('fa-sun')}
  $('#theme-toggle').on('click',function(){
    const dark=$('body').hasClass('dark');
    $('body').toggleClass('dark',!dark);
    $('#theme-icon').toggleClass('fa-moon',dark).toggleClass('fa-sun',!dark);
    localStorage.setItem('cp_theme',dark?'light':'dark');
  });
  /* sidebar toggle */
  $('#sidebar-toggle').on('click',function(){$('#sidebar').toggleClass('collapsed')});
  /* earn chart */
  const vals=[42,55,35,68,80,90,48];
  const max=Math.max(...vals);
  vals.forEach((v,i)=>{
    const pct=Math.round((v/max)*100);
    const cls=i===6?'earn-bar today':'earn-bar';
    $('#earn-chart').append(`<div class="${cls}" style="height:${pct}%"></div>`);
  });
  /* avail toggle feedback */
  window.toggleAvail=function(el){
    const dot=$('.dot-online');
    if(el.checked){dot.show()}else{dot.hide()}
  };
});
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>CARPOOL Angola — Viagens Encontradas</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<script>tailwind.config={darkMode:'class',theme:{extend:{fontFamily:{display:['"Oswald"'],sans:['"Outfit"']}}}}</script>
<style>
/* ─── DESIGN TOKENS ──────────────────────────────────────────── */
:root{
  --bg:#f0f2f5;--surface:#f0f2f5;--card:#fff;
  --blue:#1e3a8a;--blue-light:#2d4eaa;--accent:#ffaa44;
  --text:#182a4d;--muted:#6b7280;--border:rgba(30,58,138,0.12);
  --success:#16a34a;--danger:#dc2626;
  --shadow-out:-6px -6px 12px #ffffff,6px 6px 12px #d1d9e6;
  --shadow-in:inset -3px -3px 7px #ffffff,inset 3px 3px 7px #d1d9e6;
  --shadow-card:-8px -8px 16px #ffffff,8px 8px 16px #d1d9e6;
  --radius:16px;
  --font-head:'Oswald',sans-serif;
  --font-body:'Outfit',sans-serif;
  --transition:.3s cubic-bezier(.4,0,.2,1);
}
.dark{
  --bg:#0b0f19;--surface:#111827;--card:#1a2235;
  --blue:#3b82f6;--blue-light:#60a5fa;--accent:#ff8a3d;
  --text:#e5e7eb;--muted:#9ca3af;--border:rgba(59,130,246,0.15);
  --shadow-out:-6px -6px 12px #0a0d14,6px 6px 12px #1a2035;
  --shadow-in:inset -3px -3px 7px #0a0d14,inset 3px 3px 7px #1a2035;
  --shadow-card:-8px -8px 16px #080b12,8px 8px 16px #1e2640;
}

/* ─── RESET ──────────────────────────────────────────────────── */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{
  font-family:var(--font-body);background:var(--bg);color:var(--text);
  transition:background var(--transition),color var(--transition);
  min-height:100vh;
}
a{text-decoration:none;color:inherit}
button{cursor:pointer;border:none;background:none;font-family:var(--font-body)}
input,select{font-family:var(--font-body)}

/* ─── SEARCH BAR (top, no navbar) ───────────────────────────── */
.search-wrap{
  background:var(--bg);
  padding:1.25rem 2rem;
  border-bottom:1px solid var(--border);
  position:sticky;top:0;z-index:50;
  box-shadow:0 2px 16px rgba(0,0,0,.06);
  transition:background var(--transition),border-color var(--transition);
}
.dark .search-wrap{box-shadow:0 2px 16px rgba(0,0,0,.3)}
.search-inner{
  max-width:1300px;margin:0 auto;
  display:flex;align-items:center;gap:1rem;flex-wrap:wrap;
}
.brand-mini{
  font-family:var(--font-head);font-size:1.35rem;font-weight:700;
  color:var(--blue);letter-spacing:-.5px;white-space:nowrap;margin-right:.5rem;
}
.brand-mini span{color:var(--accent)}
.search-bar{
  flex:1;min-width:280px;
  background:var(--surface);
  border-radius:99px;
  box-shadow:var(--shadow-out);
  display:flex;align-items:center;
  padding:.25rem;
  border:1px solid var(--border);
  transition:box-shadow var(--transition);
}
.search-bar:focus-within{box-shadow:var(--shadow-in),0 0 0 3px rgba(30,58,138,.12)}
.dark .search-bar:focus-within{box-shadow:var(--shadow-in),0 0 0 3px rgba(59,130,246,.18)}
.search-field{
  display:flex;align-items:center;gap:.5rem;
  flex:1;padding:.55rem 1rem;min-width:0;
}
.search-field i{color:var(--muted);font-size:.85rem;flex-shrink:0}
.search-field input{
  border:none;outline:none;background:transparent;
  font-size:.875rem;color:var(--text);width:100%;
}
.search-field input::placeholder{color:var(--muted)}
.search-sep{
  width:1px;height:28px;
  background:var(--border);flex-shrink:0;
}
.search-swap{
  width:32px;height:32px;border-radius:50%;
  background:var(--bg);box-shadow:var(--shadow-out);
  display:flex;align-items:center;justify-content:center;
  color:var(--blue);font-size:.8rem;cursor:pointer;
  transition:box-shadow var(--transition),transform var(--transition);
  flex-shrink:0;
}
.search-swap:hover{box-shadow:var(--shadow-in);transform:rotate(180deg)}
.search-pill{
  display:flex;align-items:center;gap:.4rem;
  background:var(--bg);box-shadow:var(--shadow-out);
  border-radius:99px;padding:.55rem 1.1rem;
  font-size:.8rem;color:var(--text);cursor:pointer;white-space:nowrap;
  transition:box-shadow var(--transition),color var(--transition);
  border:1px solid var(--border);
}
.search-pill:hover{box-shadow:var(--shadow-in);color:var(--blue)}
.search-pill i{color:var(--muted);font-size:.8rem}
.btn-search{
  display:inline-flex;align-items:center;gap:.5rem;
  padding:.6rem 1.5rem;border-radius:99px;
  background:linear-gradient(135deg,var(--blue),var(--blue-light));
  color:#fff;font-weight:700;font-size:.875rem;
  box-shadow:0 6px 18px rgba(30,58,138,.3);
  transition:transform var(--transition),box-shadow var(--transition);white-space:nowrap;
}
.btn-search:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(30,58,138,.4)}
.top-controls{display:flex;align-items:center;gap:.5rem;margin-left:auto}
.neu-btn{
  display:inline-flex;align-items:center;gap:.35rem;
  padding:.45rem .9rem;border-radius:99px;
  font-size:.78rem;font-weight:600;color:var(--blue);
  background:var(--bg);box-shadow:var(--shadow-out);
  transition:box-shadow var(--transition),color var(--transition);
  border:none;cursor:pointer;font-family:var(--font-body);
}
.neu-btn:hover{box-shadow:var(--shadow-in);color:var(--accent)}

/* ─── PAGE LAYOUT ────────────────────────────────────────────── */
.page-body{
  max-width:1300px;margin:0 auto;
  padding:1.5rem 2rem;
  display:grid;
  grid-template-columns:260px 1fr 340px;
  gap:1.5rem;
  align-items:start;
}

/* ─── FILTERS COLUMN ─────────────────────────────────────────── */
.filters-col{
  position:sticky;top:88px;
  display:flex;flex-direction:column;gap:1rem;
}
.filter-card{
  background:var(--surface);border-radius:var(--radius);
  box-shadow:var(--shadow-card);border:1px solid var(--border);
  padding:1.25rem;
  transition:background var(--transition),box-shadow var(--transition);
}
.filter-title{
  font-family:var(--font-head);font-size:.95rem;font-weight:700;
  color:var(--text);margin-bottom:1rem;letter-spacing:.3px;
  display:flex;align-items:center;justify-content:space-between;
}
.filter-clear{font-size:.7rem;font-weight:600;color:var(--blue);cursor:pointer;font-family:var(--font-body)}
.filter-clear:hover{color:var(--accent)}

/* Checkbox & radio filters */
.filter-option{
  display:flex;align-items:center;gap:.65rem;
  padding:.4rem 0;cursor:pointer;
}
.filter-option input{accent-color:var(--blue);width:15px;height:15px;cursor:pointer}
.filter-option label{font-size:.82rem;color:var(--text);cursor:pointer;flex:1}
.filter-option .filter-count{
  font-size:.68rem;font-weight:600;color:var(--muted);
  background:var(--bg);box-shadow:var(--shadow-in);
  border-radius:99px;padding:.1rem .45rem;
}

/* Range slider */
.range-wrap{margin-top:.25rem}
.range-labels{display:flex;justify-content:space-between;font-size:.72rem;color:var(--muted);margin-bottom:.4rem}
.neu-range{
  width:100%;height:4px;border-radius:99px;
  appearance:none;background:linear-gradient(90deg,var(--blue) 60%,var(--border) 60%);
  outline:none;cursor:pointer;
}
.neu-range::-webkit-slider-thumb{
  appearance:none;width:18px;height:18px;border-radius:50%;
  background:var(--blue);box-shadow:var(--shadow-out);
  transition:box-shadow var(--transition);cursor:pointer;
}
.neu-range::-webkit-slider-thumb:hover{box-shadow:var(--shadow-in),0 0 0 3px rgba(30,58,138,.2)}

/* Active filter chips */
.active-chips{display:flex;flex-wrap:wrap;gap:.4rem;margin-bottom:.75rem}
.chip{
  display:inline-flex;align-items:center;gap:.3rem;
  background:var(--blue);color:#fff;
  border-radius:99px;padding:.25rem .65rem;
  font-size:.7rem;font-weight:600;
}
.chip-remove{
  width:14px;height:14px;border-radius:50%;
  background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;
  font-size:.5rem;cursor:pointer;transition:background var(--transition);
}
.chip-remove:hover{background:rgba(255,255,255,.4)}
.chip.accent{background:var(--accent);color:#1a1f2e}

/* ─── RESULTS COLUMN ─────────────────────────────────────────── */
.results-col{display:flex;flex-direction:column;gap:1rem}

.results-header{
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:.75rem;
}
.results-title{
  font-family:var(--font-head);font-size:1.1rem;font-weight:700;
  color:var(--text);letter-spacing:.3px;
}
.results-meta{font-size:.8rem;color:var(--muted);margin-top:.15rem}
.results-count{
  font-family:var(--font-head);font-size:1.5rem;font-weight:700;
  color:var(--blue);margin-right:.35rem;
}

/* Tab switcher */
.tab-bar{
  display:flex;gap:.25rem;
  background:var(--surface);border-radius:99px;
  padding:.2rem;box-shadow:var(--shadow-in);
  border:1px solid var(--border);width:fit-content;
}
.tab-btn{
  display:flex;align-items:center;gap:.4rem;
  padding:.4rem 1rem;border-radius:99px;
  font-size:.78rem;font-weight:600;color:var(--muted);
  transition:background var(--transition),color var(--transition),box-shadow var(--transition);
  cursor:pointer;
}
.tab-btn.active{
  background:var(--blue);color:#fff;
  box-shadow:0 4px 12px rgba(30,58,138,.3);
}
.tab-btn i{font-size:.8rem}

/* Sort bar */
.sort-bar{
  display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;
  padding:.75rem 1rem;
  background:var(--surface);border-radius:12px;
  box-shadow:var(--shadow-card);border:1px solid var(--border);
}
.sort-label{font-size:.75rem;color:var(--muted);font-weight:600;white-space:nowrap}
.sort-btns{display:flex;gap:.35rem;flex-wrap:wrap}
.sort-pill{
  display:inline-flex;align-items:center;gap:.3rem;
  padding:.3rem .75rem;border-radius:99px;
  font-size:.72rem;font-weight:600;color:var(--muted);
  background:var(--bg);box-shadow:var(--shadow-out);
  cursor:pointer;transition:all var(--transition);border:none;
  font-family:var(--font-body);
}
.sort-pill:hover{color:var(--blue);box-shadow:var(--shadow-in)}
.sort-pill.active{background:var(--blue);color:#fff;box-shadow:0 3px 10px rgba(30,58,138,.3)}

/* ─── TRIP CARD ──────────────────────────────────────────────── */
.trip-card{
  background:var(--surface);border-radius:var(--radius);
  box-shadow:var(--shadow-card);border:1px solid var(--border);
  overflow:hidden;cursor:pointer;
  transition:transform var(--transition),box-shadow var(--transition),border-color var(--transition);
}
.trip-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-out);border-color:rgba(30,58,138,.25)}
.dark .trip-card:hover{border-color:rgba(59,130,246,.3)}
.trip-card.featured{border:2px solid var(--accent)}

.trip-card-inner{padding:1.25rem 1.5rem}

/* Time + route line */
.trip-route-row{
  display:flex;align-items:center;gap:1rem;
  margin-bottom:1rem;
}
.trip-time{
  font-family:var(--font-head);font-size:1.25rem;font-weight:700;
  color:var(--text);white-space:nowrap;min-width:52px;
}
.trip-duration{
  font-size:.7rem;color:var(--muted);font-weight:500;
  text-align:center;white-space:nowrap;
}
/* Route line visual */
.route-line-wrap{
  flex:1;display:flex;align-items:center;gap:.5rem;
  position:relative;
}
.route-dot-from,.route-dot-to{
  width:10px;height:10px;border-radius:50%;flex-shrink:0;
}
.route-dot-from{background:var(--blue);box-shadow:0 0 0 3px rgba(30,58,138,.15)}
.route-dot-to{background:var(--accent);box-shadow:0 0 0 3px rgba(255,170,68,.2)}
.route-line{flex:1;height:2px;background:linear-gradient(90deg,var(--blue),var(--accent));border-radius:99px;position:relative}
.route-line::after{
  content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
  width:6px;height:6px;border-radius:50%;
  background:var(--bg);border:2px solid var(--blue);
}
.trip-place{
  font-size:.78rem;color:var(--muted);white-space:nowrap;
  font-weight:500;
}
.trip-price{
  font-family:var(--font-head);font-size:1.5rem;font-weight:700;
  color:var(--text);white-space:nowrap;
  display:flex;align-items:baseline;gap:.15rem;
  margin-left:auto;
}
.trip-price-cur{font-size:.8rem;font-weight:500;color:var(--muted)}

/* Driver row */
.trip-driver-row{
  display:flex;align-items:center;gap:1rem;
  padding-top:.85rem;
  border-top:1px solid var(--border);
  flex-wrap:wrap;
}
.driver-info{display:flex;align-items:center;gap:.6rem;flex:1;min-width:0}
.driver-avatar{
  width:38px;height:38px;border-radius:50%;
  object-fit:cover;flex-shrink:0;
  box-shadow:var(--shadow-out);border:2px solid var(--bg);
}
.driver-avatar-placeholder{
  width:38px;height:38px;border-radius:50%;
  background:linear-gradient(135deg,var(--blue),var(--accent));
  display:flex;align-items:center;justify-content:center;
  font-family:var(--font-head);font-size:.85rem;font-weight:700;color:#fff;
  box-shadow:var(--shadow-out);flex-shrink:0;
}
.driver-verified{
  position:relative;width:fit-content;
}
.verified-badge{
  position:absolute;bottom:-2px;right:-2px;
  width:14px;height:14px;border-radius:50%;
  background:var(--blue);border:2px solid var(--bg);
  display:flex;align-items:center;justify-content:center;
  font-size:.45rem;color:#fff;
}
.driver-name{font-size:.85rem;font-weight:600;color:var(--text)}
.driver-rating{
  display:flex;align-items:center;gap:.25rem;
  font-size:.75rem;color:var(--muted);
}
.driver-rating i{color:var(--accent);font-size:.7rem}

/* Tags */
.trip-tags{display:flex;flex-wrap:wrap;gap:.35rem;margin-left:auto}
.tag{
  display:inline-flex;align-items:center;gap:.25rem;
  padding:.2rem .6rem;border-radius:99px;
  font-size:.65rem;font-weight:600;
  background:var(--bg);box-shadow:var(--shadow-in);
  color:var(--muted);
  font-family:var(--font-body);
}
.tag.blue{background:rgba(30,58,138,.1);color:var(--blue)}
.dark .tag.blue{background:rgba(59,130,246,.15);color:#93c5fd}
.tag.green{background:rgba(22,163,74,.1);color:#16a34a}
.tag.orange{background:rgba(255,170,68,.15);color:#b45309}
.dark .tag.orange{color:var(--accent)}

/* Featured label */
.featured-label{
  background:linear-gradient(135deg,var(--accent),#ffcc66);
  color:#1a1f2e;
  font-size:.65rem;font-weight:800;
  letter-spacing:1px;text-transform:uppercase;
  padding:.3rem 1rem;
  font-family:var(--font-head);
  display:flex;align-items:center;gap:.35rem;
}

/* ─── MAP COLUMN ─────────────────────────────────────────────── */
.map-col{
  position:sticky;top:88px;
  display:flex;flex-direction:column;gap:1rem;
}
.map-card{
  background:var(--surface);border-radius:var(--radius);
  box-shadow:var(--shadow-card);border:1px solid var(--border);
  overflow:hidden;
  transition:background var(--transition),box-shadow var(--transition);
}
.map-header{
  display:flex;align-items:center;justify-content:space-between;
  padding:.85rem 1.1rem;
  border-bottom:1px solid var(--border);
}
.map-title{font-family:var(--font-head);font-size:.9rem;font-weight:700;color:var(--text);letter-spacing:.3px}
.map-frame{
  width:100%;height:340px;border:none;display:block;
  filter:grayscale(20%);
  transition:filter var(--transition);
}
.dark .map-frame{filter:grayscale(30%) invert(90%) hue-rotate(180deg) brightness(0.85)}
.map-frame:hover{filter:grayscale(0%)}

/* Quick info cards under map */
.info-card{
  background:var(--surface);border-radius:var(--radius);
  box-shadow:var(--shadow-card);border:1px solid var(--border);
  padding:1.1rem 1.25rem;
}
.info-row{display:flex;align-items:center;gap:.75rem;margin-bottom:.6rem}
.info-row:last-child{margin-bottom:0}
.info-icon{
  width:34px;height:34px;border-radius:10px;
  background:var(--bg);box-shadow:var(--shadow-out);
  display:flex;align-items:center;justify-content:center;
  font-size:.85rem;color:var(--blue);flex-shrink:0;
}
.info-label{font-size:.72rem;color:var(--muted)}
.info-value{font-size:.88rem;font-weight:600;color:var(--text)}

/* Offer banner */
.offer-banner{
  background:linear-gradient(135deg,var(--blue),var(--blue-light));
  border-radius:var(--radius);
  padding:1.25rem;color:#fff;
  display:flex;flex-direction:column;gap:.6rem;
}
.offer-banner-title{font-family:var(--font-head);font-size:1rem;font-weight:700;letter-spacing:.3px}
.offer-banner-sub{font-size:.78rem;color:rgba(255,255,255,.75);line-height:1.5}
.btn-accent-banner{
  display:inline-flex;align-items:center;gap:.4rem;
  padding:.6rem 1.2rem;border-radius:10px;
  background:var(--accent);color:#1a1f2e;
  font-size:.82rem;font-weight:700;font-family:var(--font-body);
  border:none;cursor:pointer;width:fit-content;
  transition:filter var(--transition);
}
.btn-accent-banner:hover{filter:brightness(1.08)}

/* ─── EMPTY STATE ────────────────────────────────────────────── */
.empty-state{
  background:var(--surface);border-radius:var(--radius);
  box-shadow:var(--shadow-card);border:1px solid var(--border);
  padding:3rem 2rem;text-align:center;
  display:none;flex-direction:column;align-items:center;gap:1rem;
}
.empty-icon{
  width:64px;height:64px;border-radius:20px;
  background:var(--bg);box-shadow:var(--shadow-out);
  display:flex;align-items:center;justify-content:center;
  font-size:1.75rem;color:var(--muted);
}
.empty-title{font-family:var(--font-head);font-size:1.1rem;font-weight:700;color:var(--text)}
.empty-sub{font-size:.875rem;color:var(--muted);line-height:1.6;max-width:300px}

/* ─── BOOKING OVERLAY (side sheet) ──────────────────────────── */
.booking-sheet{
  position:fixed;inset:0;z-index:200;
  display:none;align-items:flex-start;justify-content:flex-end;
}
.booking-sheet.open{display:flex}
.booking-backdrop{position:absolute;inset:0;background:rgba(0,0,0,.35);backdrop-filter:blur(3px)}
.booking-panel{
  position:relative;z-index:1;
  width:420px;max-width:95vw;height:100vh;
  background:var(--bg);overflow-y:auto;
  padding:2rem 1.75rem;
  box-shadow:-8px 0 40px rgba(0,0,0,.18);
  animation:slideIn .3s ease;
}
@keyframes slideIn{from{transform:translateX(100%)}to{transform:translateX(0)}}
.booking-close{
  position:absolute;top:1.25rem;right:1.25rem;
  width:36px;height:36px;border-radius:50%;
  background:var(--bg);box-shadow:var(--shadow-out);
  display:flex;align-items:center;justify-content:center;
  font-size:.9rem;color:var(--muted);cursor:pointer;
  transition:box-shadow var(--transition),color var(--transition);
}
.booking-close:hover{box-shadow:var(--shadow-in);color:var(--danger)}
.booking-title{font-family:var(--font-head);font-size:1.4rem;font-weight:700;color:var(--text);margin-bottom:1.5rem;letter-spacing:-.5px}
.booking-section{margin-bottom:1.5rem}
.booking-section-title{font-family:var(--font-head);font-size:.85rem;font-weight:700;color:var(--muted);letter-spacing:1px;text-transform:uppercase;margin-bottom:.75rem}

/* Neumorphic inputs (same as main) */
.neu-input{
  width:100%;padding:.7rem 1rem;border-radius:12px;
  border:1px solid transparent;background:var(--bg);color:var(--text);
  font-size:.875rem;box-shadow:var(--shadow-in);outline:none;
  transition:box-shadow var(--transition),border-color var(--transition);
  margin-bottom:.75rem;
}
.neu-input:focus{border-color:var(--blue);box-shadow:var(--shadow-in),0 0 0 3px rgba(30,58,138,.12)}
.dark .neu-input:focus{box-shadow:var(--shadow-in),0 0 0 3px rgba(59,130,246,.18)}
.neu-input::placeholder{color:var(--muted)}
.form-label{display:block;font-size:.72rem;font-weight:600;color:var(--muted);margin-bottom:.25rem}

/* Seat picker */
.seat-picker{display:flex;gap:.5rem;margin-bottom:.75rem}
.seat-btn{
  flex:1;padding:.55rem;border-radius:10px;
  font-family:var(--font-head);font-size:.9rem;font-weight:700;
  color:var(--muted);background:var(--bg);
  box-shadow:var(--shadow-out);cursor:pointer;
  transition:all var(--transition);border:1px solid transparent;
}
.seat-btn:hover{box-shadow:var(--shadow-in);color:var(--blue)}
.seat-btn.active{background:var(--blue);color:#fff;box-shadow:0 4px 12px rgba(30,58,138,.3);border-color:transparent}

/* Payment methods */
.pay-methods{display:flex;flex-direction:column;gap:.5rem;margin-bottom:1rem}
.pay-method{
  display:flex;align-items:center;gap:.75rem;
  background:var(--bg);box-shadow:var(--shadow-out);
  border-radius:12px;padding:.75rem 1rem;
  cursor:pointer;border:1px solid transparent;
  transition:all var(--transition);
}
.pay-method:hover,.pay-method.active{box-shadow:var(--shadow-in);border-color:var(--blue)}
.pay-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.85rem;flex-shrink:0}
.pay-name{font-size:.82rem;font-weight:600;color:var(--text)}
.pay-sub{font-size:.68rem;color:var(--muted)}
.pay-radio{margin-left:auto;width:16px;height:16px;accent-color:var(--blue)}

/* Price breakdown */
.price-breakdown{
  background:var(--bg);box-shadow:var(--shadow-in);
  border-radius:12px;padding:1rem;margin-bottom:1rem;
}
.price-row{display:flex;justify-content:space-between;font-size:.82rem;color:var(--muted);padding:.2rem 0}
.price-row.total{
  font-family:var(--font-head);font-size:1rem;font-weight:700;
  color:var(--text);border-top:1px solid var(--border);margin-top:.5rem;padding-top:.65rem;
}
.price-total-val{color:var(--blue);font-size:1.15rem}

.btn-confirm{
  width:100%;padding:.9rem;border-radius:12px;
  background:linear-gradient(135deg,var(--blue),var(--blue-light));
  color:#fff;font-weight:700;font-size:1rem;
  font-family:var(--font-head);letter-spacing:.5px;
  box-shadow:0 8px 24px rgba(30,58,138,.35);
  transition:transform var(--transition),box-shadow var(--transition);
  cursor:pointer;border:none;
}
.btn-confirm:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(30,58,138,.45)}

/* ─── SCROLLBAR ──────────────────────────────────────────────── */
::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-thumb{background:var(--border);border-radius:99px}

/* ─── RESPONSIVE ─────────────────────────────────────────────── */
@media(max-width:1200px){.page-body{grid-template-columns:220px 1fr 300px}}
@media(max-width:1000px){.page-body{grid-template-columns:1fr;}.map-col,.filters-col{position:static}.search-bar{min-width:0}}
@media(max-width:680px){.search-wrap{padding:.85rem 1rem}.search-inner{gap:.5rem}.page-body{padding:1rem}.brand-mini{font-size:1.1rem}.trip-price{font-size:1.2rem}.trip-time{font-size:1rem}}
</style>
</head>
<body>

<!-- ─── SEARCH BAR ─────────────────────────────────────────────── -->
<div class="search-wrap">
  <div class="search-inner">
    <span class="brand-mini">CAR<span>POOL</span></span>

    <div class="search-bar">
      <div class="search-field">
        <i class="fa-solid fa-location-dot" style="color:var(--blue)"></i>
        <input type="text" id="origin-input" value="Talatona, Luanda" data-i18n-placeholder="search.origin"/>
      </div>
      <button class="search-swap" title="Trocar" onclick="swapCities()">
        <i class="fa-solid fa-arrow-right-arrow-left"></i>
      </button>
      <div class="search-field">
        <i class="fa-solid fa-flag-checkered" style="color:var(--accent)"></i>
        <input type="text" id="dest-input" value="Maianga, Luanda" data-i18n-placeholder="search.dest"/>
      </div>
      <div class="search-sep"></div>
      <div class="search-field" style="max-width:130px">
        <i class="fa-regular fa-calendar"></i>
        <input type="date" value="2025-07-26" style="font-size:.78rem"/>
      </div>
      <div class="search-sep"></div>
      <div class="search-field" style="max-width:110px;cursor:pointer">
        <i class="fa-solid fa-user"></i>
        <input type="text" id="pax-input" value="1 passageiro" readonly style="cursor:pointer" data-i18n-value="search.pax"/>
      </div>
    </div>

    <button class="btn-search" onclick="doSearch()">
      <i class="fa-solid fa-magnifying-glass"></i>
      <span data-i18n="search.btn">Procurar</span>
    </button>

    <div class="top-controls">
      <button class="neu-btn" id="lang-toggle">
        <i class="fa-solid fa-globe"></i>
        <span id="lang-label">EN</span>
      </button>
      <button class="neu-btn" id="theme-toggle">
        <i class="fa-solid fa-moon" id="theme-icon"></i>
      </button>
    </div>
  </div>
</div>

<!-- ─── PAGE BODY ──────────────────────────────────────────────── -->
<div class="page-body">

  <!-- ══ FILTERS ══════════════════════════════════════════════════ -->
  <aside class="filters-col">

    <!-- Active chips -->
    <div id="active-chips" class="active-chips">
      <span class="chip"><i class="fa-solid fa-car-side" style="font-size:.65rem"></i> <span data-i18n="filter.carona">Carona</span> <span class="chip-remove" onclick="removeChip(this)"><i class="fa-solid fa-xmark"></i></span></span>
      <span class="chip accent"><i class="fa-solid fa-bolt" style="font-size:.65rem"></i> <span data-i18n="filter.instant">Reserva Imediata</span> <span class="chip-remove" onclick="removeChip(this)"><i class="fa-solid fa-xmark"></i></span></span>
    </div>

    <!-- Tipo de viagem -->
    <div class="filter-card">
      <div class="filter-title">
        <span data-i18n="filter.type">Tipo de Viagem</span>
        <span class="filter-clear" data-i18n="filter.clear">Limpar</span>
      </div>
      <div class="filter-option">
        <input type="radio" name="tipo" id="t-all" checked/><label for="t-all" data-i18n="filter.all">Tudo</label><span class="filter-count">4</span>
      </div>
      <div class="filter-option">
        <input type="radio" name="tipo" id="t-carona"/><label for="t-carona" data-i18n="filter.carpool">Carona</label><span class="filter-count">4</span>
      </div>
      <div class="filter-option">
        <input type="radio" name="tipo" id="t-bus"/><label for="t-bus" data-i18n="filter.bus">Autocarro</label><span class="filter-count">0</span>
      </div>
    </div>

    <!-- Preço máximo -->
    <div class="filter-card">
      <div class="filter-title">
        <span data-i18n="filter.price">Preço Máximo</span>
      </div>
      <div class="range-wrap">
        <div class="range-labels">
          <span>500 Kz</span>
          <span id="price-label">3.000 Kz</span>
        </div>
        <input type="range" class="neu-range" min="500" max="8000" value="3000" step="100" id="price-range" oninput="updatePrice(this.value)"/>
      </div>
    </div>

    <!-- Horário -->
    <div class="filter-card">
      <div class="filter-title">
        <span data-i18n="filter.time">Horário de Partida</span>
      </div>
      <div class="filter-option"><input type="checkbox" id="h1" checked/><label for="h1" data-i18n="filter.morning">Manhã (06h–12h)</label><span class="filter-count">2</span></div>
      <div class="filter-option"><input type="checkbox" id="h2" checked/><label for="h2" data-i18n="filter.afternoon">Tarde (12h–18h)</label><span class="filter-count">2</span></div>
      <div class="filter-option"><input type="checkbox" id="h3"/><label for="h3" data-i18n="filter.night">Noite (18h–00h)</label><span class="filter-count">0</span></div>
    </div>

    <!-- Comodidades -->
    <div class="filter-card">
      <div class="filter-title">
        <span data-i18n="filter.amenities">Comodidades</span>
      </div>
      <div class="filter-option"><input type="checkbox" id="a1"/><label for="a1" data-i18n="filter.ac">Ar condicionado</label></div>
      <div class="filter-option"><input type="checkbox" id="a2"/><label for="a2" data-i18n="filter.luggage">Bagagem extra</label></div>
      <div class="filter-option"><input type="checkbox" id="a3"/><label for="a3" data-i18n="filter.animals">Animais permitidos</label></div>
      <div class="filter-option"><input type="checkbox" id="a4" checked/><label for="a4" data-i18n="filter.instant2">Reserva Imediata</label></div>
    </div>

    <!-- Avaliação mínima -->
    <div class="filter-card">
      <div class="filter-title"><span data-i18n="filter.rating">Avaliação Mínima</span></div>
      <div class="filter-option"><input type="radio" name="rating" id="r-all" checked/><label for="r-all" data-i18n="filter.any">Qualquer</label></div>
      <div class="filter-option"><input type="radio" name="rating" id="r4"/><label for="r4"><i class="fa-solid fa-star" style="color:var(--accent);font-size:.75rem"></i> 4+ estrelas</label></div>
      <div class="filter-option"><input type="radio" name="rating" id="r5"/><label for="r5"><i class="fa-solid fa-star" style="color:var(--accent);font-size:.75rem"></i> 4.5+ estrelas</label></div>
    </div>

  </aside>

  <!-- ══ RESULTS ═══════════════════════════════════════════════════ -->
  <section class="results-col">

    <!-- Header -->
    <div class="results-header">
      <div>
        <div class="results-title">
          <span class="results-count" id="count-num">4</span>
          <span data-i18n="results.title">viagens disponíveis</span>
        </div>
        <div class="results-meta" data-i18n="results.meta">Hoje · Talatona → Maianga, Luanda</div>
      </div>
      <div class="tab-bar">
        <button class="tab-btn active" data-tab="all" onclick="switchTab('all',this)">
          <i class="fa-solid fa-list"></i><span data-i18n="tab.all">Tudo</span> <span style="background:rgba(255,255,255,.2);border-radius:99px;padding:.05rem .35rem;font-size:.65rem">4</span>
        </button>
        <button class="tab-btn" data-tab="carona" onclick="switchTab('carona',this)">
          <i class="fa-solid fa-car-side"></i><span data-i18n="tab.carona">Carona</span> <span style="color:var(--muted);font-size:.65rem">4</span>
        </button>
        <button class="tab-btn" data-tab="bus" onclick="switchTab('bus',this)">
          <i class="fa-solid fa-bus"></i><span data-i18n="tab.bus">Autocarro</span> <span style="color:var(--muted);font-size:.65rem">0</span>
        </button>
      </div>
    </div>

    <!-- Sort bar -->
    <div class="sort-bar">
      <span class="sort-label" data-i18n="sort.label">Ordenar por:</span>
      <div class="sort-btns">
        <button class="sort-pill active" onclick="setSort(this)" data-i18n="sort.dep">Hora de partida</button>
        <button class="sort-pill" onclick="setSort(this)" data-i18n="sort.price">Preço</button>
        <button class="sort-pill" onclick="setSort(this)" data-i18n="sort.duration">Duração</button>
        <button class="sort-pill" onclick="setSort(this)" data-i18n="sort.rating">Avaliação</button>
      </div>
    </div>

    <!-- ─ Trip cards ─────────────────────────────────────────────── -->

    <!-- Card 1 — Featured -->
    <div class="trip-card featured" onclick="openBooking(1)">
      <div class="featured-label"><i class="fa-solid fa-bolt"></i> <span data-i18n="card.instant">Reserva Imediata</span></div>
      <div class="trip-card-inner">
        <div class="trip-route-row">
          <div style="text-align:right">
            <div class="trip-time">07:30</div>
            <div class="trip-place">Talatona</div>
          </div>
          <div class="route-line-wrap">
            <div class="route-dot-from"></div>
            <div class="route-line"></div>
            <div class="trip-duration">0h30</div>
            <div class="route-line" style="background:linear-gradient(90deg,var(--accent),var(--accent));opacity:.5"></div>
            <div class="route-dot-to"></div>
          </div>
          <div>
            <div class="trip-time">08:00</div>
            <div class="trip-place">Maianga</div>
          </div>
          <div class="trip-price">1.400<span class="trip-price-cur">Kz</span></div>
        </div>
        <div class="trip-driver-row">
          <div class="driver-info">
            <div class="driver-verified">
              <div class="driver-avatar-placeholder">DC</div>
              <div class="verified-badge"><i class="fa-solid fa-check" style="font-size:.4rem"></i></div>
            </div>
            <div>
              <div class="driver-name">Domingos Carvalho</div>
              <div class="driver-rating"><i class="fa-solid fa-star"></i> 4.9 <span style="margin-left:.15rem">(127 <span data-i18n="card.trips">viagens</span>)</span></div>
            </div>
          </div>
          <div class="trip-tags">
            <span class="tag blue"><i class="fa-solid fa-bolt" style="font-size:.55rem"></i> <span data-i18n="tag.instant">Imediato</span></span>
            <span class="tag green"><i class="fa-solid fa-snowflake" style="font-size:.55rem"></i> AC</span>
            <span class="tag"><i class="fa-solid fa-car-side" style="font-size:.55rem"></i> Toyota</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="trip-card" onclick="openBooking(2)">
      <div class="trip-card-inner">
        <div class="trip-route-row">
          <div style="text-align:right">
            <div class="trip-time">09:00</div>
            <div class="trip-place">Talatona</div>
          </div>
          <div class="route-line-wrap">
            <div class="route-dot-from"></div>
            <div class="route-line"></div>
            <div class="trip-duration">0h35</div>
            <div class="route-line" style="background:linear-gradient(90deg,var(--accent),var(--accent));opacity:.5"></div>
            <div class="route-dot-to"></div>
          </div>
          <div>
            <div class="trip-time">09:35</div>
            <div class="trip-place">Maianga</div>
          </div>
          <div class="trip-price">1.600<span class="trip-price-cur">Kz</span></div>
        </div>
        <div class="trip-driver-row">
          <div class="driver-info">
            <div class="driver-verified">
              <div class="driver-avatar-placeholder" style="background:linear-gradient(135deg,#d97706,#f59e0b)">MA</div>
              <div class="verified-badge"><i class="fa-solid fa-check" style="font-size:.4rem"></i></div>
            </div>
            <div>
              <div class="driver-name">Manuel António</div>
              <div class="driver-rating"><i class="fa-solid fa-star"></i> 5.0 <span style="margin-left:.15rem">(88 <span data-i18n="card.trips">viagens</span>)</span></div>
            </div>
          </div>
          <div class="trip-tags">
            <span class="tag green"><i class="fa-solid fa-snowflake" style="font-size:.55rem"></i> AC</span>
            <span class="tag orange"><i class="fa-solid fa-suitcase" style="font-size:.55rem"></i> <span data-i18n="tag.luggage">Bagagem</span></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="trip-card" onclick="openBooking(3)">
      <div class="trip-card-inner">
        <div class="trip-route-row">
          <div style="text-align:right">
            <div class="trip-time">12:40</div>
            <div class="trip-place">Talatona</div>
          </div>
          <div class="route-line-wrap">
            <div class="route-dot-from"></div>
            <div class="route-line"></div>
            <div class="trip-duration">0h40</div>
            <div class="route-line" style="background:linear-gradient(90deg,var(--accent),var(--accent));opacity:.5"></div>
            <div class="route-dot-to"></div>
          </div>
          <div>
            <div class="trip-time">13:20</div>
            <div class="trip-place">Maianga</div>
          </div>
          <div class="trip-price">1.800<span class="trip-price-cur">Kz</span></div>
        </div>
        <div class="trip-driver-row">
          <div class="driver-info">
            <div class="driver-verified">
              <div class="driver-avatar-placeholder" style="background:linear-gradient(135deg,var(--success),#4ade80)">RF</div>
              <div class="verified-badge"><i class="fa-solid fa-check" style="font-size:.4rem"></i></div>
            </div>
            <div>
              <div class="driver-name">Rosa Figueiredo</div>
              <div class="driver-rating"><i class="fa-solid fa-star"></i> 4.8 <span style="margin-left:.15rem">(62 <span data-i18n="card.trips">viagens</span>)</span></div>
            </div>
          </div>
          <div class="trip-tags">
            <span class="tag blue"><i class="fa-solid fa-bolt" style="font-size:.55rem"></i> <span data-i18n="tag.instant">Imediato</span></span>
            <span class="tag"><i class="fa-solid fa-car" style="font-size:.55rem"></i> Honda</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="trip-card" onclick="openBooking(4)">
      <div class="trip-card-inner">
        <div class="trip-route-row">
          <div style="text-align:right">
            <div class="trip-time">16:00</div>
            <div class="trip-place">Talatona</div>
          </div>
          <div class="route-line-wrap">
            <div class="route-dot-from"></div>
            <div class="route-line"></div>
            <div class="trip-duration">1h00</div>
            <div class="route-line" style="background:linear-gradient(90deg,var(--accent),var(--accent));opacity:.5"></div>
            <div class="route-dot-to"></div>
          </div>
          <div>
            <div class="trip-time">17:00</div>
            <div class="trip-place">Maianga</div>
          </div>
          <div class="trip-price">2.300<span class="trip-price-cur">Kz</span></div>
        </div>
        <div class="trip-driver-row">
          <div class="driver-info">
            <div class="driver-verified">
              <div class="driver-avatar-placeholder" style="background:linear-gradient(135deg,#7c3aed,#a855f7)">JN</div>
              <div class="verified-badge"><i class="fa-solid fa-check" style="font-size:.4rem"></i></div>
            </div>
            <div>
              <div class="driver-name">Jorge Neto</div>
              <div class="driver-rating"><i class="fa-solid fa-star"></i> 4.7 <span style="margin-left:.15rem">(45 <span data-i18n="card.trips">viagens</span>)</span></div>
            </div>
          </div>
          <div class="trip-tags">
            <span class="tag green"><i class="fa-solid fa-snowflake" style="font-size:.55rem"></i> AC</span>
            <span class="tag orange"><i class="fa-solid fa-suitcase" style="font-size:.55rem"></i> <span data-i18n="tag.luggage">Bagagem</span></span>
            <span class="tag"><i class="fa-solid fa-music" style="font-size:.55rem"></i> <span data-i18n="tag.music">Música</span></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Empty state (hidden by default) -->
    <div class="empty-state" id="empty-state">
      <div class="empty-icon"><i class="fa-solid fa-car-on"></i></div>
      <div class="empty-title" data-i18n="empty.title">Sem viagens disponíveis</div>
      <div class="empty-sub" data-i18n="empty.sub">Tente ajustar os filtros ou escolha uma data diferente para encontrar boleias disponíveis.</div>
    </div>

  </section>

  <!-- ══ MAP + INFO ════════════════════════════════════════════════ -->
  <aside class="map-col">

    <!-- MAP CARD -->
    <div class="map-card">
      <div class="map-header">
        <span class="map-title"><i class="fa-solid fa-map-location-dot" style="color:var(--blue);margin-right:.45rem"></i><span data-i18n="map.title">Rota no Mapa</span></span>
        <span style="font-size:.72rem;color:var(--muted)">Luanda, Angola</span>
      </div>
      <iframe
        class="map-frame"
        id="map-frame"
        src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31502.21!2d13.2543!3d-8.8368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x1a51f4c4e2a4a4a5%3A0x1a51f4c4e2a4a4a5!2sTalatona%2C+Luanda%2C+Angola!3m2!1d-8.9167!2f13.1833!4m5!1s0x1a51f5a77d1f6e4b%3A0x1a51f5a77d1f6e4b!2sMaianga%2C+Luanda%2C+Angola!3m2!1d-8.8097!2d13.2297!5e0!3m2!1spt!2sao!4v1722000000000!5m2!1spt!2sao"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Mapa da rota Talatona → Maianga">
      </iframe>
    </div>

    <!-- ROUTE INFO -->
    <div class="info-card">
      <div class="info-row">
        <div class="info-icon"><i class="fa-solid fa-road"></i></div>
        <div>
          <div class="info-label" data-i18n="info.distance">Distância estimada</div>
          <div class="info-value">18 km</div>
        </div>
      </div>
      <div class="info-row">
        <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
        <div>
          <div class="info-label" data-i18n="info.duration">Duração média</div>
          <div class="info-value">30–60 min</div>
        </div>
      </div>
      <div class="info-row">
        <div class="info-icon"><i class="fa-solid fa-leaf"></i></div>
        <div>
          <div class="info-label" data-i18n="info.co2">CO₂ poupado por lugar</div>
          <div class="info-value" style="color:var(--success)">~2.8 kg</div>
        </div>
      </div>
      <div class="info-row" style="margin-bottom:0">
        <div class="info-icon"><i class="fa-solid fa-gas-pump"></i></div>
        <div>
          <div class="info-label" data-i18n="info.fuel">Poupança vs. carro solo</div>
          <div class="info-value" style="color:var(--accent)">~3.200 Kz / mês</div>
        </div>
      </div>
    </div>

    <!-- OFFER BANNER -->
    <div class="offer-banner">
      <div style="font-size:1.5rem">🚗</div>
      <div class="offer-banner-title" data-i18n="offer.title">Tem carro? Ofereça uma boleia!</div>
      <div class="offer-banner-sub" data-i18n="offer.sub">Cubra os custos de combustível e contribua para uma Luanda mais sustentável.</div>
      <button class="btn-accent-banner">
        <i class="fa-solid fa-plus"></i>
        <span data-i18n="offer.btn">Publicar Viagem</span>
      </button>
    </div>

  </aside>

</div>
<!-- END PAGE BODY -->

<!-- ─── BOOKING SIDE SHEET ─────────────────────────────────────── -->
<div class="booking-sheet" id="booking-sheet">
  <div class="booking-backdrop" onclick="closeBooking()"></div>
  <div class="booking-panel">
    <button class="booking-close" onclick="closeBooking()"><i class="fa-solid fa-xmark"></i></button>

    <div class="booking-title" data-i18n="book.title">Reservar Boleia</div>

    <!-- Trip summary -->
    <div class="booking-section">
      <div class="booking-section-title" data-i18n="book.trip">Viagem</div>
      <div style="background:var(--bg);box-shadow:var(--shadow-in);border-radius:12px;padding:1rem;display:flex;flex-direction:column;gap:.5rem">
        <div style="display:flex;align-items:center;justify-content:space-between">
          <span style="font-family:var(--font-head);font-size:1.1rem;font-weight:700;color:var(--text)" id="book-time">07:30 → 08:00</span>
          <span style="font-family:var(--font-head);font-size:1.1rem;font-weight:700;color:var(--blue)" id="book-price">1.400 Kz</span>
        </div>
        <div style="font-size:.78rem;color:var(--muted)">Talatona → Maianga &nbsp;•&nbsp; 0h30 &nbsp;•&nbsp; <i class="fa-solid fa-star" style="color:var(--accent)"></i> 4.9 Domingos C.</div>
      </div>
    </div>

    <!-- Nº de lugares -->
    <div class="booking-section">
      <div class="booking-section-title" data-i18n="book.seats">Nº de Lugares</div>
      <div class="seat-picker">
        <button class="seat-btn active" onclick="selectSeat(1,this)">1</button>
        <button class="seat-btn" onclick="selectSeat(2,this)">2</button>
        <button class="seat-btn" onclick="selectSeat(3,this)">3</button>
        <button class="seat-btn" onclick="selectSeat(4,this)">4</button>
      </div>
    </div>

    <!-- Passageiro -->
    <div class="booking-section">
      <div class="booking-section-title" data-i18n="book.passenger">Dados do Passageiro</div>
      <label class="form-label" data-i18n="book.name">Nome completo</label>
      <input type="text" class="neu-input" placeholder="Ex.: Amara Fernandes" data-i18n-placeholder="book.name_ph"/>
      <label class="form-label" data-i18n="book.phone">Telemóvel</label>
      <input type="tel" class="neu-input" placeholder="+244 9xx xxx xxx"/>
      <label class="form-label" data-i18n="book.note">Nota para o motorista <span style="color:var(--muted);font-weight:400">(opcional)</span></label>
      <textarea class="neu-input" rows="2" placeholder="Ex.: Estou no portão B do condomínio." style="resize:none;height:auto"></textarea>
    </div>

    <!-- Pagamento -->
    <div class="booking-section">
      <div class="booking-section-title" data-i18n="book.payment">Método de Pagamento</div>
      <div class="pay-methods">
        <div class="pay-method active" onclick="selectPay(this)">
          <div class="pay-icon" style="background:rgba(30,58,138,.1);color:var(--blue)"><i class="fa-solid fa-credit-card"></i></div>
          <div><div class="pay-name">Multicaixa Express</div><div class="pay-sub" data-i18n="pay.instant">Pagamento instantâneo</div></div>
          <input type="radio" class="pay-radio" name="pay" checked/>
        </div>
        <div class="pay-method" onclick="selectPay(this)">
          <div class="pay-icon" style="background:rgba(255,170,68,.12);color:#b45309"><i class="fa-solid fa-mobile-screen"></i></div>
          <div><div class="pay-name">Unitel Money</div><div class="pay-sub" data-i18n="pay.mobile">Pagamento por telemóvel</div></div>
          <input type="radio" class="pay-radio" name="pay"/>
        </div>
        <div class="pay-method" onclick="selectPay(this)">
          <div class="pay-icon" style="background:rgba(22,163,74,.1);color:var(--success)"><i class="fa-solid fa-wallet"></i></div>
          <div><div class="pay-name" data-i18n="pay.balance">Saldo CARPOOL</div><div class="pay-sub">12.400 Kz <span data-i18n="pay.available">disponíveis</span></div></div>
          <input type="radio" class="pay-radio" name="pay"/>
        </div>
      </div>
    </div>

    <!-- Price breakdown -->
    <div class="booking-section">
      <div class="booking-section-title" data-i18n="book.summary">Resumo de Preço</div>
      <div class="price-breakdown">
        <div class="price-row"><span data-i18n="book.base">Preço base (1 lugar)</span><span id="pb-base">1.400 Kz</span></div>
        <div class="price-row"><span data-i18n="book.fee">Taxa de serviço (5%)</span><span id="pb-fee">70 Kz</span></div>
        <div class="price-row total"><span data-i18n="book.total">Total</span><span class="price-total-val" id="pb-total">1.470 Kz</span></div>
      </div>
    </div>

    <button class="btn-confirm" onclick="confirmBooking()">
      <i class="fa-solid fa-check" style="margin-right:.5rem"></i>
      <span data-i18n="book.confirm">Confirmar Reserva</span>
    </button>

    <p style="font-size:.7rem;color:var(--muted);text-align:center;margin-top:.75rem;line-height:1.5">
      <span data-i18n="book.terms1">Ao reservar aceita os </span><a href="#" style="color:var(--blue)" data-i18n="book.terms2">Termos</a><span data-i18n="book.terms3"> e </span><a href="#" style="color:var(--blue)" data-i18n="book.terms4">Política de Privacidade</a>.
    </p>
  </div>
</div>

<!-- ─── JAVASCRIPT ─────────────────────────────────────────────── -->
<script>
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
</script>
</body>
</html>

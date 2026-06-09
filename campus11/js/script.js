//JavaScript

//data
const EVENTS = [
  { id: 1, name: 'HackFest 2026', cat: 'hackathon', lbl: 'Hackathon', date: 'Apr 20', venue: 'Seminar Hall A', seats: 35, total: 100, ico: '<img src="icons/laptop.png" class="icon-img" alt="💻"/>', bg: 'ev-p1', prize: '₹1,00,000', past: false },
  { id: 2, name: 'AI Workshop', cat: 'workshop', lbl: 'Workshop', date: 'Apr 25', venue: 'Lab Block 3', seats: 18, total: 60, ico: '<img src="icons/robot.png" class="icon-img" alt="🤖"/>', bg: 'ev-p2', prize: 'Certificate', past: false },
  { id: 3, name: 'Cultural Night', cat: 'cultural', lbl: 'Cultural', date: 'May 5', venue: 'Main Auditorium', seats: 80, total: 200, ico: '<img src="icons/masks.png" class="icon-img" alt="🎭"/>', bg: 'ev-p3', prize: '₹20,000', past: false },
  { id: 4, name: 'Robotics Expo', cat: 'technical', lbl: 'Technical', date: 'May 15', venue: 'Engineering Block', seats: 12, total: 100, ico: '<img src="icons/gear.png" class="icon-img" alt="⚙️"/>', bg: 'ev-p4', prize: '₹30,000', past: false },
  { id: 5, name: 'Inter-Dept Sports', cat: 'sports', lbl: 'Sports', date: 'May 25', venue: 'Sports Complex', seats: 50, total: 150, ico: '<img src="icons/trophy.png" class="icon-img" alt="🏆"/>', bg: 'ev-p5', prize: 'Trophy', past: false },
  { id: 6, name: 'Web Dev Bootcamp', cat: 'workshop', lbl: 'Workshop', date: 'Jun 5', venue: 'Lab 1', seats: 22, total: 40, ico: '<img src="icons/globe.png" class="icon-img" alt="🌐"/>', bg: 'ev-p6', prize: 'Certificate', past: false },
  { id: 7, name: 'HackFest 2025', cat: 'hackathon', lbl: 'Hackathon', date: 'Oct 2025', venue: 'Seminar Hall', seats: 0, total: 100, ico: '<img src="icons/laptop.png" class="icon-img" alt="💻"/>', bg: 'ev-p1', prize: '₹80,000', past: true },
  { id: 8, name: 'Sports Meet 2025', cat: 'sports', lbl: 'Sports', date: 'Dec 2025', venue: 'Sports Complex', seats: 0, total: 200, ico: '<img src="icons/trophy.png" class="icon-img" alt="🏆"/>', bg: 'ev-p5', prize: 'Multiple', past: true },
];

//router
function go(p) {
  window.location.href = "/campus/pages/" + p + ".php";
}
function closeMob() { document.getElementById('mob-menu').classList.remove('on'); }
function goFilter(cat) { go('events'); setTimeout(() => { filterEv(cat, document.querySelector(`.fb[data-f="${cat}"]`)); }, 80); }

//Theme
function toggleTheme() {
  const html = document.documentElement;
  const isDark = html.getAttribute('data-theme') === 'dark';
  html.setAttribute('data-theme', isDark ? 'light' : 'dark');
  localStorage.setItem('cp-theme', isDark ? 'light' : 'dark');
  toast(isDark ? '<img src="icons/sun.png" class="icon-img" alt="☀️"/> Light mode on' : '<img src="icons/moon.png" class="icon-img" alt="🌙"/> Dark mode on');
}
(function () {
  const saved = localStorage.getItem('cp-theme');
  if (saved) document.documentElement.setAttribute('data-theme', saved);
})();

//enent_Card
function evCard(e, actions = true) {
  const fill = Math.round(((e.total - e.seats) / e.total) * 100);
  const seatHtml = e.seats > 0
    ? `<div class="ev-seats"><img src="icons/green-dot.png" class="icon-img" alt="🟢"/> ${e.seats} seats left</div>`
    : `<div class="ev-seats full"><img src="icons/red-dot.png" class="icon-img" alt="🔴"/> Fully Booked</div>`;
  return `<div class="card ev-card" onclick="go('event-detail')">
    <div class="ev-poster" style="background-image: url('images/poster-${e.id}.jpg');">
      <span class="ev-date-tag">${e.date}</span>
      <div class="seat-progress"><div class="seat-fill" style="width:${fill}%"></div></div>
    </div>
    <div class="ev-body">
      <div class="ev-cat">${e.lbl}</div>
      <div class="ev-name"><img src="icons/event-${e.id}.png" class="icon-img" alt="${e.ico}"/> ${e.name}</div>
      <div class="ev-meta"><span><img src="icons/pin.png" class="icon-img" alt="📍"/> ${e.venue}</span>${e.prize ? `<span><img src="icons/trophy.png" class="icon-img" alt="🏆"/> ${e.prize}</span>` : ''}</div>
      ${seatHtml}
      ${actions ? `<div class="ev-actions"><button class="btn btn-p btn-sm" onclick="event.stopPropagation();go('register')"><span>Register</span></button><button class="btn btn-o btn-sm" onclick="event.stopPropagation();go('event-detail')"><span>Details</span></button></div>` : ''}
    </div>
  </div>`;
}

function renderHomeEvents() {
  const g = document.getElementById('home-ev-grid');
  if (!g) return;
  g.innerHTML = EVENTS.filter(e => !e.past).slice(0, 4).map(e => evCard(e)).join('');
}
function renderEventsPage() {
  renderFiltered('all');
  renderPast();
  buildCarousel();
  buildCalendar();
}
function renderFiltered(cat) {
  const g = document.getElementById('ev-page-grid');
  if (!g) return;
  g.innerHTML = EVENTS.filter(e => !e.past && (cat === 'all' || e.cat === cat)).map(e => evCard(e)).join('');
}
function renderPast() {
  const g = document.getElementById('past-grid');
  if (!g) return;
  g.innerHTML = EVENTS.filter(e => e.past).map(e => evCard(e, false)).join('');
}
function filterEv(cat, btn) {
  document.querySelectorAll('#filter-bar .fb').forEach(b => b.classList.remove('act'));
  if (btn) btn.classList.add('act');
  renderFiltered(cat);
}

//carousel
function buildCarousel() {
  const t = document.getElementById('car-track');
  if (!t) return;
  const items = [...EVENTS.filter(e => !e.past), ...EVENTS.filter(e => !e.past)];
  t.innerHTML = items.map(e => `
    <div class="car-item ${e.bg}" onclick="go('event-detail')">
      <div style="position:absolute;top:1rem;right:1rem;font-size:2rem;opacity:0.25">${e.ico}</div>
      <h4>${e.name}</h4><p>${e.date} · ${e.venue}</p>
    </div>`).join('');
}

//calender
const EV_DAYS = [5, 9, 12, 14, 17, 20, 22, 25, 28];
function buildCalendar() {
  const g = document.getElementById('cal-grid');
  if (!g) return;
  const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  let h = days.map(d => `<div class="cal-h">${d}</div>`).join('');
  for (let i = 0; i < 3; i++) h += `<div></div>`;
  for (let d = 1; d <= 30; d++) {
    const ev = EV_DAYS.includes(d), td = d === 10;
    h += `<div class="cal-d ${ev ? 'ev' : ''} ${td ? 'td' : ''}" ${ev ? 'onclick="go(\'event-detail\')"' : ''}>${d}${ev ? '<br/><span style="font-size:0.45rem;color:var(--a1)">●</span>' : ''}</div>`;
  }
  g.innerHTML = h;
}

//registration
function submitReg() {
  document.getElementById('reg-form').style.display = 'none';
  document.getElementById('reg-success').style.display = 'block';
  buildQR();
  toast('<img src="icons/party.png" class="icon-img" alt="🎉"/> Registered successfully!');
}
function resetReg() {
  document.querySelectorAll('#reg-form input, #reg-form select, #reg-form textarea').forEach(i => i.value = '');
}
function buildQR() {
  const b = document.getElementById('qr-box');
  if (!b) return;
  b.innerHTML = Array.from({ length: 100 }, () =>
    `<div class="qrc" style="background:${Math.random() > 0.5 ? '#000' : '#fff'}"></div>`).join('');
}

//Login
function switchTab(type, el) {
  document.querySelectorAll('.lt').forEach(t => t.classList.remove('act'));
  el.classList.add('act');
  document.querySelectorAll('.login-sec').forEach(s => s.classList.remove('act'));
  document.getElementById('ls-' + type).classList.add('act');
}
function loginAction(type) {
  if (type === 'student') { go('dashboard'); toast('<img src="icons/tech-person.png" class="icon-img" alt="👋"/> Welcome back, Arjun!'); }
  else { go('admin'); toast('<img src="icons/lock.png" class="icon-img" alt="🔐"/> Admin access granted!'); }
}

//CountDown
// ===== EVENT DETAIL COUNTDOWN =====

function startEventCountdown(eventDateString) {

  const target = new Date(eventDateString).getTime();

  function updateCountdown(){

    const now = new Date().getTime();
    const diff = target - now;

    const el = document.getElementById("countdown");
    if(!el) return;   // only runs on event-detail page

    if(diff <= 0){
      el.textContent = "Event Started";
      return;
    }

    const d = Math.floor(diff / (1000*60*60*24));
    const h = Math.floor((diff % (1000*60*60*24)) / (1000*60*60));
    const m = Math.floor((diff % (1000*60*60)) / (1000*60));
    const s = Math.floor((diff % (1000*60)) / 1000);

    el.textContent = `${d}d ${h}h ${m}m ${s}s`;
  }

  updateCountdown();
  setInterval(updateCountdown, 1000);
}

//toast
function toast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg; t.classList.add('on');
  setTimeout(() => t.classList.remove('on'), 3200);
}

//counters
let counted = false;
function animateCounters() {
  if (counted) return; counted = true;
  document.querySelectorAll('.stat-n[data-t]').forEach(el => {
    const target = +el.dataset.t;
    let cur = 0;
    const step = Math.ceil(target / 55);
    const t = setInterval(() => {
      cur = Math.min(cur + step, target);
      el.textContent = cur + (target === 98 ? '%' : '+');
      if (cur >= target) clearInterval(t);
    }, 28);
  });
}

//scroll_reveal
function initReveal() {
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); obs.unobserve(e.target); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
  // counter trigger
  const statsEl = document.querySelector('.stats-sec');
  if (statsEl) {
    const so = new IntersectionObserver(e => { if (e[0].isIntersecting) animateCounters(); }, { threshold: 0.3 });
    so.observe(statsEl);
  }
}

//init
renderHomeEvents();
initReveal();
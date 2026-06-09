<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>MMCOE Events</title>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>

  <!--toast-->
  <div id="toast">✓ Done!</div>


  <?php include "includes/header.php"; ?>

  <!--Home Page-->
  <div id="pg-home" class="pg on">

    <!--hero section-->
    <section id="hero">
      <div class="orb-bg o1"></div>
      <div class="orb-bg o2"></div>
      <div class="orb-bg o3"></div>
      <div class="hero-inner">
        <div>
          <p class="hero-tag">✦ The Future of Campus Life ✦</p>
          <h1 class="hero-h">College<br /><span class="grad">Event</span><br />Management<br /><span
              style="font-size:0.48em;color:var(--text2);font-weight:400;letter-spacing:-0.01em">System</span></h1>
          <p class="hero-p">Discover, register, and experience the best hackathons, workshops, cultural programs, and
            sports competitions — all in one electrifying platform.</p>
          <div class="hero-btns">
            <button class="btn btn-p" onclick="go('events')"><span>Explore Events</span></button>
            <button class="btn btn-o" onclick="go('register')"><span>Register Now</span></button>
          </div>
          <div class="hero-stats">
            <div class="hs"><span class="hs-n">50+</span><span class="hs-l">Events</span></div>
            <div class="hs"><span class="hs-n">2K+</span><span class="hs-l">Students</span></div>
            <div class="hs"><span class="hs-n">15+</span><span class="hs-l">Clubs</span></div>
            <div class="hs"><span class="hs-n">98%</span><span class="hs-l">Satisfaction</span></div>
          </div>
        </div>



        <div class="hero-visual">
          <div class="h3d-main">
            <video autoplay muted loop playsinline class="h3d-bg-video">
              <source src="Fests.mp4" type="video/mp4">
            </video>
          </div>
        </div>

    </section>

    <!--countdown bar-->
    <div class="cd-bar">
      <span class="cd-label"> HackFest 2026 starts in</span>
      <div class="cd-units">
        <div class="cd-unit"><span class="cd-n" id="cdD">00</span><span class="cd-l">Days</span></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><span class="cd-n" id="cdH">00</span><span class="cd-l">Hrs</span></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><span class="cd-n" id="cdM">00</span><span class="cd-l">Min</span></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><span class="cd-n" id="cdS">00</span><span class="cd-l">Sec</span></div>
      </div>
      <button class="btn btn-r btn-sm" style="margin-left:auto" onclick="go('event-detail')"><span>Register Now →</span></button>
    </div>

    <!--about the college-->
    <section class="sec">
      <div class="w">
        <div class="about-grid">
          <div class="reveal">
            <p class="sec-tag">About the Platform</p>
            <h2 class="sec-h">Empowering Campus <span class="grad">Excellence</span></h2>
            <p class="sec-sub">This platform helps students explore, register, and participate in college events such as
              hackathons, workshops, cultural programs, and competitions — all seamlessly managed.</p>
            <div class="feat-list">
              <div class="feat-item">
                <div class="feat-ico"><img src="https://png.pngtree.com/png-clipart/20200224/original/pngtree-light-bulb-logo-new-idea-symbol-and-icon-flat-bright-cartoon-png-image_5212484.jpg" class="icon-img" alt="🎯" /></div>
                <div class="feat-txt">
                  <h4>Smart Discovery</h4>
                  <p>Browse events by category, date, club or department with powerful filters.</p>
                </div>
              </div>
              <div class="feat-item">
                <div class="feat-ico"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWc1ZzCrayKJ0jATVFhX_DII3PEL_jU_6Umw&s" class="icon-img" alt="img" /></div>
                <div class="feat-txt">
                  <h4>Instant Registration</h4>
                  <p>Register in seconds with auto-generated QR entry passes sent instantly.</p>
                </div>
              </div>
              <div class="feat-item">
                <div class="feat-ico"><img src="https://png.pngtree.com/png-clipart/20210310/original/pngtree-live-streaming-icons-red-symbols-and-buttons-of-png-image_5954160.jpg" class="icon-img" alt="img" /></div>
                <div class="feat-txt">
                  <h4>Live Tracking</h4>
                  <p>Real-time seat availability, event countdowns, and smart reminders.</p>
                </div>
              </div>
              <div class="feat-item">
                <div class="feat-ico"><img src="https://png.pngtree.com/png-vector/20210829/ourmid/pngtree-iso-27001-certified-luxury-badge-award-vector-png-image_3838054.jpg" class="icon-img" alt="img" /></div>
                <div class="feat-txt">
                  <h4>Digital Certificates</h4>
                  <p>Download verified certificates for every event you participate in.</p>
                </div>
              </div>
            </div>
          </div>
          <!--
          <div class="reveal cube-scene">
            <div style="position:relative">
              <div class="cube-ring">
                <div class="ring-dot"></div>
              </div>
              <div class="cube-wrap">
                <div class="face fr"><img src="icons/grad-cap.png" class="icon-img" alt="" /></div>
                <div class="face bk"><img src="icons/trophy.png" class="icon-img" alt="" /></div>
                <div class="face rt"><img src="icons/laptop.png" class="icon-img" alt="" /></div>
                <div class="face lt"><img src="icons/masks.png" class="icon-img" alt="" /></div>
                <div class="face tp"><img src="icons/gear.png" class="icon-img" alt="" /></div>
                <div class="face bt"><img src="icons/tools.png" class="icon-img" alt="" /></div>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </section>

    <!--upcoming events preview-->
    <section class="sec" style="padding-top:0">
      <div class="w">
        <div class="reveal">
          <p class="sec-tag">What's On</p>
          <h2 class="sec-h">Upcoming <span class="grad">Events</span></h2>
        </div>
        <div class="events-grid" id="home-ev-grid"></div>
        <div style="text-align:center;margin-top:2.5rem"><button class="btn btn-o" onclick="go('events')"><span>View All
            Events →</span></button></div>
      </div>
    </section>

    <!--categories-->
    <section class="sec" style="padding-top:0">
      <div class="w">
        <div class="reveal">
          <p class="sec-tag">Browse by Type</p>
          <h2 class="sec-h">Event <span class="grad">Categories</span></h2>
        </div>
        <div class="cat-grid">
          <div class="cat-card reveal" onclick="goFilter('hackathon')"><span class="cat-ico"><img src="hackathon_catego.jpg"
                class="icon-img"  /></span>
            <div class="cat-name">Hackathons</div>
            <div class="cat-cnt">8 Events</div>
          </div>
          <div class="cat-card reveal" onclick="goFilter('workshop')"><span class="cat-ico"><img src="workshop_catego.jpg"
                class="icon-img"  /></span>
            <div class="cat-name">Workshops</div>
            <div class="cat-cnt">12 Events</div>
          </div>
          <div class="cat-card reveal" onclick="goFilter('cultural')"><span class="cat-ico"><img src="cultural_catego.jpg"
                class="icon-img" /></span>
            <div class="cat-name">Cultural</div>
            <div class="cat-cnt">6 Events</div>
          </div>
          <div class="cat-card reveal" onclick="goFilter('technical')"><span class="cat-ico"><img src="technical_catego.jpg"
                class="icon-img"  /></span>
            <div class="cat-name">Technical</div>
            <div class="cat-cnt">10 Events</div>
          </div>
          <div class="cat-card reveal" onclick="goFilter('sports')"><span class="cat-ico"><img src="sports_catego.jpg"
                class="icon-img"  /></span>
            <div class="cat-name">Sports</div>
            <div class="cat-cnt">5 Events</div>
          </div>
        </div>
      </div>
    </section>

    <!--Gallery preview-->
    <section class="sec" style="padding-top:0">
      <div class="w">
        <div class="reveal">
          <p class="sec-tag">Memories</p>
          <h2 class="sec-h">Event <span class="grad">Gallery</span></h2>
        </div>
        <div class="gal-grid reveal">
          <div class="gi big">
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&q=80"
              class="gal-img" alt="Graduation 2025" />
            <div class="gi-ov"><span class="gi-lbl">Graduation 2025</span></div>
          </div>
          <div class="gi">
            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&q=80"
              class="gal-img" alt="HackFest 2025" />
            <div class="gi-ov"><span class="gi-lbl">HackFest 2025</span></div>
          </div>
          <div class="gi">
            <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&q=80"
              class="gal-img" alt="Sports Meet" />
            <div class="gi-ov"><span class="gi-lbl">Sports Meet</span></div>
          </div>
          <div class="gi wide">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80"
              class="gal-img" alt="Cultural Night" />
            <div class="gi-ov"><span class="gi-lbl">Cultural Night</span></div>
          </div>
          <div class="gi">
            <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&q=80"
              class="gal-img" alt="Workshop Day" />
            <div class="gi-ov"><span class="gi-lbl">Workshop Day</span></div>
          </div>
          <div class="gi">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&q=80"
              class="gal-img" alt="TechFest 2025" />
            <div class="gi-ov"><span class="gi-lbl">TechFest 2025</span></div>
          </div>
        </div>
        <div style="text-align:center;margin-top:2rem"><button class="btn btn-o btn-sm" onclick="go('gallery')"><span>Full
            Gallery →</span></button></div>
      </div>
    </section>

    <!--staticts-->
    <div class="stats-sec">
      <div class="stats-inner">
        <div class="stat reveal"><span class="stat-n" data-t="50">0</span>
          <div class="stat-l">Events Organized</div>
        </div>
        <div class="stat reveal"><span class="stat-n" data-t="2000">0</span>
          <div class="stat-l">Registrations</div>
        </div>
        <div class="stat reveal"><span class="stat-n" data-t="15">0</span>
          <div class="stat-l">College Clubs</div>
        </div>
        <div class="stat reveal"><span class="stat-n" data-t="98">0</span>
          <div class="stat-l">Satisfaction %</div>
        </div>
      </div>
    </div>

    <!--Testemonies-->
    <section class="sec">
      <div class="w">
        <div class="reveal">
          <p class="sec-tag">Student Voices</p>
          <h2 class="sec-h">What They <span class="grad">Say</span></h2>
        </div>
        <div class="testi-grid">
          <div class="card testi reveal">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-q">"CampusPulse completely changed how I experience college life. Found my passion for AI
              through a workshop I discovered here. The registration was instant and the QR entry made check-in so
              smooth!"</p>
            <div class="testi-auth">
              <div class="tav" style="background:linear-gradient(135deg,var(--ev-p1,#000d33),#003399)"><img
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDTUzuydPS1_QvM703GnGiWJkN-E3u1FUQcQ&s" class="icon-img" alt="img" /></div>
              <div>
                <div class="ta-n">Arjun Sharma</div>
                <div class="ta-r">B.Tech CSE · 3rd Year</div>
              </div>
            </div>
          </div>
          <div class="card testi reveal">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-q">"The live seat availability saved me from missing the robotics expo. I love how the
              dashboard shows all my events in one place — and the certificate download is a total game-changer for my
              resume!"</p>
            <div class="testi-auth">
              <div class="tav" style="background:linear-gradient(135deg,#1a0033,#6600cc)"><img
                  src="https://i.pinimg.com/originals/fc/85/34/fc853485911f3e4c7a3696d6c5fd1683.jpg" class="icon-img" alt="img" /></div>
              <div>
                <div class="ta-n">Priya Patel</div>
                <div class="ta-r">BCA · 2nd Year</div>
              </div>
            </div>
          </div>
          <div class="card testi reveal">
            <div class="testi-stars">★★★★☆</div>
            <p class="testi-q">"As a faculty coordinator, the admin dashboard made managing 300+ hackathon registrations
              effortless. The export feature and approval workflow are exactly what our department needed. Highly
              recommended!"</p>
            <div class="testi-auth">
              <div class="tav" style="background:linear-gradient(135deg,#001a0d,#006633)"><img src="https://www.apetogentleman.com/wp-content/uploads/2018/06/male-models-lundqvist.jpg"
                  class="icon-img"  /></div>
              <div>
                <div class="ta-n">Prof. Rahul Iyer</div>
                <div class="ta-r">Faculty Coordinator</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include "includes/footer.php"; ?>
  </div>



  
  

  

  
  

  <!--login page- users can log in to their account to keep up with their activities-->
  
  <!--about Page-gives details about the college and the events held there-->
  

  <script src="js/script.js"></script>
</body>

</html>

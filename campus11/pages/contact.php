<?php include "../includes/header.php"; ?>

<!--Contact page-->

<div id="pg-contact" class="pg on">

<div class="pg-banner">
<p class="sec-tag" style="justify-content:center">Reach Out</p>
<h1 class="pg-banner-title">Contact <span class="grad">Us</span></h1>
<p class="pg-banner-sub">We'd love to hear from you</p>
</div>


<div class="contact-grid">

<!-- ================= LEFT SIDE ================= -->

<div class="card ci-block">

<div style="font-family:'Fira Code',monospace;font-size:0.72rem;color:var(--a1);letter-spacing:0.14em;text-transform:uppercase;margin-bottom:2rem">
Get In Touch
</div>

<div class="ci-item">
<div class="ci-ico"><img src="icons/pin.png" class="icon-img" /></div>
<div class="ci-t">
<h5>Address</h5>
<p>Marathwada Mitramandal College, Student Section, Ground Floor,<br>
Karvenagar, Pune 411004</p>
</div>
</div>

<div class="ci-item">
<div class="ci-ico"><img src="icons/phone.png" class="icon-img" /></div>
<div class="ci-t">
<h5>Phone</h5>
<p>+91 98765 43210<br>Mon to Sat, 10AM to 5PM</p>
</div>
</div>

<div class="ci-item">
<div class="ci-ico"><img src="https://png.pngtree.com/png-vector/20201109/ourmid/pngtree-email-icon-design-png-image_2413695.jpg" class="icon-img" /></div>
<div class="ci-t">
<h5>Email</h5>
<p>mmcoecollege@.edu.in</p>
</div>
</div>

<div class="ci-item">
<div class="ci-ico"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3hdK_EAdAMQDAGlULD6AELymdHkiTVoIpfQ&s" class="icon-img" /></div>
<div class="ci-t">
<h5>Office Hours</h5>
<p>Monday to Saturday · 9AM to 6PM IST</p>
</div>
</div>

<div class="map-box">
<div class="map-lines"></div>
<span style="font-size:2.5rem;position:relative;z-index:1">
<img src="icons/pin.png" class="icon-img" />
</span>
</div>

</div>



<!-- ================= RIGHT SIDE ================= -->

<form action="/campus/pages/send-message.php" method="POST">

<div class="card contact-form-card">

<div style="font-family:'Fira Code',monospace;font-size:0.72rem;color:var(--a1);letter-spacing:0.14em;text-transform:uppercase;margin-bottom:2rem">
Send a Message
</div>

<div class="fg">
<label>Full Name</label>
<input type="text" name="name" placeholder="Your name" required>
</div>

<div class="fg">
<label>Email</label>
<input type="email" name="email" placeholder="your@email.com" required>
</div>

<div class="fg">
<label>Subject</label>
<select name="subject">
<option>Event Registration Query</option>
<option>Organizing an Event</option>
<option>Sponsorship</option>
<option>Technical Support</option>
<option>Other</option>
</select>
</div>

<div class="fg">
<label>Message</label>
<textarea name="message" style="min-height:130px"
placeholder="Write your message here..." required></textarea>
</div>

<button type="submit" class="btn btn-p" style="width:100%">
<span>Send Message →</span>
</button>

</div>

</form>

</div>

</div>

<?php include "../includes/footer.php"; ?>
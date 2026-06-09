<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    $_SESSION["userid"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["role"] = $user["role"];

    if ($user["role"] == "admin") {
  header("Location: /campus/pages/admin-dashboard.php");
} else {
  header("Location: /campus/pages/dashboard.php");
}
exit();

  } else {
    echo "<script>alert('Invalid email or password');</script>";
  }
}
?>

<?php include "includes/header.php"; ?>


<!--login PaGe-->
<div id="pg-login" class="pg on"
     style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding-top:80px;">

  <div class="login-wrap">
    <div class="login-box">

      <div class="card login-card">

        <!--lgo-->
        <div style="text-align:center;margin-bottom:2rem">
          <div style="font-family:'Clash Display',sans-serif;
                      font-size:1.5rem;font-weight:700;
                      background:linear-gradient(135deg,var(--a1),var(--a3));
                      -webkit-background-clip:text;
                      -webkit-text-fill-color:transparent">
           MMCOE
          </div>

          <p style="font-size:0.85rem;color:var(--text2);margin-top:0.4rem">
            Sign in to your account
          </p>
        </div>


        <!--student login form-->
        <div class="login-sec act" id="ls-student">

          <form action="login.php" method="POST">

            <div class="fg">
              <label>Email Address</label>
              <input type="email"
                     name="email"
                     placeholder="student@college.edu.in"
                     required />
            </div>

            <div class="fg">
              <label>Password</label>
              <input type="password"
                     name="password"
                     placeholder="••••••••"
                     required />
            </div>

            <div style="display:flex;justify-content:space-between;
                        align-items:center;margin-bottom:1.5rem">

              <label style="display:flex;align-items:center;gap:0.5rem;
                            font-size:0.82rem;color:var(--text2);cursor:pointer">
                <input type="checkbox" style="accent-color:var(--a1)" />
                Remember me
              </label>

              <a style="font-size:0.82rem;color:var(--a1);cursor:pointer">
                Forgot password?
              </a>
            </div>

            <button type="submit"
                    class="btn btn-p"
                    style="width:100%;margin-bottom:1rem">
              <span>Sign In</span>
            </button>

          </form>

          <p style="text-align:center;font-size:0.82rem;color:var(--text2)">
            No account?
            <a href="/campus/register.php"
               style="color:var(--a1);cursor:pointer">
              Register here
            </a>
          </p>

        </div>

      </div>

    </div>
  </div>

</div>


<?php include "includes/footer.php"; ?>
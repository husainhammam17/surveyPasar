<style>
  .card-container {
    margin: auto auto auto auto;
  }

  form {
    width: 366px;
    height: 406px;
    flex-shrink: 0;
  }

  .card-body {
    background-color: #5F8671;
    border-radius: 10px;
    width: 366px;
    height: 406px;
    flex-shrink: 0;

  }

  .card-body h5 {
    color: #F0B736;
    text-align: center;
    font-family: "Inria Sans";
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin-top: 1rem;
    margin-bottom: 3rem;
  }

  .card-body #form-group {
    display: grid;
    grid-template-columns: 1fr 7fr;
    gap: 7px;
    margin-left: 1rem;
    margin-right: 1rem;
    margin-bottom: 1.5rem;
  }

  .card-body .form-group svg {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
  }

  .card-body .form-group input #username {
    width: 221px;
    height: 34px;
    flex-shrink: 0;
    border-radius: 5px;
    border: 1px solid #5F8671;
    background: #FFF;
  }

  .card-body .form-group input #password {
    width: 221px;
    height: 34px;
    flex-shrink: 0;
    border-radius: 5px;
    border: 1px solid #5F8671;
    background: #FFF;
  }

  .btn {
    width: 293px;
    height: 54px;
    flex-shrink: 0;
    background-color: #F0B736;
    color: #292627;
    text-align: center;
    font-family: "Inria Sans";
    font-size: 30px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin-top: 1rem;
  }

  .btn:hover {
    background-color: #FFF;
    color: #5F8671;
    border: solid 1px #5F8671;
  }

  .form-group a {
    color: #292627;
    margin-left: 6rem;
    margin-right: 5rem;
  }

  .card {
    border: none;
  }

  center {
    background-color: #5F8671;
    padding: 10px;
    border-radius: 10px;
  }

  .card h5 {
    text-align: center;
    color: #F0B736;
  }

  .card span a {
    width: 180px;
    background-color: #F0B736;
  }

  .card span a:hover {
    background-color: #FFF;
    color: #5F8671;
    border: solid 1px #5F8671;
  }
</style>
<div class="card-container col-md-4">

  <div class="card my-4">

    <?php if (isset($_SESSION['user_role'])) : ?>

      <center>
        <h5>Logged in as <?php echo $_SESSION['username']; ?></h5>
        <span class="input-group-btn text-center">
          <a href="includes/logout.php" class="btn">Logout</a>
        </span>
      </center>

    <?php else : ?>

      <form action="includes/login.php" method="POST">
        <div class="card-body">
          <h5>Username dan Password anda diperlukan untuk hal ini</h5>
          <div class="form-group" id="form-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
              <g clip-path="url(#clip0_7_342)">
                <path d="M16.9505 19.0594C21.9505 19.0594 25.9604 14.8376 25.9604 9.68912C25.9604 4.5406 21.9505 0.267334 16.9505 0.267334C11.9505 0.267334 7.94056 4.48912 7.94056 9.63763C7.94056 14.7861 11.9505 19.0594 16.9505 19.0594ZM16.9505 2.73862C20.6138 2.73862 23.5841 5.82773 23.5841 9.63763C23.5841 13.4475 20.6138 16.5366 16.9505 16.5366C13.2871 16.5366 10.3168 13.499 10.3168 9.68912C10.3168 5.87921 13.2871 2.73862 16.9505 2.73862ZM1.30689 33.7327H32.693C33.3366 33.7327 33.8811 33.1663 33.8811 32.497C33.8811 26.0099 28.7821 20.7069 22.5445 20.7069H11.4554C5.21778 20.7069 0.118774 26.0099 0.118774 32.497C0.118774 33.1663 0.663329 33.7327 1.30689 33.7327ZM11.4554 23.1782H22.5445C27.099 23.1782 30.8118 26.6792 31.4059 31.2614H2.59402C3.18808 26.6792 6.90095 23.1782 11.4554 23.1782Z" fill="#F0B736" />
              </g>
              <defs>
                <clipPath id="clip0_7_342">
                  <rect width="34" height="34" fill="white" />
                </clipPath>
              </defs>
            </svg>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group" id="form-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
              <g clip-path="url(#clip0_7_346)">
                <path d="M27.0657 0.223679L13.2096 14.0787C11.7057 13.6228 10.1158 13.5253 8.56746 13.7942C7.01909 14.063 5.55517 14.6907 4.29293 15.6269C3.03069 16.5631 2.00519 17.7819 1.29856 19.1856C0.591932 20.5893 0.223796 22.139 0.223633 23.7105C0.223633 26.3801 1.28413 28.9404 3.17183 30.8281C5.05954 32.7158 7.61981 33.7763 10.2894 33.7763C11.861 33.776 13.4107 33.4078 14.8144 32.701C16.2181 31.9942 17.4367 30.9686 18.3729 29.7062C19.309 28.4439 19.9365 26.9799 20.2052 25.4314C20.4739 23.883 20.3763 22.2931 19.9201 20.7892L22.5921 18.1184V15.8816H24.8289L33.7763 6.93421V0.223679H27.0657ZM31.5394 6.00703L23.9028 13.6447H20.3552V17.1912L18.3387 19.2066L17.3903 20.1551L17.7795 21.4379C18.0043 22.1783 18.1184 22.9422 18.1184 23.7105C18.1184 28.0276 14.6054 31.5395 10.2894 31.5395C5.97344 31.5395 2.46047 28.0276 2.46047 23.7105C2.46047 19.3934 5.97344 15.8816 10.2894 15.8816C11.0567 15.8816 11.8217 15.9957 12.5609 16.2193L13.8426 16.6085L14.7911 15.6601L27.9918 2.46052H31.5394V6.00703Z" fill="#F0B736" />
                <path d="M8.05264 28.1842C9.28801 28.1842 10.2895 27.1827 10.2895 25.9474C10.2895 24.712 9.28801 23.7105 8.05264 23.7105C6.81726 23.7105 5.8158 24.712 5.8158 25.9474C5.8158 27.1827 6.81726 28.1842 8.05264 28.1842Z" fill="#F0B736" />
                <path d="M22.1962 11.0131L28.9067 4.30257L29.6974 5.09329L22.9869 11.8038L22.1962 11.0131Z" fill="#F0B736" />
              </g>
              <defs>
                <clipPath id="clip0_7_346">
                  <rect width="34" height="34" fill="white" />
                </clipPath>
              </defs>
            </svg>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <center>
            <button name="login" class="btn" type="submit">Login</button>
          </center>
          <div class="form-group">
            <a href="forgot.php?forgot=<?php echo uniqid(true); ?>"> Forgot Password?</a>
          </div>
        </div>
      </form>

    <?php endif; ?>


  </div>

</div>

</div>
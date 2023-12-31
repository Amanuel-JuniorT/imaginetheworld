<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="images/imagine-the-world-low-resolution-logo-color-on-transparent-background.ico"
        type="image/x-icon">
    <link rel="stylesheet" href="css/styleForm.css">
    <link rel="stylesheet" href="css/stylePhone.css">
    <link rel="stylesheet" href="css/styleHeaderandFooter.css">
</head>

<body>
    <header>
        <nav>
            <input type="checkbox" id="bar">
            <label for="bar" id="sideBar">
      <svg width="46" height="46" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 8V6h20v2H2Zm0 3v2h20v-2H2Zm0 5v2h20v-2H2Z" clip-rule="evenodd"></path>
      </svg>
    </label>
            <div class="leftHeader">
                <p>IMAGINE THE WORLD</p>
            </div>
            <ul class="rightNavLists">
                <li><a href="index.html">Home</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="grants.html">Grants</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="bookonline.html">Book Online</a></li>
                <li><a href="blog.html">Blog</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <div class="formContainer">
            <form action="try333.php" method="POST" class="inputs" enctype="multipart/form-data">
                <h1>Register</h1>
                <?php if(isset($_GET['error'])) { ?> 
                            <button class="error" disabled autofocus><?php echo $_GET['error'];?></button>
                            <?php } ?>
                <div class="inputInfo">
                    <div>
                        <label for="fName">First Name</label>
                        <input type="text" id="fName" name="fName" >
                    </div>
                    <div>
                        <label for="lastName"  >Last Name</label>
                        <input type="text" id="lastName" name="lName" >
                    </div>
                    <div class="email">
                        <label for="email"  >E-Mail</label>
                        <input type="email" id="email" name="email"  autocomplete="email" >
                    </div>
                    <div>
                        <label for="dob"  >Date of Birth</label>
                        <input type="date" id="dob" name="dob"  >
                    </div>
                    <div>
                        <label for="phone"  >Phone</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"   autocomplete="mobile">
                    </div>
                    <div class="gender">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender"  >
            <option value="">-SELECT-</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
                    </div>
                    <div class="apply">
                        <label for="status">Apply for</label>
                        <select name="status" id="status"  >
            <option value="">-SELECT-</option>
            <option value="Degrees">Degrees</option>
            <option value="Associated Degrees">Associated Degrees</option>
            <option value="Masters">Masters</option>
            <option value="Internships">Internships</option>
            <option value="Training">Training</option>
          </select>
                        <!-- <div class="status">-Select-<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
          </svg></div>
          <ul id="status">
            <li class="dep">Degrees</li>
            <li class="dep">Masters</li>
            <li class="dep">Internships</li>
            <li class="dep">Training</li>
          </ul> -->
                    </div>
                    <div class="pageBreaker">
                        <h2>&#x2022; Files</h2>
                        <div class="help">
                            <p>1. Put your transcript from 9-12 in a single pdf.
                                <br>2. Put your front and back(if necessary) of your id in a single pdf.
                                <br>3. If you have passport put the front and back(if necessary) of your passport in a single pdf.
                                <br>4. Take a picture or screenshot of your transfer.
                                <br>
                                <strong>Whom to transfer?</strong>
                            <p>Bank: Commercial Bank of Ethiopia
                                <br>Account Holder:Top Hill Trading PLC
                                <br>Account Number:1000580721595
                            </p>
                          </div>
                          
                    </div>
                    <div>
                        <label for="file">Transcript 9-12</label>
                        <input type="file" name="transcript" accept=".pdf" data-accepted="application/pdf" placeholder="All files must be in .pdf format" >
                    </div>
                    <div>
                        <label for="file">Passport</label>
                        <input type="file" name="passport" accept=".pdf">
                    </div>
                    <div>
                        <label for="file">National ID</label>
                        <input type="file" name="id" accept=".pdf"  >
                    </div>
                    <div>
                        <label for="file">Transfer Receipt</label>
                        <input type="file" name="receipt" accept=".jpeg, .jpg, .webp"  >
                    </div>
                    <div class="deg">
                        <label for="file">Degree Certificate</label>
                        <input type="file" name="degree" accept=".jpeg, .jpg, .webp"  data-accepted="image/*">
                    </div>
                    <div class="pageBreaker">
                        <h2>&#x2022; Department</h2>
                    </div>
                    <div class="department">
                        <label for="department">Write the Department you want to apply for</label>
                        <textarea name="department" id="department" cols="" rows="5" placeholder="eg. -Computer Science"  ></textarea>
                    </div>
                </div>
                <input type="submit" name="submit">
            </form>
        </div>
    </main>
    <footer>
        <div class="footerContent">
            <p>IMAGINE THE WORLD</p>
            <p>imaginetheworldorg@gmail.com</p>
            <p>©2023 by Imagine The World</p>
        </div>
    </footer>
    <script>
        const dep = document.querySelectorAll('.dep');
      const selected = document.querySelector('.status');
      const choice = document.querySelector('#status');
      const show = document.querySelector('.helpInfo');
      const help = document.querySelector('.help');
      const main = document.querySelector('.main');
      const deg = document.querySelector('.deg');

      choice.addEventListener('change', ()=>{
        if(choice.value == "Masters"){
            deg.style.display = "block";
            main.classList.add('inlarge');
        }
        else{
            deg.style.display = "none";
            main.classList.remove('inlarge');
        }
      })
      

      show.addEventListener('click', ()=>{
        show.classList.toggle('show');
        help.classList.toggle('show');
        main.classList.toggle('inlarge');

        setTimeout(function(){
          help.classList.remove('show');
          main.classList.remove('inlarge');
          show.classList.add('show');
        }, 15000);
      })

      




      choice.style.width = selected.clientWidth + "px";
      
      dep.forEach((li)=>{
        li.addEventListener('click',()=>{
          selected.innerText = li.innerText;
          selected.classList.remove('active')
        })
        li.style.width = selected.style.width;

      })

      selected.addEventListener('click', ()=>{
        selected.classList.toggle('active')
      })
      
    </script>
</body>

</html>
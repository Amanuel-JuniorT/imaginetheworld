<?php
$firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $body = '';

  $to = "amanueltzb@gmail.com";
  $headers = "From: " . $email . "\r\n";
  $body .= "Name: $firstName $lastName \r\n";
  $body .= "Phone: $phone \r\n";
  //$body .= "Name: $firstName $lastName \r\n";
  
  //mail($to, $headers, $body);

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/styleForm.css">
  <link rel="stylesheet" href="css/stylePhone.css">
</head>
<body>
  <form action="form.php" method="POST" class="inputs">
    <h1>Register</h1>
    <div class="inputInfo">
      <div>
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" required>  
      </div>
      <div>
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" required>  
      </div>
      <div>
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" required autocomplete="email">  
      </div>
      <!-- <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>  
      </div> -->
      <div>
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" required autocomplete="mobile">  
      </div>
      <div class="apply">
        <label for="status">Apply for</label>
        <select name="status" id="status">
          <option value="">Hello</option>
          <option value="">Hello</option>
          <option value="">Hello</option>
          <option value="">Hello</option>
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
      <div>
        <label for="file">Transcript 9-12</label>
        <input type="file" name="transcript" accept="application/pdf" placeholder="All files must be in .pdf format">
      </div>
      <div>
        <label for="file">Passport and National ID</label>
        <input type="file" name="id" accept="application/pdf">
      </div>
    </div>
    <input type="submit">
</form>
      <script>
      
      const dep = document.querySelectorAll('.dep');
      const selected = document.querySelector('.status');
      const choice = document.querySelector('#status');
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
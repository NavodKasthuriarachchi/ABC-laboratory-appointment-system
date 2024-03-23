<!DOCTYPE html>
<html>
  <head>
    <title>Certificate Generator</title>
    <style>
      /* Add custom styles here */
      body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
      }
      form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      input[type="text"], input[type="date"], input[type="number"], textarea, select, button[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
      }
      textarea {
        height: 100px;
        resize: vertical;
      }
      button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
      }
      button[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <form method="post" action="generate_certificate.php">
      Full Name:
      <input type="text" name="name" placeholder="Enter your full name" required>
      <br>
      Age:
      <input type="number" name="age" min="0" max="150" placeholder="Enter your age" required>
      <br>
      Test:
      <input type="text" name="course" placeholder="Enter test/course name" required>
      <br>
      Date:
      <input type="date" name="date" required>
      <br>
      Technician's Name:
      <input type="text" name="technician" placeholder="Enter technician's name" required>
      <br>
      Test Results:
      <select name="results" required>
        <option value="" disabled selected>Select test results</option>
        <option value="Low">Low</option>
        <option value="Normal">Normal</option>
        <option value="Risky">Risky</option>
        <option value="Bad">Bad</option>
      </select>
      <br>
      Comments:
      <textarea name="comments" placeholder="Enter any comments"></textarea>
      <br>
      <button type="submit">Generate</button>
    </form>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Artefakt</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>
  <body>
    <form method="post">
      <input type="text" name="searchbar" id="searchbar" value="" />
      <button type="submit" name="searchbt" id="searchbt">
    </form>
    <div id="sparning"> 
      <?php
        include "Redis-php";
      ?> 
       <script>
        //Saves responsetimes to localstorage
        /*var searchInput = document.getElementById("q");
        if (iteration > times) {
          running = false;
          localStorage.setItem('search_running', false);
          console.log(JSON.parse(localStorage.getItem('search_result')))
          var arr = new Array();
          JSON.parse(localStorage.getItem('search_result')).forEach(x => {
                arr.push(x['time']);*/
      </script>
    </div>
    <div id="publiserare">
      <form method="post"> Rubrik: <input type="text" id="rubrikinput" placeholder="Rubrik">
        <br> Underrubrik <input type="text" id="underrubrikinput" placeholder="Underrubrik">
        <br> Brödtext <input type="text" id="textinput" placeholder="Brödtext">
        <br> Författare <input type="text" id="forfattareinput" placeholder="Författare">
        <br>
        <button id="Publisera" type="submit" name="publisera">Publisera</button>
        <button id="Radera" type="submit" name="radera">Radera</button>
      </form>
    </div>
    <h1>Welcome to My Website</h1>
  </body>
</html>
console.log('ok');
function sendXML(){
  console.log('reok');
  const email = document.getElementById('email').value;
  if(email.length > 0) {
       const request = new XMLHttpRequest();
       request.open('POST', 'sendxmlmail.php');
       request.onreadystatechange = function() {
         if(request.readyState === 4) { // la requete est terminée
           const res = parseInt(request.responseText);
           if(res === 1) {
             alert('email sent');
           } else {
             alert('error');
           }
         }
       };
       request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // type du body [obligatoire pour du POST]
       request.send(`email=${email}`);
  } else {
    alert('email non valide');
  }
}
function searchAll(){
  const search = document.getElementById('search').value;
  if(search.length > 0) {
    const path = 'search.php?search=' + search;
    const request = new XMLHttpRequest();
    request.open('GET', path);
    request.onreadystatechange = function() {
      if(request.readyState === 4) { // la requete est terminée
        const searchresults = document.getElementById('searchresults');
        searchresults.innerHTML = request.responseText;
      }
    };
    request.send();
  } else {
    alert('email non valide');
  }
}
function displayAvailibility(){
  const request = new XMLHttpRequest();
  const date = toString(document.getElementById('date').value);
  const roomarray = document.getElementsByClassName('room');
  const room = roomarray[0].value;
  const path = 'rooms_process.php?room=' + room + '&date=' + date;
  request.open('GET', path);
  request.onreadystatechange = function() {
    if(request.readyState === 4) { // la requete est terminée
      const results = document.getElementById('results');
      results.innerHTML = request.responseText;
    }
  };
  request.send();
}
function bookRoom(timeslotid){
  const timeslot = document.getElementById(timeslotid);
  timeslot.innerHTML = 'réservé par vous !';
    alert("C'est fait !");
}

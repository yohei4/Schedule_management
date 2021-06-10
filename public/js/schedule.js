function checkdiv( obj,id ) {
  if( obj.checked ){
  document.getElementById(id).style.display = "none";
  }
  else {
  document.getElementById(id).style.display = "block";
    }
  }
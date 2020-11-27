function mafonction(){
                
    Swal.fire("Mauvais identifiant ou mot de passe");
    
  };

 function ClickPrix(){
  var click = document.getElementById("Check");
  var input = document.getElementById("Prix");
  if(click.checked){
    input.disabled = true;
  }else{
    input.disabled = false;
  }

 }
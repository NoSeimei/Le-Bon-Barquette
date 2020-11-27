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
  
   };
  function RedirectionJavascript(){
    document.location.href="login.php"; 
  };
  function mafonction2(){
                
    Swal.fire("identifiant déjà utilisé!");
    
  };
  function validation(){
                
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
      })
    };
      function mafonction3(){
                
        Swal.fire("les deux champs mot de passe doivent être égaux!");
        
      };
    
 

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
        title: "c'est un succés"
      })
    };
      function mafonction3(){
                
        Swal.fire("les deux champs mot de passe doivent être égaux!");
        
      };
      function verif(){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
          title: 'êtes vous sûre?',
          text: "vous ne pourrez pas retourner en arrière!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Oui, modifier!',
          cancelButtonText: 'Non, annuler!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              'modifier!',
              'le client a été modifié.',
              'succès'
            );
            var form = document.getElementById("insc");
            form.submit()
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'action avortée',
              'vos données sont intactes :)'
              
            )
          }
        })
      }


      function verif2(IdClient){
        supp = document.getElementById("SuppClient");
       
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
          title: 'êtes vous sûre?',
          text: "le client pourra toujours être récupéré!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Oui, le supprimer!',
          cancelButtonText: 'Non, annuler!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              'effacé!',
              'le client a été modifié.',
              'succès'
            );
            // supp.href=`sup_Cli.php?iduser=${IdClient}`;
            supp.setAttribute("onclick", `location.href='sup_Cli.php?iduser=${IdClient}'`);
            supp.click();
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'annulé',
              'les données son intactes :)'
            )
          }
        })
      }
      
    
 

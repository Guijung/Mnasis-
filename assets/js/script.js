function checkUnavailability(input){
    //Instanciation de l'objet XMLHttpRequest permettant de faire de l'AJAX
    var request = new XMLHttpRequest();
    //Les données sont envoyés en POST et c'est le controlleur qui va les traiter
    request.open('POST', 'controllers/registerCtrl.php', true);
    //Au changement d'état de la demande d'AJAX
    request.onreadystatechange = function () {
        //Si on a bien fini de recevoir la réponse de PHP (4) et que le code retour HTTP est ok (200)
        if (request.readyState == 4 && request.status == 200) {
            if(request.responseText == 1){ //Dans le cas ou la valeur dans le champ est déjà en BDD
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }else if(request.responseText == 2){ //Dans le cas où le champ est vide
                input.classList.remove('is-valid','is-invalid');
            }else{ //Dans le cas ou la valeur dans le champ n'est pas en BDD
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
        };        
    }
    // Pour dire au serveur qu'il y a des données en POST à lire dans le corps
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    //Les données envoyées en POST. Elles sont séparées par un &
    request.send('fieldValue=' + input.value + '&fieldName=' + input.name);
}
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var resident = button.data('delete') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + resident)
    modal.find('.modal-body input').val(resident)
  })

  // Carousel
// Initialisations
var currentMessageIndex = 0;
// Recupère dans le document tous les élements de la div messages carousel-item
var items = document.querySelectorAll('.messages-carousel-item');
items[0].classList.add('active');

// Affiche un message tous les 5 secondes
setInterval(() => {
  currentMessageIndex++;
  // Modulo permet de cycler sur l'index
  currentMessageIndex = currentMessageIndex % items.length;
  for (var i = 0; i < items.length; i++) {
    var el = items[i];
    // Cache le message
    el.classList.remove('active');
    // Affiche le message correspondant à l'index courant
    if (i == currentMessageIndex) {
      el.classList.add('active');
    }
  }
}, 5000)

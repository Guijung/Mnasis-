// Modal suppression résident
$('#delete-resident-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Bouton supprimer qui a provoqué l'action
    var residentId = button.data('delete'); // Récupération de l'id du résident dans data-delete
    var residentLastname = button.data('lastname');
    var residentFirstname = button.data('firstname');
    document.getElementById('messageModal').innerHTML = 'Etes vous sur de vouloir supprimer ' + residentLastname + ' ' + residentFirstname + ' ?'; //Message dans la modal
    var modal = $(this);
    modal.find('input').val(residentId);
    console.log(residentId);
  })

// Modal suppression message
$('#delete-message-modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Bouton supprimer qui a provoqué l'action
  var messageId = button.data('delete'); // Récupération de l'id du message dans data-delete
  var author = button.data('author');
  document.getElementById('messageModal').innerHTML = 'Etes vous sur de vouloir supprimer le message de ' + author + ' ?'; //Message dans la modal
  var modal = $(this);
  modal.find('input').val(messageId);
})

// Carousel
// Recupère dans le document tous les élements de la div messages carousel-item
var items = document.querySelectorAll('.messages-carousel-item');

// si il y a un caroussel dans la page, on démarre le slideshow
if(items.length > 0) {
  // Initialisation
  var currentMessageIndex = 0;
  // Rend visible le premier message lors du chargement de la page
  items[currentMessageIndex].classList.add('active');

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
}

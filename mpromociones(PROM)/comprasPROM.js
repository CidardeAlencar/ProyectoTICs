document.addEventListener("DOMContentLoaded", function() {
  // Función para verificar si todos los campos de un cajón están rellenos
  function checkFields(sectionId) {
      let section = document.getElementById(sectionId);
      let allFieldsFilled = true;
      section.querySelectorAll('input, select').forEach(function(el) {
          if (el.value.trim() === '') {
              allFieldsFilled = false;
          }
      });
      return allFieldsFilled;
  }

  // Función para habilitar o deshabilitar el botón "Guardar" según los campos estén rellenos
  function toggleSaveButton(sectionId) {
      let section = document.getElementById(sectionId);
      let saveButton = section.querySelector('.save-button');
      if (checkFields(sectionId)) {
          saveButton.disabled = false;
      } else {
          saveButton.disabled = true;
      }
  }

  // Evento para comprobar los campos cada vez que se cambia el contenido de un campo
  document.querySelectorAll('.section').forEach(function(section) {
      section.addEventListener('input', function() {
          let sectionId = section.id;
          toggleSaveButton(sectionId);
      });
  });
});


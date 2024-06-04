document.addEventListener('DOMContentLoaded', function() {
  fetch('get_supplier.php')
    .then(response => response.json())
    .then(data => {
      document.getElementById('supplier-name').value = data.nombre;
      document.getElementById('supplier-contact').value = data.contacto;
      document.getElementById('supplier-telefono').value = data.telefono;
    })
    .catch(error => console.error('Error fetching supplier data:', error));
});
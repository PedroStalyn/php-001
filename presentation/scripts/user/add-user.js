const userForm = document.getElementById('userForm');
userForm.addEventListener('submit', (event) => {
  event.preventDefault(); 
  addUser(event);
});

async function addUser(event) {
    const nameUser = document.getElementById('nameUser').value;
    const lastnameUser = document.getElementById('lastnameUser').value;
    const photoUser = document.getElementById('photoUser');

    const file = photoUser.files[0];

   /* const fileInput = document.getElementById('imageInput');
    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('image', file);*/
  
    const formData = new FormData();
    formData.append('nameUser', nameUser);
    formData.append('lastnameUser', lastnameUser);
    formData.append('photoUser', file);
  
    try {
      const response = await fetch('http://localhost/php-001/businessLogic/swUser.php', {
        method: 'POST',
        body: formData
      });   
    } catch (error) {
      console.error('Error al agregar usuario:', error);
    }
  }
window.addEventListener('message', (event) => {
    const user = event.data;
    document.getElementById('idUser').value = user.idUser;
    document.getElementById('nameUser').value = user.nameUser;
    document.getElementById('lastnameUser').value = user.lastnameUser;
    document.getElementById('photoUser').value = user.photoUser;
  });
  
  async function updateUser(event) {
    event.preventDefault();
    
    const idUser = document.getElementById('idUser').value;
    const nameUser = document.getElementById('nameUser').value;
    const lastnameUser = document.getElementById('lastnameUser').value;
    const photoUser = document.getElementById('photoUser').value;

    const user = {
        idUser: idUser,
        nameUser: nameUser,
        lastnameUser: lastnameUser,
        photoUser: photoUser
    };

    console.log(user)
  
    try {
        const response = await fetch('http://localhost/php-001/businessLogic/swUser.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(user)
        });

        window.close();
  
        /*const data = await response.json();
  
        if (data.success) {
            alert(data.message);
            window.close(); // Cierra la ventana después de actualizar
        } else {
            alert(data.message);
        }*/
    } catch (error) {
        console.error('Error al actualizar usuario:', error);
    }
}
  
  document.getElementById('updateUserForm').addEventListener('submit', updateUser);
document.addEventListener("DOMContentLoaded", function () {
  loadUsers();
});

// Fetch and display users
function loadUsers() {
  fetch("http://api.local/users")
    .then(response => response.json())
    .then(data => {
      let tableBody = document.getElementById("users");
      tableBody.innerHTML = "";
      data.forEach(user => {
        let row = `<tr>
                  <td>${user.name}</td>
                  <td>${user.email}</td>
                  <td>
                      <button onclick="editUser(${user.id}, '${user.name}', '${user.email}')">Edit</button>
                      <button onclick="deleteUser(${user.id})">Delete</button>
                  </td>
              </tr>`;
        tableBody.innerHTML += row;
      });
    })
    .catch(error => console.error("Error:", error));
}

// Add user
function addUser() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  fetch("http://api.local/users/create", {
    method: "POST",
    body: JSON.stringify({ name, email }),
    headers: { "Content-Type": "application/json" }
  })
    .then(response => response.json())
    .then(() => {
      Swal.fire({
        title: "User Added!",
        text: "The user has been successfully added.",
        icon: "success",
        timer: 2000,
        showConfirmButton: false
      });
      loadUsers();
    });
}

// Edit user
function editUser(id, name, email) {
  document.getElementById("name").value = name;
  document.getElementById("email").value = email;
  document.getElementById("name").dataset.id = id;
}

// Update user
function updateUser() {
  let id = document.getElementById("name").dataset.id;
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  fetch("http://api.local/users/update", {
    method: "PUT",
    body: JSON.stringify({ id, name, email }),
    headers: { "Content-Type": "application/json" }
  })
    .then(response => response.json())
    .then(() => {
      Swal.fire({
        title: "User Updated!",
        text: "User details have been updated successfully.",
        icon: "success",
        timer: 2000,
        showConfirmButton: false
      });
      loadUsers();
    });
}

// Delete user with confirmation popup
function deleteUser(id) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("http://api.local/users/delete", {
        method: "DELETE",
        body: JSON.stringify({ id }),
        headers: { "Content-Type": "application/json" }
      })
        .then(response => response.json())
        .then(() => {
          Swal.fire({
            title: "Deleted!",
            text: "User has been deleted successfully.",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
          });
          loadUsers();
        });
    }
  });
}

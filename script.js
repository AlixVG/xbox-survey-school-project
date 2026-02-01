// script.js
document.getElementById('userForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const prenom = document.getElementById('prenom').value;
    const nom = document.getElementById('nom').value;

    if (prenom && nom) {
        document.cookie = `prenom=${prenom}; path=/; max-age=3600`; // Cookie valable 1h
        document.cookie = `nom=${nom}; path=/; max-age=3600`;

        window.location.href = "enquete.html";
    } else {
        alert("Veuillez remplir tous les champs !");
    }
}
});

function updateValue(value) {
    document.getElementById('noteValue').textContent = value;
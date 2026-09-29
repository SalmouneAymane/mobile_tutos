fetch('http://localhost:8001/categorie.php')
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
        }
        return response.json();
    })
    .then(categories => {
        // On récupère notre balise ul
        const ul = document.getElementById('liste-categories');
        
        // On boucle sur le tableau de catégories
        categories.forEach(categorie => {
            const li = document.createElement('li');
            li.textContent = categorie.nom; // On affiche la clé "nom"
            ul.appendChild(li);
        });
    })
    .catch(erreur => console.error("Erreur de communication :", erreur));
const carta = [
    {name: 'Dragón Blanco de Ojos Azules', archetype: 'Ojos azules', precio: 300, date: '2024-06-28', image: 'img/blue.jpg'},
    {name: 'Mago Oscuro', archetype: 'Mago oscuro', precio: 150, date: '2024-06-27', image: 'img/mago.jpg'},
    {name: 'Balardroch, El Rey de las Fatalidades', archetype: 'Zombie', precio: 1, date: '2024-06-29', image: 'img/doomking.jpg'},
    {name: 'Eldlich, El Señor Dorado', archetype: 'Tierra dorada', precio: 999, date: '2024-06-30', image: 'img/eldlich.jpg'},
    {name: 'Ultimate Tyrano Conductor', archetype: 'Dinosaurio', precio: 2, date: '2024-07-01', image: 'img/dino.jpg'},
    {name: 'Sagrado Rey de Fuego Garunix', archetype: 'Reyes de fuegp', precio: 998, date: '2024-07-02', image: 'img/garunix.jpg'},
    // Añadir más cartas 
];

let carrito= [];

function displaycarta(cartonList) {
    const cartonListDiv = document.getElementById('carton-list');
    cartonListDiv.innerHTML = '';
    cartonList.forEach(carton => {
        const cartonDiv = document.createElement('div');
        cartonDiv.className = 'carton';
        cartonDiv.innerHTML = `
            <img src="${carton.image}" alt="${carton.name}">
            <h3>${carton.name}</h3>
            <p>Arquetipo: ${carton.archetype}</p>
            <p>Precio: $${carton.precio}</p>
            <p>Fecha de salida: ${carton.date}</p>
            <button onclick="AñadirACarrito('${carton.name}')">Agregar al carrito</button>
        `;
        cartonListDiv.appendChild(cartonDiv);
    });
}


displaycarta(carta);
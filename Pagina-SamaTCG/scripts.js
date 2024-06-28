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

function AñadirACarrito(cartonName) {
    const carton = carta.find(c => c.name === cartonName);
    carrito.push(carton);
    ActCarrito();
}

function ActCarrito() {
    const cartButton = document.getElementById('cartonbutton');
    cartButton.innerText = `Carrito (${carrito.length})`;
    cartButton.style.color = '#333'; 

    const cartList = document.getElementById('cartonlist');
    cartList.innerHTML = '';
    let total = 0;
    carrito.forEach((carton, index) => {
        const listItem = document.createElement('li');
        listItem.innerHTML = `
            ${carton.name} - $${carton.precio}
            <button class="remove-item" onclick="removeFromCart(${index})">Eliminar</button>
        `;
        cartList.appendChild(listItem);
        total += carton.precio;
    });

    document.getElementById('cartontotal').innerText = total;
}

function removeFromCart(index) {
    carrito.splice(index, 1);
    ActCarrito();
}

function clearCart() {
    carrito= [];
    ActCarrito();
}

function sortcarta(carta, criterion) {
    switch (criterion) {
        case 'name-asc':
            return carta.sort((a, b) => a.name.localeCompare(b.name));
        case 'name-desc':
            return carta.sort((a, b) => b.name.localeCompare(a.name));
        case 'date-asc':
            return carta.sort((a, b) => new Date(a.date) - new Date(b.date));
        case 'date-desc':
            return carta.sort((a, b) => new Date(b.date) - new Date(a.date));
        case 'precio-asc':
            return carta.sort((a, b) => a.precio - b.precio);
        case 'precio-desc':
            return carta.sort((a, b) => b.precio - a.precio);
        default:
            return carta;
    }
}

function filtercarta(carta, search, minprecio, maxprecio) {
    return carta.filter(carton => {
        return carton.name.toLowerCase().includes(search.toLowerCase()) &&
               (minprecio ? carton.precio >= minprecio : true) &&
               (maxprecio ? carton.precio <= maxprecio : true);
    });
}

document.getElementById('search').addEventListener('input', () => {
    const search = document.getElementById('search').value;
    const minprecio = document.getElementById('precio-min').value;
    const maxprecio = document.getElementById('precio-max').value;
    const sortCriterion = document.getElementById('sort').value;
    let filtrardacarta = filtercarta(carta, search, minprecio, maxprecio);
    filtrardacarta = sortcarta(filtrardacarta, sortCriterion);
    displaycarta(filtrardacarta);
});

document.getElementById('sort').addEventListener('change', () => {
    const search = document.getElementById('search').value;
    const minprecio = document.getElementById('precio-min').value;
    const maxprecio = document.getElementById('precio-max').value;
    const sortCriterion = document.getElementById('sort').value;
    let filtrardacarta = filtercarta(carta, search, minprecio, maxprecio);
    filtrardacarta = sortcarta(filtrardacarta, sortCriterion);
    displaycarta(filtrardacarta);
});

document.getElementById('precio-min').addEventListener('input', () => {
    const search = document.getElementById('search').value;
    const minprecio = document.getElementById('precio-min').value;
    const maxprecio = document.getElementById('precio-max').value;
    const sortCriterion = document.getElementById('sort').value;
    let filtrardacarta = filtercarta(carta, search, minprecio, maxprecio);
    filtrardacarta = sortcarta(filtrardacarta, sortCriterion);
    displaycarta(filtrardacarta);
});

document.getElementById('precio-max').addEventListener('input', () => {
    const search = document.getElementById('search').value;
    const minprecio = document.getElementById('precio-min').value;
    const maxprecio = document.getElementById('precio-max').value;
    const sortCriterion = document.getElementById('sort').value;
    let filtrardacarta = filtercarta(carta, search, minprecio, maxprecio);
    filtrardacarta = sortcarta(filtrardacarta, sortCriterion);
    displaycarta(filtrardacarta);
});

document.getElementById('cartonbutton').addEventListener('click', () => {
    document.getElementById('cartondropdown').classList.toggle('hidden');
});

document.getElementById('clear-cartonbutton').addEventListener('click', () => {
    clearCart();
});

displaycarta(carta);

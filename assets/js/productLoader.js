const container = document.getElementById('container');
const plantObjects = [];

document.addEventListener('DOMContentLoaded', function() {
    initializeEventListeners();
});

function initializeEventListeners() {
    var navbarItems = document.querySelectorAll('#navbar li');
    navbarItems.forEach(function(item) {
        item.addEventListener('click', function() {
            var itemType = this.dataset.name;
            updateProductPage(itemType);
        });
    });
}

function updateProductPage(itemType) {
    fetch('assets/php/plantData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'itemName=' + encodeURIComponent(itemType),
    })
    .then(response => response.json())
    .then(data => {
        container.innerHTML = '';
        parseItems(data);
    })
    .catch(error => {
        console.error('error', error);
    })
}

function parseItems(data) {
    data.forEach(item => {
        const plantObject = {
            name: item.name,
            type: item.type,
            description: item.desc,
            image: item.imgURL,
            price: item.price,
            quantity: item.quantity,
            quantityAvailable: item.quantityAvailable
        }
        plantObjects.push(plantObject);
    });
    displayCards();
}

function createCard(plant) {
    const cardElement = document.createElement('div');
    cardElement.classList.add('card');

    const plantElement = document.createElement('div');
    plantElement.classList.add('cardbody');

    plantElement.innerHTML = `
    <div class="card">
        <div class="cardbody">
            <img src='${plant.image}' alt="" class="cardimage" width="150px">
                <h2 id="itemName" class="cardtitle">${plant.name}</h2>
                <p id="itemDesc" class="carddescription">${plant.description}</p>
                <p id="itemPrice" class="cardprice">$${plant.price}</p>
        </div>
        <button class="cardbutton">Add to cart</button>
    </div>
    `;

    const addToCartButton = plantElement.querySelector('.cardbutton');
    addToCartButton.addEventListener('click', () => addToCart(plant));

    cardElement.appendChild(plantElement);
    return cardElement;
}

function displayCards() {
    plantObjects.forEach(plant => {
        const cardElement = createCard(plant);
        container.appendChild(cardElement);
    });
}
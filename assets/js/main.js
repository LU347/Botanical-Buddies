//const fs = require('fs');
//const jsonData = fs.readFileSync('plants.json');
//const plantData = JSON.parse(products);

const products = [
    { "name": "Rose", "description": "A beautiful and fragrant flowering plant", "price": "9.99", "image": "https://example.com/rose.jpg"},
    { "name": "Fern", "description": "A leafy green plant that thrives in shade", "price": "6.99", "image": "https://example.com/fern.jpg"}
]

const container = document.getElementById('container');
const plantObjects = [];

products.forEach(Plant => {
    const plantObject = {
        name: Plant.name,
        description: Plant.description,
        price: Plant.price
    };
    plantObjects.push(plantObject);
});

function createCard(plant) {
    const cardElement = document.createElement('div');
    cardElement.classList.add('card');

    const plantElement = document.createElement('div');
    plantElement.classList.add('cardbody');

    plantElement.innerHTML = `
    <div class="card">
        <div class="cardbody">
            <img src="images/hibiscus.avif" alt="" class="cardimage" width="150px">
                <h2 id="itemName" class="cardtitle">${plant.name}</h2>
                <p id="itemDesc" class="carddescription">${plant.description}</p>
                <p id="itemPrice" class="cardprice">${plant.price}</p>
        </div>
        <button onclick="addToCart()" class="cardbutton">Add to cart</button>
    </div>
    `;

    cardElement.appendChild(plantElement);
    return cardElement;
}

function addToCart(product) {
    alert(product);
}

function displayCards() {
    plantObjects.forEach(plant => {
        console.log(plant);
        const cardElement = createCard(plant);
        container.appendChild(cardElement);
    });
}

displayCards();





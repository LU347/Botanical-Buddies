//const fs = require('fs');  //script breaks if i use this :/
//const jsonData = fs.readFileSync('plants.json');
//const plantData = JSON.parse(products);

//temp until i fix ^^
const products = [
    { "name": "Rose", "description": "A beautiful and fragrant flowering plant", "price": "9.99", "image": "images/default.png"},
    { "name": "Fern", "description": "A leafy green plant that thrives in shade", "price": "6.99", "image": "images/default.png"},
    { "name": "Lavender", "description": "A purple flowering plant known for its soothing scent", "price": "7.99", "image": "images/default.png"},
]
const container = document.getElementById('container');
const plantObjects = [];

const productsInCart = [];      //for the fakeCart

products.forEach(Plant => {
    const plantObject = {
        name: Plant.name,
        description: Plant.description,
        price: Plant.price,
        image: Plant.image
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
            <img src="${plant.image}" alt="" class="cardimage" width="150px">
                <h2 id="itemName" class="cardtitle">${plant.name}</h2>
                <p id="itemDesc" class="carddescription">${plant.description}</p>
                <p id="itemPrice" class="cardprice">${plant.price}</p>
        </div>
        <button class="cardbutton">Add to cart</button>
    </div>
    `;

    const addToCartButton = plantElement.querySelector('.cardbutton');
    addToCartButton.addEventListener('click', () => addToCart(plant));

    cardElement.appendChild(plantElement);
    return cardElement;
}

function addToCart(product) {
    var fakeCart = document.getElementById('fakeCart'); //temp
    var msgElement = document.createElement('div');
    
    msgElement.textContent = product.name + "," + product.description + "," + product.price;
    fakeCart.appendChild(msgElement);

    productsInCart.push(product);
    console.log(productsInCart);
}

function displayCards() {
    plantObjects.forEach(plant => {
        console.log(plant);
        const cardElement = createCard(plant);
        container.appendChild(cardElement);
    });
}

displayCards();





const container = document.getElementById('container');
const plantObjects = [];
const productsInCart = [];      //for the fakeCart

fetch('assets/data/plants.json')
    .then(response => response.json())
    .then(data => {
        parseItems(data);
    })

function parseItems(data) {
    data.forEach(item => {
        const plantObject = {
            name: item.name,
            description: item.description,
            price: item.price,
            image: item.image
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
            <img src="${plant.image}" alt="" class="cardimage" width="150px">
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

function addToCart(product) {
    var fakeCart = document.getElementById('fakeCart'); //temp
    var msgElement = document.createElement('div');
    
    msgElement.textContent = product.name + "," + product.description + "," + product.price;
    fakeCart.appendChild(msgElement);

    productsInCart.push(product);
    console.log(productsInCart);
}





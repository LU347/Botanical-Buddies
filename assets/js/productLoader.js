const container = document.getElementById('container');
var plantObjects = [];
var currentPage = 'Home'; //home is starting page

document.addEventListener('DOMContentLoaded', function() {
    initializeEventListeners();
    displayProducts(currentPage);
});

function initializeEventListeners() {
    var navbarItems = document.querySelectorAll('#navbar li');
    navbarItems.forEach(function(item) {
        item.addEventListener('click', function() {
            var itemType = this.dataset.name;
            currentPage = itemType;
            displayProducts();
        });
    });
}

function fetchProducts(itemType) {
    fetch('assets/php/plantData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'itemName=' + encodeURIComponent(itemType),
    })
    .then(response => response.json())
    .then(data => {
        plantObjects = [];
        container.innerHTML = '';       //container and plantObjects[] gets emptied
        parseItems(data);
    })
    .catch(error => {
        console.error('error', error);
    })
}

function parseItems(data) {                 //parses json items into plant objects
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
    displayCards();                         //creates and displays the product cards
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
        <form action="assets/php/plantData.php" method="post" class="addToCartForm">
            <input type="hidden" name="addToCart" value="${plant.name}">
            <button type="submit" class="cardbutton">Add to cart</button>
        </form>
    </div>
    `;

    const addToCartForm = plantElement.querySelector('.addToCartForm');
    addToCartForm.addEventListener('submit', function(event) {
        console.log('atc button triggered');
        event.preventDefault(); 
        addToCart(plant.name);
        
    });

    cardElement.appendChild(plantElement);
    return cardElement;
}

function addToCart(plantName) {
    fetch('assets/php/plantData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'addToCart=' + encodeURIComponent(plantName),
    })
    .then(response => response.text())
    .then(data => {
        console.log('Response from server:', data);
    })
    .catch(error => {
        console.error('error', error);
    });

    console.log('added to cart', plantName); 
}

function displayCards() {
    plantObjects.forEach(plant => {
        const cardElement = createCard(plant);
        container.appendChild(cardElement);
    });
}

function displayProducts() {
    //TODO: update html depending on the current "page";
    switch(currentPage) {
        case 'Home':
            container.innerHTML = `
            <div class="category">
                <h1>New Arrivals<h1>
                <div class="carousel"> [plant content] </div>
            </div>
            `;
        break;
        case 'All':
        case 'Flower':
        case 'Tree':
        case 'Shrub':
            fetchProducts(currentPage);
            break;
    }
}

const container = document.getElementById('container');
const category = document.getElementById('category');
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

    //TODO sent to php
    var searchBar = document.getElementById('searchBar');
    searchBar.addEventListener('submit', function() {
        console.log("temporary");
    });
}

function fetchProducts(itemType) {
    fetch('./assets/php/plantData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'itemName=' + encodeURIComponent(itemType),
    })
    .then(response => response.json())
    .then(data => {
        plantObjects = [];
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
                <p id="itemQuantity" class="cardquantityAvail">Quantity Available: ${plant.quantityAvailable}</p>
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
    fetch('./assets/php/plantData.php', {
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
    switch(currentPage) {
        case 'Home':
            category.innerHTML = ` 
                <h1 class='category'>BEST SELLERS (pls change my color)</h1>
            `;                                          
            container.innerHTML = ``;
            fetchProducts(currentPage);
        break;
        case 'Search':     //TODO:
            category.innerHTML = `
                <h1 class="title">$numFound results for $searchquery</h1>
            `;
            container.HTML = '';
            fetchProducts(currentPage);
            break;
        case 'All':
        case 'Flower':
        case 'Tree':
        case 'Shrub':
            category.innerHTML = `
                <div class="sortSelect">
                    <label for="sortBy">Sort By:</label>
                    <select name="sortBy" id="sortBy">
                        <option value="ASCPrice">Lowest to Highest Price</option>
                        <option value="DESCPrice">Highest to Lowest Price</option>
                        <option value="ASCLetters">Plant Name A-Z</option>
                        <option value="DESCLetters">Plant Name Z-A</option>
                        <option value="ASCQuantAvail">Lowest to Highest # Available</option>
                        <option value="DESCQuantAvail">Highest to Lowest # Available</option>
                        <input type="submit" value="SORT">
                    </select>
                </div>
            `;
            container.innerHTML = '';
            fetchProducts(currentPage);
            break;
    }
}

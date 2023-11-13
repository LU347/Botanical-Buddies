const container = document.getElementById('container');
const plantObjects = [];
const productsInCart = [];      //for the fakeCart
const loginForm = document.getElementById("login-form");

fetch('assets/php/plantData.php')
    .then(response => response.json())
    .then(data => {
        parseItems(data);
    })
    .catch(error => console.error('Error:', error));
 
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

function getDataFromForm() {
    var user = loginForm.user.value;
    var pass = loginForm.pass.value; // Change 'second' to 'pass'
    runAjax(user, pass); // Change 'second' to 'pass'
}

function runAjax(user, pass) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        const stringResponse = xhttp.responseText;
        var string = user + " " + pass;
        document.getElementById("responseString").innerHTML = stringResponse;
    };
    xhttp.open("GET", `./connect.php?fname=${user}&lname=${pass}`, true);
    xhttp.send();
}





const discArr = ["10OFF", "15OFF", "20OFF", "25OFF", "50OFF"];

function findTotal() {
    var arr = document.getElementsByName('total');
    var tot = 0;

    for (var i = 0; i < arr.length; i++) {
    if (parseInt(arr[i].value))
        tot += parseInt(arr[i].value);
    }

    document.getElementById('basket-subtotal').innerHTML = tot;
}
// function remove() {
//     const element = document.getElementById("demo");
//     element.remove();
// }

function discount() {
    var input = document.getElementById("promo-code").value;
    var bool = 0;
    for (let i = 0; i < discArr.length; i++){
        if (input.toUpperCase() == discArr[i]){
            var x = document.getElementById('basket-subtotal').innerHTML;
            var percent = discArr[i].slice(0,2) / 100;
            var discount = x * percent;
            x = x - discount;
            alert(discArr[i].slice(0,2) + " percent off!");
            var taxPercent = 8.25 / 100;
            var tax = x * taxPercent;
            x = x + tax;
            document.getElementById('taxes').innerHTML = tax.toFixed(2);
            document.getElementById('basket-total').innerHTML = x.toFixed(2);
            document.getElementById('basket-promo').innerHTML = discount.toFixed(2);
            bool = 1;
        }
    }
    if (bool == 0){
        alert("Invalid promo code.");
    }
    
}
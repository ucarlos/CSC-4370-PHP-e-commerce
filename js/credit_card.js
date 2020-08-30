

/*
    Ok, so I have four fields:
    Credit card number
    Name
    Expiration date

    Mastercard -- First digits b/w 51 - 57
    Visa Cards start with 4
    Discover cards start with 6
    American Express starts with 34 or 37

    

*/


// Global Variables
var creditcard_type = ["MasterCard", "Visa","Discover", "American Express"];



function determine_credit_card(str){

    var check_str = str.substring(0, 2);
    var value = parseInt(check_str);

    if (51 <= value && value <= 57)
        return "MasterCard";
    else if (check_str.charAt(0) == '4')
        return "Visa";
    else if (check_str.charAt(0) == '6')
        return "Discover";
    else if (value == 34 || value == 37)
        return "American Express";
    else
        return "Invalid Card";
}


function wrapper(){
    var old = document.getElementById("card_num").value;

    var new_string = determine_credit_card(old);
    document.getElementById("disabled").value = new_string;
}   

function main(){
    // Get the 
    var value = document.getElementById("card_num").value;
    document.getElementById("card_num").oninput = wrapper(value);
    //var number_form = document.getElementById("card_num").oninput = wrapper(document.getElementById("card_num").value);



}


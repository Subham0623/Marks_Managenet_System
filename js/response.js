function getBotResponse(input) {
    //rock paper scissors
    if (input == "Science") {
        return "Your request have been register is there anyother subject teacher u want to concerner";
    } else if (input == "English") {
        return "Your request have been register is there anyother subject teacher u want to concerner";
    } else if (input == "Nepali") {
        return "Your request have been register is there anyother subject teacher u want to concerner";
    }

    // Simple responses
    if (input == "hello") {
        return "Hello there!";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else {
        return "Couldn't understand that try asking something else!";
    }
}
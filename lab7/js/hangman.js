
    var selectedWord = ""; 
    var selectedHint = ""; 
    var board = ""; 
    var remaininGuesses = 6; 
    var words = [{word: "snake", hint: "It's a reptile"},
                 {word: "monkey", hint: "It's a mammal"},
                 {word: "beetle", hint: "It's an insect"}]; 
    
    console.log(words[0]); 
    
    window.onload = startGame; 
    
    function pickWord() {
        var randomIndex = Math.floor(Math.random() * words.length);
        selectedWord = words[randomIndex].word.toUpperCase();
        selectedHint = words[randomIndex].hint;
    }

    function initBoard() {
        for (var letter in selectedWord) {
            board += '_';  
        }
    }
    
    function startGame() {
        pickWord(); 
        initBoard(); 
        updateBoard(); 
        generateLetters(); 
    }
    
    
    function updateBoard() {
        $("#word").html(""); 
        
        for (var letter of board) {
            //document.getElementById("word").innerHTML += letter + " "; 
            $("#word").append(letter + " "); 
        }
        $("#word").append("<br/>");
        $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    }
    
     function disableButton(btn){
        btn.prop("disabled", true);
        btn.attr("class", "btn btn-danger")
    }
    
    function generateLetters() {
        var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        
        for (var letter of alphabet) {
            $('#letters').append("<button class='letter-btn' id='" + letter + "'>" + letter + "</button>");
        }
        
        $('.letter-btn').click(function(){
            checkLetter($(this).attr("id"));
            disableButton($(this));
        });
    }
    
    function checkLetter(letter)  {
        var positions = []; 
        
        for (var i = 0; i < selectedWord.length; i++) {
            if (letter == selectedWord[i]) {
                positions.push(i); 
            }
        }
        
        if (positions.length > 0) {
            // show the letters at these positions
            updateWord(positions, letter); 
            if(!board.includes('_')){
                endGame(true);
            }
        } else {
            remaininGuesses--; 
            updateMan();
        }
        if(remaininGuesses <= 0){
            endGame(false);
        }
    }
    
    function updateWord(positions, letter) {
        for (var pos of positions) {
            board = replaceAt(board, pos, letter); 
        }
        
        updateBoard(); 
    }
    
    function updateMan(){
        $("#hangImg").attr("src", "img/stick_" + (6-remaininGuesses) + ".png");
    }
    
    function replaceAt(str, index, value) {
        return str.substr(0, index) + value + str.substr(index + value.length); 
    }
    
    function endGame(win){
        $('#letters').hide();
        if(win){
            $('#won').show();
        } else {
            $('#lost').show();
        }
    }
    
    $(".replayBtn").on("click", function(){
        location.reload();
    });
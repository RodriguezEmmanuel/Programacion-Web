const ROCK = "rock";
const PAPER = "paper";
const SCISSORS = "scissors";

const TIE = 0;
const WIN = 1;
const LOST = 2;

const rockBtn = document.getElementById("rock");
const paperBtn = document.getElementById("paper");
const scissorsBtn = document.getElementById("scissors");
const resultText = document.getElementById("start-text");
const userImg = document.getElementById("user-img");
const machineImg = document.getElementById("machine-img");

rockBtn.addEventListener("click", ()=>{
    play(ROCK);
});
paperBtn.addEventListener("click", ()=>{
    play(PAPER);
});
scissorsBtn.addEventListener("click", ()=>{
    play(SCISSORS);
});

function play(userOption){
        userImg.src = "img/"+userOption+".svg";

        resultText.innerHTML = "PENSANDO"

        const interval = setInterval(function(){
            const machineOption = calcMachineOption();
            machineImg.src = "img/"+machineOption+".svg";
        },200)

        setTimeout(function() {

            clearInterval(interval);

            const machineOption = calcMachineOption();
            const result = calcResult(userOption,machineOption);

            userImg.src = "img/"+userOption+".svg";
            machineImg.src = "img/"+machineOption+".svg";

            switch (result) {
                case TIE:
                    resultText.innerHTML = "EMPATE";
                    break;

                case WIN:
                    resultText.innerHTML = "GANASTE";
                    break;

                case LOST:
                    resultText.innerHTML = "PERDISTE";
                    break;
            }    
    }, 3000);

    
}

function calcResult(userOption,machineOption){
    if(userOption == machineOption){
        return TIE;
    }else if(userOption === ROCK){
        
        if(machineOption === PAPER) return LOST;
        if(machineOption === SCISSORS) return WIN;

    }else if(userOption === PAPER){
        
        if(machineOption === SCISSORS) return LOST;
        if(machineOption === ROCK) return WIN;

    }else if(userOption === SCISSORS){

        if(machineOption === ROCK) return LOST;
        if(machineOption === PAPER) return WIN;
    }
}

function calcMachineOption(){
    const number = Math.floor(Math.random()*3)
    switch (number) {
        case 0:
            return ROCK;
            break;
        case 1:
            return PAPER;
            break;
        case 2:                    
            return SCISSORS;
            break;
    
        default:
            break;
    }
}
<?php

class RockPaperScissorsLizardSpock {
    private array $choices = ["rock", "lizard", "spock", "scissors", "paper"];
    private int $playerChoice;
    private string $computerChoice;
    public function __construct() {
        $this->computerChoice = rand(0, count($this->choices) - 1);
    }
    public function createChoiceText() {
        foreach ($this->choices as $index => $choice) {
            echo $index . ":" . $choice . "\n";
        }
    }
    public function getPlayerChoice() {
        $this->createChoiceText();
        $choice = readline("Which do you pick? Make choice by writing number! \n");
        if ($choice < 0 || $choice >= count($this->choices)) {
            exit("Invalid choice!");
        }
        $this->playerChoice = $choice;
    }
    public function determineWinner(): string {
        if ($this->playerChoice == $this->computerChoice) {
            return "It's a tie!";
        } elseif (($this->playerChoice + 1) % 5 == $this->computerChoice % 5 ||
              ($this->playerChoice + 3) % 5 == $this->computerChoice % 5) {
            return "Player wins!";
        } else {
            return "Computer wins!";
        }
    }
    public function displayChoices() {
        echo "Your choice: " . $this->choices[$this->playerChoice] . "\n";
        echo "Computer's choice: " . $this->choices[$this->computerChoice] . "\n";
    }
    public function play() {
        $this->getPlayerChoice();
        $this->displayChoices();
        echo $this->determineWinner();
    }
}
$game = new RockPaperScissorsLizardSpock();
$game->play();

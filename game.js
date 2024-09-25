let score = 0;
let timeLeft = 30;
let gameActive = false;
let gameInterval, timerInterval;
const gameArea = document.getElementById('game-area');
const star = document.getElementById('star');
const scoreDisplay = document.getElementById('score');
const timerDisplay = document.getElementById('timer');
const startBtn = document.getElementById('start-btn');
const restartBtn = document.getElementById('restart-btn');

// Function to move the star to a random position
function moveStar() {
  const areaWidth = gameArea.clientWidth - star.clientWidth;
  const areaHeight = gameArea.clientHeight - star.clientHeight;
  
  const randomX = Math.floor(Math.random() * areaWidth);
  const randomY = Math.floor(Math.random() * areaHeight);

  star.style.left = `${randomX}px`;
  star.style.top = `${randomY}px`;
}

// Function to update the score when the star is clicked
star.addEventListener('click', function() {
  if (gameActive) { 			
    score++;
    scoreDisplay.textContent = `Score: ${score}`;
    moveStar();
  }
});

// Function to update the timer
function updateTimer() {
  timeLeft--;
  timerDisplay.textContent = `Time Left: ${timeLeft}`;
  
  if (timeLeft === 0) {
    clearInterval(gameInterval);
    clearInterval(timerInterval);
    gameActive = false;  // Set game to inactive when the timer reaches 0
    alert(`Game Over! Your final score is ${score}`);
    restartBtn.style.display = 'inline-block';  // Show restart button
  }
}

// Function to start the game
function startGame() {
  // Hide start button and show game area
  startBtn.style.display = 'none';
  gameArea.style.display = 'block';
  restartBtn.style.display = 'none';  // Hide restart button
  
  // Reset score, timer, and game state
  score = 0;
  timeLeft = 30;
  gameActive = true;  // Set game to active
  
  scoreDisplay.textContent = `Score: ${score}`;
  timerDisplay.textContent = `Time Left: ${timeLeft}`;

  // Start the intervals
  gameInterval = setInterval(moveStar, 1000);  // Move star every second
  timerInterval = setInterval(updateTimer, 1000);  // Update timer every second
}

// Function to restart the game
restartBtn.addEventListener('click', function() {
  clearInterval(gameInterval);
  clearInterval(timerInterval);
  startGame();
});

// Start button listener to start the game when clicked
startBtn.addEventListener('click', function() {
  startGame();
});

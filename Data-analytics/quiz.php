<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <title>Quiz</title>
</head>
<body>


      

<section class="wrapper">
 
  <div class="container">
    <h1 class="header">Visualization quiz</h1>
    <div class="output">
      <p class="text"></p>
      <ul class="wrongAnswers hideElement opacity">
      </ul>
    </div>  <!-- /output -->
    <form class="quiz">
      <p class="counter" aria-label="Ten questions in total"></p>
      <input class="response" id="userInput" type="text" maxlength="30" aria-label="Enter answer" autocomplete="off">
      <button type="button" class="submit" aria-label="Next question">Next</button>
      <button type="reset" class="reset hideElement" aria-label="Reset the test">Reset</button>
    </form> <!-- /quiz -->
  </div>  <!-- /container -->  
  
</section>  <!-- /wrapper -->


<style type="text/css">
  * { box-sizing: border-box; }

html, body { height: 100%; }

body, p, h1, h2, button, ul { margin: 0; }

h1, h2 { font-weight: normal; }

button { cursor: pointer; }

button, ul { padding: 0; }

.wrapper { word-wrap: break-word; padding: 3rem 1rem; }

.container { margin: 0 auto; max-width: 35rem; padding: 1.5rem; 
  justify-content: space-between; height: ; }

.container, .output { display: flex; flex-direction: column; }

.container, .response, .submit, .reset { font-size: 1.3rem; }

.header, .submit, .reset { font-family: 'Abril Fatface', cursive; text-align: center; }

.header, .submit, .reset, .text { text-align: center; }

.header { margin-bottom: 2.5rem; }

.output { align-items: center; justify-content: center; }

.output, .wrongAnswers { margin-bottom: 1.25rem; }

.text { height: 5rem; }

.wrongAnswers { transition: all ease 1s; }

.counter { text-align: right; }

.response { padding: 0.7rem 0.3rem; margin-bottom: 0.625rem; }

.list:not(:first-child) { margin-top: 1rem; }

.list:first-child { margin-top: 1.25rem; }

.response, .submit, .reset { transition: all ease .2s; }

.response, .submit, .reset, .text, .wrongAnswers { width: 100%; }

.submit, .reset { padding: 0.5rem; }

.opacity { opacity: 0; height: 0; }

.hideElement { display: none; }

/**Colors**/
body { background: url(https://images.alphacoders.com/258/258211.jpg) no-repeat center;
  background-size: cover; background-attachment: fixed; background-color: #000; color: #eee; }

.submit, .reset { border: none; background-color: transparent; background-color: #1C6BA2; }

button, input { outline: none; }

ul { list-style: none; }

.response { background-color: #eee; border: 1px solid rgb(50, 50, 50); }

.response:focus { border-color: #1C6BA2; }

.submit:hover, .reset:hover, .submit:focus, .reset:focus { background-color: #227CBB; }

</style>


<script type="text/javascript">
  (function() {
  
  const questionList = [
    { question: 'Does poise make you harder to stagger? y/n', answer1: 'y', answer2: 'yes' },
    { question: 'What is the name of the stat referred to as "that other strength"? It\'s ok, you can say it here.',
      answer1: 'dex', answer2: 'dexterity' },
    { question: 'Is Sif a wolf or a beaver?', answer1: 'wolf', answer2: 'grey wolf' },
    { question: 'What is the name of the Sunbro you meet in the Undead Burg?', answer1: 'solaire',
      answer2: 'solaire of astora' },
    { question: 'What is the name of the boss who is half spider and wields the noob Furysword?',
      answer1: 'quelaag', answer2: 'chaos witch quelaag' },
    { question: 'How many Bells of Awakening does the player need to ring as they progress through the game?', 
      answer1: '2', answer2: 'two' },
    { question: 'You always hear about Sunbro, but what about Onionbro? What is his name?', answer1: 'siegmeyer',
      answer2: 'siegmeyer of catarina' },
    { question: 'Amazing chest ahead! y/n', answer1: 'y', answer2: 'yes' },
    { question: 'Is there a secret area down the well at Firelink Shrine? y/n', answer1: 'n', answer2: 'no' },
    { question: 'Praise the...', answer1: 'sun', answer2: 'sun!' }
  ],
        incorrect = [ ],
        correct = [ ],
        responses = [ ],
        list = document.querySelector('.wrongAnswers'),
        countDown = document.querySelector('.counter'),
        reset = document.querySelector('.reset'),
        output = document.querySelector('.text'),
        input = document.querySelector('.response'),
        submit = document.querySelector('.submit');
  let counter = 1,
      listStyle;
  
  //Compare the users responses with the answers in the array constructor, and display the users score
  const getResults = () => {
    for ( let i = 0; i < questionList.length; i++ ) {
      if ( responses[i].toLowerCase() === questionList[i].answer1 ||
           responses[i].toLowerCase() === questionList[i].answer2 ) {
        correct.push(questionList[i].question);    
      } else {
          incorrect.push(questionList[i].question);
        }
    }
    if ( correct.length === 10 ) {
      output.innerHTML = 'You got all 10 questions correct. Clearly, you are the Chosen One.';
    } else if ( correct.length > 0 ) {
        output.innerHTML = 'You got ' + correct.length + ' out of ' + counter + ' questions correct. The following questions were incorrect:';
        list.classList.remove('hideElement');
        setTimeout(function() { list.classList.remove('opacity'); }, 10);
        for ( let i = 0; i < incorrect.length; i++ ) {
          const li = document.createElement('li');
          li.textContent = '- ' + incorrect[i];
          li.classList.add('list');
          list.appendChild(li);
        }
        listStyle = document.querySelectorAll('.list');
      } else {
          output.innerHTML = 'You got all 10 questions wrong. Well done.';
        }
    countDown.innerHTML = 'Complete';
    counter += 1;
    submit.classList.add('hideElement');
    reset.classList.remove('hideElement');
  }
  
  //Display the questions for the user
  const displayQuestion = () => {
    responses.push(input.value);
    if ( counter === 10 ) {
      getResults();
    } else if ( counter < 10 ) {
        counter += 1;
        countDown.innerHTML = counter + '/' + questionList.length;
        for ( let i = 0; i < counter; i++ ) {
          output.innerHTML = questionList[i].question;
        }  
      }
    input.value = '';
  } 
  
  //Pull the first question from the array constuctor when the page loads
  const firstQuestion = () => {
    for ( let i = 0; i < 1; i++ ) {
      output.innerHTML = questionList[i].question;
    }
    countDown.innerHTML = counter + '/' + questionList.length;
  }
  
  //Listen for the enter key within the input field
  const enterKey = event => {
    const code = event.keyCode || event.which;
    if ( code === 13 ) {
      event.preventDefault();
      displayQuestion();
    }
  } 
  
  //Reset the test
  const resetTest = () => {
    if ( incorrect.length > 0 && incorrect.length < 10 ) {
      for ( let i = 0; i < incorrect.length; i++ ) {
        list.removeChild(listStyle[i]);
      }
      list.classList.add('hideElement', 'opacity');
    }
    correct.length = 0;
    incorrect.length = 0;
    responses.length = 0;
    counter = 1;  
    reset.classList.add('hideElement');
    submit.classList.remove('hideElement');
    firstQuestion();
  }
  
  //Add the event listeners if the appropriate element is located within the DOM
  const runCode = () => {
    if ( input ) {
      output.addEventListener('load', firstQuestion(), false);
      submit.addEventListener('click', displayQuestion, false);
      reset.addEventListener('click', resetTest, false);
      input.addEventListener('keydown', enterKey, false);
    }
  } 
  runCode();
  
})();
</script>




</body>
</html>








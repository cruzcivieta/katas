# katas
Recopilatorio de katas

Ejercicios de ejemplo para aprender TDD

## Enero

String Calculator

    1. Create a simple String calculator with a method int Add(string numbers)
        1. The method can take 0, 1 or 2 numbers, and will return their sum (for an empty string it will return 0) for example “” or “1” or “1,2”
        2. Start with the simplest test case of an empty string and move to 1 and two numbers
        3. Remember to solve things as simply as possible so that you force yourself to write tests you did not think about
        4. Remember to refactor after each passing test
    2. Allow the Add method to handle an unknown amount of numbers
    3. Allow the Add method to handle new lines between numbers (instead of commas).
        1. the following input is ok:  “1\n2,3”  (will equal 6)
        2. the following input is NOT ok:  “1,\n” (not need to prove it - just clarifying)
    4. Support different delimiters
        1. to change a delimiter, the beginning of the string will contain a separate line that looks like this:   “//[delimiter]\n[numbers…]” for example “//;\n1;2” should return three where the default delimiter is ‘;’ .
        2. the first line is optional. all existing scenarios should still be supported
    5. Calling Add with a negative number will throw an exception “negatives not allowed” - and the negative that was passed.if there are multiple negatives, show all of them in the exception message

## Febrero

    Roman Translator
    
    The Romans were a clever bunch. They conquered most of Europe and ruled it for hundreds of years. They invented concrete and straight roads and even bikinis[1]. One thing they never discovered though was the number zero. This made writing and dating extensive histories of their exploits slightly more challenging, but the system of numbers they came up with is still in use today. For example the BBC uses Roman numerals to date their programmes.
    
    The Romans wrote numbers using letters - I, V, X, L, C, D, M. (notice these letters have lots of straight lines and are hence easy to hack into stone tablets)
    
    The Kata says you should write a function to convert from normal numbers to Roman Numerals: eg
    
         1 --> I
         10 --> X
         7 --> VII
    etc.
    For a full description of how it works, take a look at [http://www.novaroma.org/via_romana/numbers.html]: which includes an implementation of the Kata in javascript.
    
    There is no need to be able to convert numbers larger than about 3000. (The Romans themselves didn't tend to go any higher)
    
    Note that you can't write numerals like "IM" for 999. Wikipedia says: Modern Roman numerals ... are written by expressing each digit separately starting with the left most digit and skipping any digit with a value of zero. To see this in practice, consider the ... example of 1990. In Roman numerals 1990 is rendered: 1000=M, 900=CM, 90=XC; resulting in MCMXC. 2008 is written as 2000=MM, 8=VIII; or MMVIII.
    
    Part II of the Kata
    
    Write a function to convert in the other direction, ie numeral to digit
    Clues
    
    can you make the code really beautiful and highly readable?
    * does it help to break out lots of small named functions from the main function, or is it better to keep it all in one function?
    if you don't know an algorithm to do this already, can you derive one using strict TDD?
    * does the order you take the tests in affect the final design of your algorithm?
    * Would it be better to work out an algorithm first before starting with TDD?
    if you do know an algorithm already, can you implement it using strict TDD?
    * Can you think of another algorithm?
    what are the best data structures for storing all the numeral letters? (I, V, D, M etc)
    can you define the test cases in a csv file and use FIT, or generate test cases in xUnit?
    what is the best way to verify your tests are correct?
    Suggested Test Cases
    
    Exercise left to the reader. You could use 1999 as an acceptance test.

## Rover Mars

    You are given the initial starting point (x,y) of a rover and the direction (N,S,E,W) it is facing.
    The rover receives a character array of commands.
    Implement commands that move the rover forward/backward (f,b).
    Implement commands that turn the rover left/right (l,r).
    Implement wrapping from one edge of the grid to another. (planets are spheres after all)
    Implement obstacle detection before each move to a new square. If a given sequence of commands encounters an obstacle, the rover moves up to the last possible point and reports the obstacle.
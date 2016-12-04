MarsRover
=========

A Symfony project created on December 1, 2016, 6:32 pm.

<i>Author: Andreu Ros Gutiérrez</i>

Technologies:
<ul>
<li><b>PHP 7.1</b></li>
<li>Built on <b>Symfony 3</b></li>
</ul>
Architecture:
<ul>
<li><b>Domain Driven Design</b></li>
<li>It can be easily built to use it as a <b>REST API</b></li>
<li><b>No persistence</b>, but can be easily extended to use either a SQL or NoSQL DB</li>
</ul>
Test:
<ul>
<li>Unit Tests in 'tests/AppBundle' folder</li>
<li><b>PHPUnit</b></li>
</ul>
Design patterns:
<ul>
<li>Map and MarsRover entities implement the <b>Singleton Patten</b></li>
<li><b>Command Pattern</b> used to build the remote control system of the Mars Rover</li>
<li><b>Strategy Pattern</b> used to select the different strategies of the commands
</ul>
Coding:
<ul>
<li><b>PSR-2</b> coding style</li>
<li>Application folder has the use cases</li>
<li>Domain folder containes all the business logic</li>
</ul>
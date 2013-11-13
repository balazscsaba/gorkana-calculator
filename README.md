# Gorkana Calculator v.0.1.0 #

## Description ##
The calculator executes a set of instructions read from file, that comprise of a keyword and a number that are
separated by a space per line, outputting the result to the screen.
Any number of instructions can be specified, having only the following rules to correctly execute the calculations:
* instructions will ignore mathematical precedence
* instructions can be any of these binary operators: ```apply, add, subtract, multiply, divide```

The calculator is first initialized with the ```apply``` operator, regardless of it's position in the file,
then the operations will be executed in the exact order as written in the instructions file.

## Notes on structuring the application ##
The calculator was designed to easily support any possible mathematical operation, so we wrote a custom adapter to the
```Zend_Math``` package to handle our current needs. This design makes it possible for us to extend the application with
ease, to meet any future requirements.

Since the application currently only supports CLI execution, we decided to use Symfony2's Console tool, to handle the
argument parsing for us, to not reinvent the wheel.

To link these requirements to the application we used Composer, which is a dependency management tool in PHP,
that allows us to declare the dependent libraries the application needs. Composer also makes sure the requirements
are met before firing up the application, by installing the dependent packages, ```Zend_Math``` and ```Symfony/Console```.
After installing the dependencies Composer also handles their auto loading, so the application will have access to the
installed libraries.

The application's core files can be found in the ```vendor/Gorkana``` folder, and it's structured in the following way:
```Calculator``` - Contains files related to the application
* ```App.php``` - application's bootstrap file that initialized the calculator
* ```Calculate.php``` - reads the input file and executes the set of instructions from it
* ```Exception/FileException.php``` - defines a file operation error type

```Console``` - Contains the calculator's custom command
* ```Command/CliCommand.php``` - Defines the custom ```calculate``` command with help support

```Math``` - Contains the custom mathematical operations adapter
* ```Adapter/Standard.php``` - Holds the implementations of the binary operations

## Installation ##
Download the files and install the package using composer's install tool.
```bash
$ php composer.phar install
```
This will automatically download all dependencies of the package.

## Usage ##
The calculator currently can be run only from the command line interface.

Navigate to the project's root folder, e.g.
```bash
$ cd /home/my_user/gorkana/calculator/
```
and execute the ```index.php``` with PHP like this:
```bash
$ php index.php help calculate
```
This will show the command line tool's available options.
The ```calculate``` command supports as an argument the ```file``` from there the instructions will be read.
Make sure the instructions file is exists and is readable, otherwise you will get an error message.
The ```help``` will specify the possible calculations that can be executed:
```apply, add, subtract, multiply, divide```

This package already has in it's root folder 5 examples of instruction files, using one of those would be
to run the following command:
```bash
$ php index.php calculate example.txt
```
This will output the result of the mathematical instructions read from the file ```example.txt``` and will
print ```15``` as the output.
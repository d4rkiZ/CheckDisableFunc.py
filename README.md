# PHP Disabled Functions Checker

This Python script allows you to check the disabled functions configuration in a PHP server by analyzing the PHP info page.

## Prerequisites

- Python 3.x
- requests library (`pip install requests`)

## Usage

1. Clone the repository or download the script.
2. Install the required `requests` library if not already installed.
3. Run the script by executing the following command: python CheckDisableFunc.py
4. When prompted, enter the URL of the PHPinfo page.
5. The script will retrieve the PHP info page content, extract the `disable_functions` section, and compare it with a list of vulnerable functions.
6. If any vulnerable functions are not disabled, they will be displayed as options.
7. Choose a function by entering the corresponding number.
8. The script will suggest the PHP file to use for the selected function.

Note: This script assumes you have access to the PHP info page, which should display the disable_functions configuration. In case you don't have direct access to the PHP info page, an alternative approach is to upload a PHP file that contains the phpinfo() function and then access that file through a web browser. This will provide the necessary information for the script to analyze and determine the disabled functions. 

## Contributing

Contributions are welcome! If you find any issues or want to improve the code, feel free to submit a pull request.
